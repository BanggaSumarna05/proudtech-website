@props(['portfolio'])

<article data-aos="fade-up" class="bg-white border-[4px] border-black overflow-hidden flex flex-col hover:-translate-y-2 hover:shadow-[12px_12px_0_#0033a0] transition-all duration-300 group h-full">
    <div class="relative w-full aspect-video border-b-[4px] border-black overflow-hidden bg-gray-900">
        <img src="{{ $portfolio->image_url }}" alt="{{ $portfolio->title }}" class="absolute inset-0 w-full h-full object-cover grayscale mix-blend-luminosity group-hover:grayscale-0 group-hover:mix-blend-normal transition-all duration-700 scale-105 group-hover:scale-100">
        <div class="absolute inset-0 bg-[url('https://laravel.com/assets/img/welcome/background.svg')] opacity-30 mix-blend-multiply pointer-events-none"></div>
    </div>
    <div class="p-8 flex flex-col flex-grow">
        <h3 class="text-xl font-extrabold uppercase tracking-tight text-black mb-4 leading-snug">{{ $portfolio->title }}</h3>
        <p class="text-sm font-semibold leading-relaxed text-gray-600 mb-8 flex-grow line-clamp-3">{{ $portfolio->description }}</p>
        <a href="{{ route('portfolio.show', $portfolio) }}" class="mt-auto inline-flex items-center justify-between text-xs font-extrabold uppercase tracking-widest theme-text group-hover:text-black pt-5 border-t-[3px] border-gray-100 group-hover:border-black transition-colors w-full">
            BACA DOKUMENTASI
            <svg class="w-5 h-5 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
        </a>
    </div>
</article>
