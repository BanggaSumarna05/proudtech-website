@props(['value', 'label', 'colSpan' => false])

<div data-aos="zoom-in" class="p-8 lg:p-10 bg-black relative overflow-hidden group border-[3px] border-gray-800 hover:border-gray-600 transition-colors {{ $colSpan ? 'sm:col-span-2' : '' }}">
    <div class="absolute inset-0 theme-bg translate-y-full group-hover:translate-y-0 transition-transform duration-500 z-0 opacity-50"></div>
    <div class="relative z-10 flex flex-col items-center text-center">
        <div class="text-4xl lg:text-5xl font-extrabold text-white mb-3">{{ $value }}</div>
        <div class="text-xs font-extrabold uppercase tracking-widest text-gray-400 group-hover:text-white transition-colors">{{ $label }}</div>
    </div>
</div>
