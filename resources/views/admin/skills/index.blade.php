@extends('layouts.admin')

@section('title', 'Manage Skills')
@section('page_title', 'Manage Skills')

@section('content')
<div class="space-y-6 max-w-7xl">
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
        <div>
            <h2 class="text-2xl font-extrabold text-white">Daftar Keahlian & Teknologi</h2>
            <p class="text-xs text-slate-400 font-mono-code mt-1">Kelola daftar kemampuan teknis yang ditampilkan pada bagian skills.</p>
        </div>
        <button type="button" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl text-xs font-semibold text-white bg-gradient-to-r from-sky-500 to-indigo-600 hover:from-sky-400 hover:to-indigo-500 shadow-md shadow-sky-500/20 transition-all cursor-pointer">
            <i data-lucide="plus" class="w-4 h-4"></i>
            <span>Tambah Skill Baru</span>
        </button>
    </div>

    <!-- Skills Grid Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-5">
        @forelse($skills as $skill)
            <div class="glass-card rounded-2xl p-5 border border-slate-800/80 space-y-4 shadow-xl">
                <div class="flex items-center justify-between">
                    <span class="px-2 py-0.5 rounded text-[11px] font-mono-code bg-slate-900 border border-slate-800 text-sky-400">
                        {{ $skill->category }}
                    </span>
                    <div class="flex items-center gap-1.5">
                        <button class="p-1 rounded text-slate-400 hover:text-white" title="Edit">
                            <i data-lucide="edit-2" class="w-3.5 h-3.5"></i>
                        </button>
                        <button class="p-1 rounded text-rose-400 hover:text-rose-300" title="Hapus">
                            <i data-lucide="trash-2" class="w-3.5 h-3.5"></i>
                        </button>
                    </div>
                </div>

                <div>
                    <h3 class="text-base font-bold text-white">{{ $skill->name }}</h3>
                    <div class="mt-2 space-y-1">
                        <div class="flex justify-between text-xs font-mono-code text-slate-400">
                            <span>Tingkat Kemampuan</span>
                            <span class="text-sky-400 font-bold">{{ $skill->proficiency }}%</span>
                        </div>
                        <div class="w-full h-1.5 rounded-full bg-slate-900 overflow-hidden">
                            <div class="h-full bg-gradient-to-r from-sky-500 to-indigo-500 rounded-full" style="width: {{ $skill->proficiency }}%;"></div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full py-12 text-center text-slate-500 text-xs">
                Belum ada skill yang tersimpan di database.
            </div>
        @endforelse
    </div>
</div>
@endsection
