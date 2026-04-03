@extends('layouts.public')

@section('content')
    <!-- HEADER -->
    <section class="bg-white py-16 lg:py-24 border-b-[6px] theme-border relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid gap-12 lg:grid-cols-[0.9fr,1.1fr] relative z-10 items-center">
            <div>
                <span class="inline-block bg-black text-white px-4 py-1.5 text-xs font-bold uppercase tracking-widest mb-6 shadow-[4px_4px_0_#0033a0]">Proude Tech Core</span>
                <h1 class="text-5xl lg:text-7xl font-extrabold uppercase tracking-tighter leading-none text-black">
                  BEYOND  <br><span class="theme-text"> TEMPLATES.</span><br>BUILDING REAL SYSTEMS.



                </h1>
            </div>
            <div class="space-y-6 text-lg leading-relaxed text-gray-700 font-bold flex flex-col justify-center border-l-[4px] border-black pl-6">
                <p>Proude Tech membantu bisnis membangun website dan sistem digital yang terstruktur, stabil, dan siap digunakan dalam operasional nyata.</p>
                <p class="text-gray-500 text-base">Kami fokus pada hasil: <Br>alur kerja yang rapi, <Br>sistem yang mudah dikelola, <Br>dan performa yang bisa diandalkan untuk jangka panjang.</p>
            </div>
        </div>
    </section>

    <!-- VISI MISI POSITIONING -->
    <section class="py-20 bg-gray-50 border-b-[4px] border-black">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid gap-8 md:grid-cols-3">
            <div class="bg-white border-[4px] border-black p-8 shadow-[8px_8px_0_#0033a0] hover:-translate-y-2 transition-transform">
                <p class="text-sm font-extrabold uppercase tracking-widest theme-text mb-6 border-b-[4px] theme-border pb-3 w-1/3">VISI</p>
                <h2 class="text-xl font-extrabold uppercase tracking-tight text-black leading-snug">Membantu bisnis berkembang melalui solusi digital yang stabil, scalable, dan berorientasi hasil.</h2>
            </div>
            <div class="bg-white border-[4px] border-black p-8 shadow-[8px_8px_0_#000] hover:-translate-y-2 transition-transform">
                <p class="text-sm font-extrabold uppercase tracking-widest text-black mb-6 border-b-[4px] border-black pb-3 w-1/3">MISI</p>
                <h2 class="text-xl font-extrabold uppercase tracking-tight text-black leading-snug">Menerjemahkan kebutuhan bisnis menjadi sistem digital yang efektif dan mudah digunakan.</h2>
            </div>
            <div class="bg-black text-white border-[4px] border-black p-8 shadow-[8px_8px_0_#0033a0] hover:-translate-y-2 transition-transform">
                <p class="text-sm font-extrabold uppercase tracking-widest theme-text mb-6 border-b-[4px] theme-border pb-3 w-1/3 text-white">POSITION.</p>
                <h2 class="text-xl font-extrabold uppercase tracking-tight text-white leading-snug">Kami memandu persimpangan emas antara estetika murni premium dan stabilitas <span class="theme-text">technical engineering.</span></h2>
            </div>
        </div>
    </section>

    <!-- WHY CHOOSE US -->
    <section class="bg-slate-950 py-24 lg:py-28 text-white border-b-[8px] theme-border">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid gap-12 lg:grid-cols-2 items-start">
            <div>
                <x-ui.section-heading 
                    eyebrow="Komitmen Kami" 
                    title="Hasil .Bukan Tren."
                    description="Pondasi program arsitektur kami ditentukan eksklusif oleh KPI performa aplikasi, bukan mengikuti selera visual pasar temporer."
                    dark="true"
                />
            </div>
            <div class="grid gap-5">
                @foreach ($principles as $idx => $principle)
                    <div class="border-l-[6px] theme-border bg-gray-900 border border-gray-800 p-6 flex items-start gap-5 hover:bg-black transition-colors relative group overflow-hidden">
                        <div class="text-3xl font-extrabold text-transparent [-webkit-text-stroke:2px_#0033a0] font-display">0{{ $idx+1 }}</div>
                        <div class="text-base font-bold text-gray-200 uppercase tracking-widest leading-relaxed pt-1">{{ $principle }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- HOW WE WORK -->
    <section class="py-24 bg-white relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-16 flex flex-col items-center">
                <span class="inline-block bg-black text-white px-5 py-2 text-xs font-bold uppercase tracking-widest mb-6 shadow-[4px_4px_0_#0033a0]">STANDAR OPERASIONAL</span>
                <h2 class="text-4xl lg:text-5xl font-extrabold uppercase tracking-tighter text-black">TAHAPAN <span class="theme-text">.PROSES</span></h2>
            </div>
            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-4">
                @foreach ($process as $idx => $step)
                    <div class="border-[3px] border-black p-6 sm:p-8 shadow-[8px_8px_0_#000] bg-white group hover:-translate-y-2 hover:-translate-x-2 hover:shadow-[12px_12px_0_#0033a0] transition-all flex flex-col items-start h-full">
                        <div class="w-12 h-12 theme-bg text-white font-extrabold flex items-center justify-center text-2xl mb-6 group-hover:bg-black transition-colors">
                            {{ $idx+1 }}
                        </div>
                        <p class="text-xs font-extrabold uppercase tracking-widest text-gray-400 mb-4 border-b-[3px] border-gray-200 pb-2 w-full">TINGKAT 0{{ $idx+1 }}</p>
                        <h3 class="text-xl font-extrabold uppercase tracking-tight text-black leading-snug">{{ $step }}</h3>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <x-ui.cta-banner />
@endsection
