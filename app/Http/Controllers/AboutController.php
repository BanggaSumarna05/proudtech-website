<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class AboutController extends Controller
{
    public function index(): View
    {
        return view('pages.about', [
            'principles' => [
                'Kejelasan bisnis didahulukan sebelum dekorasi visual.',
                'Sistem yang tetap mudah dikelola oleh tim internal.',
                'Antarmuka premium yang terasa tegas, bukan generik.',
                'Delivery yang terstruktur dengan scope dan milestone yang transparan.',
            ],
            'process' => [
                'Strategi dan discovery',
                'Arsitektur UX dan perencanaan konten',
                'Design system dan development',
                'Pendampingan launch dan iterasi',
            ],
        ]);
    }
}
