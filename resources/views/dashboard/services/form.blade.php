<x-app-layout>
    <x-slot name="header">{{ $service->exists ? 'Edit Service' : 'Create Service' }}</x-slot>

    <div class="admin-card p-8">
        <form method="POST" action="{{ $formAction }}" class="space-y-6">
            @csrf
            @if ($formMethod !== 'POST')
                @method($formMethod)
            @endif

            <div class="grid gap-6 md:grid-cols-2">
                <div>
                    <x-input-label for="title" value="Title" />
                    <input id="title" name="title" value="{{ old('title', $service->title) }}" class="field-input" required>
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="slug" value="Slug" />
                    <input id="slug" name="slug" value="{{ old('slug', $service->slug) }}" class="field-input" placeholder="Optional">
                    <x-input-error :messages="$errors->get('slug')" class="mt-2" />
                </div>
            </div>

            <div class="grid gap-6 md:grid-cols-2">
                <div>
                    <x-input-label for="price_range" value="Price Range" />
                    <input id="price_range" name="price_range" value="{{ old('price_range', $service->price_range) }}" class="field-input" required>
                    <x-input-error :messages="$errors->get('price_range')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="icon" value="Icon Key" />
                    <input id="icon" name="icon" value="{{ old('icon', $service->icon) }}" class="field-input" placeholder="code, chart, spark, briefcase">
                    <x-input-error :messages="$errors->get('icon')" class="mt-2" />
                </div>
            </div>

            <div>
                <x-input-label for="description" value="Short Description" />
                <textarea id="description" name="description" rows="4" class="field-input" required>{{ old('description', $service->description) }}</textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="content" value="Content / Feature Points" />
                <textarea id="content" name="content" rows="8" class="field-input" required>{{ old('content', $service->content) }}</textarea>
                <x-input-error :messages="$errors->get('content')" class="mt-2" />
            </div>

            <div class="flex gap-3">
                <button type="submit" class="btn-primary">Save service</button>
                <a href="{{ route('dashboard.services.index') }}" class="btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</x-app-layout>
