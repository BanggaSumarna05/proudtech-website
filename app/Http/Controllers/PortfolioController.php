<?php

namespace App\Http\Controllers;

use App\Http\Requests\PortfolioRequest;
use App\Models\Portfolio;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class PortfolioController extends Controller
{
    public function index(): View
    {
        return view('pages.portfolio.index', [
            'portfolios' => Portfolio::query()->latest()->paginate(6),
        ]);
    }

    public function show(Portfolio $portfolio): View
    {
        return view('pages.portfolio.show', [
            'portfolio' => $portfolio,
            'relatedPortfolios' => Portfolio::query()
                ->whereKeyNot($portfolio->getKey())
                ->latest()
                ->take(3)
                ->get(),
            'title' => $portfolio->title . ' - Studi Kasus Proude Tech',
            'description' => \Illuminate\Support\Str::limit($portfolio->description, 150),
            'ogImage' => $portfolio->image_url,
        ]);
    }

    public function adminIndex(): View
    {
        return view('dashboard.portfolio.index', [
            'portfolios' => Portfolio::query()->latest()->paginate(10),
        ]);
    }

    public function create(): View
    {
        return view('dashboard.portfolio.form', [
            'portfolio' => new Portfolio(),
            'formAction' => route('dashboard.portfolio.store'),
            'formMethod' => 'POST',
        ]);
    }

    public function store(PortfolioRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['image'] = $request->file('image')?->store('portfolios', 'public');

        Portfolio::query()->create($data);

        return redirect()
            ->route('dashboard.portfolio.index')
            ->with('success', 'Portfolio created successfully.');
    }

    public function edit(Portfolio $portfolio): View
    {
        return view('dashboard.portfolio.form', [
            'portfolio' => $portfolio,
            'formAction' => route('dashboard.portfolio.update', $portfolio),
            'formMethod' => 'PUT',
        ]);
    }

    public function update(PortfolioRequest $request, Portfolio $portfolio): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            if ($portfolio->image && Storage::disk('public')->exists($portfolio->image)) {
                Storage::disk('public')->delete($portfolio->image);
            }

            $data['image'] = $request->file('image')->store('portfolios', 'public');
        }

        $portfolio->update($data);

        return redirect()
            ->route('dashboard.portfolio.index')
            ->with('success', 'Portfolio updated successfully.');
    }

    public function destroy(Portfolio $portfolio): RedirectResponse
    {
        if ($portfolio->image && Storage::disk('public')->exists($portfolio->image)) {
            Storage::disk('public')->delete($portfolio->image);
        }

        $portfolio->delete();

        return redirect()
            ->route('dashboard.portfolio.index')
            ->with('success', 'Portfolio deleted successfully.');
    }
}
