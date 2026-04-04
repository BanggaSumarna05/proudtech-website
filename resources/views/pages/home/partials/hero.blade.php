<section class="relative overflow-hidden border-b-[6px] theme-border bg-white pt-8 pb-20" id="home-hero">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 lg:grid lg:grid-cols-[1.25fr,0.75fr] lg:gap-16 items-center">
        <div class="mb-12 lg:mb-0">
            <div class="inline-block bg-black text-white px-4 py-1.5 text-xs font-bold uppercase tracking-widest mb-6 shadow-[4px_4px_0_#0033a0]">
                Elevating Digital Standards
            </div>
            <h1 class="font-extrabold text-4xl sm:text-6xl lg:text-7xl leading-tight text-black mb-6 tracking-tighter uppercase">
                Bangun Website <br><span class="theme-text">&amp; Sistem Digital</span>
                <br>yang Meningkatkan Bisnis Anda.
            </h1>
            <p class="text-lg text-gray-600 mb-8 max-w-lg leading-relaxed font-semibold">
                Dari company profile hingga sistem custom kami bantu Anda terlihat profesional dan meningkatkan konversi.
            </p>
            <div class="flex flex-col sm:flex-row gap-4">
                <a href="{{ route('consultation.create') }}" class="theme-bg text-white px-8 py-4 min-h-[56px] font-bold text-sm uppercase tracking-widest text-center hover:bg-black transition-colors border-2 border-transparent hover:border-black">Konsultasi Gratis</a>
                <a href="#services" class="bg-white text-black border-2 border-black px-8 py-4 min-h-[56px] font-bold text-sm uppercase tracking-widest text-center hover:bg-black hover:text-white transition-colors">Lihat Portfolio</a>
            </div>
        </div>

        <div class="relative">
            <div class="absolute -inset-4 border-[6px] theme-border translate-x-4 -translate-y-4 z-0 hidden lg:block"></div>
            <div class="relative z-10 w-full aspect-square sm:aspect-video lg:aspect-square max-h-[320px] sm:max-h-[460px] bg-gray-100 overflow-hidden border-4 border-black">
                <x-ui.responsive-image
                    :src="asset('images/optimized/banner-home-1024.webp')"
                    :webp="asset('images/optimized/banner-home-1024.webp')"
                    :avif="asset('images/optimized/banner-home-1024.avif')"
                    :webp-srcset="asset('images/optimized/banner-home-640.webp') . ' 640w, ' . asset('images/optimized/banner-home-1024.webp') . ' 1024w'"
                    :avif-srcset="asset('images/optimized/banner-home-640.avif') . ' 640w, ' . asset('images/optimized/banner-home-1024.avif') . ' 1024w'"
                    alt="Proude Tech Hero"
                    width="1024"
                    height="1024"
                    sizes="(min-width: 1024px) 460px, 100vw"
                    loading="eager"
                    fetchpriority="high"
                    class="w-full h-full object-cover"
                />
                <div class="absolute inset-x-0 bottom-0 hidden h-32 bg-gradient-to-t from-black/20 to-transparent pointer-events-none sm:block"></div>
                <div class="absolute bottom-0 right-0 bg-black p-6 border-l-[4px] theme-border max-w-xs hidden sm:block">
                    <p class="text-xs font-bold uppercase tracking-widest text-white mb-2">Solusi Profesional</p>
                    <p class="text-xs font-medium text-gray-400">Infrastruktur canggih yang membangun kredibilitas bisnis.</p>
                </div>
            </div>
        </div>
    </div>
</section>
