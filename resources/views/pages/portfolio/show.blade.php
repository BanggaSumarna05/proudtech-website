@extends('layouts.public')

@section('content')
    <!-- HERO -->
    <section class="bg-white py-20 lg:py-24 border-b-[8px] border-black">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid gap-12 lg:gap-16 lg:grid-cols-[0.9fr,1.1fr] items-center">
            <div>
                <span class="inline-block bg-black text-white px-4 py-2 text-xs font-bold uppercase tracking-widest mb-6">DOKUMENTASI KLIEN</span>
                <h1 class="font-extrabold text-5xl lg:text-6xl leading-none tracking-tighter text-black uppercase mb-6">{{ $portfolio->title }}</h1>
                <p class="text-lg font-semibold leading-relaxed text-gray-700 border-l-[4px] theme-border pl-5">{{ $portfolio->description }}</p>
            </div>
            <div class="relative w-full aspect-[4/3] border-[5px] border-black shadow-[16px_16px_0_#0033a0] overflow-hidden">
                <x-ui.responsive-image
                    :src="$portfolio->image_url"
                    :webp="$portfolio->image_webp_url"
                    :avif="$portfolio->image_avif_url"
                    :alt="$portfolio->title"
                    :width="$portfolio->image_width"
                    :height="$portfolio->image_height"
                    sizes="(min-width: 1024px) 46vw, 100vw"
                    loading="eager"
                    fetchpriority="high"
                    class="absolute inset-0 w-full h-full object-cover"
                />
            </div>
        </div>
    </section>

    <!-- SUMMARY & TEAMS -->
    <section class="py-20 lg:py-24 bg-gray-50 border-b-4 border-black">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid gap-8 lg:gap-12 lg:grid-cols-3 items-start">
            <div class="border-[4px] border-black p-8 lg:p-10 bg-white shadow-[8px_8px_0_#000] lg:col-span-1">
                <p class="text-xs font-bold uppercase tracking-widest text-gray-400 mb-6 border-b-[3px] border-gray-200 pb-3">Ringkasan Konteks</p>
                <p class="text-base font-semibold leading-relaxed text-gray-800">{{ $portfolio->description }}</p>
            </div>
            <div class="border-[4px] border-black p-8 lg:p-10 bg-black text-white shadow-[8px_8px_0_#0033a0] lg:col-span-2">
                <p class="text-xs font-bold uppercase tracking-widest text-gray-400 mb-6 border-b-[3px] border-gray-800 pb-3">Infrastruktur yang Di-Deploy</p>
                <div class="grid gap-6 md:grid-cols-2">
                    @foreach ($portfolio->feature_list as $feature)
                        <div class="border-[3px] border-gray-700 bg-gray-900 p-5 text-xs font-bold uppercase tracking-widest text-gray-100 flex items-start gap-4">
                            <span class="theme-text">>></span>
                            {{ $feature }}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- CASE STUDY DETAILS -->
    <section class="bg-slate-950 py-20 lg:py-24 text-white border-b-[8px] theme-border">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid gap-8 lg:gap-10 lg:grid-cols-3">
            <div class="border-[4px] border-gray-800 bg-gray-900 p-8 hover:border-black hover:shadow-[12px_12px_0_#000] transition-all duration-300">
                <p class="text-sm font-extrabold uppercase tracking-widest theme-text mb-6 border-b-2 border-gray-800 pb-3 inline-block">PROBLEM STATEMENT</p>
                <div class="space-y-4 text-sm font-semibold leading-relaxed text-gray-300 border-l-[3px] border-gray-800 pl-5">
                    @foreach (preg_split('/\r\n|\r|\n/', $portfolio->problem) as $line)
                        @if (filled($line))
                            <p>{{ $line }}</p>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="border-[4px] theme-border bg-gray-900 p-8 hover:-translate-y-2 hover:shadow-[12px_12px_0_#0033a0] transition-all duration-500 transform lg:scale-105 z-10 relative">
                <div class="absolute -top-3 -right-3 w-6 h-6 theme-bg"></div>
                <div class="absolute -bottom-3 -left-3 w-6 h-6 bg-white"></div>
                
                <p class="text-sm font-extrabold uppercase tracking-widest text-white mb-6 border-b-4 theme-border pb-3 inline-block">SYSTEM SOLUTION</p>
                <div class="space-y-4 text-sm font-bold leading-relaxed text-gray-200 border-l-[3px] theme-border pl-5">
                    @foreach (preg_split('/\r\n|\r|\n/', $portfolio->solution) as $line)
                        @if (filled($line))
                            <p>{{ $line }}</p>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="border-[4px] border-gray-800 bg-gray-900 p-8 hover:border-black hover:shadow-[12px_12px_0_#000] transition-all duration-300">
                <p class="text-sm font-extrabold uppercase tracking-widest theme-text mb-6 border-b-2 border-gray-800 pb-3 inline-block">END RESULT</p>
                <div class="space-y-4 text-sm font-semibold leading-relaxed text-gray-300 border-l-[3px] border-gray-800 pl-5">
                    @foreach (preg_split('/\r\n|\r|\n/', $portfolio->result) as $line)
                        @if (filled($line))
                            <p>{{ $line }}</p>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    @if ($relatedPortfolios->isNotEmpty())
        <section class="py-20 lg:py-24 bg-gray-100 relative">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <span class="inline-block border-[3px] border-black text-black px-4 py-2 text-xs font-bold uppercase tracking-widest mb-8 shadow-[6px_6px_0_#000]">BERKAS LAINNYA</span>
                <div class="grid gap-8 md:grid-cols-3">
                    @foreach ($relatedPortfolios as $relatedPortfolio)
                        <x-ui.portfolio-card :portfolio="$relatedPortfolio" />
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    <x-ui.cta-banner />
@endsection
