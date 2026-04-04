@extends('layouts.public')

@section('content')
    <section class="bg-gray-50 py-20 lg:py-24 border-b-[8px] border-black relative overflow-hidden">
        <div class="absolute -right-20 top-0 w-[500px] h-[500px] theme-bg opacity-[0.03] transform rotate-45 pointer-events-none z-0"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="mb-16 text-center md:text-left">
                <span class="inline-block bg-black text-white px-5 py-2 text-xs font-bold uppercase tracking-widest mb-6 shadow-[6px_6px_0_#0033a0]">CASE STUDIES</span>
                <h1 class="text-5xl lg:text-7xl font-extrabold uppercase tracking-tighter text-black leading-none mb-8">
                    LAPORAN <br><span class="theme-text">.EKSEKUSI</span>
                </h1>
                <p class="max-w-2xl text-lg font-bold leading-relaxed text-gray-700 border-l-[5px] border-black pl-6">
                    Koleksi riwayat deploy produk digital, website enterprise, & infrastruktur sistem. Bukti validasi arsitektur tangguh Proude Tech beroperasi secara riil di level produksi skala besar.
                </p>
            </div>

            <div class="grid gap-8 md:grid-cols-2 xl:grid-cols-3 content-auto">
                @foreach ($portfolios as $portfolio)
                    <x-ui.portfolio-card :portfolio="$portfolio" />
                @endforeach
            </div>

            <div class="mt-16">
                {{ $portfolios->links() }}
            </div>
        </div>
    </section>
@endsection
