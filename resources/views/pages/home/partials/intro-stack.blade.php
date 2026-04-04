<section class="bg-slate-950 py-20 text-white relative border-b-4 theme-border content-auto">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">
            <div class="grid grid-cols-2 gap-6 relative">
                <div class="aspect-square bg-gray-900 border-4 border-white overflow-hidden shadow-[0_18px_40px_rgba(0,0,0,0.28)]">
                    <x-ui.responsive-image
                        :src="asset('images/optimized/founder-650.webp')"
                        :webp="asset('images/optimized/founder-650.webp')"
                        :avif="asset('images/optimized/founder-650.avif')"
                        :webp-srcset="asset('images/optimized/founder-320.webp') . ' 320w, ' . asset('images/optimized/founder-650.webp') . ' 650w'"
                        :avif-srcset="asset('images/optimized/founder-320.avif') . ' 320w, ' . asset('images/optimized/founder-650.avif') . ' 650w'"
                        alt="Founder Proude Tech"
                        width="650"
                        height="661"
                        sizes="(min-width: 1024px) 320px, 50vw"
                        class="w-full h-full object-cover"
                    />
                </div>
                <div class="aspect-square bg-gray-900 border-4 border-white overflow-hidden shadow-[0_18px_40px_rgba(0,0,0,0.28)] lg:translate-y-6">
                    <x-ui.responsive-image
                        :src="asset('images/optimized/service-650.webp')"
                        :webp="asset('images/optimized/service-650.webp')"
                        :avif="asset('images/optimized/service-650.avif')"
                        :webp-srcset="asset('images/optimized/service-320.webp') . ' 320w, ' . asset('images/optimized/service-650.webp') . ' 650w'"
                        :avif-srcset="asset('images/optimized/service-320.avif') . ' 320w, ' . asset('images/optimized/service-650.avif') . ' 650w'"
                        alt="Layanan Proude Tech"
                        width="643"
                        height="658"
                        sizes="(min-width: 1024px) 320px, 50vw"
                        class="w-full h-full object-cover"
                    />
                </div>
            </div>
            <div class="mt-8 lg:mt-0">
                <x-ui.section-heading
                    eyebrow="Filosofi Teknologi"
                    title="Lebih dari sekadar kode."
                    description="Kami tidak hanya membangun sistem, kami menciptakan solusi digital yang membantu bisnis Anda berkembang, lebih efisien, dan siap bersaing di era digital."
                    dark="true"
                />
                <div class="flex flex-wrap gap-3 mt-6">
                    @foreach ($stackItems as $item)
                        <div class="border-[2px] border-gray-800 bg-gray-900 px-4 py-2 text-xs font-bold uppercase tracking-widest text-gray-300 transition-colors hover:border-white">
                            {{ $item }}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
