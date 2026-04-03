<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingsRequest;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class SettingsController extends Controller
{
    public function edit(): View
    {
        return view('dashboard.settings.edit', [
            'settings' => Setting::query()->firstOrCreate([], Setting::defaults()),
        ]);
    }

    public function update(SettingsRequest $request): RedirectResponse
    {
        $settings = Setting::query()->firstOrCreate([], Setting::defaults());
        $settings->update($request->validated());

        Cache::forget('site_settings');

        return redirect()
            ->route('dashboard.settings.edit')
            ->with('success', 'Settings updated successfully.');
    }
}
