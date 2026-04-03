<x-app-layout>
    <x-slot name="header">{{ $portfolio->exists ? 'Edit Portfolio' : 'Create Portfolio' }}</x-slot>

    <div class="admin-card p-8">
        <form method="POST" action="{{ $formAction }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @if ($formMethod !== 'POST')
                @method($formMethod)
            @endif

            <div class="grid gap-6 md:grid-cols-2">
                <div>
                    <x-input-label for="title" value="Title" />
                    <input id="title" name="title" value="{{ old('title', $portfolio->title) }}" class="field-input" required>
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="slug" value="Slug" />
                    <input id="slug" name="slug" value="{{ old('slug', $portfolio->slug) }}" class="field-input" placeholder="Optional">
                    <x-input-error :messages="$errors->get('slug')" class="mt-2" />
                </div>
            </div>

            <div>
                <x-input-label for="description" value="Overview" />
                <textarea id="description" name="description" rows="4" class="field-input" required>{{ old('description', $portfolio->description) }}</textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <div class="grid gap-6 lg:grid-cols-3">
                <div>
                    <x-input-label for="problem" value="Problem" />
                    <textarea id="problem" name="problem" rows="7" class="field-input" required>{{ old('problem', $portfolio->problem) }}</textarea>
                    <x-input-error :messages="$errors->get('problem')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="solution" value="Solution" />
                    <textarea id="solution" name="solution" rows="7" class="field-input" required>{{ old('solution', $portfolio->solution) }}</textarea>
                    <x-input-error :messages="$errors->get('solution')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="result" value="Result" />
                    <textarea id="result" name="result" rows="7" class="field-input" required>{{ old('result', $portfolio->result) }}</textarea>
                    <x-input-error :messages="$errors->get('result')" class="mt-2" />
                </div>
            </div>

            <div>
                <x-input-label for="image" value="Image" />
                <input id="image" type="file" name="image" class="field-input !py-2">
                <x-input-error :messages="$errors->get('image')" class="mt-2" />
                @if ($portfolio->image)
                    <img src="{{ $portfolio->image_url }}" alt="{{ $portfolio->title }}" class="mt-4 h-40 w-56 rounded-2xl object-cover">
                @endif
            </div>

            <div class="flex gap-3">
                <button type="submit" class="btn-primary">Save portfolio</button>
                <a href="{{ route('dashboard.portfolio.index') }}" class="btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</x-app-layout>
