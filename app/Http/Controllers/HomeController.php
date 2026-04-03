<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\Portfolio;
use App\Models\Service;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $totalLeads = Lead::query()->count();
        $dealLeads = Lead::query()->where('status', 'deal')->count();

        return view('pages.home', [
            'featuredServices' => Service::query()->latest()->take(3)->get(),
            'featuredPortfolios' => Portfolio::query()->latest()->take(3)->get(),
            'stats' => [
                [
                    'value' => number_format(Portfolio::query()->count()),
                    'label' => 'Studi kasus pilihan',
                ],
                [
                    'value' => number_format(Service::query()->count()),
                    'label' => 'Lini layanan utama',
                ],
                [
                    'value' => $totalLeads > 0 ? round(($dealLeads / $totalLeads) * 100) . '%' : '0%',
                    'label' => 'Konversi lead saat ini',
                ],
            ],
            'process' => [
                'Memahami masalah bisnis dan merapikan value proposition.',
                'Merancang experience yang fokus pada konversi dan kepercayaan.',
                'Membangun produk dengan alur operasional berbasis Laravel.',
                'Meluncurkan, mengukur, lalu mengembangkan bersama tim Anda.',
            ],
        ]);
    }
}
