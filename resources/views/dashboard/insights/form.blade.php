<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <a href="{{ route('dashboard.insights.index') }}" class="text-slate-400 hover:text-slate-950">
                <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M19 12H5m0 0l7-7m-7 7 7 7" />
                </svg>
            </a>
            <span class="text-slate-300">/</span>
            <span>{{ $insight->exists ? 'Edit Artikel' : 'Artikel Baru' }}</span>
        </div>
    </x-slot>

    <div class="mx-auto max-w-3xl">
        <div class="admin-card overflow-hidden">
            <form action="{{ $formAction }}" method="POST" enctype="multipart/form-data" class="p-8">
                @csrf
                @if($formMethod !== 'POST')
                    @method($formMethod)
                @endif

                <div class="space-y-6">
                    <div>
                        <label for="title" class="form-label">Judul Artikel <span class="text-rose-500">*</span></label>
                        <input type="text" id="title" name="title" value="{{ old('title', $insight->title) }}" class="form-input" required>
                        @error('title') <p class="mt-1 text-sm text-rose-500">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="image" class="form-label">Gambar Utama</label>
                        @if($insight->exists && $insight->image)
                            <div class="mb-4">
                                <img src="{{ $insight->image_url }}" alt="Preview" class="h-48 w-full rounded-2xl border border-slate-200 object-cover">
                            </div>
                        @endif
                        <input type="file" id="image" name="image" class="form-input !px-0" accept="image/*" {{ !$insight->exists ? 'required' : '' }}>
                        <p class="mt-2 text-xs text-slate-500">Gunakan rasio 16:9 agar optimal pada mode card.</p>
                        @error('image') <p class="mt-1 text-sm text-rose-500">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="excerpt" class="form-label">Kutipan Singkat (Excerpt)</label>
                        <textarea id="excerpt" name="excerpt" rows="2" class="form-input">{{ old('excerpt', $insight->excerpt) }}</textarea>
                        @error('excerpt') <p class="mt-1 text-sm text-rose-500">{{ $message }}</p> @enderror
                    </div>
                    
                    <div>
                        <label for="content" class="form-label">Isi Artikel <span class="text-rose-500">*</span></label>
                        <textarea id="content" name="content" rows="12" class="form-input" required>{{ old('content', $insight->content) }}</textarea>
                        @error('content') <p class="mt-1 text-sm text-rose-500">{{ $message }}</p> @enderror
                    </div>

                </div>

                <div class="mt-8 flex items-center justify-end gap-4 border-t border-slate-100 pt-6">
                    <a href="{{ route('dashboard.insights.index') }}" class="text-sm font-semibold text-slate-500 hover:text-slate-900">Batal</a>
                    <button type="submit" class="btn-primary">
                        {{ $insight->exists ? 'Simpan Perubahan' : 'Terbitkan Artikel' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
