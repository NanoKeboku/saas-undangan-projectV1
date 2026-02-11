<!-- Navigation Buttons -->
<div class="flex items-center gap-3 justify-between max-w-3xl mx-auto w-full">
    <!-- Back Button -->
    <button wire:click="prevStep"
            type="button"
            @if($step === 1) disabled @endif
            class="px-6 py-3 rounded-full font-semibold transition-all duration-200
                   {{ $step === 1 
                       ? 'bg-gray-100 text-gray-400 cursor-not-allowed' 
                       : 'bg-white text-gray-700 border border-gray-300 hover:border-gray-400 hover:bg-gray-50' }}
                   flex items-center gap-2">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
        </svg>
        <span class="hidden sm:inline">Sebelumnya</span>
    </button>

    <!-- Progress Indicator (Mobile Only) -->
    <div class="md:hidden text-center">
        <p class="text-xs font-semibold text-gray-600">
            Langkah <span class="text-purple-600">{{ $step }}</span> dari <span class="text-purple-600">6</span>
        </p>
    </div>

    <!-- Next / Publish Button -->
    @php
        $stepValid = match ($step) {
            1 => !empty($form['bride_name']) && !empty($form['groom_name']),
            2 => !empty($form['event_date']) && !empty($form['event_time']) && !empty($form['venue']),
            default => true,
        };
    @endphp
    
    @if($step < 6)
        <button wire:click="nextStep"
                type="button"
                @if(!$stepValid) disabled @endif
                wire:loading.attr="disabled"
                class="flex-1 sm:flex-none px-6 py-3 rounded-full font-semibold transition-all duration-200 flex items-center gap-2 justify-center
                       {{ !$stepValid
                           ? 'bg-gray-100 text-gray-400 cursor-not-allowed' 
                           : 'bg-gradient-to-r from-purple-600 to-blue-600 text-white hover:shadow-lg hover:shadow-purple-600/50 hover:-translate-y-0.5' }}">
            <span>{{ $step === 5 ? 'Lanjut ke Publikasi' : 'Lanjutkan' }}</span>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
            <div wire:loading class="inline-block">
                <svg class="animate-spin h-4 w-4" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
            </div>
        </button>
    @else
        <!-- Publish Button -->
        <button wire:click="publishInvitation"
                type="button"
                wire:loading.attr="disabled"
                class="flex-1 sm:flex-none px-8 py-3 rounded-full font-bold transition-all duration-200 flex items-center gap-2 justify-center
                       bg-gradient-to-r from-green-600 to-emerald-600 text-white hover:shadow-lg hover:shadow-green-600/50 hover:-translate-y-0.5">
            <span>🚀 Publikasikan Sekarang</span>
            <div wire:loading class="inline-block">
                <svg class="animate-spin h-4 w-4" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
            </div>
        </button>
    @endif
</div>

<!-- Loading & Validation Messages -->
<div wire:loading.remove class="text-center text-xs text-gray-500 mt-2">
    @if(!$stepValid && $step < 6)
        <p class="text-amber-600 font-medium">⚠️ Lengkapi semua field yang diperlukan untuk melanjutkan</p>
    @else
        <p>{{ $step === 6 ? '✨ Siap untuk dipublikasikan!' : '✅ Anda dapat melanjutkan' }}</p>
    @endif
</div>
