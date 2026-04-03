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
                    'label' => 'Project pilihan',
                ],
                [
                    'value' => number_format(Service::query()->count()),
                    'label' => 'Layanan utama',
                ],
                [
                    'value' => $totalLeads > 0 ? round(($dealLeads / $totalLeads) * 100) . '%' : '0%',
                    'label' => 'Kerjasama Yang sukses',
                ],
            ],
            'process' => [
                'Memahami bisnis & masalah utama Anda.',
                'Merancang solusi yang fokus pada konversi & kepercayaan.',
                'Membangun sistem yang stabil, cepat, dan scalable.',
                'Meluncurkan, mengukur, dan mengembangkan bersama Anda.',
            ],
        ]);
    }
}
