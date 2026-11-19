<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ProjectController extends Controller
{
    /**
     * Tampilkan daftar seluruh project di admin panel.
     */
    public function index(): View
    {
        $projects = Project::orderBy('order', 'asc')->latest()->paginate(10);

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Tampilkan form tambah project baru.
     */
    public function create(): View
    {
        $categories = ['Web Development', 'UI/UX Design', 'Mobile App', 'Backend API', 'Full Stack'];

        return view('admin.projects.create', compact('categories'));
    }

    /**
     * Simpan project baru ke database.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:150'],
            'category' => ['required', 'string', 'max:50'],
            'description' => ['required', 'string'],
            'thumbnail' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,svg', 'max:2048'],
            'tech_stack' => ['required', 'string'],
            'live_url' => ['nullable', 'url', 'max:255'],
            'github_url' => ['nullable', 'url', 'max:255'],
            'order' => ['nullable', 'integer', 'min:0'],
            'is_featured' => ['nullable', 'boolean'],
        ], [
            'title.required' => 'Nama project wajib diisi.',
            'category.required' => 'Kategori project wajib dipilih.',
            'description.required' => 'Deskripsi project wajib diisi.',
            'thumbnail.image' => 'File thumbnail harus berupa gambar.',
            'thumbnail.max' => 'Ukuran thumbnail maksimal 2MB.',
            'tech_stack.required' => 'Teknologi yang digunakan wajib diisi.',
            'live_url.url' => 'Format URL Live Demo tidak valid (gunakan awalan http:// atau https://).',
            'github_url.url' => 'Format URL GitHub tidak valid (gunakan awalan http:// atau https://).',
        ]);

        // Generate unique slug
        $slug = Str::slug($validated['title']);
        $originalSlug = $slug;
        $counter = 1;
        while (Project::where('slug', $slug)->exists()) {
            $slug = $originalSlug.'-'.$counter++;
        }
        $validated['slug'] = $slug;

        // Parse comma separated tech stack string to array
        $validated['tech_stack'] = array_values(array_filter(array_map('trim', explode(',', $validated['tech_stack']))));

        // Upload thumbnail jika ada
        if ($request->hasFile('thumbnail')) {
            $path = $request->file('thumbnail')->store('projects', 'public');
            $validated['thumbnail'] = $path;
        }

        $validated['order'] = $request->input('order', 0) ?? 0;
        $validated['is_featured'] = $request->boolean('is_featured');

        Project::create($validated);

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'Project "'.$validated['title'].'" berhasil ditambahkan dan otomatis tampil di website publik!');
    }

    /**
     * Tampilkan detail spesifik project.
     */
    public function show(Project $project): View
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Tampilkan form edit project.
     */
    public function edit(Project $project): View
    {
        $categories = ['Web Development', 'UI/UX Design', 'Mobile App', 'Backend API', 'Full Stack'];

        return view('admin.projects.edit', compact('project', 'categories'));
    }

    /**
     * Perbarui project di database.
     */
    public function update(Request $request, Project $project): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:150'],
            'category' => ['required', 'string', 'max:50'],
            'description' => ['required', 'string'],
            'thumbnail' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,svg', 'max:2048'],
            'tech_stack' => ['required', 'string'],
            'live_url' => ['nullable', 'url', 'max:255'],
            'github_url' => ['nullable', 'url', 'max:255'],
            'order' => ['nullable', 'integer', 'min:0'],
            'is_featured' => ['nullable', 'boolean'],
        ], [
            'title.required' => 'Nama project wajib diisi.',
            'category.required' => 'Kategori project wajib dipilih.',
            'description.required' => 'Deskripsi project wajib diisi.',
            'thumbnail.image' => 'File thumbnail harus berupa gambar.',
            'thumbnail.max' => 'Ukuran thumbnail maksimal 2MB.',
            'tech_stack.required' => 'Teknologi yang digunakan wajib diisi.',
            'live_url.url' => 'Format URL Live Demo tidak valid (harus diawali http:// atau https://).',
            'github_url.url' => 'Format URL GitHub tidak valid (harus diawali http:// atau https://).',
        ]);

        // Generate unique slug jika judul berubah
        if ($project->title !== $validated['title']) {
            $slug = Str::slug($validated['title']);
            $originalSlug = $slug;
            $counter = 1;
            while (Project::where('slug', $slug)->where('id', '!=', $project->id)->exists()) {
                $slug = $originalSlug.'-'.$counter++;
            }
            $validated['slug'] = $slug;
        }

        // Parse tech stack
        $validated['tech_stack'] = array_values(array_filter(array_map('trim', explode(',', $validated['tech_stack']))));

        // Upload thumbnail baru & hapus yang lama jika ada file baru diunggah
        if ($request->hasFile('thumbnail')) {
            if ($project->thumbnail && Storage::disk('public')->exists($project->thumbnail)) {
                Storage::disk('public')->delete($project->thumbnail);
            }
            $path = $request->file('thumbnail')->store('projects', 'public');
            $validated['thumbnail'] = $path;
        }

        $validated['order'] = $request->input('order', $project->order ?? 0) ?? 0;
        $validated['is_featured'] = $request->boolean('is_featured');

        $project->update($validated);

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'Project "'.$project->title.'" berhasil diperbarui dan disinkronkan ke halaman utama!');
    }

    /**
     * Hapus project dari database dan hapus thumbnail jika ada.
     */
    public function destroy(Project $project): RedirectResponse
    {
        $title = $project->title;

        // Hapus file thumbnail fisik dari disk storage jika ada
        if ($project->thumbnail && Storage::disk('public')->exists($project->thumbnail)) {
            Storage::disk('public')->delete($project->thumbnail);
        }

        $project->delete();

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'Project "'.$title.'" berhasil dihapus dari database.');
    }
}
