<x-app-layout>
    <x-slot name="header">Leads</x-slot>

    <div class="admin-card overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-200">
                <thead class="bg-slate-50">
                    <tr class="text-left text-xs font-semibold uppercase tracking-[0.2em] text-slate-500">
                        <th class="px-6 py-4">Lead</th>
                        <th class="px-6 py-4">Business</th>
                        <th class="px-6 py-4">Budget</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4 text-right">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-sm text-slate-700">
                    @forelse ($leads as $lead)
                        <tr>
                            <td class="px-6 py-4">
                                <p class="font-semibold text-slate-950">{{ $lead->name }}</p>
                                <p class="text-xs text-slate-500">{{ $lead->email }}</p>
                            </td>
                            <td class="px-6 py-4">{{ $lead->business ?: 'General inquiry' }}</td>
                            <td class="px-6 py-4">{{ $lead->budget ?: '-' }}</td>
                            <td class="px-6 py-4">
                                <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold uppercase tracking-[0.2em] text-slate-600">{{ $lead->status }}</span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{ route('dashboard.leads.show', $lead) }}" class="btn-secondary !px-4 !py-2">Review</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-10 text-center text-slate-500">No incoming leads yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-6">
        {{ $leads->links() }}
    </div>
</x-app-layout>
