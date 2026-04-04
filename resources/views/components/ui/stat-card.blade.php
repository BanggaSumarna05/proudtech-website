@props(['value', 'label', 'colSpan' => false])

<div class="p-8 lg:p-10 min-h-[170px] bg-black relative overflow-hidden border-[3px] border-gray-800 transition-colors {{ $colSpan ? 'sm:col-span-2' : '' }}">
    <div class="relative z-10 flex flex-col items-center text-center">
        <div class="text-4xl lg:text-5xl font-extrabold text-white mb-3">{{ $value }}</div>
        <div class="text-xs font-extrabold uppercase tracking-widest text-gray-400">{{ $label }}</div>
    </div>
</div>
