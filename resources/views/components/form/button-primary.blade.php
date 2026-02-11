@props([
    'type' => 'submit',
    'variant' => 'primary', // primary, secondary, danger
    'disabled' => false,
    'loading' => false,
    'fullWidth' => false,
])

@php
    $baseClasses = 'inline-flex items-center justify-center px-6 py-3 text-sm font-semibold rounded-xl transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed';

    $variantClasses = match($variant) {
        'primary' => 'bg-indigo-600 hover:bg-indigo-700 text-white focus:ring-indigo-500 shadow-lg shadow-indigo-500/25 hover:shadow-xl hover:shadow-indigo-500/30',
        'secondary' => 'bg-gray-100 hover:bg-gray-200 text-gray-900 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-white focus:ring-gray-500',
        'danger' => 'bg-red-600 hover:bg-red-700 text-white focus:ring-red-500 shadow-lg shadow-red-500/25',
        default => 'bg-indigo-600 hover:bg-indigo-700 text-white focus:ring-indigo-500',
    };

    $widthClass = $fullWidth ? 'w-full' : '';
@endphp

<button
    type="{{ $type }}"
    {{ $disabled || $loading ? 'disabled' : '' }}
    {{ $attributes->class([$baseClasses, $variantClasses, $widthClass]) }}
>
    <!-- Spinner -->
    @if($loading)
        <svg
            class="animate-spin -ml-1 mr-2 h-4 w-4"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
        >
            <circle
                class="opacity-25"
                cx="12"
                cy="12"
                r="10"
                stroke="currentColor"
                stroke-width="4"
            ></circle>
            <path
                class="opacity-75"
                fill="currentColor"
                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"
            ></path>
        </svg>
    @endif

    <!-- Icon slot -->
    @if(isset($icon) && !$loading)
        <span class="mr-2 -ml-1">{!! $icon !!}</span>
    @endif

    {{ $slot }}

    <!-- Icon after slot -->
    @if(isset($iconAfter) && !$loading)
        <span class="ml-2 -mr-1">{!! $iconAfter !!}</span>
    @endif
</button>
