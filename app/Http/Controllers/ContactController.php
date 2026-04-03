<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Lead;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function index(): View
    {
        return view('pages.contact');
    }

    public function store(ContactRequest $request): RedirectResponse
    {
        Lead::query()->create([
            ...$request->validated(),
            'business' => 'Pertanyaan website',
            'budget' => 'Dibahas saat konsultasi',
            'status' => 'new',
        ]);

        return redirect()
            ->route('contact.index')
            ->with('success', 'Pesan Anda berhasil dikirim. Tim kami akan segera menghubungi Anda.');
    }
}
