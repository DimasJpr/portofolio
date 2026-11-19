<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Project;
use App\Models\Skill;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\View;

class PortfolioController extends Controller
{
    /**
     * Display the personal portfolio landing page.
     */
    public function index(): View
    {
        $profile = [
            'name' => 'Muhammad Dimas Prasetyo',
            'initials' => 'DP',
            'role' => 'Student Developer / Web Developer',
            'class' => 'X PPLG 2',
            'school' => 'SMK Negeri 1 Bangsri',
            'major' => 'Pengembangan Perangkat Lunak dan Gim (PPLG)',
            'location' => 'Jepara, Jawa Tengah, Indonesia',
            'email' => 'dimasprasetyo@smkn1bangsri.sch.id',
            'github' => 'https://github.com/dimasprasetyo',
            'instagram' => 'https://instagram.com/dimasprasetyo',
            'bio' => 'Saya adalah siswa kelas X PPLG 2 di SMK Negeri 1 Bangsri dengan dedikasi tinggi dalam dunia pemrograman. Fokus mendalami Web Development menggunakan ekosistem PHP, Laravel, JavaScript, dan antarmuka modern.',
        ];

        // Safe fetch from database with graceful fallback if table not yet migrated
        $skills = collect();
        if (Schema::hasTable('skills')) {
            $skills = Skill::orderBy('order')->get();
        }

        // Catat kunjungan pengunjung unik per hari
        if (Schema::hasTable('visitors')) {
            \App\Models\Visitor::firstOrCreate([
                'ip_address' => request()->ip() ?? '127.0.0.1',
                'visited_date' => now()->toDateString(),
            ], [
                'user_agent' => substr(request()->userAgent() ?? 'Unknown Browser', 0, 255),
                'page' => '/',
            ]);
        }

        if ($skills->isEmpty()) {
            $skills = collect([
                (object) ['name' => 'HTML', 'category' => 'Frontend', 'proficiency' => 95, 'icon' => 'bi-filetype-html'],
                (object) ['name' => 'CSS', 'category' => 'Frontend', 'proficiency' => 90, 'icon' => 'bi-filetype-css'],
                (object) ['name' => 'JavaScript', 'category' => 'Frontend', 'proficiency' => 82, 'icon' => 'bi-filetype-js'],
                (object) ['name' => 'PHP', 'category' => 'Backend', 'proficiency' => 85, 'icon' => 'bi-filetype-php'],
                (object) ['name' => 'Laravel', 'category' => 'Backend', 'proficiency' => 84, 'icon' => 'bi-layers-fill'],
                (object) ['name' => 'MySQL', 'category' => 'Database', 'proficiency' => 80, 'icon' => 'bi-database-fill'],
                (object) ['name' => 'Git & GitHub', 'category' => 'Tools', 'proficiency' => 85, 'icon' => 'bi-git'],
                (object) ['name' => 'UI/UX Design', 'category' => 'Design', 'proficiency' => 78, 'icon' => 'bi-palette-fill'],
            ]);
        }

        $projects = collect();
        if (Schema::hasTable('projects')) {
            $projects = Project::orderBy('order')->get();
        }

        if ($projects->isEmpty()) {
            $projects = collect([
                (object) [
                    'title' => 'Catat Uang',
                    'slug' => 'catat-uang',
                    'category' => 'Web Development',
                    'description' => 'Aplikasi pencatatan keuangan harian modern untuk mengelola pemasukan dan pengeluaran dengan ringkasan transaksi visual.',
                    'thumbnail' => null,
                    'tech_stack' => ['Laravel', 'MySQL', 'Tailwind CSS', 'Alpine.js'],
                    'live_url' => '#',
                    'github_url' => 'https://github.com',
                ],
                (object) [
                    'title' => 'Tabungan Pintar',
                    'slug' => 'tabungan-pintar',
                    'category' => 'Web Development',
                    'description' => 'Sistem manajemen target tabungan digital dengan pelacakan progres berkala dan histori simpanan yang rapi.',
                    'thumbnail' => null,
                    'tech_stack' => ['PHP', 'Laravel', 'Bootstrap 5', 'MySQL'],
                    'live_url' => '#',
                    'github_url' => 'https://github.com',
                ],
                (object) [
                    'title' => 'The Quiz',
                    'slug' => 'the-quiz',
                    'category' => 'Web Development',
                    'description' => 'Aplikasi kuis online interaktif dengan batas waktu per pertanyaan, papan skor instan, dan visual antarmuka modern.',
                    'thumbnail' => null,
                    'tech_stack' => ['JavaScript', 'HTML5', 'CSS3', 'Laravel API'],
                    'live_url' => '#',
                    'github_url' => 'https://github.com',
                ],
                (object) [
                    'title' => 'Personal Portfolio',
                    'slug' => 'personal-portfolio',
                    'category' => 'UI/UX Design',
                    'description' => 'Desain website portfolio developer berkonsep dark mode, glassmorphism, glowing accent, dan layout fully responsive.',
                    'thumbnail' => null,
                    'tech_stack' => ['Figma', 'UI/UX', 'Tailwind CSS', 'Blade'],
                    'live_url' => '#',
                    'github_url' => 'https://github.com',
                ],
            ]);
        }

        $categories = $projects->pluck('category')->unique()->values();

        return view('portfolio.index', compact('profile', 'skills', 'projects', 'categories'));
    }

    /**
     * Handle incoming contact form submission.
     */
    public function sendMessage(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:150'],
            'subject' => ['nullable', 'string', 'max:150'],
            'message' => ['required', 'string', 'min:10', 'max:3000'],
        ]);

        if (Schema::hasTable('messages')) {
            Message::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'subject' => $validated['subject'] ?? 'Pesan dari Form Kontak Portfolio',
                'message' => $validated['message'],
                'ip_address' => $request->ip(),
                'is_read' => false,
            ]);
        }

        return redirect()
            ->to(url()->previous().'#contact')
            ->with('success', 'Terima kasih! Pesan Anda berhasil dikirim dan akan segera saya balas.');
    }
}
