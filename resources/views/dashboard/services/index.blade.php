<x-app-layout>
    <x-slot name="header">Layanan</x-slot>

    <div class="mb-6 flex justify-end">
        <a href="{{ route('dashboard.services.create') }}" class="btn-primary">Tambah layanan</a>
    </div>

    <div class="admin-card overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-200">
                <thead class="bg-slate-50">
                    <tr class="text-left text-xs font-semibold uppercase tracking-[0.2em] text-slate-500">
                        <th class="px-6 py-4">Layanan</th>
                        <th class="px-6 py-4">Rentang harga</th>
                        <th class="px-6 py-4">Slug</th>
                        <th class="px-6 py-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-sm text-slate-700">
                    @foreach ($services as $service)
                        <tr>
                            <td class="px-6 py-4">
                                <p class="font-semibold text-slate-950">{{ $service->title }}</p>
                                <p class="text-xs text-slate-500">{{ $service->description }}</p>
                            </td>
                            <td class="px-6 py-4">{{ $service->price_range }}</td>
                            <td class="px-6 py-4">{{ $service->slug }}</td>
                            <td class="px-6 py-4">
                                <div class="flex justify-end gap-3">
                                    <a href="{{ route('dashboard.services.edit', $service) }}" class="btn-secondary !px-4 !py-2">Ubah</a>
                                    <form method="POST" action="{{ route('dashboard.services.destroy', $service) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-flex items-center rounded-full bg-rose-50 px-4 py-2 text-sm font-semibold text-rose-600" onclick="return confirm('Hapus layanan ini?')">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-6">
        {{ $services->links() }}
    </div>
</x-app-layout>
