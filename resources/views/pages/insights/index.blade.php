@extends('layouts.public')

@section('content')
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-16 lg:pt-20 pb-32">
        <x-ui.section-heading 
            eyebrow="B2B Insights"
            title="Engineering Notes & Thought Leadership"
            description="Analisis mendalam, studi kasus teknologi seluler, dan wawasan arsitektur berskala enterprise untuk Anda."
        />

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8 mt-12 content-auto">
            @forelse($insights as $insight)
                <article class="bg-white border-[4px] border-black flex flex-col group hover:-translate-y-1 hover:shadow-[8px_8px_0_#0033a0] transition-surface transform-gpu h-full min-h-[420px]">
                    <a href="{{ route('insights.show', $insight->slug) }}" class="flex-grow flex flex-col">
                        <div class="w-full aspect-video bg-gray-100 overflow-hidden border-b-4 border-black relative">
                            <x-ui.responsive-image
                                :src="$insight->image_url"
                                :webp="$insight->image_webp_url"
                                :avif="$insight->image_avif_url"
                                :alt="$insight->title"
                                :width="$insight->image_width"
                                :height="$insight->image_height"
                                sizes="(min-width: 1024px) 33vw, (min-width: 640px) 50vw, 100vw"
                                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-[1.02]"
                            />
                        </div>
                        <div class="p-6 lg:p-8 flex-grow flex flex-col justify-between">
                            <div>
                                <div class="text-xs font-bold tracking-widest text-[#0033a0] mb-3 uppercase">
                                    {{ $insight->created_at->format('M d, Y') }}
                                </div>
                                <h3 class="text-2xl font-extrabold uppercase leading-tight tracking-tight mb-4 group-hover:text-[#0033a0] transition-colors">
                                    {{ $insight->title }}
                                </h3>
                                <p class="text-gray-600 font-semibold mb-6">
                                    {{ \Illuminate\Support\Str::limit($insight->excerpt ?? strip_tags($insight->content), 120) }}
                                </p>
                            </div>
                            <div class="inline-flex items-center gap-2 font-bold uppercase tracking-widest text-sm text-black group-hover:text-[#0033a0] transition-colors mt-auto pt-6 border-t-2 border-gray-100">
                                BACA ARTIKEL
                                <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                            </div>
                        </div>
                    </a>
                </article>
            @empty
                <div class="col-span-full py-24 text-center border-4 border-black bg-white">
                    <div class="w-16 h-16 bg-gray-100 text-gray-400 mx-auto flex items-center justify-center mb-6">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                    </div>
                    <h3 class="text-xl font-extrabold uppercase mb-2">Belum Ada Artikel</h3>
                    <p class="text-gray-600 font-medium">Tim engineering kami sedang menyusun wawasan terbaru.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-16">
            {{ $insights->links() }}
        </div>
    </section>

    <x-ui.cta-banner />
@endsection
