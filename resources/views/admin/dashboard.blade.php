@extends('layouts.admin')

@section('title', 'Dashboard Overview')
@section('page_title', 'Dashboard Overview')

@section('content')
<div class="space-y-8 max-w-7xl">

    <!-- Welcome Hero Banner -->
    <div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-sky-950/40 via-indigo-950/40 to-[#070b16] border border-sky-500/20 p-6 sm:p-8 backdrop-blur-xl shadow-xl">
        <div class="relative z-10 max-w-2xl space-y-2">
            <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-sky-500/10 border border-sky-500/30 text-sky-400 text-xs font-mono-code font-semibold">
                <i data-lucide="shield-check" class="w-3.5 h-3.5"></i>
                <span>Session Aktif • Database MySQL Terkoneksi</span>
            </span>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight">
                Selamat Datang, <span class="text-transparent bg-clip-text bg-gradient-to-r from-sky-400 via-indigo-300 to-purple-400">{{ Auth::user()->name }}</span>!
            </h2>
            <p class="text-sm text-slate-300 leading-relaxed">
                Panel kendali resmi portfolio developer <strong>Muhammad Dimas Prasetyo (X PPLG 2 - SMKN 1 Bangsri)</strong>. Pantau metrik pengunjung, kelola proyek, perbarui skills, dan tanggapi pesan masuk dari satu dashboard.
            </p>
        </div>
        <div class="absolute -right-10 -bottom-10 w-64 h-64 bg-sky-500/10 rounded-full blur-3xl pointer-events-none"></div>
    </div>

    <!-- ==================== 4 KARTU STATISTIK UTAMA ==================== -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        
        <!-- 1. Total Projects -->
        <a href="{{ route('admin.projects.index') }}" class="glass-card rounded-2xl p-5 border border-slate-800/80 group hover:border-sky-500/40 transition-all block">
            <div class="flex items-center justify-between">
                <span class="text-xs uppercase font-mono-code text-slate-400 font-semibold tracking-wider">Total Projects</span>
                <div class="w-11 h-11 rounded-xl bg-sky-500/10 text-sky-400 flex items-center justify-center group-hover:bg-sky-500 group-hover:text-white transition-all shadow-sm">
                    <i data-lucide="folder-git-2" class="w-5 h-5"></i>
                </div>
            </div>
            <div class="mt-4 flex items-baseline justify-between">
                <div>
                    <span class="text-3xl font-extrabold text-white font-mono-code">{{ $stats['total_projects'] }}</span>
                    <span class="block text-xs text-sky-400 mt-0.5">Karya Terpublikasi</span>
                </div>
                <i data-lucide="arrow-right" class="w-4 h-4 text-slate-600 group-hover:text-sky-400 group-hover:translate-x-1 transition-all"></i>
            </div>
        </a>

        <!-- 2. Total Skills -->
        <a href="{{ route('admin.skills.index') }}" class="glass-card rounded-2xl p-5 border border-slate-800/80 group hover:border-indigo-500/40 transition-all block">
            <div class="flex items-center justify-between">
                <span class="text-xs uppercase font-mono-code text-slate-400 font-semibold tracking-wider">Total Skills</span>
                <div class="w-11 h-11 rounded-xl bg-indigo-500/10 text-indigo-400 flex items-center justify-center group-hover:bg-indigo-500 group-hover:text-white transition-all shadow-sm">
                    <i data-lucide="cpu" class="w-5 h-5"></i>
                </div>
            </div>
            <div class="mt-4 flex items-baseline justify-between">
                <div>
                    <span class="text-3xl font-extrabold text-white font-mono-code">{{ $stats['total_skills'] }}</span>
                    <span class="block text-xs text-indigo-400 mt-0.5">Teknologi Dikuasai</span>
                </div>
                <i data-lucide="arrow-right" class="w-4 h-4 text-slate-600 group-hover:text-indigo-400 group-hover:translate-x-1 transition-all"></i>
            </div>
        </a>

        <!-- 3. Total Messages -->
        <a href="{{ route('admin.messages.index') }}" class="glass-card rounded-2xl p-5 border border-slate-800/80 group hover:border-emerald-500/40 transition-all block">
            <div class="flex items-center justify-between">
                <span class="text-xs uppercase font-mono-code text-slate-400 font-semibold tracking-wider">Total Messages</span>
                <div class="w-11 h-11 rounded-xl bg-emerald-500/10 text-emerald-400 flex items-center justify-center group-hover:bg-emerald-500 group-hover:text-white transition-all shadow-sm">
                    <i data-lucide="mail" class="w-5 h-5"></i>
                </div>
            </div>
            <div class="mt-4 flex items-baseline justify-between">
                <div>
                    <span class="text-3xl font-extrabold text-white font-mono-code">{{ $stats['total_messages'] }}</span>
                    <span class="block text-xs text-emerald-400 mt-0.5">
                        @if($stats['unread_messages'] > 0)
                            <strong class="text-amber-400">{{ $stats['unread_messages'] }} belum dibaca</strong>
                        @else
                            Semua telah dibaca
                        @endif
                    </span>
                </div>
                <i data-lucide="arrow-right" class="w-4 h-4 text-slate-600 group-hover:text-emerald-400 group-hover:translate-x-1 transition-all"></i>
            </div>
        </a>

        <!-- 4. Total Visitors -->
        <div class="glass-card rounded-2xl p-5 border border-slate-800/80 group hover:border-purple-500/40 transition-all">
            <div class="flex items-center justify-between">
                <span class="text-xs uppercase font-mono-code text-slate-400 font-semibold tracking-wider">Total Visitors</span>
                <div class="w-11 h-11 rounded-xl bg-purple-500/10 text-purple-400 flex items-center justify-center group-hover:bg-purple-500 group-hover:text-white transition-all shadow-sm">
                    <i data-lucide="users" class="w-5 h-5"></i>
                </div>
            </div>
            <div class="mt-4 flex items-baseline justify-between">
                <div>
                    <span class="text-3xl font-extrabold text-white font-mono-code">{{ $stats['total_visitors'] }}</span>
                    <span class="block text-xs text-purple-400 mt-0.5">
                        +{{ $stats['today_visitors'] }} pengunjung hari ini
                    </span>
                </div>
                <span class="w-2.5 h-2.5 rounded-full bg-emerald-400 animate-pulse"></span>
            </div>
        </div>

    </div>

    <!-- ==================== GRAFIK STATISTIK PENGUNJUNG ==================== -->
    <div class="glass-card rounded-3xl p-6 sm:p-7 border border-slate-800/80 shadow-2xl">
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 pb-6 border-b border-slate-800/80">
            <div>
                <h3 class="text-lg font-bold text-white flex items-center gap-2">
                    <i data-lucide="trending-up" class="w-5 h-5 text-sky-400"></i>
                    <span>Statistik Aktivitas Pengunjung (7 Hari Terakhir)</span>
                </h3>
                <p class="text-xs text-slate-400 font-mono-code mt-0.5">
                    Data traffic real-time tercatat otomatis di tabel MySQL <code class="text-sky-300">visitors</code>
                </p>
            </div>
            <div class="flex items-center gap-3">
                <span class="inline-flex items-center gap-1.5 text-xs font-mono-code text-sky-400">
                    <span class="w-3 h-3 rounded bg-sky-500"></span> Pengunjung
                </span>
                <span class="inline-flex items-center gap-1.5 text-xs font-mono-code text-indigo-400">
                    <span class="w-3 h-3 rounded bg-indigo-500"></span> Pesan Masuk
                </span>
            </div>
        </div>

        <!-- Chart Canvas Container -->
        <div class="pt-6 h-72 sm:h-80 w-full relative">
            <canvas id="analyticsChart"></canvas>
        </div>
    </div>

    <!-- ==================== DUA KOLOM: RECENT MESSAGES & RECENT PROJECTS ==================== -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        
        <!-- Left: Pesan Masuk Terbaru -->
        <div class="lg:col-span-7 space-y-4">
            <div class="flex items-center justify-between">
                <h3 class="text-base font-bold text-white flex items-center gap-2">
                    <i data-lucide="inbox" class="w-4 h-4 text-emerald-400"></i>
                    <span>Pesan Pengunjung Terbaru</span>
                </h3>
                <a href="{{ route('admin.messages.index') }}" class="text-xs font-mono-code text-sky-400 hover:text-sky-300 flex items-center gap-1">
                    <span>Lihat Semua</span>
                    <i data-lucide="chevron-right" class="w-3.5 h-3.5"></i>
                </a>
            </div>

            <div class="glass-card rounded-2xl border border-slate-800/80 divide-y divide-slate-800/60 overflow-hidden shadow-xl">
                @forelse($recentMessages as $msg)
                    <div class="p-4 sm:p-5 hover:bg-slate-900/40 transition-colors">
                        <div class="flex items-center justify-between gap-3 mb-1.5">
                            <div class="flex items-center gap-2.5">
                                <span class="font-bold text-sm text-white">{{ $msg->name }}</span>
                                <span class="text-xs text-slate-400 font-mono-code">({{ $msg->email }})</span>
                            </div>
                            <span class="text-[11px] font-mono-code text-slate-500">{{ $msg->created_at->diffForHumans() }}</span>
                        </div>
                        <p class="text-xs font-semibold text-sky-300">{{ $msg->subject }}</p>
                        <p class="text-xs text-slate-300 mt-1 line-clamp-2 leading-relaxed">{{ $msg->message }}</p>
                    </div>
                @empty
                    <div class="p-8 text-center text-slate-500 text-xs">
                        <i data-lucide="message-square" class="w-8 h-8 text-slate-600 mx-auto mb-2"></i>
                        Belum ada pesan masuk dari form kontak publik.
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Right: Daftar Karya & Quick Info -->
        <div class="lg:col-span-5 space-y-6">
            
            <!-- Quick Projects Overview -->
            <div class="glass-card rounded-2xl p-6 border border-slate-800/80 space-y-4 shadow-xl">
                <div class="flex items-center justify-between">
                    <h3 class="text-base font-bold text-white flex items-center gap-2">
                        <i data-lucide="layers" class="w-4 h-4 text-sky-400"></i>
                        <span>Proyek Terdaftar</span>
                    </h3>
                    <a href="{{ route('admin.projects.index') }}" class="text-xs font-mono-code text-sky-400 hover:text-sky-300">
                        Kelola
                    </a>
                </div>

                <div class="space-y-3">
                    @forelse($recentProjects as $proj)
                        <div class="flex items-center justify-between p-3 rounded-xl bg-slate-900/60 border border-slate-800 text-xs hover:border-slate-700 transition-colors">
                            <div class="min-w-0 pr-2">
                                <span class="font-bold text-white block truncate">{{ $proj->title }}</span>
                                <span class="text-[11px] text-slate-400 font-mono-code">{{ $proj->category }}</span>
                            </div>
                            <div class="flex items-center gap-2">
                                @if($proj->live_url)
                                    <a href="{{ $proj->live_url }}" target="_blank" class="p-1.5 rounded-lg bg-slate-800 text-slate-300 hover:text-sky-400" title="Live Demo">
                                        <i data-lucide="external-link" class="w-3.5 h-3.5"></i>
                                    </a>
                                @endif
                                @if($proj->github_url)
                                    <a href="{{ $proj->github_url }}" target="_blank" class="p-1.5 rounded-lg bg-slate-800 text-slate-300 hover:text-sky-400" title="Source Code">
                                        <i data-lucide="github" class="w-3.5 h-3.5"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                    @empty
                        <p class="text-xs text-slate-500 text-center py-4">Belum ada project.</p>
                    @endforelse
                </div>
            </div>

            <!-- Skills List Preview -->
            <div class="glass-card rounded-2xl p-6 border border-slate-800/80 space-y-3 shadow-xl">
                <div class="flex items-center justify-between">
                    <h3 class="text-base font-bold text-white flex items-center gap-2">
                        <i data-lucide="cpu" class="w-4 h-4 text-indigo-400"></i>
                        <span>Skills & Teknologi</span>
                    </h3>
                    <a href="{{ route('admin.skills.index') }}" class="text-xs font-mono-code text-sky-400 hover:text-sky-300">
                        Kelola
                    </a>
                </div>

                <div class="flex flex-wrap gap-2 pt-1">
                    @forelse($skills as $sk)
                        <span class="px-2.5 py-1 rounded-lg text-xs font-mono-code bg-slate-900 border border-slate-800 text-slate-300 flex items-center gap-1.5">
                            <span class="w-1.5 h-1.5 rounded-full bg-sky-400"></span>
                            <span>{{ $sk->name }}</span>
                            <span class="text-[10px] text-sky-400 font-bold">({{ $sk->proficiency }}%)</span>
                        </span>
                    @empty
                        <span class="text-xs text-slate-500">Belum ada skill.</span>
                    @endforelse
                </div>
            </div>

        </div>

    </div>

</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const ctx = document.getElementById('analyticsChart');
        if (!ctx) return;

        // Siapkan gradient warna biru untuk area chart
        const chartCtx = ctx.getContext('2d');
        const blueGradient = chartCtx.createLinearGradient(0, 0, 0, 300);
        blueGradient.addColorStop(0, 'rgba(56, 189, 248, 0.45)');
        blueGradient.addColorStop(1, 'rgba(56, 189, 248, 0.0)');

        const indigoGradient = chartCtx.createLinearGradient(0, 0, 0, 300);
        indigoGradient.addColorStop(0, 'rgba(99, 102, 241, 0.35)');
        indigoGradient.addColorStop(1, 'rgba(99, 102, 241, 0.0)');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: @json($chartLabels),
                datasets: [
                    {
                        label: 'Pengunjung Website',
                        data: @json($chartVisitors),
                        borderColor: '#38bdf8',
                        backgroundColor: blueGradient,
                        borderWidth: 3,
                        fill: true,
                        tension: 0.4,
                        pointBackgroundColor: '#38bdf8',
                        pointBorderColor: '#070b16',
                        pointBorderWidth: 2,
                        pointRadius: 4,
                        pointHoverRadius: 6,
                    },
                    {
                        label: 'Pesan Masuk',
                        data: @json($chartMessages),
                        borderColor: '#818cf8',
                        backgroundColor: indigoGradient,
                        borderWidth: 2,
                        borderDash: [5, 5],
                        fill: false,
                        tension: 0.4,
                        pointBackgroundColor: '#818cf8',
                        pointRadius: 3,
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        backgroundColor: '#0a1024',
                        titleColor: '#ffffff',
                        bodyColor: '#38bdf8',
                        borderColor: 'rgba(56, 189, 248, 0.3)',
                        borderWidth: 1,
                        padding: 12,
                        cornerRadius: 12,
                        displayColors: true,
                    }
                },
                scales: {
                    x: {
                        grid: {
                            color: 'rgba(255, 255, 255, 0.04)',
                        },
                        ticks: {
                            color: '#94a3b8',
                            font: {
                                family: 'JetBrains Mono',
                                size: 11
                            }
                        }
                    },
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(255, 255, 255, 0.05)',
                        },
                        ticks: {
                            color: '#94a3b8',
                            font: {
                                family: 'JetBrains Mono',
                                size: 11
                            },
                            precision: 0
                        }
                    }
                }
            }
        });
    });
</script>
@endpush
