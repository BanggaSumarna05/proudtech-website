<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Proud Tech - Solusi Teknologi Terpercaya</title>
        
        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            body { font-family: 'Inter', sans-serif; }
            .glass {
                background: rgba(255, 255, 255, 0.85);
                backdrop-filter: blur(10px);
                -webkit-backdrop-filter: blur(10px);
                border-bottom: 1px solid rgba(255, 255, 255, 0.3);
            }
            .dark .glass {
                background: rgba(17, 24, 39, 0.85);
                border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            }
            .gradient-text {
                background: linear-gradient(to right, #3b82f6, #8b5cf6);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
            }
            .gradient-bg {
                background: linear-gradient(135deg, #2563eb 0%, #7c3aed 100%);
            }
        </style>
    </head>
    <body class="bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-200 antialiased selection:bg-blue-600 selection:text-white">

        <!-- Navigation -->
        <nav class="glass fixed w-full z-50 top-0 transition-all duration-300">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-20">
                    <div class="flex items-center gap-3">
                        <img src="{{ asset('images/img_Proudtech/Logo Proud Tech.png') }}" alt="Proud Tech Logo" class="h-12 w-auto object-contain drop-shadow-md">
                        <span class="font-bold text-xl tracking-tight text-gray-900 dark:text-white">Proud Tech</span>
                    </div>
                    <div class="hidden md:flex space-x-8 items-center">
                        <a href="#beranda" class="text-sm font-medium hover:text-blue-600 dark:hover:text-blue-400 transition-colors">Beranda</a>
                        <a href="#layanan" class="text-sm font-medium hover:text-blue-600 dark:hover:text-blue-400 transition-colors">Layanan</a>
                        <a href="#tentang" class="text-sm font-medium hover:text-blue-600 dark:hover:text-blue-400 transition-colors">Tentang</a>
                        <a href="#kontak" class="text-sm font-medium hover:text-blue-600 dark:hover:text-blue-400 transition-colors">Kontak</a>
                    </div>
                    <div class="flex items-center gap-4">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="gradient-bg text-white px-5 py-2.5 text-sm font-medium rounded-full shadow-lg hover:shadow-blue-500/30 transition-all hover:-translate-y-0.5">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm font-medium hover:text-blue-600 transition-colors dark:text-gray-300 dark:hover:text-blue-400">Login</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="gradient-bg text-white px-5 py-2.5 text-sm font-medium rounded-full shadow-lg hover:shadow-blue-500/30 transition-all hover:-translate-y-0.5 hidden sm:block">Daftar</a>
                            @endif
                        @endauth
                    @endif
                    </div>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <section id="beranda" class="relative min-h-screen flex items-center justify-center overflow-hidden pt-20">
            <div class="absolute inset-0 z-0">
                <img src="{{ asset('images/img_Proudtech/Banner Home.jpg') }}" alt="Proud Tech Banner" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gray-900/80 dark:bg-gray-900/90 mix-blend-multiply"></div>
                <!-- Remove hard bottom gradient so hero smoothly transitions to page bg -->
                <div class="absolute inset-0 bg-gradient-to-t from-gray-50 dark:from-gray-900 via-transparent to-transparent"></div>
            </div>
            
            <div class="relative z-10 text-center px-4 max-w-5xl mx-auto mt-16">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-blue-500/10 border border-blue-500/20 text-blue-400 font-medium text-sm mb-6 backdrop-blur-md">
                    <span class="flex h-2 w-2 rounded-full bg-blue-500 animate-pulse"></span>
                    Solusi Teknologi Masa Depan
                </div>
                <h1 class="text-5xl md:text-7xl font-extrabold mb-6 tracking-tight text-white leading-tight">
                    Bangun Visi Digital Anda Bersama <span class="gradient-text">Proud Tech</span>
                </h1>
                <p class="text-lg md:text-2xl mb-10 text-gray-300 font-light max-w-3xl mx-auto">
                    Solusi Teknologi Terpercaya Untuk Bisnis Anda
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="#layanan" class="gradient-bg text-white px-8 py-4 rounded-full font-semibold shadow-lg shadow-blue-500/30 hover:shadow-blue-500/50 transition-all hover:-translate-y-1">Jelajahi Layanan</a>
                    <a href="#kontak" class="glass px-8 py-4 rounded-full font-semibold hover:bg-white/20 transition-all text-gray-900">Hubungi Kami</a>
                </div>
            </div>
        </section>

        <!-- Services Section -->
        <section id="layanan" class="py-24 relative bg-gray-50 dark:bg-gray-900">
            <!-- Decorative blur -->
            <div class="absolute top-0 left-1/4 w-96 h-96 bg-blue-500/10 rounded-full blur-3xl -z-10"></div>
            
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-5xl font-bold mb-4 tracking-tight">Layanan <span class="text-blue-600 dark:text-blue-500">Kami</span></h2>
                    <p class="text-gray-600 dark:text-gray-400 max-w-2xl mx-auto text-lg pt-2">Kami menyediakan solusi teknologi terbaik untuk mengembangkan bisnis Anda</p>
                </div>

                <div class="grid md:grid-cols-3 gap-8">
                    <!-- Service Card 1 -->
                    <div class="group bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-100 dark:border-gray-700 overflow-hidden hover:shadow-2xl hover:shadow-blue-500/10 hover:-translate-y-2 transition-all duration-300">
                        <div class="relative h-56 overflow-hidden">
                            <img src="{{ asset('images/img_Proudtech/Service.PNG') }}" alt="Konsultasi Teknologi" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-gray-900/80 to-transparent"></div>
                            <div class="absolute bottom-4 left-4 p-2 bg-blue-600 rounded-lg shadow-lg">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                            </div>
                        </div>
                        <div class="p-8">
                            <h3 class="text-2xl font-bold mb-3 text-gray-900 dark:text-white">Konsultasi Teknologi</h3>
                            <p class="text-gray-600 dark:text-gray-400 leading-relaxed">Dapatkan konsultasi profesional untuk kebutuhan teknologi bisnis Anda</p>
                        </div>
                    </div>

                    <!-- Service Card 2 -->
                    <div class="group bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-100 dark:border-gray-700 overflow-hidden hover:shadow-2xl hover:shadow-blue-500/10 hover:-translate-y-2 transition-all duration-300">
                        <div class="relative h-56 overflow-hidden">
                            <img src="{{ asset('images/img_Proudtech/Service.PNG') }}" alt="Pengembangan Web" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-gray-900/80 to-transparent"></div>
                            <div class="absolute bottom-4 left-4 p-2 bg-purple-600 rounded-lg shadow-lg">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
                            </div>
                        </div>
                        <div class="p-8">
                            <h3 class="text-2xl font-bold mb-3 text-gray-900 dark:text-white">Pengembangan Web</h3>
                            <p class="text-gray-600 dark:text-gray-400 leading-relaxed">Bangun website modern dan responsif dengan teknologi terkini</p>
                        </div>
                    </div>

                    <!-- Service Card 3 -->
                    <div class="group bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-100 dark:border-gray-700 overflow-hidden hover:shadow-2xl hover:shadow-blue-500/10 hover:-translate-y-2 transition-all duration-300">
                        <div class="relative h-56 overflow-hidden">
                            <img src="{{ asset('images/img_Proudtech/Service.PNG') }}" alt="Dukungan Teknis" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-gray-900/80 to-transparent"></div>
                            <div class="absolute bottom-4 left-4 p-2 bg-teal-500 rounded-lg shadow-lg">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                            </div>
                        </div>
                        <div class="p-8">
                            <h3 class="text-2xl font-bold mb-3 text-gray-900 dark:text-white">Dukungan Teknis</h3>
                            <p class="text-gray-600 dark:text-gray-400 leading-relaxed">Nikmati dukungan teknis 24/7 dari tim profesional kami</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Process Section -->
        <section class="py-24 bg-white dark:bg-gray-900 border-y border-gray-100 dark:border-gray-800 relative overflow-hidden">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-5xl font-bold mb-4 tracking-tight">Proses <span class="gradient-text">Kerja Kami</span></h2>
                </div>

                <div class="grid md:grid-cols-3 gap-12 relative">
                    <!-- Connection Line -->
                    <div class="hidden md:block absolute top-1/2 left-10 right-10 h-0.5 bg-gradient-to-r from-blue-100 via-blue-500 to-blue-100 dark:from-gray-700 dark:via-blue-500 dark:to-gray-700 -z-10 translate-y-[-50px]"></div>

                    <!-- Step 1 -->
                    <div class="relative text-center group">
                        <div class="w-32 h-32 mx-auto bg-white dark:bg-gray-800 rounded-full shadow-xl border-4 border-white dark:border-gray-700 flex items-center justify-center mb-6 overflow-hidden group-hover:border-blue-500 transition-colors">
                            <img src="{{ asset('images/img_Proudtech/Mengerjakan.PNG') }}" alt="Penuh Dedikasi" class="w-16 h-16 object-contain group-hover:scale-110 transition-transform">
                        </div>
                        <h3 class="text-xl font-bold mb-2">Penuh Dedikasi</h3>
                    </div>

                    <!-- Step 2 -->
                    <div class="relative text-center group">
                        <div class="w-32 h-32 mx-auto bg-white dark:bg-gray-800 rounded-full shadow-xl border-4 border-white dark:border-gray-700 flex items-center justify-center mb-6 overflow-hidden group-hover:border-purple-500 transition-colors">
                            <img src="{{ asset('images/img_Proudtech/Service.PNG') }}" alt="Solusi Terpadu" class="w-16 h-16 object-contain group-hover:scale-110 transition-transform">
                        </div>
                        <h3 class="text-xl font-bold mb-2">Solusi Terpadu</h3>
                    </div>

                    <!-- Step 3 -->
                    <div class="relative text-center group">
                        <div class="w-32 h-32 mx-auto bg-white dark:bg-gray-800 rounded-full shadow-xl border-4 border-white dark:border-gray-700 flex items-center justify-center mb-6 overflow-hidden group-hover:border-teal-500 transition-colors">
                            <img src="{{ asset('images/img_Proudtech/Kerjasama.PNG') }}" alt="Hasil Optimal" class="w-16 h-16 object-contain group-hover:scale-110 transition-transform">
                        </div>
                        <h3 class="text-xl font-bold mb-2">Hasil Optimal</h3>
                    </div>
                </div>
            </div>
        </section>

        <!-- About Section -->
        <section id="tentang" class="py-24 relative bg-gray-50 dark:bg-gray-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid lg:grid-cols-2 gap-16 items-center">
                    <div class="relative order-2 lg:order-1">
                        <div class="absolute -inset-4 bg-gradient-to-r from-blue-600 to-purple-600 rounded-[2rem] opacity-20 blur-lg"></div>
                        <img src="{{ asset('images/img_Proudtech/Founder.PNG') }}" alt="Founder Proud Tech" class="relative rounded-3xl shadow-2xl border border-gray-200 dark:border-gray-700 w-full object-cover">
                    </div>
                    <div class="order-1 lg:order-2">
                        <div class="inline-block px-4 py-1.5 rounded-full bg-blue-500/10 text-blue-600 dark:text-blue-400 font-semibold text-sm mb-6">Tentang Kami</div>
                        <h2 class="text-4xl md:text-5xl font-bold mb-6 leading-tight">Tentang Proud Tech</h2>
                        <p class="text-gray-600 dark:text-gray-400 mb-6 text-lg leading-relaxed">
                            Proud Tech adalah perusahaan solusi teknologi yang berkomitmen untuk memberikan layanan terbaik kepada klien-klien kami. Dengan pengalaman bertahun-tahun, kami telah membantu ratusan bisnis mencapai kesuksesan digital.
                        </p>
                        <p class="text-gray-600 dark:text-gray-400 mb-10 text-lg leading-relaxed">
                            Tim profesional kami siap membantu Anda mengembangkan bisnis dengan solusi teknologi yang inovatif dan terpercaya.
                        </p>
                        <div class="flex items-center gap-6">
                            <a href="#kontak" class="gradient-bg text-white px-8 py-4 rounded-full font-semibold shadow-lg hover:shadow-blue-500/30 transition-all hover:-translate-y-1 inline-flex items-center gap-2">
                                Hubungi Kami
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Partnership Section -->
        <section class="py-20 relative overflow-hidden bg-white dark:bg-gray-900 border-t border-gray-100 dark:border-gray-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold mb-4">Kerjasama Dengan Kami</h2>
                    <p class="text-gray-600 dark:text-gray-400">Bergabunglah dengan klien-klien kami yang puas</p>
                </div>

                <div class="bg-blue-50 dark:bg-gray-800 rounded-3xl p-12 max-w-4xl mx-auto shadow-sm border border-blue-100 dark:border-gray-700 hover:shadow-lg transition">
                    <img src="{{ asset('images/img_Proudtech/Kerjasama.PNG') }}" alt="Kerjasama" class="w-32 h-32 mx-auto mb-8 drop-shadow-md rounded-full bg-white p-2">
                    <h3 class="text-2xl font-bold mb-4 text-gray-900 dark:text-white tracking-tight">Mari Berkembang Bersama</h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-8 text-lg">Kami siap menjadi partner teknologi terpercaya Anda</p>
                    <a href="#kontak" class="bg-blue-600 text-white px-10 py-3 rounded-full font-bold hover:bg-blue-700 transition-all shadow-md hover:shadow-xl inline-block">Mulai Kerjasama</a>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section id="kontak" class="py-24 bg-gray-50 dark:bg-gray-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <div class="inline-block px-4 py-1.5 rounded-full bg-blue-500/10 text-blue-600 dark:text-blue-400 font-semibold text-sm mb-6">Hubungi Kami</div>
                    <h2 class="text-3xl md:text-4xl font-bold mb-4">Hubungi Kami</h2>
                    <p class="text-gray-600 dark:text-gray-400 text-lg">Siap membantu Anda 24/7</p>
                </div>

                <div class="max-w-4xl mx-auto bg-white dark:bg-gray-700 rounded-3xl shadow-xl overflow-hidden border border-gray-100 dark:border-gray-600 relative">
                    <div class="absolute top-0 right-0 w-64 h-64 bg-blue-500/10 rounded-full blur-3xl"></div>
                    
                    <div class="p-8 md:p-12 relative z-10">
                        <img src="{{ asset('images/img_Proudtech/Hubungi.PNG') }}" alt="Hubungi Kami" class="w-full h-64 object-cover rounded-2xl mb-12 shadow-md">

                        <div class="grid md:grid-cols-3 gap-8 text-center">
                            <div class="p-6 bg-gray-50 dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-600 hover:-translate-y-1 transition duration-300">
                                <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900/50 text-blue-600 dark:text-blue-400 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                </div>
                                <h3 class="font-bold mb-2 text-gray-900 dark:text-white">Email</h3>
                                <a href="mailto:info@proudtech.id" class="text-blue-600 hover:text-blue-700 dark:text-blue-400 font-medium">info@proudtech.id</a>
                            </div>

                            <div class="p-6 bg-gray-50 dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-600 hover:-translate-y-1 transition duration-300">
                                <div class="w-12 h-12 bg-purple-100 dark:bg-purple-900/50 text-purple-600 dark:text-purple-400 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                                </div>
                                <h3 class="font-bold mb-2 text-gray-900 dark:text-white">Telepon</h3>
                                <p class="text-gray-600 dark:text-gray-400 text-sm">Hubungi tim kami untuk konsultasi gratis</p>
                            </div>

                            <div class="p-6 bg-gray-50 dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-600 hover:-translate-y-1 transition duration-300">
                                <div class="w-12 h-12 bg-teal-100 dark:bg-teal-900/50 text-teal-600 dark:text-teal-400 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                </div>
                                <h3 class="font-bold mb-2 text-gray-900 dark:text-white">Alamat</h3>
                                <p class="text-gray-600 dark:text-gray-400 text-sm">Proud Tech Indonesia</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-gray-900 border-t border-gray-800 text-gray-400 py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row items-center justify-between">
                <div class="flex items-center gap-3 mb-6 md:mb-0">
                    <img src="{{ asset('images/img_Proudtech/Icon Proud Tech.png') }}" alt="Proud Tech Logo" class="h-8 filter brightness-0 invert opacity-70">
                    <span class="font-bold text-gray-300">Proud Tech</span>
                </div>
                <p class="text-sm">&copy; 2026 Proud Tech Indonesia. Semua hak dilindungi.</p>
            </div>
        </footer>
    </body>
</html>
