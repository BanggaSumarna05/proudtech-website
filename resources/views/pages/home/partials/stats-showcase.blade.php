<section class="py-0 bg-transparent relative content-auto">
    <div class="grid grid-cols-1 lg:grid-cols-[1fr,1.2fr]">
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
                <a href="{{ route('portfolio.index') }}" class="theme-bg text-white px-8 py-4 min-h-[56px] font-bold text-sm uppercase tracking-widest self-start border-2 border-transparent hover:bg-black transition-colors shadow-[4px_4px_0_#000]">Analisa Portofolio</a>
            </div>
            <div class="w-full aspect-[21/9] sm:aspect-video border-t-[5px] border-black overflow-hidden relative">
                <x-ui.responsive-image
                    :src="asset('images/optimized/kerjasama-800.webp')"
                    :webp="asset('images/optimized/kerjasama-800.webp')"
                    :avif="asset('images/optimized/kerjasama-800.avif')"
                    :webp-srcset="asset('images/optimized/kerjasama-400.webp') . ' 400w, ' . asset('images/optimized/kerjasama-800.webp') . ' 800w'"
                    :avif-srcset="asset('images/optimized/kerjasama-400.avif') . ' 400w, ' . asset('images/optimized/kerjasama-800.avif') . ' 800w'"
                    alt="Kolaborasi proyek Proude Tech"
                    width="334"
                    height="334"
                    sizes="(min-width: 1024px) 55vw, 100vw"
                    class="absolute inset-0 w-full h-full object-cover"
                />
            </div>
        </div>
    </div>
</section>
