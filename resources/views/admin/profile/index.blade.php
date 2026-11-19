@extends('layouts.admin')

@section('title', 'Profile Settings')
@section('page_title', 'Profile Settings')

@section('content')
<div class="space-y-6 max-w-4xl">
    <div>
        <h2 class="text-2xl font-extrabold text-white">Pengaturan Akun & Profil</h2>
        <p class="text-xs text-slate-400 font-mono-code mt-1">Kelola informasi kredensial administrator dan profil portofolio.</p>
    </div>

    <div class="glass-card rounded-3xl p-6 sm:p-8 border border-slate-800/80 shadow-2xl space-y-6">
        <!-- Profile Header Badge -->
        <div class="flex items-center gap-4 pb-6 border-b border-slate-800/80">
            <div class="w-16 h-16 rounded-2xl bg-gradient-to-tr from-sky-500 via-indigo-500 to-purple-600 p-[2px] shadow-xl">
                <div class="w-full h-full bg-[#070b16] rounded-[14px] flex items-center justify-center font-extrabold text-xl text-sky-400">
                    DP
                </div>
            </div>
            <div>
                <h3 class="text-lg font-bold text-white">{{ $user->name }}</h3>
                <p class="text-xs text-sky-400 font-mono-code">Super Administrator • {{ $user->email }}</p>
                <span class="inline-flex items-center gap-1.5 text-[11px] text-emerald-400 mt-1 font-mono-code">
                    <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                    <span>Akun Aktif Terverifikasi</span>
                </span>
            </div>
        </div>

        <!-- Form Info -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 text-sm">
            <div>
                <label class="block text-xs uppercase font-mono-code text-slate-400 mb-1.5">Nama Lengkap</label>
                <input type="text" readonly value="{{ $user->name }}" class="glass-input w-full px-4 py-2.5 rounded-xl text-xs bg-slate-900/60 border border-slate-800 text-slate-300">
            </div>
            <div>
                <label class="block text-xs uppercase font-mono-code text-slate-400 mb-1.5">Email Administrator</label>
                <input type="email" readonly value="{{ $user->email }}" class="glass-input w-full px-4 py-2.5 rounded-xl text-xs bg-slate-900/60 border border-slate-800 text-slate-300">
            </div>
            <div>
                <label class="block text-xs uppercase font-mono-code text-slate-400 mb-1.5">Sekolah</label>
                <input type="text" readonly value="SMK Negeri 1 Bangsri (X PPLG 2)" class="glass-input w-full px-4 py-2.5 rounded-xl text-xs bg-slate-900/60 border border-slate-800 text-slate-300">
            </div>
            <div>
                <label class="block text-xs uppercase font-mono-code text-slate-400 mb-1.5">Lokasi</label>
                <input type="text" readonly value="Jepara, Jawa Tengah, Indonesia" class="glass-input w-full px-4 py-2.5 rounded-xl text-xs bg-slate-900/60 border border-slate-800 text-slate-300">
            </div>
        </div>

        <div class="pt-4 border-t border-slate-800/80 flex items-center justify-between text-xs text-slate-400 font-mono-code">
            <span>Password dienkripsi menggunakan Hash Bcrypt</span>
            <span class="text-sky-400">Laravel 13 • PHP 8.5</span>
        </div>
    </div>
</div>
@endsection
