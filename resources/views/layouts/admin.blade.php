<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') - Muhammad Dimas Prasetyo</title>

    <!-- Google Fonts: Plus Jakarta Sans & JetBrains Mono -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500;600&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Lucide Icons CDN -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#050811] text-slate-100 min-h-screen flex flex-col lg:flex-row antialiased overflow-x-hidden">

    <!-- Ambient Glowing Blobs -->
    <div class="fixed inset-0 pointer-events-none overflow-hidden z-0">
        <div class="glow-blob bg-sky-500 w-[500px] h-[500px] -top-32 left-1/4 opacity-15"></div>
        <div class="glow-blob bg-indigo-600 w-[500px] h-[500px] bottom-0 right-0 opacity-15"></div>
    </div>

    <!-- Mobile Sidebar Backdrop Overlay -->
    <div id="mobile-sidebar-backdrop" class="fixed inset-0 bg-black/70 backdrop-blur-sm z-40 hidden lg:hidden transition-opacity"></div>

    <!-- ==================== SIDEBAR (DESKTOP & MOBILE) ==================== -->
    <aside id="admin-sidebar" class="fixed top-0 bottom-0 left-0 w-72 bg-[#070b16] border-r border-slate-800/80 z-50 flex flex-col -translate-x-full lg:translate-x-0 lg:static transition-transform duration-300 ease-in-out shrink-0">
        
        <!-- Sidebar Brand / Logo Header -->
        <div class="h-20 flex items-center justify-between px-6 border-b border-slate-800/80">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 group">
                <div class="flex items-center justify-center w-10 h-10 rounded-xl bg-gradient-to-tr from-sky-500 via-indigo-500 to-purple-600 p-[1.5px] shadow-lg shadow-sky-500/25 group-hover:shadow-sky-500/40 transition-all">
                    <div class="w-full h-full bg-[#070b16] rounded-[10px] flex items-center justify-center">
                        <span class="font-extrabold text-sm text-transparent bg-clip-text bg-gradient-to-r from-sky-400 to-indigo-300">DP</span>
                    </div>
                </div>
                <div>
                    <span class="font-bold text-base text-white tracking-tight">Dimas<span class="text-sky-400">.dev</span></span>
                    <span class="block text-[10px] text-slate-400 font-mono-code uppercase tracking-wider">Admin Dashboard</span>
                </div>
            </a>

            <!-- Mobile Close Button -->
            <button id="close-mobile-sidebar-btn" type="button" class="lg:hidden p-2 rounded-lg text-slate-400 hover:text-white hover:bg-slate-800/60" aria-label="Tutup Sidebar">
                <i data-lucide="x" class="w-5 h-5"></i>
            </button>
        </div>

        <!-- Sidebar Navigation Menu -->
        <nav class="flex-1 px-4 py-6 space-y-1.5 overflow-y-auto">
            <div class="text-[10px] font-bold uppercase tracking-widest text-slate-500 font-mono-code px-3 mb-2">
                Menu Utama
            </div>

            <!-- 1. Dashboard -->
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-medium transition-all {{ request()->routeIs('admin.dashboard') ? 'bg-sky-500/15 text-sky-400 border border-sky-500/30 shadow-sm' : 'text-slate-400 hover:text-white hover:bg-slate-900/60' }}">
                <i data-lucide="layout-dashboard" class="w-4 h-4 text-sky-400"></i>
                <span>Dashboard</span>
            </a>

            <div class="text-[10px] font-bold uppercase tracking-widest text-slate-500 font-mono-code px-3 pt-5 mb-2">
                Manajemen Konten
            </div>

            <!-- 2. Manage Projects -->
            <a href="{{ route('admin.projects.index') }}" class="flex items-center justify-between px-3.5 py-2.5 rounded-xl text-sm font-medium transition-all {{ request()->routeIs('admin.projects.*') ? 'bg-sky-500/15 text-sky-400 border border-sky-500/30' : 'text-slate-400 hover:text-white hover:bg-slate-900/60' }}">
                <div class="flex items-center gap-3">
                    <i data-lucide="folder-git-2" class="w-4 h-4 text-indigo-400"></i>
                    <span>Manage Projects</span>
                </div>
                <span class="text-[10px] font-mono-code px-2 py-0.5 rounded bg-slate-900 border border-slate-800 text-slate-400">CRUD</span>
            </a>

            <!-- 3. Manage Skills -->
            <a href="{{ route('admin.skills.index') }}" class="flex items-center justify-between px-3.5 py-2.5 rounded-xl text-sm font-medium transition-all {{ request()->routeIs('admin.skills.*') ? 'bg-sky-500/15 text-sky-400 border border-sky-500/30' : 'text-slate-400 hover:text-white hover:bg-slate-900/60' }}">
                <div class="flex items-center gap-3">
                    <i data-lucide="cpu" class="w-4 h-4 text-emerald-400"></i>
                    <span>Manage Skills</span>
                </div>
                <span class="text-[10px] font-mono-code px-2 py-0.5 rounded bg-slate-900 border border-slate-800 text-slate-400">Tech</span>
            </a>

            <!-- 4. Manage Messages -->
            <a href="{{ route('admin.messages.index') }}" class="flex items-center justify-between px-3.5 py-2.5 rounded-xl text-sm font-medium transition-all {{ request()->routeIs('admin.messages.*') ? 'bg-sky-500/15 text-sky-400 border border-sky-500/30' : 'text-slate-400 hover:text-white hover:bg-slate-900/60' }}">
                <div class="flex items-center gap-3">
                    <i data-lucide="mail" class="w-4 h-4 text-amber-400"></i>
                    <span>Manage Messages</span>
                </div>
                @if(isset($stats['unread_messages']) && $stats['unread_messages'] > 0)
                    <span class="text-[10px] font-mono-code px-2 py-0.5 rounded-full bg-amber-500/20 border border-amber-500/40 text-amber-300 font-bold">
                        {{ $stats['unread_messages'] }}
                    </span>
                @endif
            </a>

            <div class="text-[10px] font-bold uppercase tracking-widest text-slate-500 font-mono-code px-3 pt-5 mb-2">
                Pengaturan
            </div>

            <!-- 5. Profile Settings -->
            <a href="{{ route('admin.profile.index') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-medium transition-all {{ request()->routeIs('admin.profile.*') ? 'bg-sky-500/15 text-sky-400 border border-sky-500/30' : 'text-slate-400 hover:text-white hover:bg-slate-900/60' }}">
                <i data-lucide="settings" class="w-4 h-4 text-purple-400"></i>
                <span>Profile Settings</span>
            </a>
        </nav>

        <!-- 6. Sidebar Footer: Admin Profile & Logout -->
        <div class="p-4 border-t border-slate-800/80 bg-slate-950/40">
            <div class="flex items-center gap-3 mb-3">
                <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-sky-500 to-indigo-600 flex items-center justify-center font-bold text-xs text-white shadow-md">
                    DP
                </div>
                <div class="flex-1 min-w-0">
                    <h5 class="text-xs font-bold text-white truncate">{{ Auth::user()->name ?? 'Muhammad Dimas' }}</h5>
                    <p class="text-[11px] text-slate-400 font-mono-code truncate">{{ Auth::user()->email ?? 'admin@dimas.dev' }}</p>
                </div>
            </div>

            <!-- Logout Button Form -->
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full flex items-center justify-center gap-2 py-2.5 px-3 rounded-xl text-xs font-semibold text-rose-400 hover:text-white bg-rose-500/10 hover:bg-rose-600 border border-rose-500/20 transition-all cursor-pointer">
                    <i data-lucide="log-out" class="w-4 h-4"></i>
                    <span>Logout Keluar</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- ==================== MAIN CONTENT WRAPPER ==================== -->
    <div class="flex-1 flex flex-col min-w-0 z-10">
        
        <!-- ==================== HEADER NAVBAR ==================== -->
        <header class="h-20 bg-[#070b16]/80 border-b border-slate-800/80 backdrop-blur-xl px-4 sm:px-8 flex items-center justify-between sticky top-0 z-30">
            
            <!-- Left: Mobile Toggle & Page Title -->
            <div class="flex items-center gap-3">
                <!-- Mobile Hamburger Button -->
                <button id="open-mobile-sidebar-btn" type="button" class="lg:hidden p-2 rounded-lg text-slate-400 hover:text-white hover:bg-slate-800/60" aria-label="Buka Sidebar">
                    <i data-lucide="menu" class="w-6 h-6"></i>
                </button>

                <!-- Brand Logo (Mobile only) -->
                <div class="lg:hidden flex items-center justify-center w-8 h-8 rounded-lg bg-sky-500/20 border border-sky-500/30 text-sky-400 font-extrabold text-xs">
                    DP
                </div>

                <!-- Page Title -->
                <div>
                    <h1 class="text-lg sm:text-xl font-bold text-white tracking-tight">
                        @yield('page_title', 'Dashboard Overview')
                    </h1>
                    <p class="text-[11px] text-slate-400 font-mono-code hidden sm:block">
                        SMK Negeri 1 Bangsri • X PPLG 2
                    </p>
                </div>
            </div>

            <!-- Right Header Actions: Website Link, Notifikasi, Foto Profil, Dropdown Akun -->
            <div class="flex items-center gap-3 sm:gap-4">
                
                <!-- Public Website Link -->
                <a href="{{ route('home') }}" target="_blank" class="hidden sm:inline-flex items-center gap-2 px-3.5 py-1.5 rounded-lg text-xs font-mono-code text-slate-300 bg-slate-900 border border-slate-800 hover:border-sky-500/40 hover:text-sky-400 transition-colors">
                    <i data-lucide="external-link" class="w-3.5 h-3.5"></i>
                    <span>Lihat Website</span>
                </a>

                <!-- Notification Dropdown -->
                <div class="relative" id="notification-dropdown-container">
                    <button id="notification-btn" type="button" class="relative p-2 rounded-xl bg-slate-900 border border-slate-800 text-slate-300 hover:text-white hover:border-sky-500/40 transition-colors" aria-label="Notifikasi Pesan">
                        <i data-lucide="bell" class="w-4 h-4"></i>
                        @if(isset($stats['unread_messages']) && $stats['unread_messages'] > 0)
                            <span class="absolute -top-1 -right-1 w-4 h-4 rounded-full bg-rose-500 text-white font-bold text-[9px] flex items-center justify-center border-2 border-[#070b16]">
                                {{ $stats['unread_messages'] }}
                            </span>
                        @endif
                    </button>

                    <!-- Dropdown Panel -->
                    <div id="notification-menu" class="hidden absolute right-0 mt-2 w-80 rounded-2xl bg-[#0a1024] border border-sky-500/20 shadow-2xl p-4 z-50">
                        <div class="flex items-center justify-between pb-3 border-b border-slate-800">
                            <h4 class="text-xs font-bold text-white font-mono-code uppercase tracking-wider">Notifikasi Pesan</h4>
                            <span class="text-[10px] text-sky-400 font-mono-code">{{ $stats['unread_messages'] ?? 0 }} Belum Dibaca</span>
                        </div>

                        <div class="py-2 divide-y divide-slate-800/60 max-h-60 overflow-y-auto">
                            @forelse($unreadNotifications ?? [] as $notif)
                                <div class="py-2.5 text-xs">
                                    <div class="flex items-center justify-between text-slate-300 font-semibold mb-0.5">
                                        <span>{{ $notif->name }}</span>
                                        <span class="text-[10px] font-mono-code text-slate-500">{{ $notif->created_at->diffForHumans() }}</span>
                                    </div>
                                    <p class="text-slate-400 line-clamp-1 text-[11px]">{{ $notif->message }}</p>
                                </div>
                            @empty
                                <div class="py-4 text-center text-xs text-slate-500">
                                    Tidak ada notifikasi pesan baru.
                                </div>
                            @endforelse
                        </div>

                        <div class="pt-2 border-t border-slate-800">
                            <a href="{{ route('admin.messages.index') }}" class="block text-center text-xs text-sky-400 hover:text-sky-300 font-semibold py-1">
                                Lihat Semua Pesan Masuk →
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Account Dropdown & Profile Photo -->
                <div class="relative" id="account-dropdown-container">
                    <button id="account-menu-btn" type="button" class="flex items-center gap-2 p-1.5 sm:px-3 rounded-xl bg-slate-900 border border-slate-800 hover:border-sky-500/40 transition-all cursor-pointer">
                        <!-- Foto Profil Admin -->
                        <div class="w-8 h-8 rounded-lg bg-gradient-to-tr from-sky-500 via-indigo-500 to-purple-600 p-[1px]">
                            <div class="w-full h-full bg-[#070b16] rounded-[7px] flex items-center justify-center font-bold text-xs text-sky-400">
                                DP
                            </div>
                        </div>
                        <div class="hidden md:block text-left">
                            <span class="block text-xs font-bold text-white leading-tight">{{ Auth::user()->name }}</span>
                            <span class="block text-[10px] text-emerald-400 font-mono-code leading-tight">● Online</span>
                        </div>
                        <i data-lucide="chevron-down" class="w-3.5 h-3.5 text-slate-400 hidden sm:block"></i>
                    </button>

                    <!-- Account Dropdown Menu -->
                    <div id="account-dropdown" class="hidden absolute right-0 mt-2 w-56 rounded-2xl bg-[#0a1024] border border-sky-500/20 shadow-2xl p-2 z-50">
                        <div class="p-3 border-b border-slate-800">
                            <p class="text-xs font-bold text-white">{{ Auth::user()->name }}</p>
                            <p class="text-[11px] text-slate-400 font-mono-code truncate">{{ Auth::user()->email }}</p>
                        </div>
                        
                        <div class="py-1">
                            <a href="{{ route('admin.profile.index') }}" class="flex items-center gap-2.5 px-3 py-2 rounded-xl text-xs text-slate-300 hover:bg-slate-900 hover:text-white transition-colors">
                                <i data-lucide="user" class="w-4 h-4 text-sky-400"></i>
                                <span>Profil Admin</span>
                            </a>
                            <a href="{{ route('home') }}" target="_blank" class="flex items-center gap-2.5 px-3 py-2 rounded-xl text-xs text-slate-300 hover:bg-slate-900 hover:text-white transition-colors">
                                <i data-lucide="globe" class="w-4 h-4 text-indigo-400"></i>
                                <span>Kunjungi Website</span>
                            </a>
                        </div>

                        <div class="pt-1 border-t border-slate-800">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="w-full flex items-center gap-2.5 px-3 py-2 rounded-xl text-xs text-rose-400 hover:bg-rose-500/10 hover:text-rose-300 transition-colors cursor-pointer">
                                    <i data-lucide="log-out" class="w-4 h-4"></i>
                                    <span>Logout Keluar</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </header>

        <!-- Flash Session Alerts -->
        @if(session('success'))
            <div class="mx-4 sm:mx-8 mt-6 p-4 rounded-2xl bg-emerald-950/40 border border-emerald-500/30 text-emerald-300 text-sm flex items-center gap-3 shadow-lg">
                <i data-lucide="check-circle-2" class="w-5 h-5 text-emerald-400 shrink-0"></i>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if(session('error'))
            <div class="mx-4 sm:mx-8 mt-6 p-4 rounded-2xl bg-rose-950/40 border border-rose-500/30 text-rose-300 text-sm flex items-center gap-3 shadow-lg">
                <i data-lucide="alert-triangle" class="w-5 h-5 text-rose-400 shrink-0"></i>
                <span>{{ session('error') }}</span>
            </div>
        @endif

        <!-- Main Body Slot -->
        <main class="flex-1 p-4 sm:p-8 overflow-y-auto">
            @yield('content')
        </main>

    </div>

    <!-- Interactive Scripts for Mobile Drawer, Dropdowns, and Lucide Icons -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Inisialisasi Lucide Icons
            if (typeof lucide !== 'undefined') {
                lucide.createIcons();
            }

            // 1. Mobile Sidebar Toggle
            const openSidebarBtn = document.getElementById('open-mobile-sidebar-btn');
            const closeSidebarBtn = document.getElementById('close-mobile-sidebar-btn');
            const sidebar = document.getElementById('admin-sidebar');
            const backdrop = document.getElementById('mobile-sidebar-backdrop');

            function toggleSidebar() {
                const isOpen = !sidebar.classList.contains('-translate-x-full');
                if (isOpen) {
                    sidebar.classList.add('-translate-x-full');
                    backdrop.classList.add('hidden');
                } else {
                    sidebar.classList.remove('-translate-x-full');
                    backdrop.classList.remove('hidden');
                }
            }

            openSidebarBtn?.addEventListener('click', toggleSidebar);
            closeSidebarBtn?.addEventListener('click', toggleSidebar);
            backdrop?.addEventListener('click', toggleSidebar);

            // 2. Notification Dropdown Toggle
            const notifBtn = document.getElementById('notification-btn');
            const notifMenu = document.getElementById('notification-menu');

            notifBtn?.addEventListener('click', (e) => {
                e.stopPropagation();
                notifMenu.classList.toggle('hidden');
                document.getElementById('account-dropdown')?.classList.add('hidden');
            });

            // 3. Account Dropdown Toggle
            const accountBtn = document.getElementById('account-menu-btn');
            const accountDropdown = document.getElementById('account-dropdown');

            accountBtn?.addEventListener('click', (e) => {
                e.stopPropagation();
                accountDropdown.classList.toggle('hidden');
                document.getElementById('notification-menu')?.classList.add('hidden');
            });

            // Close dropdowns on outside click
            document.addEventListener('click', () => {
                notifMenu?.classList.add('hidden');
                accountDropdown?.classList.add('hidden');
            });
        });
    </script>

    @stack('scripts')
</body>
</html>
