@extends('layouts.admin')

@section('title', 'Manage Projects')
@section('page_title', 'Manage Projects')

@section('content')
<div class="space-y-6 max-w-7xl">
    
    <!-- Top Bar: Judul & Tombol Tambah -->
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
        <div>
            <h2 class="text-2xl font-extrabold text-white tracking-tight">Manajemen Proyek Portofolio</h2>
            <p class="text-xs text-slate-400 font-mono-code mt-1">
                Kelola karya yang ditampilkan secara langsung pada halaman portfolio utama.
            </p>
        </div>

        <a href="{{ route('admin.projects.create') }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl text-xs font-semibold text-white bg-gradient-to-r from-sky-500 via-indigo-600 to-purple-600 hover:from-sky-400 hover:to-indigo-500 shadow-lg shadow-sky-500/20 transition-all cursor-pointer">
            <i data-lucide="plus" class="w-4 h-4"></i>
            <span>Tambah Project Baru</span>
        </a>
    </div>

    <!-- Table Card Container -->
    <div class="glass-card rounded-2xl border border-slate-800/80 overflow-hidden shadow-2xl">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-sm">
                <thead>
                    <tr class="border-b border-slate-800/80 bg-slate-950/60 text-[11px] font-mono-code text-slate-400 uppercase tracking-wider">
                        <th class="py-3.5 px-5">No</th>
                        <th class="py-3.5 px-5">Project</th>
                        <th class="py-3.5 px-5">Kategori</th>
                        <th class="py-3.5 px-5">Teknologi</th>
                        <th class="py-3.5 px-5">Tautan</th>
                        <th class="py-3.5 px-5 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800/60 text-xs">
                    @forelse($projects as $index => $project)
                        <tr class="hover:bg-slate-900/40 transition-colors">
                            <td class="py-4 px-5 font-mono-code text-slate-400">
                                {{ $projects->firstItem() + $index }}
                            </td>
                            
                            <!-- Thumbnail & Judul -->
                            <td class="py-4 px-5">
                                <div class="flex items-center gap-3.5">
                                    <div class="w-14 h-11 rounded-lg bg-slate-900 border border-slate-800 overflow-hidden flex items-center justify-center shrink-0">
                                        @if($project->thumbnail)
                                            <img src="{{ asset('storage/' . $project->thumbnail) }}" alt="{{ $project->title }}" class="w-full h-full object-cover">
                                        @else
                                            <i data-lucide="image" class="w-4 h-4 text-slate-600"></i>
                                        @endif
                                    </div>
                                    <div class="min-w-0 max-w-xs">
                                        <a href="{{ route('admin.projects.show', $project) }}" class="font-bold text-white hover:text-sky-400 transition-colors block truncate">
                                            {{ $project->title }}
                                        </a>
                                        <span class="text-[11px] text-slate-400 font-mono-code block truncate">/projects/{{ $project->slug }}</span>
                                    </div>
                                </div>
                            </td>

                            <!-- Kategori -->
                            <td class="py-4 px-5">
                                <span class="px-2.5 py-1 rounded-md text-[11px] font-mono-code bg-sky-500/10 text-sky-400 border border-sky-500/20">
                                    {{ $project->category }}
                                </span>
                            </td>

                            <!-- Tech Stack -->
                            <td class="py-4 px-5">
                                <div class="flex flex-wrap gap-1 max-w-xs">
                                    @if(is_array($project->tech_stack))
                                        @foreach($project->tech_stack as $tech)
                                            <span class="px-1.5 py-0.5 rounded text-[10px] font-mono-code bg-slate-900 border border-slate-800 text-slate-300">
                                                #{{ $tech }}
                                            </span>
                                        @endforeach
                                    @endif
                                </div>
                            </td>

                            <!-- Links -->
                            <td class="py-4 px-5">
                                <div class="flex items-center gap-2">
                                    @if($project->live_url)
                                        <a href="{{ $project->live_url }}" target="_blank" class="p-1.5 rounded-lg bg-slate-900 border border-slate-800 text-sky-400 hover:border-sky-500 transition-colors" title="Buka Live Demo">
                                            <i data-lucide="external-link" class="w-3.5 h-3.5"></i>
                                        </a>
                                    @endif
                                    @if($project->github_url)
                                        <a href="{{ $project->github_url }}" target="_blank" class="p-1.5 rounded-lg bg-slate-900 border border-slate-800 text-slate-300 hover:text-white hover:border-slate-600 transition-colors" title="Buka Source Code GitHub">
                                            <i data-lucide="github" class="w-3.5 h-3.5"></i>
                                        </a>
                                    @endif
                                    @if(!$project->live_url && !$project->github_url)
                                        <span class="text-slate-600 font-mono-code">-</span>
                                    @endif
                                </div>
                            </td>

                            <!-- Aksi (Show, Edit, Delete) -->
                            <td class="py-4 px-5 text-right">
                                <div class="flex items-center justify-end gap-1.5">
                                    <!-- Detail -->
                                    <a href="{{ route('admin.projects.show', $project) }}" class="p-2 rounded-lg bg-slate-900 border border-slate-800 text-slate-300 hover:text-sky-400 hover:border-sky-500/40 transition-colors" title="Lihat Detail">
                                        <i data-lucide="eye" class="w-3.5 h-3.5"></i>
                                    </a>

                                    <!-- Edit -->
                                    <a href="{{ route('admin.projects.edit', $project) }}" class="p-2 rounded-lg bg-slate-900 border border-slate-800 text-slate-300 hover:text-amber-400 hover:border-amber-500/40 transition-colors" title="Edit Project">
                                        <i data-lucide="edit-3" class="w-3.5 h-3.5"></i>
                                    </a>

                                    <!-- Hapus dengan Konfirmasi -->
                                    <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus project \'{{ addslashes($project->title) }}\'? Data yang dihapus tidak dapat dikembalikan.');" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 rounded-lg bg-rose-500/10 border border-rose-500/20 text-rose-400 hover:bg-rose-600 hover:text-white transition-all cursor-pointer" title="Hapus Project">
                                            <i data-lucide="trash-2" class="w-3.5 h-3.5"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-12 text-center text-slate-500">
                                <i data-lucide="folder-x" class="w-8 h-8 mx-auto mb-2 text-slate-600"></i>
                                Belum ada project yang ditambahkan. Silakan klik tombol "Tambah Project Baru".
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($projects->hasPages())
            <div class="p-4 border-t border-slate-800/80 bg-slate-950/40">
                {{ $projects->links() }}
            </div>
        @endif
    </div>

</div>
@endsection
