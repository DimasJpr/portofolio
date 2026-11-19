<footer class="border-t border-slate-800/80 bg-[#04060c] relative z-10 pt-16 pb-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-10 pb-12 border-b border-slate-800/60">
            <!-- Brand Column -->
            <div class="md:col-span-2 space-y-4">
                <div class="flex items-center gap-3">
                    <div class="flex items-center justify-center w-10 h-10 rounded-xl bg-gradient-to-tr from-sky-500 to-indigo-600 p-[1px]">
                        <div class="w-full h-full bg-[#070b16] rounded-[11px] flex items-center justify-center">
                            <span class="font-extrabold text-sm text-sky-400">DP</span>
                        </div>
                    </div>
                    <span class="font-bold text-xl text-white">
                        Muhammad Dimas <span class="text-sky-400">Prasetyo</span>
                    </span>
                </div>
                <p class="text-sm text-slate-400 max-w-md leading-relaxed">
                    Student Developer berdedikasi dari <strong>SMK Negeri 1 Bangsri (X PPLG 2)</strong>, Jepara. Membangun aplikasi web yang fungsional, responsif, dan scalable dengan ekosistem Laravel modern.
                </p>
                <div class="flex items-center gap-2 pt-1 text-xs text-slate-500 font-mono-code">
                    <i class="bi bi-geo-alt-fill text-sky-400"></i>
                    <span>Jepara, Jawa Tengah, Indonesia</span>
                </div>
            </div>

            <!-- Navigasi -->
            <div>
                <h4 class="text-xs uppercase font-bold tracking-widest text-slate-200 mb-4 font-mono-code">Menu Navigasi</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="#home" class="text-slate-400 hover:text-sky-400 transition-colors">Home</a></li>
                    <li><a href="#about" class="text-slate-400 hover:text-sky-400 transition-colors">About Me</a></li>
                    <li><a href="#skills" class="text-slate-400 hover:text-sky-400 transition-colors">Skills</a></li>
                    <li><a href="#projects" class="text-slate-400 hover:text-sky-400 transition-colors">Projects</a></li>
                    <li><a href="#contact" class="text-slate-400 hover:text-sky-400 transition-colors">Contact</a></li>
                    <li class="pt-2">
                        @auth
                            <a href="{{ route('admin.dashboard') }}" class="text-sky-400 hover:text-sky-300 font-semibold flex items-center gap-1.5">
                                <i class="bi bi-speedometer2"></i> Dashboard Admin
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="text-slate-500 hover:text-sky-400 text-xs font-mono-code flex items-center gap-1.5 transition-colors">
                                <i class="bi bi-shield-lock"></i> Portal Login Admin
                            </a>
                        @endauth
                    </li>
                </ul>
            </div>

            <!-- Social Media -->
            <div>
                <h4 class="text-xs uppercase font-bold tracking-widest text-slate-200 mb-4 font-mono-code">Social Media</h4>
                <div class="flex flex-col gap-3">
                    <a href="https://github.com/dimasprasetyo" target="_blank" rel="noopener noreferrer" class="flex items-center gap-3 text-sm text-slate-400 hover:text-white transition-colors group">
                        <div class="w-8 h-8 rounded-lg bg-slate-900 border border-slate-800 flex items-center justify-center group-hover:border-sky-500/50 group-hover:text-sky-400 transition-all">
                            <i class="bi bi-github"></i>
                        </div>
                        <span>GitHub</span>
                    </a>
                    <a href="https://instagram.com/dimasprasetyo" target="_blank" rel="noopener noreferrer" class="flex items-center gap-3 text-sm text-slate-400 hover:text-white transition-colors group">
                        <div class="w-8 h-8 rounded-lg bg-slate-900 border border-slate-800 flex items-center justify-center group-hover:border-pink-500/50 group-hover:text-pink-400 transition-all">
                            <i class="bi bi-instagram"></i>
                        </div>
                        <span>Instagram</span>
                    </a>
                    <a href="mailto:dimasprasetyo@smkn1bangsri.sch.id" class="flex items-center gap-3 text-sm text-slate-400 hover:text-white transition-colors group">
                        <div class="w-8 h-8 rounded-lg bg-slate-900 border border-slate-800 flex items-center justify-center group-hover:border-sky-500/50 group-hover:text-sky-400 transition-all">
                            <i class="bi bi-envelope-fill"></i>
                        </div>
                        <span>Email Kontak</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Copyright -->
        <div class="pt-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-slate-500">
            <p>© {{ date('Y') }} <strong>Muhammad Dimas Prasetyo</strong>. All rights reserved.</p>
            <div class="flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                <span class="text-slate-400">SMK Negeri 1 Bangsri • X PPLG 2</span>
            </div>
        </div>
    </div>
</footer>
