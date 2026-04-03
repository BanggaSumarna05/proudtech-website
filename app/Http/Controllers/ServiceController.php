<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ServiceController extends Controller
{
    public function index(): View
    {
        return view('pages.services.index', [
            'services' => Service::query()->latest()->paginate(6),
        ]);
    }

    public function show(Service $service): View
    {
        return view('pages.services.show', [
            'service' => $service,
            'relatedServices' => Service::query()
                ->whereKeyNot($service->getKey())
                ->latest()
                ->take(3)
                ->get(),
            'title' => $service->title . ' - Modul Proude Tech',
            'description' => \Illuminate\Support\Str::limit($service->description, 150),
        ]);
    }

    public function adminIndex(): View
    {
        return view('dashboard.services.index', [
            'services' => Service::query()->latest()->paginate(10),
        ]);
    }

    public function create(): View
    {
        return view('dashboard.services.form', [
            'service' => new Service(),
            'formAction' => route('dashboard.services.store'),
            'formMethod' => 'POST',
        ]);
    }

    public function store(ServiceRequest $request): RedirectResponse
    {
        Service::query()->create($request->validated());

        return redirect()
            ->route('dashboard.services.index')
            ->with('success', 'Service created successfully.');
    }

    public function edit(Service $service): View
    {
        return view('dashboard.services.form', [
            'service' => $service,
            'formAction' => route('dashboard.services.update', $service),
            'formMethod' => 'PUT',
        ]);
    }

    public function update(ServiceRequest $request, Service $service): RedirectResponse
    {
        $service->update($request->validated());

        return redirect()
            ->route('dashboard.services.index')
            ->with('success', 'Service updated successfully.');
    }

    public function destroy(Service $service): RedirectResponse
    {
        $service->delete();

        return redirect()
            ->route('dashboard.services.index')
            ->with('success', 'Service deleted successfully.');
    }
}
