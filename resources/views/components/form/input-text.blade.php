@props([
    'label' => '',
    'name' => '',
    'type' => 'text',
    'placeholder' => '',
    'value' => '',
    'required' => false,
    'disabled' => false,
    'readonly' => false,
    'error' => false,
    'errorMessage' => '',
])

<div class="space-y-1.5">
    @if($label)
        <label for="{{ $name }}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
            {{ $label }}
            @if($required)
                <span class="text-red-500">*</span>
            @endif
        </label>
    @endif

    <div class="relative">
        <input
            type="{{ $type }}"
            name="{{ $name }}"
            id="{{ $name }}"
            placeholder="{{ $placeholder }}"
            value="{{ $value }}"
            @if($disabled) disabled @endif
            @if($readonly) readonly @endif
            @if($required) required @endif
            {{ $attributes->class([
                'w-full px-4 py-3 text-sm bg-white dark:bg-gray-800 border rounded-xl transition-all duration-200',
                'border-gray-200 dark:border-gray-700 text-gray-900 dark:text-white placeholder-gray-400',
                'focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500',
                'hover:border-gray-300 dark:hover:border-gray-600',
                'disabled:bg-gray-50 dark:disabled:bg-gray-900 disabled:text-gray-500 disabled:cursor-not-allowed',
                'readonly:bg-gray-50 dark:readonly:bg-gray-900 readonly:text-gray-500',
                ($error || $errors->has($name)) ? 'border-red-300 focus:ring-red-500/20 focus:border-red-500' : '',
            ])->merge() }}
        />

        {{ $slot }}
    </div>

    @if(($error || $errorMessage || $errors->has($name)))
        <p class="text-sm text-red-500 animate-pulse">
            {{ $errorMessage ?? $errors->first($name) }}
        </p>
    @endif
</div>
