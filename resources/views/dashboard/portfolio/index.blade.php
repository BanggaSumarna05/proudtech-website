<x-app-layout>
    <x-slot name="header">Portfolio</x-slot>

    <div class="mb-6 flex justify-end">
        <a href="{{ route('dashboard.portfolio.create') }}" class="btn-primary">Add project</a>
    </div>

    <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">
        @foreach ($portfolios as $portfolio)
            <article class="admin-card overflow-hidden">
                <img src="{{ $portfolio->image_url }}" alt="{{ $portfolio->title }}" class="h-52 w-full object-cover">
                <div class="p-6">
                    <h2 class="text-2xl font-display">{{ $portfolio->title }}</h2>
                    <p class="mt-3 text-sm leading-7 text-slate-600">{{ $portfolio->description }}</p>
                    <div class="mt-6 flex gap-3">
                        <a href="{{ route('dashboard.portfolio.edit', $portfolio) }}" class="btn-secondary !px-4 !py-2">Edit</a>
                        <form method="POST" action="{{ route('dashboard.portfolio.destroy', $portfolio) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center rounded-full bg-rose-50 px-4 py-2 text-sm font-semibold text-rose-600" onclick="return confirm('Delete this portfolio item?')">Delete</button>
                        </form>
                    </div>
                </div>
            </article>
        @endforeach
    </div>

    <div class="mt-6">
        {{ $portfolios->links() }}
    </div>
</x-app-layout>
