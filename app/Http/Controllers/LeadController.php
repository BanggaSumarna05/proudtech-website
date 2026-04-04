<?php

namespace App\Http\Controllers;

use App\Http\Requests\LeadRequest;
use App\Http\Requests\LeadStatusRequest;
use App\Models\Lead;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class LeadController extends Controller
{
    public function create(): View
    {
        return view('pages.consultation');
    }

    public function store(LeadRequest $request): JsonResponse|RedirectResponse
    {
        Lead::query()->create([
            ...$request->validated(),
            'status' => 'new',
        ]);

        if ($request->expectsJson()) {
            return response()
                ->json(['message' => 'Permintaan konsultasi berhasil dikirim. Kami akan segera menghubungi Anda.'])
                ->setStatusCode(201);
        }

        return redirect()
            ->route('consultation.create')
            ->with('success', 'Permintaan konsultasi berhasil dikirim. Kami akan segera menghubungi Anda.');
    }

    public function adminIndex(): View
    {
        return view('dashboard.leads.index', [
            'leads' => Lead::query()->latest()->paginate(12),
            'statuses' => Lead::STATUSES,
        ]);
    }

    public function show(Lead $lead): View
    {
        return view('dashboard.leads.show', [
            'lead' => $lead,
            'statuses' => Lead::STATUSES,
        ]);
    }

    public function update(LeadStatusRequest $request, Lead $lead): RedirectResponse
    {
        $lead->update($request->validated());

        return redirect()
            ->back()
            ->with('success', 'Lead status updated.');
    }

    public function destroy(Lead $lead): RedirectResponse
    {
        $lead->delete();

        return redirect()
            ->route('dashboard.leads.index')
            ->with('success', 'Lead removed successfully.');
    }
}
