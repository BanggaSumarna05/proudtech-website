@extends('layouts.public')

@section('content')
    @php
        $waNumber = preg_replace('/\D+/', '', (string) $siteSettings->whatsapp_number);
        $waLink = $waNumber ? 'https://wa.me/' . $waNumber . '?text=' . rawurlencode('Saya ingin konsultasi') : route('consultation.create');
    @endphp

    <section class="bg-gray-50 py-20 lg:py-24 min-h-[85vh] flex items-center border-b-[8px] border-black">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid gap-12 lg:gap-16 lg:grid-cols-[0.9fr,1.1fr] w-full items-start">
            <div class="pt-4 lg:pt-12">
                <span class="inline-block bg-black text-white px-4 py-2 text-xs font-bold uppercase tracking-widest mb-5 border-b-4 border-transparent shadow-[4px_4px_0_#0033a0]">KOMUNIKASI TERPUSAT</span>
                <h1 class="text-5xl lg:text-7xl font-extrabold uppercase tracking-tighter leading-none text-black mb-6">
                    MULAI <br><span class="theme-text">.EKSEKUSI</span>
                </h1>
                <p class="text-lg text-gray-600 font-bold leading-relaxed mb-10 max-w-md border-l-[4px] theme-border pl-5">
                    Diskusikan parameter teknis spesifikasi sistem Anda, atau bypass admin via fast-track WA.
                </p>

                <div class="border-[4px] border-black p-8 bg-white shadow-[8px_8px_0_#000]">
                    <p class="text-xs font-extrabold uppercase tracking-widest text-gray-400 mb-4 border-b-2 border-gray-200 pb-3">DIRECT SYSTEM PORT</p>
                    <p class="text-2xl font-extrabold text-black mb-8">{{ $siteSettings->email }}</p>
                    <a href="{{ $waLink }}" class="inline-flex items-center justify-center gap-4 theme-bg text-white w-full py-4 text-sm font-bold uppercase tracking-widest hover:bg-black transition-colors border-[4px] border-transparent hover:border-black shadow-[4px_4px_0_#000]">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.711.848 3.146.849 3.182 0 5.767-2.585 5.767-5.766 0-3.181-2.585-5.767-5.767-5.767zm3.32 8.064c-.166.467-.96.933-1.358.933-.466 0-.932-.166-2.596-1.165-1.663-1.032-2.76-2.928-2.827-3.028-.066-.099-.665-.898-.665-1.73s.432-1.23.599-1.43c.166-.199.365-.232.499-.232.133 0 .265.033.365.265.099.233.365.864.398.931.033.066.066.166 0 .299-.066.133-.099.199-.199.332-.099.133-.232.266-.332.365-.099.099-.199.232-.066.465.133.232.599.965 1.264 1.564.864.765 1.597.998 1.83 1.131.233.133.365.099.499-.033.133-.133.599-.699.765-.931.166-.232.332-.199.532-.133.199.066 1.264.599 1.497.732.233.133.399.199.466.332.066.133.066.831-.101 1.297z"/></svg>    
                        FAST-TRACK WA
                    </a>
                </div>
            </div>

            <div class="border-[5px] border-black bg-white p-8 lg:p-12 shadow-[16px_16px_0_#0033a0]">
                <div class="mb-8 text-center md:text-left">
                    <h2 class="text-2xl font-extrabold uppercase tracking-tight text-black mb-2">FORMULIR IDENTIFIKASI</h2>
                    <p class="text-xs font-bold uppercase tracking-widest text-gray-500">INPUT DATA SISTEM YANG BERLAKU.</p>
                </div>
                <form method="POST" action="{{ route('contact.store') }}" class="space-y-6 text-black font-semibold">
                    @csrf
                    <div>
                        <label for="name" class="block text-xs font-bold uppercase tracking-widest mb-2">Identitas Relasi</label>
                        <input id="name" name="name" value="{{ old('name') }}" class="w-full px-4 py-3 bg-white border-[3px] border-black focus:ring-0 focus:border-[#0033a0] outline-none transition-colors rounded-none placeholder-gray-300 shadow-[4px_4px_0_#000] focus:shadow-[4px_4px_0_#0033a0]" required placeholder="NAMA LENGKAP">
                        <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-600 text-xs font-bold uppercase" />
                    </div>
                    <div>
                        <label for="email" class="block text-xs font-bold uppercase tracking-widest mb-2">Endpoint Surel</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" class="w-full px-4 py-3 bg-white border-[3px] border-black focus:ring-0 focus:border-[#0033a0] outline-none transition-colors rounded-none placeholder-gray-300 shadow-[4px_4px_0_#000] focus:shadow-[4px_4px_0_#0033a0]" required placeholder="EMAIL@SERVERANDA.COM">
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600 text-xs font-bold uppercase" />
                    </div>
                    <div>
                        <label for="phone" class="block text-xs font-bold uppercase tracking-widest mb-2">Line Telepon (Opsional)</label>
                        <input id="phone" name="phone" value="{{ old('phone') }}" class="w-full px-4 py-3 bg-white border-[3px] border-black focus:ring-0 focus:border-[#0033a0] outline-none transition-colors rounded-none placeholder-gray-300 shadow-[4px_4px_0_#000] focus:shadow-[4px_4px_0_#0033a0]" placeholder="+62 8XX XXXX XXXX">
                        <x-input-error :messages="$errors->get('phone')" class="mt-2 text-red-600 text-xs font-bold uppercase" />
                    </div>
                    <div>
                        <label for="message" class="block text-xs font-bold uppercase tracking-widest mb-2">Detail Log / Pesan</label>
                        <textarea id="message" name="message" rows="5" class="w-full px-4 py-3 bg-white border-[3px] border-black focus:ring-0 focus:border-[#0033a0] outline-none transition-colors rounded-none placeholder-gray-300 font-bold shadow-[4px_4px_0_#000] focus:shadow-[4px_4px_0_#0033a0]" required placeholder="JABARKAN RENCANA DIGITAL / MASALAHNYA...">{{ old('message') }}</textarea>
                        <x-input-error :messages="$errors->get('message')" class="mt-2 text-red-600 text-xs font-bold uppercase" />
                    </div>
                    <button type="submit" class="w-full bg-black text-white py-5 font-extrabold text-base uppercase tracking-widest hover:theme-bg hover:shadow-[8px_8px_0_#000] transition-all border-[4px] border-transparent hover:-translate-y-1">
                        TRANSMIT DATA
                    </button>
                </form>
            </div>
        </div>
    </section>
@endsection
