<header class="fixed top-0 left-0 right-0 z-50 transition-all duration-300">
    <nav id="main-navbar" class="glass-navbar transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Brand / Logo DP -->
                <a href="#home" class="flex items-center gap-3 group">
                    <div class="relative flex items-center justify-center w-11 h-11 rounded-xl bg-gradient-to-tr from-sky-500 via-indigo-500 to-purple-600 p-[1.5px] shadow-lg shadow-sky-500/20 group-hover:shadow-sky-500/40 transition-all duration-300">
                        <div class="w-full h-full bg-[#070b16] rounded-[10px] flex items-center justify-center">
                            <span class="font-extrabold text-base tracking-wider text-transparent bg-clip-text bg-gradient-to-r from-sky-400 to-indigo-300">DP</span>
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-bold text-lg text-white tracking-tight group-hover:text-sky-400 transition-colors">
                            Dimas<span class="text-sky-400">.dev</span>
                        </span>
                        <span class="text-[11px] text-slate-400 font-mono-code -mt-1 tracking-wider">SMKN 1 BANGSRI</span>
                    </div>
                </a>

                <!-- Desktop Navigation Links -->
                <div class="hidden md:flex items-center gap-7">
                    <a href="#home" class="text-sm font-medium text-slate-300 hover:text-sky-400 transition-colors">Home</a>
                    <a href="#about" class="text-sm font-medium text-slate-300 hover:text-sky-400 transition-colors">About</a>
                    <a href="#skills" class="text-sm font-medium text-slate-300 hover:text-sky-400 transition-colors">Skills</a>
                    <a href="#projects" class="text-sm font-medium text-slate-300 hover:text-sky-400 transition-colors">Projects</a>
                    <a href="#contact" class="text-sm font-medium text-slate-300 hover:text-sky-400 transition-colors">Contact</a>
                </div>

                <!-- Desktop Action Buttons: Tombol Login Admin & Contact -->
                <div class="hidden md:flex items-center gap-3">
                    @auth
                        <!-- Jika Admin Sudah Login: Tombol Dashboard -->
                        <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-full text-xs font-semibold text-white bg-gradient-to-r from-sky-500 to-indigo-600 hover:from-sky-400 hover:to-indigo-500 shadow-md shadow-sky-500/25 transition-all">
                            <i class="bi bi-speedometer2"></i>
                            <span>Dashboard Admin</span>
                        </a>
                    @else
                        <!-- Tombol Login Admin -->
                        <a href="{{ route('login') }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-full text-xs font-semibold text-slate-300 bg-slate-900/80 hover:bg-slate-800 border border-slate-700/80 hover:border-sky-500/50 hover:text-white transition-all shadow-sm">
                            <i class="bi bi-shield-lock-fill text-sky-400"></i>
                            <span>Login Admin</span>
                        </a>
                    @endauth

                    <a href="#contact" class="relative inline-flex items-center justify-center gap-1.5 px-4 py-2 rounded-full text-xs font-semibold text-white bg-gradient-to-r from-sky-500 to-indigo-600 hover:from-sky-400 hover:to-indigo-500 shadow-md shadow-sky-500/25 transition-all">
                        <i class="bi bi-send-fill text-[11px]"></i>
                        <span>Hire Me</span>
                    </a>
                </div>

                <!-- Mobile Hamburger Button -->
                <div class="flex md:hidden items-center gap-2">
                    @auth
                        <a href="{{ route('admin.dashboard') }}" class="px-2.5 py-1 rounded-lg text-xs font-semibold text-white bg-sky-500 flex items-center gap-1">
                            <i class="bi bi-speedometer2"></i>
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="px-2.5 py-1 rounded-lg text-xs font-semibold text-slate-300 bg-slate-900 border border-slate-800 flex items-center gap-1">
                            <i class="bi bi-shield-lock text-sky-400"></i>
                            <span>Login</span>
                        </a>
                    @endauth

                    <button id="mobile-menu-btn" type="button" class="p-2 rounded-lg text-slate-400 hover:text-white hover:bg-slate-800/60 focus:outline-none transition-colors" aria-label="Toggle Navigation">
                        <i class="bi bi-list text-2xl"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu Dropdown -->
        <div id="mobile-menu" class="hidden md:hidden border-t border-slate-800/80 bg-[#070b16]/95 backdrop-blur-xl px-4 pt-4 pb-6 space-y-3">
            <a href="#home" class="mobile-nav-link block px-3 py-2 rounded-lg text-base font-medium text-slate-200 hover:bg-slate-800/60 hover:text-sky-400">Home</a>
            <a href="#about" class="mobile-nav-link block px-3 py-2 rounded-lg text-base font-medium text-slate-200 hover:bg-slate-800/60 hover:text-sky-400">About Me</a>
            <a href="#skills" class="mobile-nav-link block px-3 py-2 rounded-lg text-base font-medium text-slate-200 hover:bg-slate-800/60 hover:text-sky-400">Skills</a>
            <a href="#projects" class="mobile-nav-link block px-3 py-2 rounded-lg text-base font-medium text-slate-200 hover:bg-slate-800/60 hover:text-sky-400">Projects</a>
            <a href="#contact" class="mobile-nav-link block px-3 py-2 rounded-lg text-base font-medium text-slate-200 hover:bg-slate-800/60 hover:text-sky-400">Contact</a>
            
            <div class="pt-3 space-y-2 border-t border-slate-800/80">
                @auth
                    <a href="{{ route('admin.dashboard') }}" class="mobile-nav-link flex items-center justify-center gap-2 w-full py-2.5 rounded-xl text-center text-sm font-semibold text-white bg-gradient-to-r from-sky-500 to-indigo-600">
                        <i class="bi bi-speedometer2"></i> Masuk ke Dashboard Admin
                    </a>
                @else
                    <a href="{{ route('login') }}" class="mobile-nav-link flex items-center justify-center gap-2 w-full py-2.5 rounded-xl text-center text-sm font-semibold text-slate-200 bg-slate-900 border border-slate-700 hover:border-sky-500/50">
                        <i class="bi bi-shield-lock-fill text-sky-400"></i> Login Admin
                    </a>
                @endauth
                
                <a href="#contact" class="mobile-nav-link flex items-center justify-center gap-2 w-full py-2.5 rounded-xl text-center text-sm font-semibold text-white bg-slate-800 hover:bg-slate-700">
                    <i class="bi bi-chat-dots-fill text-sky-400"></i> Hubungi Dimas
                </a>
            </div>
        </div>
    </nav>
</header>
