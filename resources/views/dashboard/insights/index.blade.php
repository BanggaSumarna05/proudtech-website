<x-app-layout>
    <x-slot name="header">Insights & Blog</x-slot>

    <div class="mb-6 flex justify-end">
        <a href="{{ route('dashboard.insights.create') }}" class="btn-primary">Tulis Artikel</a>
    </div>

    <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">
        @foreach ($insights as $insight)
            <article class="admin-card overflow-hidden">
                <img src="{{ $insight->image_url }}" alt="{{ $insight->title }}" class="h-52 w-full object-cover">
                <div class="p-6">
                    <h2 class="text-2xl font-display">{{ $insight->title }}</h2>
                    <p class="mt-3 text-sm leading-7 text-slate-600">{{ \Illuminate\Support\Str::limit($insight->excerpt ?? strip_tags($insight->content), 120) }}</p>
                    <div class="mt-6 flex gap-3">
                        <a href="{{ route('dashboard.insights.edit', $insight) }}" class="btn-secondary !px-4 !py-2">Edit</a>
                        <form method="POST" action="{{ route('dashboard.insights.destroy', $insight) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center rounded-full bg-rose-50 px-4 py-2 text-sm font-semibold text-rose-600" onclick="return confirm('Hapus artikel ini?')">Hapus</button>
                        </form>
                    </div>
                </div>
            </article>
        @endforeach
    </div>

    <div class="mt-6">
        {{ $insights->links() }}
    </div>
</x-app-layout>
