@props(['icon' => 'code'])

@switch($icon)
    @case('chart')
        <svg {{ $attributes->merge(['class' => 'h-6 w-6']) }} viewBox="0 0 24 24" fill="none" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 19h16M7 16V9m5 7V5m5 11v-4" />
        </svg>
        @break
    @case('spark')
        <svg {{ $attributes->merge(['class' => 'h-6 w-6']) }} viewBox="0 0 24 24" fill="none" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="m12 3 1.9 5.1L19 10l-5.1 1.9L12 17l-1.9-5.1L5 10l5.1-1.9L12 3Z" />
        </svg>
        @break
    @case('briefcase')
        <svg {{ $attributes->merge(['class' => 'h-6 w-6']) }} viewBox="0 0 24 24" fill="none" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8 7V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2m4 3H4m16 0v7a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-7m16 0V9a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v1" />
        </svg>
        @break
    @default
        <svg {{ $attributes->merge(['class' => 'h-6 w-6']) }} viewBox="0 0 24 24" fill="none" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M7 8h10M7 12h7m-7 4h10M5 4h14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2Z" />
        </svg>
@endswitch
