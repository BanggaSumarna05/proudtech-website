@props([
    'value',
    'label',
    'description' => null,
])

<article {{ $attributes->merge(['class' => 'lift-card soft-panel p-7']) }}>
    <p class="text-sm font-semibold uppercase tracking-[0.22em] text-brand-600">{{ $label }}</p>
    <p class="mt-4 font-display text-4xl text-slate-950">{{ $value }}</p>
    @if ($description)
        <p class="mt-3 text-sm leading-7 text-slate-600">{{ $description }}</p>
    @endif
</article>
