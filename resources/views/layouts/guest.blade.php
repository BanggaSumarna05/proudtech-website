<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gray-100 text-slate-900 antialiased font-sans selection:bg-[#0033a0] selection:text-white">
        <div class="relative min-h-screen overflow-hidden flex flex-col justify-center py-12 px-4 sm:px-6 lg:px-8 border-b-[8px] border-[#0033a0]">
            <!-- Geometric Accents -->
            <div class="absolute top-0 right-0 w-64 h-64 bg-[#0033a0] translate-x-1/2 -translate-y-1/2 rounded-full opacity-10 pointer-events-none"></div>
            <div class="absolute bottom-0 left-0 w-96 h-96 border-[8px] border-black -translate-x-1/2 translate-y-1/2 opacity-[0.03] pointer-events-none"></div>

            <div class="relative w-full max-w-5xl mx-auto flex flex-col lg:flex-row items-center border-[6px] border-black bg-white shadow-[16px_16px_0_#0033a0] z-10 w-full">
                <!-- Branding Left Side -->
                <div class="w-full lg:w-1/2 bg-black p-10 lg:p-16 flex flex-col justify-center items-start lg:min-h-[600px] border-b-[6px] lg:border-b-0 lg:border-r-[6px] border-black relative overflow-hidden">
                    <img src="{{ asset('images/img_Proudtech/Logo Proud Tech.png') }}" alt="Proude Tech Logo" class="h-12 w-auto filter brightness-0 invert mb-8 relative z-10">
                    <div class="inline-block bg-white text-black px-4 py-1.5 text-xs font-bold uppercase tracking-widest mb-6 shadow-[4px_4px_0_#0033a0] relative z-10">
                        Admin Portal
                    </div>
                    <h1 class="text-4xl lg:text-5xl font-extrabold uppercase tracking-tighter text-white leading-tight mb-6 relative z-10">
                        Operasional Digital Enterprise.
                    </h1>
                    <p class="text-gray-400 font-semibold relative z-10">
                        Kelola layanan, studi kasus portofolio, konversi, dan properti web dari satu pusat kendali arsitektural.
                    </p>
                    <div class="absolute -bottom-16 -right-16 text-[15rem] leading-none font-extrabold text-white opacity-5 pointer-events-none select-none">
                        P.
                    </div>
                </div>

                <!-- Form Right Side -->
                <div class="w-full lg:w-1/2 bg-white p-8 sm:p-12 lg:p-16">
                    <div class="lg:hidden mb-10 border-b-[4px] border-black pb-6 inline-block w-full">
                        <img src="{{ asset('images/img_Proudtech/Logo Proud Tech.png') }}" class="h-10 mx-auto" alt="Logo">
                    </div>
                    
                    <h2 class="text-2xl font-extrabold uppercase tracking-tighter mb-8 text-black border-b-[4px] border-black pb-4 inline-block">
                        Akses Sistem
                    </h2>

                    {{ $slot }}
                </div>
            </div>
            
            <div class="mt-8 text-center text-xs font-bold text-gray-400 tracking-widest uppercase">
                &copy; {{ date('Y') }} Proude Tech Agency. Secure Access Only.
            </div>
        </div>
    </body>
</html>
