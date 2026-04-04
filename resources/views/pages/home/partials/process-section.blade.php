<section class="py-20 bg-white border-b-[6px] border-black content-auto">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-[0.9fr,1.1fr] gap-12 lg:gap-16 items-center">
            <div class="relative lg:-mx-8">
                <div class="aspect-[4/3] w-full border-[5px] border-black overflow-hidden relative z-10 shadow-[8px_8px_0_#0033a0]">
                    <x-ui.responsive-image
                        :src="asset('images/optimized/mengerjakan-960.webp')"
                        :webp="asset('images/optimized/mengerjakan-960.webp')"
                        :avif="asset('images/optimized/mengerjakan-960.avif')"
                        :webp-srcset="asset('images/optimized/mengerjakan-480.webp') . ' 480w, ' . asset('images/optimized/mengerjakan-960.webp') . ' 960w'"
                        :avif-srcset="asset('images/optimized/mengerjakan-480.avif') . ' 480w, ' . asset('images/optimized/mengerjakan-960.avif') . ' 960w'"
                        alt="Tim Proude Tech sedang mengerjakan project"
                        width="650"
                        height="661"
                        sizes="(min-width: 1024px) 46vw, 100vw"
                        class="w-full h-full object-cover"
                    />
                </div>
            </div>

            <div>
                <x-ui.section-heading
                    eyebrow="Protokol Eksekusi"
                    title="Strategi Eksekusi."
                />

                <div class="space-y-6">
                    @foreach ($process as $idx => $step)
                        <div class="flex gap-5 items-start relative">
                            <div class="text-3xl font-extrabold text-transparent [-webkit-text-stroke:2px_#000] mt-1">0{{ $idx + 1 }}</div>
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
