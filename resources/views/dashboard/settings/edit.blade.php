<x-app-layout>
    <x-slot name="header">Settings</x-slot>

    <div class="admin-card p-8">
        <form method="POST" action="{{ route('dashboard.settings.update') }}" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid gap-6 md:grid-cols-2">
                <div>
                    <x-input-label for="site_name" value="Site Name" />
                    <input id="site_name" name="site_name" value="{{ old('site_name', $settings->site_name) }}" class="field-input" required>
                    <x-input-error :messages="$errors->get('site_name')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="email" value="Email" />
                    <input id="email" type="email" name="email" value="{{ old('email', $settings->email) }}" class="field-input" required>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
            </div>

            <div>
                <x-input-label for="hero_title" value="Hero Title" />
                <input id="hero_title" name="hero_title" value="{{ old('hero_title', $settings->hero_title) }}" class="field-input" required>
                <x-input-error :messages="$errors->get('hero_title')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="hero_subtitle" value="Hero Subtitle" />
                <textarea id="hero_subtitle" name="hero_subtitle" rows="4" class="field-input" required>{{ old('hero_subtitle', $settings->hero_subtitle) }}</textarea>
                <x-input-error :messages="$errors->get('hero_subtitle')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="whatsapp_number" value="WhatsApp Number" />
                <input id="whatsapp_number" name="whatsapp_number" value="{{ old('whatsapp_number', $settings->whatsapp_number) }}" class="field-input" required>
                <x-input-error :messages="$errors->get('whatsapp_number')" class="mt-2" />
            </div>

            <button type="submit" class="btn-primary">Save settings</button>
        </form>
    </div>
</x-app-layout>
