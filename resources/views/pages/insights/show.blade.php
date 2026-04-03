@extends('layouts.public')

@section('content')
    <article class="pt-16 lg:pt-24 pb-20 bg-white border-b-[8px] theme-border relative overflow-hidden">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div data-aos="fade-up">
                <a href="{{ route('insights.index') }}" class="inline-flex items-center gap-2 text-sm font-bold uppercase tracking-widest text-gray-500 hover:text-[#0033a0] transition-colors mb-10">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                    KEMBALI KE INSIGHTS
                </a>

                <div class="inline-block bg-black text-white px-4 py-2 text-xs font-bold uppercase tracking-widest mb-6 shadow-[4px_4px_0_#0033a0]">
                    {{ $insight->created_at->format('M d, Y') }}
                </div>
                
                <h1 class="text-4xl lg:text-6xl font-extrabold uppercase tracking-tighter leading-[1.1] mb-8">
                    {{ $insight->title }}
                </h1>
            </div>

            <div data-aos="zoom-in" data-aos-delay="100" class="w-full aspect-video border-[6px] border-black bg-gray-100 mb-12 shadow-[16px_16px_0_#0033a0] overflow-hidden">
                <img src="{{ $insight->image_url }}" alt="{{ $insight->title }}" class="w-full h-full object-cover">
            </div>

            <div data-aos="fade-up" data-aos-delay="200" class="prose prose-lg lg:prose-xl prose-p:font-medium prose-p:leading-relaxed prose-headings:font-extrabold prose-headings:uppercase prose-headings:tracking-tight prose-a:text-[#0033a0] prose-a:font-bold max-w-none text-gray-800">
                {!! nl2br(e($insight->content)) !!}
            </div>
            
            <div class="mt-16 pt-8 border-t-[4px] border-black flex flex-col md:flex-row items-center justify-between gap-6" data-aos="fade-up">
                <h3 class="text-xl font-extrabold uppercase tracking-widest">Bagikan Rekaman Ini:</h3>
                <div class="flex gap-4">
                    <a href="https://wa.me/?text={{ rawurlencode($insight->title . ' - ' . request()->url()) }}" target="_blank" class="w-12 h-12 flex items-center justify-center bg-black text-white hover:theme-bg hover:-translate-y-1 transition-all border-2 border-transparent hover:border-black rounded-sm shadow-[4px_4px_0_#0033a0]">
                        WA
                    </a>
                    <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ rawurlencode(request()->url()) }}&title={{ rawurlencode($insight->title) }}" target="_blank" class="w-12 h-12 flex items-center justify-center bg-black text-white hover:theme-bg hover:-translate-y-1 transition-all border-2 border-transparent hover:border-black rounded-sm shadow-[4px_4px_0_#0033a0]">
                        IN
                    </a>
                </div>
            </div>
        </div>
    </article>

    @if($related->count() > 0)
    <section class="py-20 bg-gray-50 border-b-[6px] theme-border">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-ui.section-heading 
                eyebrow="Terkait"
                title="Artikel Relevan"
            />
            
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8 mt-12">
                @foreach($related as $rel)
                    <article data-aos="fade-up" class="bg-white border-[4px] border-black flex flex-col group hover:-translate-y-2 hover:shadow-[12px_12px_0_#0033a0] transition-all h-full">
                        <a href="{{ route('insights.show', $rel->slug) }}" class="flex-grow flex flex-col">
                            <div class="w-full aspect-video bg-gray-100 overflow-hidden border-b-4 border-black relative">
                                <img src="{{ $rel->image_url }}" alt="{{ $rel->title }}" class="w-full h-full object-cover grayscale mix-blend-luminosity group-hover:grayscale-0 group-hover:mix-blend-normal transition-all duration-700">
                            </div>
                            <div class="p-6 flex-grow flex flex-col justify-between">
                                <div>
                                    <h3 class="text-xl font-extrabold uppercase leading-tight tracking-tight mb-4 group-hover:text-[#0033a0] transition-colors">
                                        {{ $rel->title }}
                                    </h3>
                                </div>
                                <div class="inline-flex items-center gap-2 font-bold uppercase tracking-widest text-xs text-black group-hover:text-[#0033a0] transition-colors mt-auto pt-6 border-t-2 border-gray-100">
                                    BACA
                                </div>
                            </div>
                        </a>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <x-ui.cta-banner />
@endsection
