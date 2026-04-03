<x-app-layout>
    <x-slot name="header">Dashboard</x-slot>

    <div class="grid gap-6 lg:grid-cols-3">
        <div class="admin-card p-6">
            <p class="text-sm text-slate-500">Total lead</p>
            <p class="mt-3 text-4xl font-display">{{ number_format($totalLeads) }}</p>
        </div>
        <div class="admin-card p-6">
            <p class="text-sm text-slate-500">Total portofolio</p>
            <p class="mt-3 text-4xl font-display">{{ number_format($totalPortfolios) }}</p>
        </div>
        <div class="admin-card p-6">
            <p class="text-sm text-slate-500">Tingkat konversi</p>
            <p class="mt-3 text-4xl font-display">{{ $conversionRate }}%</p>
        </div>
    </div>

    <div class="mt-8 admin-card overflow-hidden">
        <div class="border-b border-slate-200 px-6 py-5">
            <h2 class="text-xl font-display">Lead terbaru</h2>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-200">
                <thead class="bg-slate-50">
                    <tr class="text-left text-xs font-semibold uppercase tracking-[0.2em] text-slate-500">
                        <th class="px-6 py-4">Nama</th>
                        <th class="px-6 py-4">Bisnis</th>
                        <th class="px-6 py-4">Budget</th>
                        <th class="px-6 py-4">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-sm text-slate-700">
                    @forelse ($recentLeads as $lead)
                        <tr>
                            <td class="px-6 py-4">
                                <a href="{{ route('dashboard.leads.show', $lead) }}" class="font-semibold text-slate-950">{{ $lead->name }}</a>
                                <p class="text-xs text-slate-500">{{ $lead->email }}</p>
                            </td>
                            <td class="px-6 py-4">{{ $lead->business ?: 'General inquiry' }}</td>
                            <td class="px-6 py-4">{{ $lead->budget ?: '-' }}</td>
                            <td class="px-6 py-4">
                                <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold uppercase tracking-[0.2em] text-slate-600">{{ $lead->status }}</span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-10 text-center text-sm text-slate-500">Belum ada lead masuk.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
