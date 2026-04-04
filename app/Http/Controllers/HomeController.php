<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\Portfolio;
use App\Models\Service;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $payload = Cache::remember('page:home:v2', now()->addMinutes(30), function (): array {
            $totalLeads = Lead::query()->count();
            $dealLeads = Lead::query()->where('status', 'deal')->count();

            return [
                'featuredServices' => Service::query()
                    ->select(['id', 'title', 'slug', 'description', 'price_range', 'icon', 'content'])
                    ->latest()
                    ->take(3)
                    ->get(),
                'featuredPortfolios' => Portfolio::query()
                    ->select(['id', 'title', 'slug', 'description', 'image', 'problem', 'solution', 'result'])
                    ->latest()
                    ->take(3)
                    ->get(),
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
            ];
        });

        return view('pages.home', [
            ...$payload,
            'process' => [
                'Memahami bisnis & masalah utama Anda.',
                'Merancang solusi yang fokus pada konversi & kepercayaan.',
                'Membangun sistem yang stabil, cepat, dan scalable.',
                'Meluncurkan, mengukur, dan mengembangkan bersama Anda.',
            ],
        ]);
    }
}
