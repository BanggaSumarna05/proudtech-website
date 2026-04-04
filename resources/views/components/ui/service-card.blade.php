@props(['service'])

<div class="bg-white border-[4px] border-black p-8 hover:-translate-y-1 hover:shadow-[8px_8px_0_#0033a0] transition-surface transform-gpu group cursor-pointer flex flex-col h-full min-h-[360px] relative overflow-hidden">
    <div class="absolute top-0 right-0 w-12 h-12 bg-gray-100 group-hover:theme-bg transition-colors z-0" style="clip-path: polygon(100% 0, 0 0, 100% 100%);"></div>
    
    <div class="w-16 h-16 theme-bg text-white flex items-center justify-center mb-6 shrink-0 relative z-10 border-2 border-black group-hover:bg-white group-hover:text-[#0033a0] transition-colors">
        <x-service-icon :icon="$service->icon" />
    </div>
    <h3 class="text-xl font-extrabold uppercase tracking-tight text-black mb-4 relative z-10">{{ $service->title }}</h3>
    <p class="text-sm font-semibold text-gray-600 leading-relaxed mb-8 flex-grow relative z-10 line-clamp-3">{{ $service->description }}</p>
    <div class="mt-auto pt-6 border-t-2 border-gray-200 flex items-center justify-between relative z-10">
        <span class="text-xs font-extrabold uppercase tracking-widest text-black">{{ $service->price_range }}</span>
        <a href="{{ route('services.show', $service) }}" class="w-10 h-10 flex items-center justify-center border-2 border-black group-hover:theme-bg group-hover:text-white group-hover:border-transparent transition-colors shadow-[4px_4px_0_#000]">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
        </a>
    </div>
</div>
