@props([
    'label' => '',
    'name' => '',
    'placeholder' => '',
    'value' => '',
    'required' => false,
    'disabled' => false,
    'error' => false,
    'errorMessage' => '',
    'showStrength' => false,
])

@php
    $wireModel = $attributes->get('wire:model');
@endphp

<div
    x-data="{ show: false, strength: 0 }"
    @password-strength.window="if($el.contains($event.target)) strength = $event.detail"
    class="space-y-1.5"
>
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
            :type="show ? 'text' : 'password'"
            name="{{ $name }}"
            id="{{ $name }}"
            placeholder="{{ $placeholder }}"
            value="{{ $value }}"
            @if($disabled) disabled @endif
            @if($required) required @endif
            {{ $attributes->class([
                'w-full px-4 py-3 text-sm bg-white dark:bg-gray-800 border rounded-xl transition-all duration-200',
                'border-gray-200 dark:border-gray-700 text-gray-900 dark:text-white placeholder-gray-400',
                'focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500',
                'hover:border-gray-300 dark:hover:border-gray-600',
                'disabled:bg-gray-50 dark:disabled:bg-gray-900 disabled:text-gray-500 disabled:cursor-not-allowed',
                ($error || $errors->has($name)) ? 'border-red-300 focus:ring-red-500/20 focus:border-red-500' : '',
            ])->merge() }}
            @if($wireModel) wire:model="{{ $wireModel }}" @endif
            @if($showStrength) x-on:input="$dispatch('password-strength', $event.target.value.length)" @endif
        />

        <!-- Show/Hide Toggle -->
        <button
            type="button"
            @click="show = !show"
            class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 transition-colors p-1"
        >
            <!-- Eye Icon (Show) -->
            <svg
                x-show="!show"
                class="w-5 h-5"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
            >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
            </svg>
            <!-- Eye Slash Icon (Hide) -->
            <svg
                x-show="show"
                class="w-5 h-5"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
                style="display: none;"
            >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
            </svg>
        </button>

        {{ $slot }}
    </div>

    <!-- Password Strength Indicator -->
    @if($showStrength)
        <div x-show="strength > 0" x-transition class="space-y-1">
            <div class="flex gap-1">
                <div
                    class="h-1 flex-1 rounded-full transition-all duration-300"
                    :class="{
                        'bg-red-300': strength >= 1,
                        'bg-red-500': strength >= 2,
                        'bg-yellow-300': strength >= 3,
                        'bg-yellow-500': strength >= 4,
                        'bg-green-500': strength >= 5
                    }"
                ></div>
                <div
                    class="h-1 flex-1 rounded-full transition-all duration-300"
                    :class="{
                        'bg-gray-200 dark:bg-gray-700': strength < 2,
                        'bg-yellow-300': strength >= 2 && strength < 3,
                        'bg-yellow-500': strength >= 3 && strength < 4,
                        'bg-green-500': strength >= 4 && strength < 5,
                        'bg-green-500': strength >= 5
                    }"
                    style="display: none;"
                ></div>
                <div
                    class="h-1 flex-1 rounded-full transition-all duration-300"
                    :class="{
                        'bg-gray-200 dark:bg-gray-700': strength < 3,
                        'bg-yellow-500': strength >= 3 && strength < 4,
                        'bg-green-500': strength >= 4 && strength < 5,
                        'bg-green-500': strength >= 5
                    }"
                    style="display: none;"
                ></div>
                <div
                    class="h-1 flex-1 rounded-full transition-all duration-300"
                    :class="{
                        'bg-gray-200 dark:bg-gray-700': strength < 4,
                        'bg-green-500': strength >= 4 && strength < 5,
                        'bg-green-500': strength >= 5
                    }"
                    style="display: none;"
                ></div>
                <div
                    class="h-1 flex-1 rounded-full transition-all duration-300"
                    :class="{
                        'bg-gray-200 dark:bg-gray-700': strength < 5,
                        'bg-green-500': strength >= 5
                    }"
                    style="display: none;"
                ></div>
            </div>
            <p class="text-xs" :class="strength < 2 ? 'text-red-500' : (strength < 3 ? 'text-yellow-500' : (strength < 4 ? 'text-yellow-600' : 'text-green-500'))">
                <span x-text="strength < 2 ? 'Weak' : (strength < 3 ? 'Fair' : (strength < 4 ? 'Good' : (strength < 5 ? 'Strong' : 'Very Strong')))"></span>
            </p>
        </div>
    @endif

    @if(($error || $errorMessage || $errors->has($name)))
        <p class="text-sm text-red-500 animate-pulse">
            {{ $errorMessage ?? $errors->first($name) }}
        </p>
    @endif
</div>
