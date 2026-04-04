<?php

namespace App\Http\Controllers;

use App\Http\Requests\PortfolioRequest;
use App\Models\Portfolio;
use App\Support\OptimizedImageStorage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class PortfolioController extends Controller
{
    public function index(): View
    {
        $page = max(1, (int) request('page', 1));
        $perPage = 6;
        $payload = Cache::remember("portfolio:index:page:{$page}", now()->addMinutes(15), function () use ($page, $perPage): array {
            $query = Portfolio::query()
                ->select(['id', 'title', 'slug', 'description', 'image', 'problem', 'solution', 'result'])
                ->latest();

            $itemsQuery = clone $query;
            $totalQuery = clone $query;

            return [
                'items' => $itemsQuery->forPage($page, $perPage)->get(),
                'total' => $totalQuery->count(),
            ];
        });

        return view('pages.portfolio.index', [
            'portfolios' => new LengthAwarePaginator(
                $payload['items'],
                $payload['total'],
                $perPage,
                $page,
                ['path' => request()->url(), 'pageName' => 'page']
            ),
        ]);
    }

    public function show(Portfolio $portfolio): View
    {
        return view('pages.portfolio.show', [
            'portfolio' => $portfolio,
            'relatedPortfolios' => Cache::remember(
                "portfolio:related:{$portfolio->getKey()}",
                now()->addMinutes(30),
                fn () => Portfolio::query()
                    ->select(['id', 'title', 'slug', 'description', 'image', 'problem', 'solution', 'result'])
                    ->whereKeyNot($portfolio->getKey())
                    ->latest()
                    ->take(3)
                    ->get()
            ),
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
        $data['image'] = $request->file('image')
            ? OptimizedImageStorage::store($request->file('image'), 'portfolios')
            : null;

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
                Storage::disk('public')->delete(pathinfo($portfolio->image, PATHINFO_DIRNAME) . '/' . pathinfo($portfolio->image, PATHINFO_FILENAME) . '.webp');
                Storage::disk('public')->delete(pathinfo($portfolio->image, PATHINFO_DIRNAME) . '/' . pathinfo($portfolio->image, PATHINFO_FILENAME) . '.avif');
            }

            $data['image'] = OptimizedImageStorage::store($request->file('image'), 'portfolios');
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
            Storage::disk('public')->delete(pathinfo($portfolio->image, PATHINFO_DIRNAME) . '/' . pathinfo($portfolio->image, PATHINFO_FILENAME) . '.webp');
            Storage::disk('public')->delete(pathinfo($portfolio->image, PATHINFO_DIRNAME) . '/' . pathinfo($portfolio->image, PATHINFO_FILENAME) . '.avif');
        }

        $portfolio->delete();

        return redirect()
            ->route('dashboard.portfolio.index')
            ->with('success', 'Portfolio deleted successfully.');
    }
}
