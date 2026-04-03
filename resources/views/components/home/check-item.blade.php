@props([
    'title',
    'description' => null,
])

<div {{ $attributes->merge(['class' => 'flex items-start gap-4 rounded-[24px] border border-slate-200/80 bg-white p-5 shadow-sm']) }}>
    <span class="mt-1 flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-brand-50 text-brand-600">
        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 13 4 4L19 7" />
        </svg>
    </span>
    <div>
        <p class="text-base font-semibold text-slate-950">{{ $title }}</p>
        @if ($description)
            <p class="mt-2 text-sm leading-7 text-slate-600">{{ $description }}</p>
        @endif
    </div>
</div>
