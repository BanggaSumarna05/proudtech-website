@props(['eyebrow', 'title', 'highlight' => '', 'description' => '', 'dark' => false])

<div class="mb-10 lg:mb-12" data-aos="fade-up">
    <span class="inline-block {{ $dark ? 'bg-white text-black' : 'bg-black text-white' }} px-4 py-2 text-xs font-bold uppercase tracking-widest mb-6 shadow-[4px_4px_0_#0033a0]">
        {{ $eyebrow }}
    </span>
    <h2 class="{{ $dark ? 'text-white' : 'text-black' }} text-4xl lg:text-5xl font-extrabold uppercase tracking-tighter leading-tight mb-6">
        {{ $title }}
        @if($highlight)
            <br><span class="theme-text">{{ $highlight }}</span>
        @endif
    </h2>
    @if($description)
        <p class="max-w-2xl text-lg lg:text-xl font-bold leading-relaxed {{ $dark ? 'text-gray-400' : 'text-gray-600' }} border-l-[4px] border-black pl-6">
            {{ $description }}
        </p>
    @endif
</div>
