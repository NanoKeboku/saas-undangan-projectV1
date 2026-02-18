<div class="w-full" 
     x-data="{ 
        currentStep: @entangle('step').live,
        bride: @entangle('bride_name').live,
        groom: @entangle('groom_name').live,
        venue: @entangle('venue').live,
        date: @entangle('event_date').live,
        city: @entangle('city').live,
        time: @entangle('event_time').live,

        canJumpTo(target) {
            // Always allow jumping to current or previous steps
            if (target <= this.currentStep) return true;
            
            // Allow jumping to next step only if current step is valid
            if (target === this.currentStep + 1) {
                if (this.currentStep === 1) {
                    return this.bride?.length >= 2 && this.groom?.length >= 2;
                }
                if (this.currentStep === 2) {
                    return this.date && this.venue?.length >= 3;
                }
                return true;
            }

            // Don't allow jumping far ahead (e.g., from 1 to 4)
            return false;
        },

        getStepStatus(target) {
            if (this.currentStep > target) return 'completed';
            if (this.currentStep === target) return 'active';
            return 'pending';
        }
     }">
    
    <div class="flex items-center justify-between mb-8">
        @foreach($steps as $stepItem)
            <div class="flex flex-col items-center flex-1 relative">
                <!-- Connector Line -->
                @if($loop->index > 0)
                    <div class="absolute top-6 right-[50%] w-full h-[2px] -z-0 transition-colors duration-500
                        {{ $step >= $stepItem['number'] ? 'bg-purple-500' : 'bg-gray-100' }}">
                    </div>
                @endif

                <div class="relative z-10 mb-3">
                    <button 
                        {{-- Use Alpine to handle click for instant response & prevent illegal jumps --}}
                        @click="if(canJumpTo({{ $stepItem['number'] }})) $wire.jumpToStep({{ $stepItem['number'] }})"
                        type="button"
                        :class="{
                            'bg-purple-600 text-white shadow-lg shadow-purple-600/50 scale-110 ring-4 ring-purple-100': currentStep === {{ $stepItem['number'] }},
                            'bg-green-500 text-white': currentStep > {{ $stepItem['number'] }},
                            'bg-white border-2 border-gray-100 text-gray-400': currentStep < {{ $stepItem['number'] }},
                            'cursor-not-allowed opacity-50': !canJumpTo({{ $stepItem['number'] }}),
                            'cursor-pointer hover:scale-105': canJumpTo({{ $stepItem['number'] }})
                        }"
                        class="w-12 h-12 rounded-full font-bold text-lg transition-all duration-300 flex items-center justify-center">
                        
                        @if($step > $stepItem['number'])
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                        @else
                            <span class="text-sm">{{ $stepItem['number'] }}</span>
                        @endif
                    </button>
                </div>

                <span class="text-[10px] md:text-xs font-bold uppercase tracking-tighter mt-2 transition-colors duration-300
                             {{ $step === $stepItem['number'] ? 'text-purple-600' : 'text-gray-400' }}">
                    {{ $stepItem['title'] }}
                </span>
            </div>
        @endforeach
    </div>

    <!-- Progress Bar Bottom -->
    <div class="px-2">
        <div class="w-full h-1.5 bg-gray-100 rounded-full overflow-hidden shadow-inner">
            <div class="h-full bg-gradient-to-r from-purple-500 via-indigo-500 to-purple-500 transition-all duration-700 ease-out"
                 :style="'width: ' + ((currentStep - 1) / 5) * 100 + '%'"></div>
        </div>
    </div>
</div>
