<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title ?? config('app.name', 'Proude Tech') }}</title>
        <meta name="description" content="{{ $description ?? ($siteSettings->hero_subtitle ?? 'Kami membangun solusi enterprise, ekosistem digital, dan aplikasi performa tinggi untuk bisnis visioner.') }}">
        
        <!-- OpenGraph SEO Meta Tags -->
        <meta property="og:title" content="{{ $title ?? config('app.name', 'Proude Tech') }}">
        <meta property="og:description" content="{{ $description ?? ($siteSettings->hero_subtitle ?? 'Membangun solusi enterprise dan aplikasi performa tinggi untuk bisnis visioner.') }}">
        <meta property="og:image" content="{{ $ogImage ?? asset('images/img_Proudtech/Banner Home.jpg') }}">
        <meta property="og:url" content="{{ request()->url() }}">
        <meta property="og:type" content="website">
        <meta name="twitter:card" content="summary_large_image">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            body { font-family: 'Plus Jakarta Sans', sans-serif; }
            .theme-bg { background-color: #0033a0; }
            .theme-text { color: #0033a0; }
            .theme-border { border-color: #0033a0; }
            
            /* Marquee Animation Support */
            @keyframes infinite-scroll {
                0% { transform: translateX(0); }
                100% { transform: translateX(-50%); }
            }
            .animate-infinite-scroll {
                animation: infinite-scroll 25s linear infinite;
            }
        </style>
    </head>
    <body class="bg-gray-50 text-slate-900 antialiased selection:bg-[#0033a0] selection:text-white">
        @php
            $waNumber = preg_replace('/\D+/', '', (string) ($siteSettings->whatsapp_number ?? ''));
            $waLink = $waNumber ? 'https://wa.me/' . $waNumber . '?text=' . rawurlencode('Saya ingin konsultasi') : route('consultation.create');
            $publicNav = [
                ['label' => 'Beranda', 'route' => 'home'],
                ['label' => 'Tentang', 'route' => 'about'],
                ['label' => 'Layanan', 'route' => 'services.index'],
                ['label' => 'Portfolio', 'route' => 'portfolio.index'],
                ['label' => 'Insights', 'route' => 'insights.index'],
                ['label' => 'Kontak', 'route' => 'contact.index'],
            ];
        @endphp

        <div x-data="{ menuOpen: false }" class="min-h-screen flex flex-col">
            <header class="sticky top-0 z-50 border-b-2 border-gray-200 bg-white/95 backdrop-blur-md">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between h-20">
                    <a href="{{ route('home') }}" class="flex items-center gap-3">
                        <img src="{{ asset('images/img_Proudtech/Logo Proud Tech.png') }}" alt="Proude Tech Logo" class="h-10 w-auto object-contain">
                        <!-- If logo text is inside the image omit this, but providing stylized text is bulletproof: -->
                        <span class="font-extrabold text-2xl tracking-tighter text-black">PROUDE<span class="theme-text">TECH</span></span>
                    </a>

                    <nav class="hidden items-center gap-8 lg:flex">
                        @foreach ($publicNav as $item)
                            <a href="{{ route($item['route']) }}" class="{{ request()->routeIs($item['route']) ? 'theme-text font-bold' : 'text-gray-900 hover:theme-text font-semibold' }} text-sm uppercase tracking-widest transition-colors">
                                {{ $item['label'] }}
                            </a>
                        @endforeach
                    </nav>

                    <div class="hidden items-center gap-4 lg:flex">
                        <a href="{{ route('consultation.create') }}" class="text-sm font-bold uppercase tracking-widest text-gray-900 hover:theme-text transition-colors">Konsultasi</a>
                        <a href="{{ $waLink }}" class="theme-bg text-white px-6 py-2.5 text-sm font-bold uppercase tracking-widest hover:bg-slate-950 transition-colors border-2 border-transparent hover:border-black">Mulai Proyek</a>
                    </div>

                    <button type="button" class="lg:hidden text-gray-900 p-2" @click="menuOpen = !menuOpen">
                        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>

                <div x-show="menuOpen" x-transition class="border-t-2 border-black bg-white lg:hidden">
                    <div class="px-4 py-5 space-y-4">
                        @foreach ($publicNav as $item)
                            <a href="{{ route($item['route']) }}" class="block text-sm font-bold uppercase text-gray-900 tracking-widest">
                                {{ $item['label'] }}
                            </a>
                        @endforeach
                        <div class="pt-4 border-t-2 border-gray-200 flex flex-col gap-3">
                            <a href="{{ route('consultation.create') }}" class="block text-center text-sm font-bold uppercase tracking-widest border-2 border-black text-black py-3 hover:bg-black hover:text-white">Konsultasi Gratis</a>
                            <a href="{{ $waLink }}" class="block text-center text-sm font-bold uppercase tracking-widest theme-bg text-white py-3 border-2 border-transparent hover:border-black hover:bg-slate-950">WhatsApp Kami</a>
                        </div>
                    </div>
                </div>
            </header>

            <main class="flex-grow pb-16 lg:pb-0">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 absolute top-24 left-0 right-0 z-50">
                    <x-flash-message />
                </div>
                {{ $slot ?? '' }}
                @yield('content')
            </main>

            <!-- Sticky Mobile CTA -->
            <div class="fixed bottom-0 left-0 w-full z-50 lg:hidden" id="mobile-cta">
                <a href="{{ $waLink }}" class="flex items-center justify-center gap-3 theme-bg text-white w-full py-4 text-sm font-extrabold uppercase tracking-widest shadow-[0_-4px_10px_rgba(0,0,0,0.2)]">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.711.848 3.146.849 3.182 0 5.767-2.585 5.767-5.766 0-3.181-2.585-5.767-5.767-5.767zm3.32 8.064c-.166.467-.96.933-1.358.933-.466 0-.932-.166-2.596-1.165-1.663-1.032-2.76-2.928-2.827-3.028-.066-.099-.665-.898-.665-1.73s.432-1.23.599-1.43c.166-.199.365-.232.499-.232.133 0 .265.033.365.265.099.233.365.864.398.931.033.066.066.166 0 .299-.066.133-.099.199-.199.332-.099.133-.232.266-.332.365-.099.099-.199.232-.066.465.133.232.599.965 1.264 1.564.864.765 1.597.998 1.83 1.131.233.133.365.099.499-.033.133-.133.599-.699.765-.931.166-.232.332-.199.532-.133.199.066 1.264.599 1.497.732.233.133.399.199.466.332.066.133.066.831-.101 1.297z"/></svg>
                    KONSULTASI VIA WA
                </a>
            </div>

            <footer class="bg-slate-950 text-white py-12 lg:py-16 border-t-[8px] theme-border mt-auto">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
                        <div class="lg:col-span-1">
                            <div class="flex items-center gap-3 mb-6">
                                <img src="{{ asset('images/img_Proudtech/Logo Proud Tech.png') }}" class="h-10 filter brightness-0 invert" alt="Proude Tech">
                                <span class="font-extrabold text-2xl tracking-tighter text-white">PROUDE<span class="theme-text">TECH</span></span>
                            </div>
                            <p class="text-gray-400 text-sm leading-relaxed mb-6 font-medium">
                                Butuh website atau sistem untuk bisnis Anda? Tim kami siap membantu.
                            </p>
                        </div>

                        <div>
                            <h4 class="font-bold uppercase tracking-widest text-xs mb-6 theme-text">Sitemap</h4>
                            <div class="flex flex-col space-y-4 text-sm font-bold text-gray-400 tracking-wide uppercase">
                                <a href="{{ route('home') }}" class="hover:text-white transition-colors">Beranda</a>
                                <a href="{{ route('about') }}" class="hover:text-white transition-colors">Tentang Kami</a>
                                <a href="{{ route('services.index') }}" class="hover:text-white transition-colors">Layanan Kami</a>
                                <a href="{{ route('portfolio.index') }}" class="hover:text-white transition-colors">Portfolio Bisnis</a>
                                <a href="{{ route('insights.index') }}" class="hover:text-white transition-colors">B2B Insights</a>
                                <a href="{{ route('consultation.create') }}" class="hover:text-white transition-colors">Konsultasi Sistem</a>
                            </div>
                        </div>

                        <div>
                            <h4 class="font-bold uppercase tracking-widest text-xs mb-6 theme-text">Hubungi Kami</h4>
                            <div class="flex flex-col space-y-4 text-sm font-bold text-gray-400">
                                <p class="uppercase tracking-widest">{{ $siteSettings->email }}</p>
                                <a href="{{ route('contact.index') }}" class="uppercase tracking-widest hover:text-white transition-colors">Formulir Kontak</a>
                                <a href="{{ $waLink }}" class="text-white flex items-center gap-2 hover:theme-text transition-colors uppercase tracking-widest">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.711.848 3.146.849 3.182 0 5.767-2.585 5.767-5.766 0-3.181-2.585-5.767-5.767-5.767zm3.32 8.064c-.166.467-.96.933-1.358.933-.466 0-.932-.166-2.596-1.165-1.663-1.032-2.76-2.928-2.827-3.028-.066-.099-.665-.898-.665-1.73s.432-1.23.599-1.43c.166-.199.365-.232.499-.232.133 0 .265.033.365.265.099.233.365.864.398.931.033.066.066.166 0 .299-.066.133-.099.199-.199.332-.099.133-.232.266-.332.365-.099.099-.199.232-.066.465.133.232.599.965 1.264 1.564.864.765 1.597.998 1.83 1.131.233.133.365.099.499-.033.133-.133.599-.699.765-.931.166-.232.332-.199.532-.133.199.066 1.264.599 1.497.732.233.133.399.199.466.332.066.133.066.831-.101 1.297z"/></svg>
                                    WhatsApp Support
                                </a>
                            </div>
                        </div>

                        <div>
                            <h4 class="font-bold uppercase tracking-widest text-xs mb-6 theme-text">Transformasi Digital</h4>
                            <p class="text-xs font-semibold leading-relaxed text-gray-500 mb-6 uppercase tracking-wider">
                                Eksekusi cepat, arsitektur kokoh, berorientasi performa.
                            </p>
                            <a href="{{ $waLink }}" class="inline-block bg-white text-black px-6 py-4 text-xs font-bold uppercase tracking-widest hover:theme-bg hover:text-white hover:border-transparent transition-colors border-2 border-transparent">Konsultasi Teknis</a>
                        </div>
                    </div>
                    <div class="mt-10 pt-8 border-t border-gray-800 text-center">
                        <p class="text-xs text-gray-600 font-bold uppercase tracking-widest">&copy; 2026 Proude Tech. Hak cipta dilindungi.</p>
                    </div>
                </div>
            </footer>
        </div>

        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                AOS.init({
                    duration: 600,
                    easing: 'ease-out-cubic',
                    once: true,
                    offset: 50,
                });
            });
        </script>
    </body>
</html>
