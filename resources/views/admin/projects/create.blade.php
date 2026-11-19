@extends('layouts.admin')

@section('title', 'Tambah Project Baru')
@section('page_title', 'Tambah Project')

@section('content')
<div class="max-w-4xl space-y-6">

    <!-- Top Navigation -->
    <div class="flex items-center gap-3">
        <a href="{{ route('admin.projects.index') }}" class="p-2 rounded-xl bg-slate-900 border border-slate-800 text-slate-400 hover:text-white hover:border-sky-500/40 transition-colors">
            <i data-lucide="arrow-left" class="w-4 h-4"></i>
        </a>
        <div>
            <h2 class="text-2xl font-extrabold text-white tracking-tight">Tambah Project Baru</h2>
            <p class="text-xs text-slate-400 font-mono-code mt-0.5">Project akan otomatis tampil di halaman portfolio publik setelah disimpan.</p>
        </div>
    </div>

    <!-- Error Validation Alert -->
    @if($errors->any())
        <div class="p-4 rounded-2xl bg-rose-950/40 border border-rose-500/30 text-rose-300 text-xs space-y-1">
            <div class="flex items-center gap-2 font-bold text-rose-200">
                <i data-lucide="alert-circle" class="w-4 h-4 text-rose-400"></i>
                <span>Terdapat kesalahan pengisian form:</span>
            </div>
            <ul class="list-disc pl-6 space-y-0.5 text-rose-300/90">
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form Container -->
    <div class="glass-card rounded-3xl p-6 sm:p-9 border border-slate-800/80 shadow-2xl">
        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- 1. Nama Project -->
                <div class="md:col-span-2 space-y-1.5">
                    <label for="title" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 font-mono-code">
                        Nama Project <span class="text-rose-400">*</span>
                    </label>
                    <input 
                        type="text" 
                        id="title" 
                        name="title" 
                        value="{{ old('title') }}" 
                        required 
                        placeholder="Contoh: Tabungan Pintar, Sistem POS Kasir, dsb." 
                        class="glass-input w-full px-4 py-3 rounded-xl text-sm @error('title') border-rose-500 @enderror"
                    >
                </div>

                <!-- 2. Kategori Project -->
                <div class="space-y-1.5">
                    <label for="category" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 font-mono-code">
                        Kategori Project <span class="text-rose-400">*</span>
                    </label>
                    <select 
                        id="category" 
                        name="category" 
                        required 
                        class="glass-input w-full px-4 py-3 rounded-xl text-sm bg-[#0a1024] cursor-pointer"
                    >
                        @foreach($categories as $cat)
                            <option value="{{ $cat }}" {{ old('category') == $cat ? 'selected' : '' }}>
                                {{ $cat }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- 3. Urutan Tampil (Order) -->
                <div class="space-y-1.5">
                    <label for="order" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 font-mono-code">
                        Urutan Tampil (Nomor Urut)
                    </label>
                    <input 
                        type="number" 
                        id="order" 
                        name="order" 
                        value="{{ old('order', 1) }}" 
                        min="0" 
                        class="glass-input w-full px-4 py-3 rounded-xl text-sm"
                    >
                </div>

                <!-- 4. Teknologi yang Digunakan (Tech Stack) -->
                <div class="md:col-span-2 space-y-1.5">
                    <label for="tech_stack" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 font-mono-code">
                        Teknologi yang Digunakan <span class="text-rose-400">*</span>
                    </label>
                    <input 
                        type="text" 
                        id="tech_stack" 
                        name="tech_stack" 
                        value="{{ old('tech_stack') }}" 
                        required 
                        placeholder="Pisahkan dengan tanda koma (Contoh: Laravel, MySQL, Tailwind CSS, Alpine.js)" 
                        class="glass-input w-full px-4 py-3 rounded-xl text-sm @error('tech_stack') border-rose-500 @enderror"
                    >
                    <p class="text-[11px] text-slate-500 font-mono-code">Gunakan koma untuk memisahkan nama-nama teknologi.</p>
                </div>

                <!-- 5. Link Live Demo -->
                <div class="space-y-1.5">
                    <label for="live_url" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 font-mono-code">
                        Link Live Demo
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-500">
                            <i data-lucide="globe" class="w-4 h-4"></i>
                        </div>
                        <input 
                            type="url" 
                            id="live_url" 
                            name="live_url" 
                            value="{{ old('live_url') }}" 
                            placeholder="https://aplikasi-anda.com" 
                            class="glass-input w-full pl-10 pr-4 py-3 rounded-xl text-sm @error('live_url') border-rose-500 @enderror"
                        >
                    </div>
                </div>

                <!-- 6. Link GitHub -->
                <div class="space-y-1.5">
                    <label for="github_url" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 font-mono-code">
                        Link Source Code (GitHub)
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-500">
                            <i data-lucide="github" class="w-4 h-4"></i>
                        </div>
                        <input 
                            type="url" 
                            id="github_url" 
                            name="github_url" 
                            value="{{ old('github_url') }}" 
                            placeholder="https://github.com/dimasprasetyo/repo" 
                            class="glass-input w-full pl-10 pr-4 py-3 rounded-xl text-sm @error('github_url') border-rose-500 @enderror"
                        >
                    </div>
                </div>

                <!-- 7. Deskripsi Project -->
                <div class="md:col-span-2 space-y-1.5">
                    <label for="description" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 font-mono-code">
                        Deskripsi Lengkap Project <span class="text-rose-400">*</span>
                    </label>
                    <textarea 
                        id="description" 
                        name="description" 
                        rows="4" 
                        required 
                        placeholder="Jelaskan tujuan aplikasi, fitur-fitur utama, dan bagaimana aplikasi ini memecahkan masalah..." 
                        class="glass-input w-full px-4 py-3 rounded-xl text-sm @error('description') border-rose-500 @enderror"
                    >{{ old('description') }}</textarea>
                </div>

                <!-- 8. Upload Thumbnail Image -->
                <div class="md:col-span-2 space-y-2">
                    <label class="block text-xs font-semibold uppercase tracking-wider text-slate-300 font-mono-code">
                        Thumbnail Project (Gambar Cover)
                    </label>
                    
                    <div class="flex flex-col sm:flex-row items-start sm:items-center gap-5 p-4 rounded-2xl bg-slate-900/60 border border-slate-800">
                        <div id="thumbnail-preview-container" class="w-32 h-20 rounded-xl bg-slate-950 border border-slate-800 overflow-hidden flex items-center justify-center shrink-0">
                            <i data-lucide="image" class="w-6 h-6 text-slate-600" id="thumbnail-placeholder-icon"></i>
                            <img id="thumbnail-preview-img" src="" alt="Preview" class="w-full h-full object-cover hidden">
                        </div>
                        <div class="flex-1 space-y-1">
                            <input 
                                type="file" 
                                id="thumbnail" 
                                name="thumbnail" 
                                accept="image/png,image/jpeg,image/webp,image/jpg" 
                                class="text-xs text-slate-400 file:mr-3 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-sky-500/10 file:text-sky-400 hover:file:bg-sky-500/20 file:cursor-pointer cursor-pointer"
                            >
                            <p class="text-[11px] text-slate-500 font-mono-code">Format gambar: JPG, PNG, WEBP. Maksimal 2MB.</p>
                        </div>
                    </div>
                </div>

                <!-- 9. Tampilkan Sebagai Unggulan -->
                <div class="md:col-span-2 pt-2">
                    <label class="flex items-center gap-3 cursor-pointer select-none">
                        <input 
                            type="checkbox" 
                            name="is_featured" 
                            id="is_featured" 
                            value="1" 
                            {{ old('is_featured', true) ? 'checked' : '' }} 
                            class="w-4 h-4 rounded bg-slate-900 border-slate-700 text-sky-500 focus:ring-sky-500/20"
                        >
                        <span class="text-xs text-slate-300 font-medium">Tampilkan sebagai Proyek Unggulan (Featured Project)</span>
                    </label>
                </div>
            </div>

            <!-- Submit Buttons -->
            <div class="pt-6 border-t border-slate-800/80 flex items-center justify-end gap-3">
                <a href="{{ route('admin.projects.index') }}" class="px-5 py-2.5 rounded-xl text-xs font-semibold text-slate-400 hover:text-white bg-slate-900 border border-slate-800 transition-colors">
                    Batal
                </a>
                <button type="submit" class="inline-flex items-center gap-2 px-6 py-2.5 rounded-xl text-xs font-semibold text-white bg-gradient-to-r from-sky-500 to-indigo-600 hover:from-sky-400 hover:to-indigo-500 shadow-md shadow-sky-500/25 transition-all cursor-pointer">
                    <i data-lucide="check" class="w-4 h-4"></i>
                    <span>Simpan Project Baru</span>
                </button>
            </div>
        </form>
    </div>

</div>

<!-- Preview Script -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const fileInput = document.getElementById('thumbnail');
        const previewImg = document.getElementById('thumbnail-preview-img');
        const placeholderIcon = document.getElementById('thumbnail-placeholder-icon');

        fileInput?.addEventListener('change', (e) => {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    previewImg.src = event.target.result;
                    previewImg.classList.remove('hidden');
                    placeholderIcon.classList.add('hidden');
                }
                reader.readAsDataURL(file);
            }
        });
    });
</script>
@endsection
