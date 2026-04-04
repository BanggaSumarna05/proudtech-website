<?php

namespace App\Http\Controllers;

use App\Models\Insight;
use App\Support\OptimizedImageStorage;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class InsightController extends Controller
{
    public function index(): View
    {
        $page = max(1, (int) request('page', 1));
        $perPage = 9;
        $payload = Cache::remember("insights:index:page:{$page}", now()->addMinutes(15), function () use ($page, $perPage): array {
            $query = Insight::query()
                ->published()
                ->select(['id', 'title', 'slug', 'excerpt', 'content', 'image', 'created_at', 'published_at'])
                ->orderByDesc('published_at')
                ->orderByDesc('id');

            $itemsQuery = clone $query;
            $totalQuery = clone $query;

            return [
                'items' => $itemsQuery->forPage($page, $perPage)->get(),
                'total' => $totalQuery->count(),
            ];
        });

        return view('pages.insights.index', [
            'insights' => new LengthAwarePaginator(
                $payload['items'],
                $payload['total'],
                $perPage,
                $page,
                ['path' => request()->url(), 'pageName' => 'page']
            ),
        ]);
    }

    public function show($slug): View
    {
        $insight = Insight::query()
            ->published()
            ->where('slug', $slug)
            ->firstOrFail();

        return view('pages.insights.show', [
            'insight' => $insight,
            'related' => Cache::remember(
                "insights:related:{$insight->id}",
                now()->addMinutes(30),
                fn () => Insight::query()
                    ->published()
                    ->select(['id', 'title', 'slug', 'excerpt', 'content', 'image', 'created_at', 'published_at'])
                    ->where('id', '!=', $insight->id)
                    ->orderByDesc('published_at')
                    ->orderByDesc('id')
                    ->take(3)
                    ->get()
            ),
            'title' => $insight->title . ' - Insights Proude Tech',
            'description' => Str::limit($insight->excerpt ?? strip_tags($insight->content), 150),
            'ogImage' => $insight->image_url,
        ]);
    }

    // ADMIN CRUD
    public function adminIndex(): View
    {
        return view('dashboard.insights.index', [
            'insights' => Insight::latest()->paginate(10)
        ]);
    }

    public function create(): View
    {
        return view('dashboard.insights.form', [
            'insight' => new Insight(),
            'formAction' => route('dashboard.insights.store'),
            'formMethod' => 'POST'
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);
        if ($request->hasFile('image')) {
            $data['image'] = OptimizedImageStorage::store($request->file('image'), 'insights');
        }
        Insight::create($data);
        return redirect()->route('dashboard.insights.index')->with('success', 'Insight created successfully.');
    }

    public function edit(Insight $insight): View
    {
        return view('dashboard.insights.form', [
            'insight' => $insight,
            'formAction' => route('dashboard.insights.update', $insight),
            'formMethod' => 'PUT'
        ]);
    }

    public function update(Request $request, Insight $insight)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($insight->image && Storage::disk('public')->exists($insight->image)) {
                Storage::disk('public')->delete($insight->image);
                Storage::disk('public')->delete(pathinfo($insight->image, PATHINFO_DIRNAME) . '/' . pathinfo($insight->image, PATHINFO_FILENAME) . '.webp');
                Storage::disk('public')->delete(pathinfo($insight->image, PATHINFO_DIRNAME) . '/' . pathinfo($insight->image, PATHINFO_FILENAME) . '.avif');
            }
            $data['image'] = OptimizedImageStorage::store($request->file('image'), 'insights');
        }

        $insight->update($data);
        return redirect()->route('dashboard.insights.index')->with('success', 'Insight updated successfully.');
    }

    public function destroy(Insight $insight)
    {
        if ($insight->image && Storage::disk('public')->exists($insight->image)) {
            Storage::disk('public')->delete($insight->image);
            Storage::disk('public')->delete(pathinfo($insight->image, PATHINFO_DIRNAME) . '/' . pathinfo($insight->image, PATHINFO_FILENAME) . '.webp');
            Storage::disk('public')->delete(pathinfo($insight->image, PATHINFO_DIRNAME) . '/' . pathinfo($insight->image, PATHINFO_FILENAME) . '.avif');
        }
        $insight->delete();
        return redirect()->route('dashboard.insights.index')->with('success', 'Insight deleted successfully.');
    }
}
