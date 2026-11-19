@extends('layouts.app')

@section('title', 'Muhammad Dimas Prasetyo - Student Developer | SMKN 1 Bangsri')

@section('content')

    <!-- ==================== 1. HERO SECTION ==================== -->
    <section id="home" class="relative pt-32 pb-20 md:pt-44 md:pb-32 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center">
                <!-- Left Hero Text -->
                <div class="lg:col-span-7 space-y-6 text-center lg:text-left">
                    <!-- Status Badge -->
                    <div class="inline-flex items-center gap-2.5 px-4 py-2 rounded-full bg-slate-900/80 border border-sky-500/30 backdrop-blur-md shadow-inner">
                        <span class="relative flex h-2.5 w-2.5">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-emerald-500"></span>
                        </span>
                        <span class="text-xs font-semibold tracking-wide text-slate-300 font-mono-code">
                            {{ $profile['class'] }} • {{ $profile['school'] }}
                        </span>
                    </div>

                    <!-- Greeting & Big Name -->
                    <div class="space-y-2">
                        <p class="text-lg md:text-xl font-medium text-sky-400 font-mono-code tracking-wide">
                            Hello, I'm
                        </p>
                        <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold text-white tracking-tight leading-[1.15]">
                            Muhammad Dimas <br class="hidden sm:inline" />
                            <span class="text-gradient">Prasetyo</span>
                        </h1>
                    </div>

                    <!-- Dynamic Typing Role -->
                    <div class="flex items-center justify-center lg:justify-start gap-2 text-xl sm:text-2xl font-semibold text-slate-300">
                        <span>A Passionate</span>
                        <span id="typing-text" class="text-transparent bg-clip-text bg-gradient-to-r from-sky-400 to-indigo-400 border-b-2 border-sky-400 pb-0.5"></span>
                    </div>

                    <!-- Short Bio -->
                    <p class="text-slate-400 text-base sm:text-lg max-w-2xl mx-auto lg:mx-0 leading-relaxed">
                        Siswa jurusan <strong class="text-slate-200">{{ $profile['major'] }}</strong> yang berfokus membangun antarmuka web interaktif, performa kencang, dan arsitektur backend yang rapi menggunakan <strong>Laravel & Tailwind CSS</strong>.
                    </p>

                    <!-- CTAs & Social Links -->
                    <div class="pt-2 flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4">
                        <a href="#projects" class="w-full sm:w-auto inline-flex items-center justify-center gap-2.5 px-7 py-3.5 rounded-full font-semibold text-sm text-white bg-gradient-to-r from-sky-500 via-indigo-600 to-purple-600 hover:from-sky-400 hover:to-indigo-500 shadow-lg shadow-sky-500/25 hover:shadow-sky-500/40 transition-all duration-300 active:scale-95">
                            <i class="bi bi-rocket-takeoff-fill"></i>
                            <span>Explore My Work</span>
                        </a>

                        <button type="button" onclick="document.getElementById('cv-modal')?.classList.remove('hidden')" class="w-full sm:w-auto inline-flex items-center justify-center gap-2.5 px-7 py-3.5 rounded-full font-semibold text-sm text-slate-200 bg-slate-900/80 hover:bg-slate-800 border border-slate-700/80 hover:border-sky-500/50 backdrop-blur-md transition-all duration-300 cursor-pointer">
                            <i class="bi bi-file-earmark-arrow-down-fill text-sky-400"></i>
                            <span>Download CV</span>
                        </button>
                    </div>

                    <!-- Key stats summary -->
                    <div class="pt-6 grid grid-cols-3 gap-4 border-t border-slate-800/80 max-w-lg mx-auto lg:mx-0 text-left">
                        <div class="p-3 rounded-xl bg-slate-900/40 border border-slate-800">
                            <span class="block text-2xl font-bold text-white font-mono-code">10+</span>
                            <span class="text-xs text-slate-400">Teknologi Dipelajari</span>
                        </div>
                        <div class="p-3 rounded-xl bg-slate-900/40 border border-slate-800">
                            <span class="block text-2xl font-bold text-sky-400 font-mono-code">4+</span>
                            <span class="text-xs text-slate-400">Proyek Web Unggulan</span>
                        </div>
                        <div class="p-3 rounded-xl bg-slate-900/40 border border-slate-800">
                            <span class="block text-2xl font-bold text-indigo-400 font-mono-code">100%</span>
                            <span class="text-xs text-slate-400">Komitmen Belajar</span>
                        </div>
                    </div>
                </div>

                <!-- Right Hero Visual / Profile Card -->
                <div class="lg:col-span-5 flex justify-center">
                    <div class="relative w-full max-w-sm sm:max-w-md">
                        <!-- Glowing Halo Aura -->
                        <div class="absolute -inset-1.5 bg-gradient-to-r from-sky-500 via-indigo-500 to-purple-600 rounded-3xl blur-xl opacity-30 animate-pulse-glow"></div>

                        <!-- Card Container -->
                        <div class="relative rounded-3xl bg-[#0b1329]/80 border border-sky-500/20 backdrop-blur-xl p-6 sm:p-8 shadow-2xl overflow-hidden">
                            <!-- Header Bar imitating modern app/editor -->
                            <div class="flex items-center justify-between pb-6 border-b border-slate-800/80">
                                <div class="flex items-center gap-2">
                                    <span class="w-3 h-3 rounded-full bg-rose-500/80"></span>
                                    <span class="w-3 h-3 rounded-full bg-amber-500/80"></span>
                                    <span class="w-3 h-3 rounded-full bg-emerald-500/80"></span>
                                </div>
                                <span class="text-xs font-mono-code text-slate-400">developer-profile.php</span>
                            </div>

                            <!-- Avatar & Profile Intro -->
                            <div class="py-6 flex flex-col items-center text-center">
                                <div class="relative group">
                                    <div class="w-28 h-28 sm:w-32 sm:h-32 rounded-2xl bg-gradient-to-tr from-sky-500 via-indigo-600 to-purple-600 p-[2px] shadow-xl shadow-sky-500/20">
                                        <div class="w-full h-full bg-[#070b16] rounded-[14px] flex flex-col items-center justify-center p-3">
                                            <!-- Modern Developer Avatar Graphic -->
                                            <i class="bi bi-person-workspace text-4xl sm:text-5xl text-sky-400"></i>
                                            <span class="text-[10px] font-mono-code text-indigo-300 font-bold mt-1">@dimasprasetyo</span>
                                        </div>
                                    </div>
                                    <span class="absolute bottom-1 right-1 w-4 h-4 rounded-full bg-emerald-500 border-2 border-[#070b16]"></span>
                                </div>

                                <h3 class="text-xl font-bold text-white mt-4">Muhammad Dimas P.</h3>
                                <p class="text-xs text-sky-400 font-mono-code mt-0.5">X PPLG 2 • SMKN 1 Bangsri</p>

                                <div class="mt-4 flex flex-wrap justify-center gap-1.5">
                                    <span class="px-2.5 py-1 rounded-md text-[11px] font-mono-code bg-sky-500/10 text-sky-300 border border-sky-500/20">Laravel</span>
                                    <span class="px-2.5 py-1 rounded-md text-[11px] font-mono-code bg-indigo-500/10 text-indigo-300 border border-indigo-500/20">PHP 8</span>
                                    <span class="px-2.5 py-1 rounded-md text-[11px] font-mono-code bg-amber-500/10 text-amber-300 border border-amber-500/20">JavaScript</span>
                                    <span class="px-2.5 py-1 rounded-md text-[11px] font-mono-code bg-cyan-500/10 text-cyan-300 border border-cyan-500/20">Tailwind</span>
                                </div>
                            </div>

                            <!-- Interactive Code Box -->
                            <div class="bg-[#050811] rounded-xl p-4 border border-slate-800 font-mono-code text-xs text-slate-300 leading-relaxed">
                                <p class="text-slate-500">// Status & Goals</p>
                                <p><span class="text-purple-400">const</span> <span class="text-sky-300">dimas</span> = {</p>
                                <p class="pl-4"><span class="text-slate-400">school:</span> <span class="text-emerald-300">'SMKN 1 Bangsri'</span>,</p>
                                <p class="pl-4"><span class="text-slate-400">grade:</span> <span class="text-emerald-300">'X PPLG 2'</span>,</p>
                                <p class="pl-4"><span class="text-slate-400">passion:</span> <span class="text-emerald-300">'Clean & Scalable Code'</span></p>
                                <p>};</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== 2. ABOUT ME SECTION ==================== -->
    <section id="about" class="py-24 relative z-10 border-t border-slate-800/80 bg-[#070b16]/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Title -->
            <div class="text-center max-w-2xl mx-auto mb-16">
                <span class="text-xs uppercase font-bold tracking-widest text-sky-400 font-mono-code">Perjalanan & Fokus</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-white mt-2">
                    Tentang <span class="text-gradient">Saya</span>
                </h2>
                <div class="w-16 h-1 bg-gradient-to-r from-sky-400 to-indigo-500 mx-auto mt-3 rounded-full"></div>
            </div>

            <!-- Two-Column Layout -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                <!-- Left Column: Modern Code Window / Illustration -->
                <div class="lg:col-span-5">
                    <div class="glass-card rounded-2xl p-6 relative overflow-hidden">
                        <div class="flex items-center justify-between pb-4 border-b border-slate-800">
                            <span class="text-xs font-mono-code text-sky-400 font-semibold">AboutMe.vue / Blade</span>
                            <i class="bi bi-code-slash text-slate-400"></i>
                        </div>
                        <div class="py-4 space-y-3 font-mono-code text-xs leading-relaxed">
                            <p class="text-indigo-400">&lt;template&gt;</p>
                            <p class="pl-4 text-slate-300">&lt;div class="student-developer"&gt;</p>
                            <p class="pl-8 text-sky-300">&lt;h1&gt;Muhammad Dimas Prasetyo&lt;/h1&gt;</p>
                            <p class="pl-8 text-slate-400">&lt;p&gt;SMK Negeri 1 Bangsri - X PPLG 2&lt;/p&gt;</p>
                            <p class="pl-8 text-emerald-400">&lt;p&gt;Fokus: Modern Web Development&lt;/p&gt;</p>
                            <p class="pl-4 text-slate-300">&lt;/div&gt;</p>
                            <p class="text-indigo-400">&lt;/template&gt;</p>
                        </div>
                        <div class="pt-4 border-t border-slate-800 flex items-center justify-between text-xs text-slate-400">
                            <span>📍 Jepara, Jawa Tengah</span>
                            <span class="text-emerald-400 font-bold">● Active Student</span>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Biography Details -->
                <div class="lg:col-span-7 space-y-6">
                    <h3 class="text-2xl font-bold text-white">
                        Siswa PPLG yang bertekad menjadi <span class="text-sky-400">Professional Web Developer</span>
                    </h3>

                    <p class="text-slate-300 leading-relaxed text-base">
                        Halo! Saya <strong>Muhammad Dimas Prasetyo</strong>, seorang pelajar di <strong>SMK Negeri 1 Bangsri</strong>, jurusan <strong>Pengembangan Perangkat Lunak dan Gim (PPLG)</strong>, kelas <strong>X PPLG 2</strong>. Ketertarikan saya terhadap dunia pemrograman dimulai dari rasa ingin tahu bagaimana sebuah website dan sistem digital dapat bekerja dan mempermudah kehidupan manusia.
                    </p>

                    <p class="text-slate-300 leading-relaxed text-base">
                        Saat ini, saya secara aktif dan konsisten mengembangkan kemampuan dalam ekosistem web modern, mulai dari pondasi <strong>HTML, CSS, JavaScript</strong>, hingga backend development dengan <strong>PHP, Laravel</strong>, serta basis data <strong>MySQL</strong>. Saya juga senang menerapkan prinsip <strong>UI/UX Design</strong> agar setiap aplikasi yang saya rancang tidak hanya fungsional, tetapi juga nyaman digunakan dan memanjakan mata.
                    </p>

                    <!-- Identity Info Cards Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-4">
                        <div class="p-4 rounded-xl bg-slate-900/60 border border-slate-800/80 flex items-start gap-3.5">
                            <div class="w-10 h-10 rounded-lg bg-sky-500/10 text-sky-400 flex items-center justify-center shrink-0">
                                <i class="bi bi-mortarboard-fill text-xl"></i>
                            </div>
                            <div>
                                <h4 class="text-xs uppercase text-slate-400 font-mono-code">Sekolah</h4>
                                <p class="text-sm font-semibold text-white mt-0.5">{{ $profile['school'] }}</p>
                            </div>
                        </div>

                        <div class="p-4 rounded-xl bg-slate-900/60 border border-slate-800/80 flex items-start gap-3.5">
                            <div class="w-10 h-10 rounded-lg bg-indigo-500/10 text-indigo-400 flex items-center justify-center shrink-0">
                                <i class="bi bi-cpu-fill text-xl"></i>
                            </div>
                            <div>
                                <h4 class="text-xs uppercase text-slate-400 font-mono-code">Kelas & Jurusan</h4>
                                <p class="text-sm font-semibold text-white mt-0.5">{{ $profile['class'] }} (PPLG)</p>
                            </div>
                        </div>

                        <div class="p-4 rounded-xl bg-slate-900/60 border border-slate-800/80 flex items-start gap-3.5">
                            <div class="w-10 h-10 rounded-lg bg-purple-500/10 text-purple-400 flex items-center justify-center shrink-0">
                                <i class="bi bi-geo-alt-fill text-xl"></i>
                            </div>
                            <div>
                                <h4 class="text-xs uppercase text-slate-400 font-mono-code">Domisili</h4>
                                <p class="text-sm font-semibold text-white mt-0.5">{{ $profile['location'] }}</p>
                            </div>
                        </div>

                        <div class="p-4 rounded-xl bg-slate-900/60 border border-slate-800/80 flex items-start gap-3.5">
                            <div class="w-10 h-10 rounded-lg bg-emerald-500/10 text-emerald-400 flex items-center justify-center shrink-0">
                                <i class="bi bi-code-slash text-xl"></i>
                            </div>
                            <div>
                                <h4 class="text-xs uppercase text-slate-400 font-mono-code">Fokus Utama</h4>
                                <p class="text-sm font-semibold text-white mt-0.5">Web Application & Laravel</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== 3. SKILLS SECTION ==================== -->
    <section id="skills" class="py-24 relative z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <span class="text-xs uppercase font-bold tracking-widest text-sky-400 font-mono-code">Keahlian Teknis</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-white mt-2">
                    Skills & <span class="text-gradient">Technologies</span>
                </h2>
                <p class="text-slate-400 text-sm mt-3">
                    Teknologi dan tools yang saya pelajari dan terapkan dalam pengembangan perangkat lunak.
                </p>
                <div class="w-16 h-1 bg-gradient-to-r from-sky-400 to-indigo-500 mx-auto mt-3 rounded-full"></div>
            </div>

            <!-- Skills Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
                @foreach($skills as $skill)
                    <div class="glass-card rounded-2xl p-6 group hover:border-sky-500/40 relative">
                        <!-- Top Icon & Name -->
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-sky-500/10 to-indigo-500/10 border border-sky-500/20 flex items-center justify-center text-sky-400 group-hover:text-white group-hover:bg-sky-500 transition-all duration-300">
                                <i class="bi {{ $skill->icon ?? 'bi-code-square' }} text-2xl"></i>
                            </div>
                            <span class="text-xs font-mono-code px-2 py-1 rounded bg-slate-900 border border-slate-800 text-sky-300">
                                {{ $skill->category }}
                            </span>
                        </div>

                        <!-- Skill Details -->
                        <h4 class="text-lg font-bold text-white group-hover:text-sky-300 transition-colors">
                            {{ $skill->name }}
                        </h4>

                        <!-- Progress Bar & Percentage -->
                        <div class="mt-4 space-y-1.5">
                            <div class="flex justify-between text-xs font-mono-code text-slate-400">
                                <span>Proficiency</span>
                                <span class="font-bold text-sky-400">{{ $skill->proficiency }}%</span>
                            </div>
                            <div class="w-full h-2 rounded-full bg-slate-900 border border-slate-800 overflow-hidden">
                                <div class="h-full rounded-full bg-gradient-to-r from-sky-500 to-indigo-500 transition-all duration-1000" style="width: {{ $skill->proficiency }}%;"></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ==================== 4. PROJECTS SECTION ==================== -->
    <section id="projects" class="py-24 relative z-10 border-t border-slate-800/80 bg-[#070b16]/60">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-12">
                <span class="text-xs uppercase font-bold tracking-widest text-sky-400 font-mono-code">Karya & Eksplorasi</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-white mt-2">
                    Featured <span class="text-gradient">Projects</span>
                </h2>
                <p class="text-slate-400 text-sm mt-3">
                    Daftar aplikasi dan solusi perangkat lunak yang telah saya bangun selama proses belajar di PPLG.
                </p>
                <div class="w-16 h-1 bg-gradient-to-r from-sky-400 to-indigo-500 mx-auto mt-3 rounded-full"></div>
            </div>

            <!-- Category Filter Buttons -->
            <div class="flex flex-wrap items-center justify-center gap-3 mb-12">
                <button type="button" class="project-filter-btn px-5 py-2 rounded-full text-xs font-semibold tracking-wide border transition-all duration-300 bg-sky-500 text-white border-sky-400 shadow-md shadow-sky-500/20" data-category="all">
                    All Projects
                </button>
                @foreach($categories as $cat)
                    <button type="button" class="project-filter-btn px-5 py-2 rounded-full text-xs font-semibold tracking-wide border transition-all duration-300 bg-slate-900/60 text-slate-400 border-white/10 hover:text-white hover:border-sky-500/40" data-category="{{ $cat }}">
                        {{ $cat }}
                    </button>
                @endforeach
            </div>

            <!-- Project Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach($projects as $project)
                    <div class="project-card-item glass-card rounded-2xl overflow-hidden group border border-slate-800 transition-all duration-300" data-category="{{ $project->category }}">
                        <!-- Project Header / Visual Banner -->
                        <div class="relative h-48 bg-gradient-to-br from-slate-900 via-[#0a1128] to-slate-900 border-b border-slate-800/80 flex items-center justify-center overflow-hidden">
                            <!-- Tech watermark pattern -->
                            <div class="absolute inset-0 bg-[radial-gradient(#38bdf8_1px,transparent_1px)] [background-size:16px_16px] opacity-15"></div>
                            
                            <!-- Project Category Badge -->
                            <span class="absolute top-4 left-4 z-20 px-3 py-1 rounded-full text-[11px] font-mono-code font-semibold bg-slate-900/90 text-sky-400 border border-sky-500/30 backdrop-blur-md">
                                {{ $project->category }}
                            </span>

                            @if($project->thumbnail)
                                <img src="{{ asset('storage/' . $project->thumbnail) }}" alt="{{ $project->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            @else
                                <!-- Center Project Graphic Icon -->
                                <div class="relative z-10 w-20 h-20 rounded-2xl bg-gradient-to-tr from-sky-500/20 via-indigo-500/20 to-purple-500/20 border border-sky-500/30 flex items-center justify-center text-sky-400 group-hover:scale-110 group-hover:text-white transition-all duration-300">
                                    @if(str_contains(strtolower($project->title), 'catat'))
                                        <i class="bi bi-wallet2 text-3xl"></i>
                                    @elseif(str_contains(strtolower($project->title), 'tabungan'))
                                        <i class="bi bi-piggy-bank text-3xl"></i>
                                    @elseif(str_contains(strtolower($project->title), 'quiz'))
                                        <i class="bi bi-patch-question text-3xl"></i>
                                    @else
                                        <i class="bi bi-code-slash text-3xl"></i>
                                    @endif
                                </div>
                            @endif
                        </div>

                        <!-- Project Body -->
                        <div class="p-6 sm:p-7 space-y-4">
                            <h3 class="text-xl font-bold text-white group-hover:text-sky-400 transition-colors">
                                {{ $project->title }}
                            </h3>

                            <p class="text-sm text-slate-300 leading-relaxed min-h-[50px]">
                                {{ $project->description }}
                            </p>

                            <!-- Tech Stack Badges -->
                            <div class="flex flex-wrap gap-2 pt-1">
                                @if(is_array($project->tech_stack))
                                    @foreach($project->tech_stack as $tech)
                                        <span class="px-2.5 py-1 rounded-md text-[11px] font-mono-code bg-slate-900 border border-slate-800 text-slate-300">
                                            #{{ $tech }}
                                        </span>
                                    @endforeach
                                @endif
                            </div>

                            <!-- Buttons (Live Demo & Source Code) -->
                            <div class="pt-4 border-t border-slate-800/80 flex items-center gap-3">
                                <a href="{{ $project->live_url ?? '#' }}" target="_blank" rel="noopener noreferrer" class="flex-1 inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl text-xs font-semibold text-white bg-gradient-to-r from-sky-500 to-indigo-600 hover:from-sky-400 hover:to-indigo-500 transition-all shadow-md shadow-sky-500/10">
                                    <i class="bi bi-box-arrow-up-right"></i>
                                    <span>Live Demo</span>
                                </a>

                                <a href="{{ $project->github_url ?? '#' }}" target="_blank" rel="noopener noreferrer" class="flex-1 inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl text-xs font-semibold text-slate-300 bg-slate-900 hover:bg-slate-800 border border-slate-700 hover:text-white transition-all">
                                    <i class="bi bi-github"></i>
                                    <span>Source Code</span>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ==================== 5. EXPERIENCE & EDUCATION SECTION ==================== -->
    <section id="education" class="py-24 relative z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <span class="text-xs uppercase font-bold tracking-widest text-sky-400 font-mono-code">Riwayat & Jejak Belajar</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-white mt-2">
                    Education & <span class="text-gradient">Experience</span>
                </h2>
                <p class="text-slate-400 text-sm mt-3">
                    Latar belakang pendidikan dan perjalanan eksplorasi keilmuan saya di bidang rekayasa perangkat lunak.
                </p>
                <div class="w-16 h-1 bg-gradient-to-r from-sky-400 to-indigo-500 mx-auto mt-3 rounded-full"></div>
            </div>

            <!-- Timeline Container -->
            <div class="max-w-3xl mx-auto relative pl-6 sm:pl-8 border-l-2 border-sky-500/30 space-y-12">
                <!-- Timeline Item 1 -->
                <div class="relative group">
                    <!-- Dot Marker -->
                    <div class="absolute -left-[31px] sm:-left-[39px] top-1.5 w-4 h-4 rounded-full bg-[#050811] border-2 border-sky-400 group-hover:bg-sky-400 transition-colors flex items-center justify-center">
                        <span class="w-1.5 h-1.5 rounded-full bg-sky-400 group-hover:bg-white"></span>
                    </div>

                    <div class="glass-card rounded-2xl p-6 sm:p-7 space-y-2">
                        <div class="flex flex-wrap items-center justify-between gap-2">
                            <h3 class="text-lg font-bold text-white group-hover:text-sky-300 transition-colors">
                                {{ $profile['school'] }}
                            </h3>
                            <span class="px-3 py-1 rounded-full text-xs font-mono-code bg-sky-500/10 text-sky-400 border border-sky-500/20">
                                2024 - Sekarang
                            </span>
                        </div>
                        <p class="text-sm font-semibold text-slate-300">
                            Jurusan: {{ $profile['major'] }} (Kelas {{ $profile['class'] }})
                        </p>
                        <p class="text-xs text-slate-400 font-mono-code">
                            📍 {{ $profile['location'] }}
                        </p>
                        <p class="text-sm text-slate-300 pt-2 leading-relaxed">
                            Mempelajari dasar-dasar algoritma pemrograman, perancangan basis data relasional (MySQL), pemodelan perangkat lunak (UML), serta praktik pembuatan website dinamis berbasis PHP dan Laravel.
                        </p>
                    </div>
                </div>

                <!-- Timeline Item 2 -->
                <div class="relative group">
                    <div class="absolute -left-[31px] sm:-left-[39px] top-1.5 w-4 h-4 rounded-full bg-[#050811] border-2 border-indigo-400 group-hover:bg-indigo-400 transition-colors flex items-center justify-center">
                        <span class="w-1.5 h-1.5 rounded-full bg-indigo-400 group-hover:bg-white"></span>
                    </div>

                    <div class="glass-card rounded-2xl p-6 sm:p-7 space-y-2">
                        <div class="flex flex-wrap items-center justify-between gap-2">
                            <h3 class="text-lg font-bold text-white group-hover:text-indigo-300 transition-colors">
                                Independent Web Development Study & Projects
                            </h3>
                            <span class="px-3 py-1 rounded-full text-xs font-mono-code bg-indigo-500/10 text-indigo-400 border border-indigo-500/20">
                                Portfolio & Self Learning
                            </span>
                        </div>
                        <p class="text-sm font-semibold text-slate-300">
                            Hands-on Developer Exploration
                        </p>
                        <p class="text-sm text-slate-300 pt-2 leading-relaxed">
                            Secara mandiri mengimplementasikan berbagai proyek aplikasi seperti Catat Uang, Tabungan Pintar, dan The Quiz untuk memperdalam pemahaman pola arsitektur MVC, integrasi database, responsive styling dengan Tailwind CSS, dan version control dengan Git.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== 6. CONTACT SECTION ==================== -->
    <section id="contact" class="py-24 relative z-10 border-t border-slate-800/80 bg-[#070b16]/70">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <span class="text-xs uppercase font-bold tracking-widest text-sky-400 font-mono-code">Ayo Terhubung</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-white mt-2">
                    Get In <span class="text-gradient">Touch</span>
                </h2>
                <p class="text-slate-400 text-sm mt-3">
                    Tertarik berdiskusi tentang proyek, kolaborasi, atau sekadar bertukar wawasan pemrograman? Kirimkan pesan Anda melalui formulir di bawah ini!
                </p>
                <div class="w-16 h-1 bg-gradient-to-r from-sky-400 to-indigo-500 mx-auto mt-3 rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
                <!-- Left: Contact Details & Social Links -->
                <div class="lg:col-span-5 space-y-6">
                    <h3 class="text-2xl font-bold text-white">
                        Mari berbicara tentang ide & kolaborasi Anda.
                    </h3>
                    <p class="text-slate-300 text-sm leading-relaxed">
                        Sebagai siswa PPLG yang antusias, saya sangat terbuka untuk menerima masukan, saran, diskusi teknis, maupun kesempatan magang dan proyek web development.
                    </p>

                    <div class="space-y-4 pt-2">
                        <!-- Email Card -->
                        <a href="mailto:{{ $profile['email'] }}" class="glass-card p-4 rounded-xl flex items-center gap-4 group">
                            <div class="w-12 h-12 rounded-lg bg-sky-500/10 text-sky-400 flex items-center justify-center text-xl group-hover:bg-sky-500 group-hover:text-white transition-all">
                                <i class="bi bi-envelope-at-fill"></i>
                            </div>
                            <div>
                                <span class="text-xs font-mono-code text-slate-400">Email Utama</span>
                                <h4 class="text-sm font-semibold text-white group-hover:text-sky-400 transition-colors">{{ $profile['email'] }}</h4>
                            </div>
                        </a>

                        <!-- Location Card -->
                        <div class="glass-card p-4 rounded-xl flex items-center gap-4">
                            <div class="w-12 h-12 rounded-lg bg-indigo-500/10 text-indigo-400 flex items-center justify-center text-xl">
                                <i class="bi bi-geo-alt-fill"></i>
                            </div>
                            <div>
                                <span class="text-xs font-mono-code text-slate-400">Lokasi</span>
                                <h4 class="text-sm font-semibold text-white">{{ $profile['location'] }}</h4>
                            </div>
                        </div>

                        <!-- Instagram Card -->
                        <a href="{{ $profile['instagram'] }}" target="_blank" rel="noopener noreferrer" class="glass-card p-4 rounded-xl flex items-center gap-4 group">
                            <div class="w-12 h-12 rounded-lg bg-pink-500/10 text-pink-400 flex items-center justify-center text-xl group-hover:bg-pink-500 group-hover:text-white transition-all">
                                <i class="bi bi-instagram"></i>
                            </div>
                            <div>
                                <span class="text-xs font-mono-code text-slate-400">Instagram</span>
                                <h4 class="text-sm font-semibold text-white group-hover:text-pink-400 transition-colors">@dimasprasetyo</h4>
                            </div>
                        </a>

                        <!-- GitHub Card -->
                        <a href="{{ $profile['github'] }}" target="_blank" rel="noopener noreferrer" class="glass-card p-4 rounded-xl flex items-center gap-4 group">
                            <div class="w-12 h-12 rounded-lg bg-slate-800 text-slate-200 flex items-center justify-center text-xl group-hover:border-sky-500 group-hover:text-sky-400 transition-all">
                                <i class="bi bi-github"></i>
                            </div>
                            <div>
                                <span class="text-xs font-mono-code text-slate-400">GitHub Profile</span>
                                <h4 class="text-sm font-semibold text-white group-hover:text-sky-400 transition-colors">github.com/dimasprasetyo</h4>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Right: Contact Form -->
                <div class="lg:col-span-7">
                    <div class="glass-card rounded-2xl p-6 sm:p-8 border border-slate-800 shadow-2xl">
                        <form action="{{ route('contact.send') }}" method="POST" class="space-y-5">
                            @csrf

                            <!-- Name Input -->
                            <div>
                                <label for="name" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 font-mono-code mb-2">
                                    Nama Lengkap <span class="text-rose-400">*</span>
                                </label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}" required placeholder="Masukkan nama Anda..." class="glass-input w-full px-4 py-3 rounded-xl text-sm @error('name') border-rose-500 @enderror">
                                @error('name')
                                    <p class="text-rose-400 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Email Input -->
                            <div>
                                <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 font-mono-code mb-2">
                                    Alamat Email <span class="text-rose-400">*</span>
                                </label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" required placeholder="email@contoh.com..." class="glass-input w-full px-4 py-3 rounded-xl text-sm @error('email') border-rose-500 @enderror">
                                @error('email')
                                    <p class="text-rose-400 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Subject Input -->
                            <div>
                                <label for="subject" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 font-mono-code mb-2">
                                    Subjek / Keperluan
                                </label>
                                <input type="text" id="subject" name="subject" value="{{ old('subject') }}" placeholder="Contoh: Diskusi Proyek Web / Kolaborasi..." class="glass-input w-full px-4 py-3 rounded-xl text-sm @error('subject') border-rose-500 @enderror">
                                @error('subject')
                                    <p class="text-rose-400 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Message Input -->
                            <div>
                                <label for="message" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 font-mono-code mb-2">
                                    Isi Pesan <span class="text-rose-400">*</span>
                                </label>
                                <textarea id="message" name="message" rows="5" required placeholder="Tuliskan pesan atau pertanyaan Anda di sini..." class="glass-input w-full px-4 py-3 rounded-xl text-sm @error('message') border-rose-500 @enderror">{{ old('message') }}</textarea>
                                @error('message')
                                    <p class="text-rose-400 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="w-full inline-flex items-center justify-center gap-2.5 px-6 py-3.5 rounded-xl font-semibold text-sm text-white bg-gradient-to-r from-sky-500 via-indigo-600 to-purple-600 hover:from-sky-400 hover:to-indigo-500 shadow-lg shadow-sky-500/25 hover:shadow-sky-500/40 transition-all duration-300 active:scale-[0.99]">
                                <i class="bi bi-send-fill text-sm"></i>
                                <span>Kirim Pesan Sekarang</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== CV PREVIEW & DOWNLOAD MODAL ==================== -->
    <div id="cv-modal" class="hidden fixed inset-0 z-50 overflow-y-auto bg-black/80 backdrop-blur-md flex items-center justify-center p-4">
        <div class="relative w-full max-w-lg rounded-3xl bg-[#0b1329] border border-sky-500/30 p-6 sm:p-8 shadow-2xl">
            <!-- Close Button -->
            <button type="button" onclick="document.getElementById('cv-modal')?.classList.add('hidden')" class="absolute top-5 right-5 text-slate-400 hover:text-white transition-colors cursor-pointer">
                <i class="bi bi-x-lg text-lg"></i>
            </button>

            <!-- Modal Header -->
            <div class="flex items-center gap-3 mb-6">
                <div class="w-12 h-12 rounded-xl bg-sky-500/10 text-sky-400 flex items-center justify-center text-2xl">
                    <i class="bi bi-file-earmark-person-fill"></i>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-white">Curriculum Vitae</h3>
                    <p class="text-xs text-sky-400 font-mono-code">Muhammad Dimas Prasetyo</p>
                </div>
            </div>

            <!-- CV Summary Content -->
            <div class="space-y-4 text-xs font-mono-code text-slate-300 bg-[#050811] p-5 rounded-2xl border border-slate-800">
                <div class="pb-2 border-b border-slate-800">
                    <span class="text-slate-500 block mb-0.5">// PENDIDIKAN</span>
                    <strong class="text-white text-sm">SMK Negeri 1 Bangsri</strong>
                    <p class="text-slate-400">Pengembangan Perangkat Lunak & Gim (PPLG) • Kelas X PPLG 2</p>
                </div>

                <div class="pb-2 border-b border-slate-800">
                    <span class="text-slate-500 block mb-0.5">// KEAHLIAN TEKNOLOGI</span>
                    <p class="text-sky-300">HTML5, CSS3, JavaScript, PHP 8, Laravel Framework, MySQL, Git, UI/UX</p>
                </div>

                <div>
                    <span class="text-slate-500 block mb-0.5">// PROYEK UNGGULAN</span>
                    <p class="text-slate-300">Catat Uang, Tabungan Pintar, The Quiz, Personal Developer Portfolio</p>
                </div>
            </div>

            <!-- Actions -->
            <div class="mt-6 flex items-center gap-3">
                <button type="button" onclick="window.print()" class="flex-1 inline-flex items-center justify-center gap-2 py-3 rounded-xl text-xs font-semibold text-white bg-gradient-to-r from-sky-500 to-indigo-600 hover:from-sky-400 hover:to-indigo-500 transition-all cursor-pointer">
                    <i class="bi bi-printer-fill"></i> Cetak / Simpan PDF
                </button>
                <button type="button" onclick="document.getElementById('cv-modal')?.classList.add('hidden')" class="px-5 py-3 rounded-xl text-xs font-semibold text-slate-300 bg-slate-900 border border-slate-700 hover:bg-slate-800 transition-all cursor-pointer">
                    Tutup
                </button>
            </div>
        </div>
    </div>

@endsection
