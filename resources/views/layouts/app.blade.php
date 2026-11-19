<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Muhammad Dimas Prasetyo | Student Developer & Web Developer')</title>
    <meta name="description" content="Portfolio resmi Muhammad Dimas Prasetyo - Siswa X PPLG 2 SMK Negeri 1 Bangsri. Student Developer yang fokus pada Web Development, Laravel, dan Antarmuka Modern.">
    <meta name="keywords" content="Muhammad Dimas Prasetyo, Dimas, PPLG, SMKN 1 Bangsri, Portfolio, Web Developer, Laravel, Jepara">

    <!-- Google Fonts: Plus Jakarta Sans & JetBrains Mono -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Bootstrap Icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Favicon DP -->
    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>💻</text></svg>">

    <!-- Laravel Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#050811] text-slate-100 selection:bg-sky-500/30 selection:text-sky-200 antialiased relative min-h-screen overflow-x-hidden">

    <!-- Decorative Gradient Mesh Glow in Background -->
    <div class="fixed inset-0 pointer-events-none overflow-hidden z-0">
        <div class="glow-blob bg-sky-500 w-[550px] h-[550px] -top-40 -left-40 animate-pulse-glow"></div>
        <div class="glow-blob bg-indigo-600 w-[600px] h-[600px] top-1/3 -right-40 animate-pulse-glow" style="animation-delay: 2s;"></div>
        <div class="glow-blob bg-cyan-600 w-[450px] h-[450px] -bottom-20 left-1/4 animate-pulse-glow" style="animation-delay: 3s;"></div>
        <!-- Grid pattern overlay for tech aesthetic -->
        <div class="absolute inset-0 bg-[linear-gradient(to_right,#1e293b0a_1px,transparent_1px),linear-gradient(to_bottom,#1e293b0a_1px,transparent_1px)] bg-[size:4rem_4rem]"></div>
    </div>

    <!-- Sticky Glassmorphic Navbar -->
    @include('partials.navbar')

    <!-- Flash Alert Notification -->
    @if(session('success'))
        <div id="flash-alert" class="fixed top-24 right-5 z-50 max-w-md bg-slate-900/90 border border-emerald-500/40 text-emerald-300 p-4 rounded-2xl shadow-2xl backdrop-blur-xl flex items-start gap-3 transition-all duration-300">
            <div class="flex-shrink-0 w-8 h-8 rounded-full bg-emerald-500/20 text-emerald-400 flex items-center justify-center">
                <i class="bi bi-check2-circle text-lg"></i>
            </div>
            <div class="flex-1 text-sm">
                <h5 class="font-bold text-white mb-0.5">Berhasil Terkirim!</h5>
                <p class="text-slate-300 leading-snug">{{ session('success') }}</p>
            </div>
            <button onclick="document.getElementById('flash-alert')?.remove()" class="text-slate-400 hover:text-white transition-colors">
                <i class="bi bi-x-lg text-sm"></i>
            </button>
        </div>
    @endif

    <!-- Main Content -->
    <main class="relative z-10">
        @yield('content')
    </main>

    <!-- Footer -->
    @include('partials.footer')

    <!-- Floating Back to Top Button -->
    <button id="back-to-top" type="button" aria-label="Kembali ke atas" class="fixed bottom-7 right-7 z-40 p-3.5 rounded-full bg-slate-900/90 border border-sky-500/30 text-sky-400 shadow-xl shadow-sky-500/10 backdrop-blur-md opacity-0 pointer-events-none translate-y-4 hover:border-sky-400 hover:bg-sky-500 hover:text-white transition-all duration-300 group">
        <i class="bi bi-arrow-up text-lg font-bold"></i>
    </button>

</body>
</html>
