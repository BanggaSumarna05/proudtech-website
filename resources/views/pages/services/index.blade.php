@extends('layouts.public')

@section('content')
    <section class="bg-white py-20 lg:py-24 border-b-[8px] border-black">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-16 text-center md:text-left">
                <span class="inline-block border-2 border-black bg-black text-white px-4 py-2 text-xs font-bold uppercase tracking-widest mb-6 shadow-[4px_4px_0_#0033a0]">SERVICES / CAPABILITY</span>
                <h1 class="text-5xl lg:text-7xl font-extrabold uppercase tracking-tighter text-black leading-none mb-6">
                    ARSITEKTUR <br><span class="theme-text">.EKSEKUSI</span>
                </h1>
                <p class="mt-6 max-w-2xl text-lg font-semibold leading-relaxed text-gray-600 border-l-[4px] border-black pl-5">
                    Modul layanan dirancang absolut pada efisiensi operasional. Kami memangkas proses yang redundan tanpa menurunkan metrik kualitas performa.
                </p>
            </div>

            <div class="grid gap-8 md:grid-cols-2 xl:grid-cols-3">
                @foreach ($services as $service)
                    <x-ui.service-card :service="$service" />
                @endforeach
            </div>

            <div class="mt-16">
                {{ $services->links() }}
            </div>
        </div>
    </section>
@endsection
