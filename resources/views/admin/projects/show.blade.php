@extends('layouts.admin')

@section('title', 'Detail Project: ' . $project->title)
@section('page_title', 'Detail Project')

@section('content')
<div class="max-w-4xl space-y-6">

    <!-- Top Navigation -->
    <div class="flex items-center justify-between">
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.projects.index') }}" class="p-2 rounded-xl bg-slate-900 border border-slate-800 text-slate-400 hover:text-white hover:border-sky-500/40 transition-colors">
                <i data-lucide="arrow-left" class="w-4 h-4"></i>
            </a>
            <div>
                <h2 class="text-2xl font-extrabold text-white tracking-tight">{{ $project->title }}</h2>
                <p class="text-xs text-sky-400 font-mono-code mt-0.5">/projects/{{ $project->slug }}</p>
            </div>
        </div>

        <div class="flex items-center gap-2">
            <a href="{{ route('admin.projects.edit', $project) }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-xl text-xs font-semibold text-white bg-amber-500/20 text-amber-300 border border-amber-500/30 hover:bg-amber-500 hover:text-white transition-all">
                <i data-lucide="edit-3" class="w-3.5 h-3.5"></i>
                <span>Edit</span>
            </a>

            <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus project ini?');" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="inline-flex items-center gap-2 px-4 py-2 rounded-xl text-xs font-semibold text-rose-400 bg-rose-500/10 border border-rose-500/20 hover:bg-rose-600 hover:text-white transition-all cursor-pointer">
                    <i data-lucide="trash-2" class="w-3.5 h-3.5"></i>
                    <span>Hapus</span>
                </button>
            </form>
        </div>
    </div>

    <!-- Detail Card -->
    <div class="glass-card rounded-3xl overflow-hidden border border-slate-800/80 shadow-2xl space-y-6">
        
        <!-- Large Thumbnail Banner -->
        <div class="relative h-64 sm:h-80 w-full bg-slate-950 flex items-center justify-center overflow-hidden border-b border-slate-800/80">
            @if($project->thumbnail)
                <img src="{{ asset('storage/' . $project->thumbnail) }}" alt="{{ $project->title }}" class="w-full h-full object-cover">
            @else
                <div class="flex flex-col items-center justify-center text-slate-600 space-y-2">
                    <i data-lucide="image" class="w-12 h-12"></i>
                    <span class="text-xs font-mono-code">Tidak ada gambar thumbnail</span>
                </div>
            @endif

            <span class="absolute top-5 left-5 px-3 py-1 rounded-full text-xs font-mono-code font-semibold bg-slate-900/90 text-sky-400 border border-sky-500/30 backdrop-blur-md">
                {{ $project->category }}
            </span>
        </div>

        <!-- Project Meta & Body -->
        <div class="p-6 sm:p-8 space-y-6">
            <div>
                <h3 class="text-xl font-bold text-white mb-2">Deskripsi Proyek</h3>
                <p class="text-sm text-slate-300 leading-relaxed whitespace-pre-line">{{ $project->description }}</p>
            </div>

            <!-- Tech Stack Tags -->
            <div>
                <h4 class="text-xs uppercase font-mono-code text-slate-400 mb-2 font-semibold">Teknologi yang Digunakan</h4>
                <div class="flex flex-wrap gap-2">
                    @if(is_array($project->tech_stack))
                        @foreach($project->tech_stack as $tech)
                            <span class="px-3 py-1.5 rounded-lg text-xs font-mono-code bg-slate-900 border border-slate-800 text-sky-300">
                                #{{ $tech }}
                            </span>
                        @endforeach
                    @endif
                </div>
            </div>

            <!-- Links & Action Details -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-4 border-t border-slate-800/80 text-xs font-mono-code">
                <div class="p-4 rounded-xl bg-slate-900/60 border border-slate-800">
                    <span class="text-slate-400 block mb-1">Live Demo:</span>
                    @if($project->live_url)
                        <a href="{{ $project->live_url }}" target="_blank" class="text-sky-400 hover:underline flex items-center gap-1.5 break-all">
                            <span>{{ $project->live_url }}</span>
                            <i data-lucide="external-link" class="w-3.5 h-3.5 shrink-0"></i>
                        </a>
                    @else
                        <span class="text-slate-500">Tidak ada tautan Live Demo</span>
                    @endif
                </div>

                <div class="p-4 rounded-xl bg-slate-900/60 border border-slate-800">
                    <span class="text-slate-400 block mb-1">Source Code (GitHub):</span>
                    @if($project->github_url)
                        <a href="{{ $project->github_url }}" target="_blank" class="text-sky-400 hover:underline flex items-center gap-1.5 break-all">
                            <span>{{ $project->github_url }}</span>
                            <i data-lucide="github" class="w-3.5 h-3.5 shrink-0"></i>
                        </a>
                    @else
                        <span class="text-slate-500">Tidak ada tautan GitHub</span>
                    @endif
                </div>
            </div>

            <div class="pt-2 flex items-center justify-between text-xs text-slate-500 font-mono-code border-t border-slate-800/60">
                <span>Dibuat pada: {{ $project->created_at->format('d M Y, H:i') }}</span>
                <span>Terakhir diperbarui: {{ $project->updated_at->format('d M Y, H:i') }}</span>
            </div>
        </div>

    </div>

</div>
@endsection
