@extends('layouts.public')

@section('content')
    <section class="bg-gray-50 py-20 lg:py-24 min-h-screen border-b-[8px] theme-border">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid gap-12 lg:gap-16 lg:grid-cols-[0.9fr,1.1fr] w-full items-start">
            <div class="pt-4 lg:pt-12">
                <span class="inline-block bg-black text-white px-4 py-2 text-xs font-bold uppercase tracking-widest mb-6 shadow-[4px_4px_0_#0033a0]">KONSULTASI TEKNIKAL</span>
                <h1 class="text-5xl lg:text-7xl font-extrabold uppercase tracking-tighter leading-none text-black mb-6">
                    MAPPING <br><span class="theme-text">.SCOPE</span>
                </h1>
                <p class="text-lg text-gray-600 font-bold leading-relaxed mb-10 max-w-md border-l-[4px] border-black pl-5">
                    Aktivasi proyek dimulai dari pendataan parameter mutlak: budget, batasan waktu, & KPI performa.
                </p>

                <div class="space-y-5">
                    <div class="border-[4px] border-black bg-white p-6 hover:-translate-y-1 transition-transform shadow-[8px_8px_0_#000] hover:shadow-[12px_12px_0_#0033a0]">
                        <p class="text-xs font-bold uppercase tracking-widest text-gray-500 border-b-2 border-gray-200 pb-2 mb-3">SLA RESPONSE</p>
                        <p class="text-3xl font-extrabold text-black uppercase tracking-tighter">MAX <span class="theme-text">1 X 24 JAM</span></p>
                    </div>
                </div>
            </div>

            <div class="border-[5px] border-black bg-white p-8 lg:p-12 shadow-[16px_16px_0_#0033a0]">
                <div class="mb-8 text-center md:text-left">
                    <h2 class="text-2xl font-extrabold uppercase tracking-tight text-black mb-2">REGISTER KONSULTASI</h2>
                </div>
                <form method="POST" action="{{ route('consultation.store') }}" class="space-y-6 text-black font-semibold">
                    @csrf
                    <div class="grid gap-6 md:grid-cols-2">
                        <div>
                            <label for="name" class="block text-xs font-extrabold uppercase tracking-widest mb-2">PIC Auth</label>
                            <input id="name" name="name" value="{{ old('name') }}" class="w-full px-4 py-3 bg-white border-[3px] border-black focus:ring-0 focus:border-[#0033a0] outline-none transition-colors rounded-none placeholder-gray-300 shadow-[4px_4px_0_#000]" required placeholder="NAMA LENGKAP">
                        </div>
                        <div>
                            <label for="email" class="block text-xs font-extrabold uppercase tracking-widest mb-2">Routing Surel</label>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" class="w-full px-4 py-3 bg-white border-[3px] border-black focus:ring-0 focus:border-[#0033a0] outline-none transition-colors rounded-none placeholder-gray-300 shadow-[4px_4px_0_#000]" required placeholder="ADMIN@CORP.COM">
                        </div>
                    </div>
                    <div class="grid gap-6 md:grid-cols-2">
                        <div>
                            <label for="business" class="block text-xs font-extrabold uppercase tracking-widest mb-2">Legalitas Bisnis</label>
                            <input id="business" name="business" value="{{ old('business') }}" class="w-full px-4 py-3 bg-white border-[3px] border-black focus:ring-0 focus:border-[#0033a0] outline-none transition-colors rounded-none placeholder-gray-300 shadow-[4px_4px_0_#000]" required placeholder="PT / PERUSAHAAN">
                        </div>
                        <div>
                            <label for="phone" class="block text-xs font-extrabold uppercase tracking-widest mb-2">Instruksi Telepon</label>
                            <input id="phone" name="phone" value="{{ old('phone') }}" class="w-full px-4 py-3 bg-white border-[3px] border-black focus:ring-0 focus:border-[#0033a0] outline-none transition-colors rounded-none placeholder-gray-300 shadow-[4px_4px_0_#000]" placeholder="+62 8XX">
                        </div>
                    </div>
                    <div>
                        <label for="budget" class="block text-xs font-extrabold uppercase tracking-widest mb-2">Kalkulasi Budget (IDR)</label>
                        <select id="budget" name="budget" class="w-full px-4 py-3 bg-white border-[3px] border-black focus:ring-0 focus:border-[#0033a0] outline-none transition-colors rounded-none font-bold uppercase tracking-widest text-[12px] shadow-[4px_4px_0_#000] appearance-none" required>
                            <option value="">>> DAFTAR PARAMETER NILAI <<</option>
                            @foreach (['< 10 juta', '10 - 25 juta', '25 - 50 juta', '> 50 juta'] as $budget)
                                <option value="{{ $budget }}" @selected(old('budget') === $budget)>{{ $budget }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="message" class="block text-xs font-extrabold uppercase tracking-widest mb-2">Dekomposisi Proyek</label>
                        <textarea id="message" name="message" rows="5" class="w-full px-4 py-3 bg-white border-[3px] border-black focus:ring-0 focus:border-[#0033a0] outline-none transition-colors rounded-none font-bold shadow-[4px_4px_0_#000] placeholder-gray-300" required placeholder="DESKRIPSIKAN STRUKTUR SISTEM...">{{ old('message') }}</textarea>
                    </div>
                    <button type="submit" class="w-full bg-black text-white py-5 font-extrabold text-base uppercase tracking-widest hover:theme-bg hover:shadow-[8px_8px_0_#000] hover:-translate-y-1 transition-all border-[4px] border-transparent shadow-[4px_4px_0_#000]">
                        KIRIM REQUEST KONSULTASI
                    </button>
                </form>
            </div>
        </div>
    </section>
@endsection
