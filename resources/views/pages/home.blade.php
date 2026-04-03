@extends('layouts.public')

@section('content')
    @php
        $heroGallery = [
            [
                'title' => 'Solusi Profesional',
                'caption' => 'Infrastruktur canggih yang membangun kredibilitas bisnis.',
                'image' => asset('images/img_Proudtech/Banner Home.jpg'),
            ],
        ];
        $stackItems = ['✔ Website lebih cepat & stabil  ', '✔ Sistem lebih efisien', '✔ Operasional bisnis lebih terkontrol'];
    @endphp

    <!-- HERO SECTION: Compact Rhythm -->
    <section class="relative bg-white pt-8 pb-20 overflow-hidden border-b-[6px] theme-border">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 lg:grid lg:grid-cols-[1.25fr,0.75fr] lg:gap-16 items-center">
            <div class="mb-12 lg:mb-0">
                <div class="inline-block bg-black text-white px-4 py-1.5 text-xs font-bold uppercase tracking-widest mb-6 shadow-[4px_4px_0_#0033a0]">
                    Elevating Digital Standards
                </div>
                <h1 class="font-extrabold text-5xl sm:text-6xl lg:text-7xl leading-tight text-black mb-6 tracking-tighter uppercase">
                    Bangun Website <br><span class="theme-text">& Sistem Digital</span> 
                    <br>yang Meningkatkan Bisnis Anda.
                </h1>
                <p class="text-lg text-gray-600 mb-8 max-w-lg leading-relaxed font-semibold">
                    Dari company profile hingga sistem custom kami bantu Anda terlihat profesional & meningkatkan konversi.
                     </p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('consultation.create') }}" class="theme-bg text-white px-8 py-4 font-bold text-sm uppercase tracking-widest text-center hover:bg-black transition-colors border-2 border-transparent hover:border-black">Konsultasi Gratis</a>
                    <a href="#services" class="bg-white text-black border-2 border-black px-8 py-4 font-bold text-sm uppercase tracking-widest text-center hover:bg-black hover:text-white transition-colors">Lihat Portfolio</a>
                </div>
            </div>
            
            <div class="relative">
                <div class="absolute -inset-4 border-[6px] theme-border translate-x-4 -translate-y-4 z-0 hidden lg:block"></div>
                <div class="relative z-10 w-full aspect-square sm:aspect-video lg:aspect-square max-h-[460px] bg-gray-100 overflow-hidden border-4 border-black">
                    <img src="{{ $heroGallery[0]['image'] }}" alt="Proude Tech Hero" class="w-full h-full object-cover grayscale hover:grayscale-0 transition-all duration-700">
                    <div class="absolute inset-0 bg-blue-900 opacity-20 mix-blend-multiply pointer-events-none"></div>
                    <!-- Caption Box -->
                    <div class="absolute bottom-0 right-0 bg-black p-6 border-l-[4px] theme-border max-w-xs shadow-2xl hidden sm:block">
                        <p class="text-xs font-bold uppercase tracking-widest text-white mb-2">{{ $heroGallery[0]['title'] }}</p>
                        <p class="text-xs font-medium text-gray-400">{{ $heroGallery[0]['caption'] }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- TRUST MARQUEE -->
    <section class="py-6 bg-black border-b-[4px] border-white overflow-hidden relative">
        <div class="flex whitespace-nowrap min-w-max animate-infinite-scroll items-center">
            @for ($i = 0; $i < 3; $i++)
                <div class="flex items-center justify-around gap-12 px-6">
                    <span class="text-xl lg:text-2xl font-extrabold uppercase tracking-widest text-white">Dibangun dengan Teknologi Modern untuk Website yang Cepat, Aman, dan Siap Scale</span>
                    <span class="text-xl lg:text-2xl font-extrabold text-blue-600">///</span>       
                </div>
            @endfor
        </div>
    </section>

    <!-- INTRO & STACK SECTION -->
    <section class="bg-slate-950 py-20 text-white relative border-b-4 theme-border">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">
                <div class="grid grid-cols-2 gap-6 relative">
                    <!-- Images -->
                    <div class="aspect-square bg-gray-900 border-4 border-white overflow-hidden transform lg:-translate-y-6 shadow-2xl">
                        <img src="{{ asset('images/img_Proudtech/Founder.PNG') }}" class="w-full h-full object-cover mix-blend-luminosity hover:mix-blend-normal transition-all duration-500 scale-110 hover:scale-100">
                    </div>
                    <div class="aspect-square bg-gray-900 border-4 border-white overflow-hidden transform lg:translate-y-6 shadow-2xl">
                        <img src="{{ asset('images/img_Proudtech/Service.PNG') }}" class="w-full h-full object-cover mix-blend-luminosity hover:mix-blend-normal transition-all duration-500 scale-110 hover:scale-100">
                    </div>
                </div>
                <!-- Content -->
                <div class="mt-8 lg:mt-0">
                    <x-ui.section-heading 
                        eyebrow="Filosofi Teknologi" 
                        title="Lebih dari sekadar kode."
                        description="Kami tidak hanya membangun sistem,
kami menciptakan solusi digital yang membantu bisnis Anda berkembang,
lebih efisien, dan siap bersaing di era digital."
                        dark="true"
                    />
                    <div class="flex flex-wrap gap-3 mt-6">
                        @foreach ($stackItems as $item)
                            <div class="border-[2px] border-gray-800 bg-gray-900 px-4 py-2 text-xs font-bold uppercase tracking-widest text-gray-300 hover:border-white transition-colors">
                                {{ $item }}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SERVICES -->
    <section id="services" class="py-20 bg-gray-50 border-b-[6px] border-black">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row justify-between items-end mb-12 pb-6 border-b-[3px] border-black">
                <div class="max-w-3xl">
                    <x-ui.section-heading 
                        eyebrow="Layanan " 
                        title="Solusi Digital Komprehensif"
                    />
                </div>
                <div class="mb-4 lg:mb-[68px]">
                    <a href="{{ route('services.index') }}" class="inline-flex items-center gap-2 bg-black text-white px-6 py-3 text-sm font-bold uppercase tracking-widest hover:theme-bg transition-colors">
                        Lihat Endpoint <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </a>
                </div>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($featuredServices as $service)
                    <x-ui.service-card :service="$service" />
                @endforeach
            </div>
        </div>
    </section>

    <!-- PROCESS & METHODOLOGY -->
    <section class="py-20 bg-white border-b-[6px] border-black">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-[0.9fr,1.1fr] gap-12 lg:gap-16 items-center">
                <div class="relative lg:-mx-8">
                    <div class="aspect-[4/3] w-full border-[5px] border-black overflow-hidden relative z-10 shadow-[8px_8px_0_#0033a0]">
                        <img src="{{ asset('images/img_Proudtech/Mengerjakan.PNG') }}" class="w-full h-full object-cover grayscale hover:grayscale-0 transition-all duration-700">
                    </div>
                </div>
                
                <div>
                    <x-ui.section-heading 
                        eyebrow="Protokol Eksekusi" 
                        title="Strategi Eksekusi."
                    />
                    
                    <div class="space-y-6">
                        @foreach ($process as $idx => $step)
                        <div class="flex gap-5 items-start group relative">
                            <div class="absolute -inset-3 bg-gray-50 opacity-0 group-hover:opacity-100 transition-opacity -z-10 border-l-[3px] theme-border"></div>
                            
                            <div class="text-3xl font-extrabold text-transparent [-webkit-text-stroke:2px_#000] group-hover:[-webkit-text-stroke:2px_#0033a0] transition-colors mt-1">0{{ $idx+1 }}</div>
                            <div class="pb-5">
                                <p class="text-base font-bold text-gray-900 leading-relaxed uppercase tracking-wider">{{ $step }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CASE STUDIES & STATS -->
    <section class="py-0 bg-transparent relative">
        <div class="grid grid-cols-1 lg:grid-cols-[1fr,1.2fr]">
            <!-- Stats -->
            <div class="bg-black text-white p-10 lg:p-14 flex flex-col justify-center">
                <div class="mb-10">
                    <h2 class="theme-text text-3xl lg:text-4xl font-extrabold uppercase tracking-tighter mb-4">Beberapa Proyek yang <span class="theme-text">Telah Kami Kerjakan</span></h2>
                    <p class="text-gray-400 text-sm font-semibold leading-relaxed max-w-sm">Kami mengukur keberhasilan murni dari data operasional dan tingkat efisiensi.</p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-px bg-gray-800 border-[2px] border-gray-800">
                    @foreach ($stats as $idx => $stat)
                        <x-ui.stat-card :value="$stat['value']" :label="$stat['label']" :colSpan="(count($stats) % 2 != 0 && $idx == count($stats) - 1)" />
                    @endforeach
                </div>
            </div>

            <!-- Case Study Feature -->
            <div class="bg-white border-l-0 lg:border-l-[8px] border-black flex flex-col">
                <div class="p-10 lg:p-14 flex-grow flex flex-col justify-center">
                    <span class="inline-block bg-black text-white px-3 py-1 text-xs font-bold uppercase tracking-widest mb-6 self-start">Contoh Project</span>
                    <h3 class="text-3xl font-extrabold uppercase tracking-tight mb-5 text-black">Sistem Rental Mobil</h3>
                    <p class="text-gray-600 mb-8 leading-relaxed font-semibold text-base max-w-lg">
                        ✔ Booking online otomatis <br>
                        ✔ Pembayaran terintegrasi <br>
                        ✔ Dashboard admin real-time <br>
                        ✔ Mengurangi proses manual hingga 70%
                    </p>
                    <a href="{{ route('portfolio.index') }}" class="theme-bg text-white px-8 py-4 font-bold text-sm uppercase tracking-widest self-start border-2 border-transparent hover:bg-black transition-colors shadow-[4px_4px_0_#000]">Analisa Portofolio</a>
                </div>
                <!-- Image -->
                <div class="w-full aspect-[21/9] sm:aspect-video border-t-[5px] border-black overflow-hidden relative">
                    <img src="{{ asset('images/img_Proudtech/Kerjasama.PNG') }}" class="absolute inset-0 w-full h-full object-cover filter contrast-125 grayscale hover:grayscale-0 transition-all duration-700">
                </div>
            </div>
        </div>
    </section>

    <!-- BOTTOM CTA -->
    <x-ui.cta-banner />

@endsection
