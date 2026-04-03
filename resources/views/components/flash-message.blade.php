@if (session('success'))
    <div class="mb-6 rounded-3xl border border-emerald-200 bg-emerald-50 px-5 py-4 text-sm font-medium text-emerald-700">
        {{ session('success') }}
    </div>
@endif
