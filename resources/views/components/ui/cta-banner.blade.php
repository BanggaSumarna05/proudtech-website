@props([
    'title' => 'NO ROOM FOR',
    'highlight' => '.COMPROMISE',
    'description' => 'Infrastruktur digital Anda memerlukan ekskusi tingkat lanjut. Hubungi arsitek sistem teknis kami hari ini.',
    'buttonText' => 'Jadwal Konsultasi',
    'buttonLink' => null,
])

@php
    $buttonLink = $buttonLink ?? route('consultation.create');
@endphp

<section data-aos="fade-up" class="py-20 bg-gray-100 relative overflow-hidden border-t-[8px] theme-border">
    <!-- Abstract Structural BG -->
    <div class="absolute top-0 right-0 w-1/2 h-full opacity-[0.03] pointer-events-none">
        <svg viewBox="0 0 100 100" class="w-full h-full" preserveAspectRatio="none">
            <polygon points="0,100 100,0 100,100" fill="#000000" />
        </svg>
    </div>
    
    <div class="max-w-5xl mx-auto text-center px-4 relative z-10">
        <h2 class="text-5xl md:text-7xl font-extrabold uppercase tracking-tighter text-black mb-8 leading-none">
            {{ $title }} <br><span class="text-transparent [-webkit-text-stroke:2px_#0033a0]">{{ $highlight }}</span>
        </h2>
        <p class="text-lg md:text-xl text-gray-700 mb-12 font-bold max-w-2xl mx-auto leading-relaxed">
            {{ $description }}
        </p>
        <div class="flex flex-col sm:flex-row justify-center gap-6">
            <a href="{{ $buttonLink }}" class="bg-black text-white px-8 py-4 font-extrabold text-sm uppercase tracking-widest hover:theme-bg border-4 border-transparent transition-colors shadow-[8px_8px_0_#0033a0] hover:-translate-y-1 hover:shadow-[12px_12px_0_#0033a0]">
                {{ $buttonText }}
            </a>
            <a href="{{ preg_replace('/\D+/', '', (string) ($siteSettings->whatsapp_number ?? '')) ? 'https://wa.me/' . preg_replace('/\D+/', '', (string) ($siteSettings->whatsapp_number ?? '')) : route('contact.index') }}" class="bg-transparent text-black border-4 border-black px-8 py-4 font-extrabold text-sm uppercase tracking-widest hover:bg-black hover:text-white transition-colors flex items-center justify-center gap-3">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.711.848 3.146.849 3.182 0 5.767-2.585 5.767-5.766 0-3.181-2.585-5.767-5.767-5.767zm3.32 8.064c-.166.467-.96.933-1.358.933-.466 0-.932-.166-2.596-1.165-1.663-1.032-2.76-2.928-2.827-3.028-.066-.099-.665-.898-.665-1.73s.432-1.23.599-1.43c.166-.199.365-.232.499-.232.133 0 .265.033.365.265.099.233.365.864.398.931.033.066.066.166 0 .299-.066.133-.099.199-.199.332-.099.133-.232.266-.332.365-.099.099-.199.232-.066.465.133.232.599.965 1.264 1.564.864.765 1.597.998 1.83 1.131.233.133.365.099.499-.033.133-.133.599-.699.765-.931.166-.232.332-.199.532-.133.199.066 1.264.599 1.497.732.233.133.399.199.466.332.066.133.066.831-.101 1.297z"/></svg>
                Fast-Track WA
            </a>
        </div>
    </div>
</section>
