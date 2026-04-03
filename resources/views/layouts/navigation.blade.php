@php
    $navItems = [
        ['label' => 'Dashboard', 'route' => 'dashboard', 'match' => ['dashboard']],
        ['label' => 'Layanan', 'route' => 'dashboard.services.index', 'match' => ['dashboard.services.*']],
        ['label' => 'Portofolio', 'route' => 'dashboard.portfolio.index', 'match' => ['dashboard.portfolio.*']],
        ['label' => 'Insights', 'route' => 'dashboard.insights.index', 'match' => ['dashboard.insights.*']],
        ['label' => 'Leads', 'route' => 'dashboard.leads.index', 'match' => ['dashboard.leads.*']],
        ['label' => 'Pengaturan', 'route' => 'dashboard.settings.edit', 'match' => ['dashboard.settings.*']],
    ];
@endphp

<div x-data="{ sidebarOpen: false }" class="min-h-screen lg:flex">
    <div
        x-show="sidebarOpen"
        x-transition.opacity
        class="fixed inset-0 z-30 bg-slate-950/40 lg:hidden"
        @click="sidebarOpen = false"
    ></div>

    <aside
        :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'"
        class="fixed inset-y-0 left-0 z-40 flex w-72 flex-col border-r-[6px] border-[#0033a0] bg-black px-6 py-6 text-white transition-transform duration-300 lg:translate-x-0"
    >
        <div class="flex items-center justify-between">
            <a href="{{ route('dashboard') }}" class="text-white">
                <img src="{{ asset('images/img_Proudtech/Logo Proud Tech.png') }}" alt="Proud Tech Logo" class="h-10 w-auto drop-shadow-md brightness-0 invert">
            </a>

            <button type="button" class="rounded-full border border-white/15 p-2 lg:hidden" @click="sidebarOpen = false">
                <span class="sr-only">Close navigation</span>
                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <div class="mt-10 space-y-2">
            @foreach ($navItems as $item)
                @php
                    $active = collect($item['match'])->contains(fn ($pattern) => request()->routeIs($pattern));
                @endphp
                <a
                    href="{{ route($item['route']) }}"
                    class="{{ $active ? 'bg-[#0033a0] text-white border-2 border-white shadow-[4px_4px_0_#fff]' : 'text-slate-300 hover:bg-gray-900 border-2 border-transparent hover:border-gray-700' }} flex items-center justify-between px-4 py-3 text-sm font-bold uppercase tracking-widest transition-all mb-3"
                >
                    <span>{{ $item['label'] }}</span>
                    @if ($active)
                        <span class="bg-white px-2 py-1 text-[10px] uppercase tracking-widest text-[#0033a0] font-black">Aktif</span>
                    @endif
                </a>
            @endforeach
        </div>

        <div class="mt-auto rounded-3xl border border-white/10 bg-white/5 p-5">
            <p class="text-xs uppercase tracking-[0.24em] text-slate-400">Masuk sebagai</p>
            <div class="mt-3">
                <p class="font-semibold">{{ Auth::user()->name }}</p>
                <p class="text-sm text-slate-400">{{ Auth::user()->email }}</p>
            </div>
            <div class="mt-5 flex flex-col gap-2">
                <a href="{{ route('profile.edit') }}" class="w-full text-center border-2 border-white bg-black px-4 py-3 text-xs font-bold uppercase tracking-widest hover:bg-white hover:text-black transition-colors">Pengaturan Profil</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-center border-2 border-white bg-black px-4 py-3 text-xs font-bold uppercase tracking-widest text-red-500 border-red-500 hover:bg-red-500 hover:text-white transition-colors">Keluar Portal</button>
                </form>
            </div>
        </div>
    </aside>

    <div class="flex-1 lg:pl-72">
        <header class="sticky top-0 z-20 border-b-[4px] border-black bg-white">
            <div class="max-w-screen-2xl mx-auto px-6 flex items-center justify-between gap-4 py-5">
                <div class="flex items-center gap-3">
                    <button type="button" class="rounded-full border border-slate-200 p-2 text-slate-700 lg:hidden" @click="sidebarOpen = true">
                        <span class="sr-only">Open navigation</span>
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 7h16M4 12h16M4 17h16" />
                        </svg>
                    </button>
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-[0.24em] text-brand-600">Area admin</p>
                        <div class="mt-1 text-2xl font-display text-slate-950">
                            {{ isset($header) ? $header : 'Dashboard' }}
                        </div>
                    </div>
                </div>

                <a href="{{ route('home') }}" class="border-2 border-black bg-[#0033a0] text-white px-6 py-2.5 text-xs font-bold uppercase tracking-widest shadow-[4px_4px_0_#000] hover:translate-x-1 hover:translate-y-1 hover:shadow-none transition-all">Lihat Website</a>
            </div>
        </header>

        <main class="shell py-8">
            <x-flash-message />
            {{ $slot }}
        </main>
    </div>
</div>
