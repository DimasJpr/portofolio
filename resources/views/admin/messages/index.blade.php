@extends('layouts.admin')

@section('title', 'Manage Messages')
@section('page_title', 'Manage Messages')

@section('content')
<div class="space-y-6 max-w-7xl">
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
        <div>
            <h2 class="text-2xl font-extrabold text-white">Kotak Masuk Pesan Pengunjung</h2>
            <p class="text-xs text-slate-400 font-mono-code mt-1">Daftar pertanyaan dan penawaran kerjasama dari form kontak publik.</p>
        </div>
    </div>

    <!-- Messages Container -->
    <div class="glass-card rounded-2xl border border-slate-800/80 divide-y divide-slate-800/60 overflow-hidden shadow-2xl">
        @forelse($messages as $msg)
            <div class="p-5 sm:p-6 hover:bg-slate-900/40 transition-colors {{ !$msg->is_read ? 'bg-sky-500/5' : '' }}">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 mb-2">
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 rounded-full bg-slate-900 border border-slate-800 flex items-center justify-center font-bold text-xs text-sky-400 shrink-0">
                            {{ strtoupper(substr($msg->name, 0, 2)) }}
                        </div>
                        <div>
                            <span class="font-bold text-sm text-white">{{ $msg->name }}</span>
                            <span class="text-xs text-slate-400 font-mono-code ml-1">&lt;{{ $msg->email }}&gt;</span>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="text-xs font-mono-code text-slate-500">{{ $msg->created_at->format('d M Y, H:i') }}</span>
                        @if(!$msg->is_read)
                            <span class="px-2 py-0.5 rounded-full text-[10px] font-mono-code bg-amber-500/20 text-amber-300 border border-amber-500/40 font-bold">
                                Baru
                            </span>
                        @endif
                    </div>
                </div>

                <div class="pl-12 space-y-1.5">
                    <h4 class="text-xs font-semibold text-sky-300 font-mono-code">Subjek: {{ $msg->subject }}</h4>
                    <p class="text-sm text-slate-300 leading-relaxed">{{ $msg->message }}</p>
                    <div class="pt-2 flex items-center gap-3 text-xs font-mono-code">
                        <a href="mailto:{{ $msg->email }}" class="text-sky-400 hover:underline flex items-center gap-1">
                            <i data-lucide="reply" class="w-3.5 h-3.5"></i>
                            <span>Balas via Email</span>
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="p-12 text-center text-slate-500 text-xs">
                <i data-lucide="inbox" class="w-8 h-8 text-slate-600 mx-auto mb-2"></i>
                Belum ada pesan masuk di database.
            </div>
        @endforelse
    </div>
</div>
@endsection
