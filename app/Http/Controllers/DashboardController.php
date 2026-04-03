<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\Portfolio;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $totalLeads = Lead::query()->count();
        $dealLeads = Lead::query()->where('status', 'deal')->count();

        return view('dashboard.index', [
            'totalLeads' => $totalLeads,
            'totalPortfolios' => Portfolio::query()->count(),
            'conversionRate' => $totalLeads > 0 ? round(($dealLeads / $totalLeads) * 100, 1) : 0,
            'recentLeads' => Lead::query()->latest()->take(5)->get(),
        ]);
    }
}
