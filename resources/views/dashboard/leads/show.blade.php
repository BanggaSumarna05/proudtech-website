<x-app-layout>
    <x-slot name="header">Lead Review</x-slot>

    <div class="grid gap-6 lg:grid-cols-[1.1fr,0.9fr]">
        <div class="admin-card p-8">
            <div class="flex flex-wrap items-start justify-between gap-4">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-[0.24em] text-brand-600">Lead detail</p>
                    <h2 class="mt-4 text-3xl font-display">{{ $lead->name }}</h2>
                    <p class="mt-2 text-sm text-slate-500">{{ $lead->email }}</p>
                </div>
                <span class="rounded-full bg-slate-100 px-4 py-2 text-xs font-semibold uppercase tracking-[0.24em] text-slate-600">{{ $lead->status }}</span>
            </div>

            <div class="mt-8 grid gap-4 md:grid-cols-2">
                <div class="rounded-[24px] bg-slate-50 p-5">
                    <p class="text-xs font-semibold uppercase tracking-[0.2em] text-slate-500">Phone</p>
                    <p class="mt-3 text-sm text-slate-700">{{ $lead->phone ?: '-' }}</p>
                </div>
                <div class="rounded-[24px] bg-slate-50 p-5">
                    <p class="text-xs font-semibold uppercase tracking-[0.2em] text-slate-500">Business</p>
                    <p class="mt-3 text-sm text-slate-700">{{ $lead->business ?: '-' }}</p>
                </div>
                <div class="rounded-[24px] bg-slate-50 p-5 md:col-span-2">
                    <p class="text-xs font-semibold uppercase tracking-[0.2em] text-slate-500">Budget</p>
                    <p class="mt-3 text-sm text-slate-700">{{ $lead->budget ?: '-' }}</p>
                </div>
            </div>

            <div class="mt-8 rounded-[24px] bg-slate-50 p-6">
                <p class="text-xs font-semibold uppercase tracking-[0.2em] text-slate-500">Message</p>
                <div class="mt-4 space-y-3 text-sm leading-7 text-slate-700">
                    @foreach (preg_split('/\r\n|\r|\n/', $lead->message) as $line)
                        @if (filled($line))
                            <p>{{ $line }}</p>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>

        <div class="space-y-6">
            <div class="admin-card p-8">
                <h2 class="text-2xl font-display">Update Status</h2>
                <form method="POST" action="{{ route('dashboard.leads.update', $lead) }}" class="mt-6 space-y-5">
                    @csrf
                    @method('PATCH')
                    <div>
                        <x-input-label for="status" value="Status" />
                        <select id="status" name="status" class="field-input">
                            @foreach ($statuses as $status)
                                <option value="{{ $status }}" @selected($lead->status === $status)>{{ ucfirst($status) }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('status')" class="mt-2" />
                    </div>
                    <button type="submit" class="btn-primary w-full">Save status</button>
                </form>
            </div>

            <div class="admin-card p-8">
                <h2 class="text-2xl font-display">Danger Zone</h2>
                <p class="mt-3 text-sm leading-7 text-slate-600">Delete the lead only if it is spam or duplicated.</p>
                <form method="POST" action="{{ route('dashboard.leads.destroy', $lead) }}" class="mt-6">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="inline-flex items-center rounded-full bg-rose-600 px-5 py-3 text-sm font-semibold text-white" onclick="return confirm('Delete this lead?')">Delete lead</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
