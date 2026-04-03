@extends('layouts.public')

@section('content')
    <section class="bg-gray-50 py-20 lg:py-24 border-b-[8px] border-black">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid gap-12 lg:gap-16 lg:grid-cols-[1fr,0.8fr] items-start">
            <div class="pt-6">
                <span class="inline-block bg-black text-white px-4 py-1.5 text-xs font-bold uppercase tracking-widest mb-6 shadow-[4px_4px_0_#0033a0]">ENDPOINT DETAIL</span>
                <h1 class="font-extrabold text-5xl lg:text-6xl leading-none tracking-tighter text-black uppercase mb-6">{{ $service->title }}</h1>
                <p class="text-lg md:text-xl font-bold leading-relaxed text-gray-700 border-l-[4px] theme-border pl-5 max-w-2xl">{{ $service->description }}</p>
            </div>
            <div class="bg-white border-[5px] border-black p-8 lg:p-10 shadow-[12px_12px_0_#0033a0] mt-4 lg:mt-0 relative overflow-hidden">
                <div class="absolute -right-6 -top-6 w-20 h-20 theme-bg transform rotate-45 opacity-20 border-[4px] border-white z-0"></div>
                <div class="relative z-10">
                    <p class="text-xs font-extrabold uppercase tracking-widest text-gray-400 mb-4 border-b-[3px] border-gray-200 pb-3">PARAMETER HARGA</p>
                    <p class="text-4xl lg:text-5xl font-extrabold uppercase tracking-tighter text-black mb-6">{{ $service->price_range }}</p>
                    <p class="text-sm font-semibold leading-relaxed text-gray-600 mb-8">Setiap formasi operasional dimulai dari discovery proposal arsitektur agar modal dikonversikan pada perbaikan akurat operasional core bisnis.</p>
                    <a href="{{ route('consultation.create') }}" class="inline-flex items-center justify-center gap-3 w-full bg-black text-white py-5 font-bold text-xs uppercase tracking-widest hover:theme-bg hover:-translate-y-1 hover:shadow-[6px_6px_0_#000] transition-all border-[4px] border-transparent hover:border-black shadow-[4px_4px_0_#000]">
                        VALIDASI SCOPE INFRASTRUKTUR
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 lg:py-24 bg-white border-b-4 border-black">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid gap-8 md:gap-12 lg:grid-cols-2">
            <div class="border-[4px] border-black p-8 lg:p-10 bg-gray-50 shadow-[8px_8px_0_#000] hover:-translate-y-1 transition-transform">
                <p class="text-xs font-extrabold uppercase tracking-widest text-gray-500 mb-6 pb-2 border-b-2 border-gray-200 inline-block">IDENTIFIKASI REDUNDANSI (MASALAH)</p>
                <p class="text-lg font-bold leading-relaxed text-gray-800">{{ $service->problem_statement }}</p>
            </div>
            <div class="border-[4px] border-black p-8 lg:p-10 bg-black text-white shadow-[8px_8px_0_#0033a0] hover:-translate-y-1 transition-transform">
                <p class="text-xs font-extrabold uppercase tracking-widest text-gray-400 mb-6 pb-2 border-b-2 theme-border inline-block">RESOLUSI TEKNIS AKTIF</p>
                <p class="text-lg font-bold leading-relaxed text-white">{{ $service->solution_statement }}</p>
            </div>
        </div>
    </section>

    <section class="bg-slate-950 py-20 lg:py-24 text-white border-b-[8px] theme-border relative overflow-hidden">
        <div class="absolute -left-32 top-0 w-[400px] h-[400px] border-[30px] border-gray-800 opacity-20 transform rotate-45 pointer-events-none z-0"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid gap-12 lg:grid-cols-2 relative z-10">
            <div>
                <span class="inline-block bg-white text-black px-4 py-2 text-xs font-bold uppercase tracking-widest mb-8 shadow-[4px_4px_0_#000]">KOMPONEN FITUR</span>
                <div class="grid gap-4">
                    @foreach ($service->feature_list as $feature)
                        <div class="border-[3px] border-gray-800 bg-black p-5 text-sm font-bold uppercase tracking-wide text-gray-200 shadow-[4px_4px_0_#000] hover:border-gray-500 transition-colors flex gap-4">
                            <span class="theme-text">>></span>
                            {{ $feature }}
                        </div>
                    @endforeach
                </div>
            </div>
            <div>
                <span class="inline-block theme-bg text-white px-4 py-2 text-xs font-bold uppercase tracking-widest mb-8 border-2 border-transparent">MANFAAT OPERASIONAL</span>
                <div class="grid gap-4">
                    @foreach ($service->benefit_list as $benefit)
                        <div class="border-[3px] theme-border bg-gray-900 p-5 text-sm font-bold uppercase tracking-wide text-gray-200 shadow-[4px_4px_0_#0033a0] hover:border-white transition-colors flex gap-4">
                            <span class="text-white">>></span>
                            {{ $benefit }}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    @if ($relatedServices->isNotEmpty())
        <section class="py-20 lg:py-24 bg-gray-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <span class="inline-block border-[2px] border-black text-black px-4 py-2 text-xs font-bold uppercase tracking-widest mb-8 shadow-[4px_4px_0_#000]">MODUL TERKAIT</span>
                <div class="grid gap-8 md:grid-cols-3">
                    @foreach ($relatedServices as $relatedService)
                        <x-ui.service-card :service="$relatedService" />
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    <x-ui.cta-banner />
@endsection
