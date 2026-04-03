<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} Admin</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            body { font-family: 'Plus Jakarta Sans', sans-serif; }
            .theme-bg { background-color: #0033a0; }
            .theme-text { color: #0033a0; }
            .theme-border { border-color: #0033a0; }
        </style>
    </head>
    <body class="bg-gray-100 text-slate-900 antialiased selection:bg-[#0033a0] selection:text-white">
        <div class="min-h-screen">
            @include('layouts.navigation')
        </div>
    </body>
</html>
