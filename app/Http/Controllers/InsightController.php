<?php

namespace App\Http\Controllers;

use App\Models\Insight;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class InsightController extends Controller
{
    public function index(): View
    {
        return view('pages.insights.index', [
            'insights' => Insight::latest()->paginate(9)
        ]);
    }

    public function show($slug): View
    {
        $insight = Insight::where('slug', $slug)->firstOrFail();
        return view('pages.insights.show', [
            'insight' => $insight,
            'related' => Insight::where('id', '!=', $insight->id)->latest()->take(3)->get(),
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
            $data['image'] = $request->file('image')->store('insights', 'public');
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
            }
            $data['image'] = $request->file('image')->store('insights', 'public');
        }

        $insight->update($data);
        return redirect()->route('dashboard.insights.index')->with('success', 'Insight updated successfully.');
    }

    public function destroy(Insight $insight)
    {
        if ($insight->image && Storage::disk('public')->exists($insight->image)) {
            Storage::disk('public')->delete($insight->image);
        }
        $insight->delete();
        return redirect()->route('dashboard.insights.index')->with('success', 'Insight deleted successfully.');
    }
}
