@props([
    'step',
    'title',
    'description',
    'icon' => 'circle',
    'active' => false,
])

<article {{ $attributes->merge(['class' => ($active ? 'border-brand-200 bg-brand-50/60 shadow-soft' : 'border-slate-200/80 bg-white') . ' relative rounded-[28px] border p-6 transition duration-300 hover:-translate-y-1']) }}>
    <div class="flex items-start justify-between gap-4">
        <div class="{{ $active ? 'bg-brand-500 text-white' : 'bg-slate-100 text-slate-700' }} flex h-12 w-12 items-center justify-center rounded-2xl">
            @switch($icon)
                @case('search')
                    <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="m21 21-4.35-4.35M10.5 18a7.5 7.5 0 1 1 0-15 7.5 7.5 0 0 1 0 15Z" />
                    </svg>
                    @break
                @case('layers')
                    <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="m12 3 8 4.5-8 4.5-8-4.5L12 3Zm8 9-8 4.5-8-4.5m16 4.5L12 21l-8-4.5" />
                    </svg>
                    @break
                @case('code')
                    <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="m8 8-4 4 4 4m8-8 4 4-4 4M14 4l-4 16" />
                    </svg>
                    @break
                @case('rocket')
                    <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M5 19c2.5-4.5 6.5-8.5 11-11 1 2.5 1 5.5 0 8-2.5 1-5.5 1-8 0L5 19Zm0 0 3-3m8-11 3 3" />
                    </svg>
                    @break
                @default
                    <span class="text-sm font-bold">{{ $step }}</span>
            @endswitch
        </div>
        <span class="text-xs font-semibold uppercase tracking-[0.24em] text-brand-600">{{ $step }}</span>
    </div>

    <h3 class="mt-6 text-2xl font-display">{{ $title }}</h3>
    <p class="mt-4 text-sm leading-7 text-slate-600">{{ $description }}</p>
</article>
