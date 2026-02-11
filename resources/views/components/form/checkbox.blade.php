@props([
    'label' => '',
    'name' => '',
    'value' => '',
    'checked' => false,
    'disabled' => false,
    'required' => false,
    'error' => false,
])

<div class="flex items-start">
    <div class="flex items-center h-5">
        <input
            type="checkbox"
            name="{{ $name }}"
            id="{{ $name }}"
            value="{{ $value }}"
            @if($checked) checked @endif
            @if($disabled) disabled @endif
            @if($required) required @endif
            {{ $attributes->class([
                'w-5 h-5 rounded border-gray-300 text-indigo-600',
                'focus:ring-2 focus:ring-indigo-500/20 focus:ring-offset-0',
                'transition-colors duration-200',
                'disabled:bg-gray-100 disabled:border-gray-300 disabled:cursor-not-allowed',
                ($error || $errors->has($name)) ? 'border-red-300' : 'border-gray-300',
            ])->merge() }}
        />
    </div>
    <div class="ml-3 text-sm">
        @if($label)
            <label for="{{ $name }}" class="{{ ($error || $errors->has($name)) ? 'text-red-600' : 'text-gray-600 dark:text-gray-300' }} cursor-pointer">
                {{ $label }}
                @if($required)
                    <span class="text-red-500">*</span>
                @endif
            </label>
        @endif
        {{ $slot }}
    </div>
</div>
