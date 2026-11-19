<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Muhammad Dimas Prasetyo</title>
    <meta name="description" content="Halaman Login Khusus Administrator Portfolio Muhammad Dimas Prasetyo">

    <!-- Google Fonts: Plus Jakarta Sans & JetBrains Mono -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500;600&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Bootstrap Icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Favicon -->
    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>🔒</text></svg>">

    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#050811] text-slate-100 min-h-screen flex items-center justify-center p-4 relative overflow-x-hidden antialiased">

    <!-- Glowing Background Aura Blobs -->
    <div class="fixed inset-0 pointer-events-none overflow-hidden z-0">
        <div class="glow-blob bg-sky-500 w-[500px] h-[500px] -top-32 -left-32 opacity-20"></div>
        <div class="glow-blob bg-indigo-600 w-[550px] h-[550px] -bottom-32 -right-32 opacity-25"></div>
        <div class="absolute inset-0 bg-[linear-gradient(to_right,#1e293b0d_1px,transparent_1px),linear-gradient(to_bottom,#1e293b0d_1px,transparent_1px)] bg-[size:4rem_4rem]"></div>
    </div>

    <!-- Login Card Container -->
    <div class="relative z-10 w-full max-w-md my-8">
        
        <!-- Back to Portfolio Button -->
        <div class="mb-6">
            <a href="{{ route('home') }}" class="inline-flex items-center gap-2 text-xs font-mono-code text-slate-400 hover:text-sky-400 transition-colors group">
                <i class="bi bi-arrow-left transition-transform group-hover:-translate-x-1"></i>
                <span>Kembali ke Website Portfolio</span>
            </a>
        </div>

        <!-- Glassmorphism Main Card -->
        <div class="relative rounded-3xl bg-[#0a1024]/80 border border-sky-500/20 backdrop-blur-2xl p-7 sm:p-9 shadow-2xl shadow-black/60">
            
            <!-- Card Ambient Glow -->
            <div class="absolute -top-10 left-1/2 -translate-x-1/2 w-40 h-2 bg-gradient-to-r from-sky-500 via-indigo-500 to-purple-600 blur-sm rounded-full"></div>

            <!-- Header Section -->
            <div class="text-center space-y-3 pb-6 border-b border-slate-800/80">
                <!-- Brand Badge Logo -->
                <div class="inline-flex items-center justify-center w-14 h-14 rounded-2xl bg-gradient-to-tr from-sky-500 via-indigo-500 to-purple-600 p-[1.5px] shadow-lg shadow-sky-500/25 mx-auto">
                    <div class="w-full h-full bg-[#070b16] rounded-[14px] flex items-center justify-center">
                        <span class="font-extrabold text-lg text-transparent bg-clip-text bg-gradient-to-r from-sky-400 to-indigo-300">DP</span>
                    </div>
                </div>

                <div>
                    <h1 class="text-2xl font-extrabold text-white tracking-tight">Admin Portal</h1>
                    <p class="text-xs text-slate-400 font-mono-code mt-1">Masuk untuk mengelola portfolio & pesan</p>
                </div>

                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-slate-900 border border-slate-800 text-[11px] text-sky-400 font-mono-code">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                    <span>Akses Terproteksi Middleware</span>
                </div>
            </div>

            <!-- Flash Session Alerts -->
            @if(session('success'))
                <div class="mt-6 p-4 rounded-xl bg-emerald-950/40 border border-emerald-500/30 text-emerald-300 text-xs flex items-center gap-3">
                    <i class="bi bi-check-circle-fill text-emerald-400 text-base"></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            @if($errors->any())
                <div class="mt-6 p-4 rounded-xl bg-rose-950/40 border border-rose-500/30 text-rose-300 text-xs space-y-1">
                    <div class="flex items-center gap-2 font-bold text-rose-200">
                        <i class="bi bi-exclamation-triangle-fill text-rose-400"></i>
                        <span>Autentikasi Gagal</span>
                    </div>
                    @foreach($errors->all() as $error)
                        <p class="pl-5 text-rose-300/90 leading-relaxed">{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <!-- Login Form -->
            <form action="{{ route('login.submit') }}" method="POST" class="mt-6 space-y-5">
                @csrf

                <!-- Email Input -->
                <div class="space-y-1.5">
                    <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 font-mono-code">
                        Alamat Email
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                            <i class="bi bi-envelope-fill text-sm"></i>
                        </div>
                        <input 
                            type="email" 
                            id="email" 
                            name="email" 
                            value="{{ old('email') }}" 
                            required 
                            autofocus 
                            placeholder="admin@dimas.dev" 
                            class="glass-input w-full pl-10 pr-4 py-3 rounded-xl text-sm placeholder:text-slate-500 @error('email') border-rose-500 @enderror"
                        >
                    </div>
                </div>

                <!-- Password Input with Show/Hide Toggle -->
                <div class="space-y-1.5">
                    <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 font-mono-code">
                        Password Akun
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                            <i class="bi bi-shield-lock-fill text-sm"></i>
                        </div>
                        <input 
                            type="password" 
                            id="password" 
                            name="password" 
                            required 
                            placeholder="••••••••" 
                            class="glass-input w-full pl-10 pr-12 py-3 rounded-xl text-sm placeholder:text-slate-500 @error('password') border-rose-500 @enderror"
                        >
                        <!-- Show / Hide Password Button -->
                        <button 
                            type="button" 
                            id="toggle-password-btn" 
                            aria-label="Toggle Password Visibility" 
                            class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-slate-400 hover:text-sky-400 transition-colors cursor-pointer"
                        >
                            <i id="toggle-password-icon" class="bi bi-eye-slash text-base"></i>
                        </button>
                    </div>
                </div>

                <!-- Remember Me Checkbox -->
                <div class="flex items-center justify-between pt-1">
                    <label class="flex items-center gap-2 cursor-pointer select-none">
                        <input 
                            type="checkbox" 
                            name="remember" 
                            id="remember" 
                            {{ old('remember') ? 'checked' : '' }} 
                            class="w-4 h-4 rounded bg-slate-900 border-slate-700 text-sky-500 focus:ring-sky-500/20 focus:ring-offset-0 cursor-pointer"
                        >
                        <span class="text-xs text-slate-300">Ingat Saya di Perangkat Ini</span>
                    </label>
                </div>

                <!-- Submit Button -->
                <button 
                    type="submit" 
                    class="w-full inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl font-semibold text-sm text-white bg-gradient-to-r from-sky-500 via-indigo-600 to-purple-600 hover:from-sky-400 hover:to-indigo-500 shadow-lg shadow-sky-500/25 hover:shadow-sky-500/40 transition-all duration-300 active:scale-[0.99] cursor-pointer"
                >
                    <i class="bi bi-box-arrow-in-right text-base"></i>
                    <span>Masuk ke Dashboard</span>
                </button>
            </form>

            <!-- Security Footnote -->
            <div class="mt-6 pt-4 border-t border-slate-800/80 text-center">
                <p class="text-[11px] text-slate-500 leading-relaxed font-mono-code">
                    <i class="bi bi-shield-check text-sky-400"></i> Hashing Bcrypt • Proteksi CSRF Aktif
                </p>
            </div>

        </div>

        <!-- Copyright Footnote -->
        <div class="text-center mt-6 text-xs text-slate-500 font-mono-code">
            © {{ date('Y') }} Muhammad Dimas Prasetyo • SMK Negeri 1 Bangsri
        </div>
    </div>

    <!-- Toggle Password Visibility Script -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const passwordInput = document.getElementById('password');
            const toggleBtn = document.getElementById('toggle-password-btn');
            const toggleIcon = document.getElementById('toggle-password-icon');

            if (toggleBtn && passwordInput && toggleIcon) {
                toggleBtn.addEventListener('click', () => {
                    const isPassword = passwordInput.getAttribute('type') === 'password';
                    if (isPassword) {
                        passwordInput.setAttribute('type', 'text');
                        toggleIcon.classList.remove('bi-eye-slash');
                        toggleIcon.classList.add('bi-eye');
                    } else {
                        passwordInput.setAttribute('type', 'password');
                        toggleIcon.classList.remove('bi-eye');
                        toggleIcon.classList.add('bi-eye-slash');
                    }
                });
            }
        });
    </script>
</body>
</html>
