<!-- Progress Stepper -->
<div class="w-full">
    <!-- Step Labels -->
    <div class="flex items-center justify-between mb-8">
        @php
            $steps = [
                ['number' => 1, 'title' => 'Pasangan', 'icon' => '💕'],
                ['number' => 2, 'title' => 'Acara', 'icon' => '📅'],
                ['number' => 3, 'title' => 'Galeri', 'icon' => '🖼️'],
                ['number' => 4, 'title' => 'Tema', 'icon' => '🎨'],
                ['number' => 5, 'title' => 'Preview', 'icon' => '👁️'],
                ['number' => 6, 'title' => 'Publikasikan', 'icon' => '🚀'],
            ];
        @endphp

        @foreach($steps as $stepItem)
            <div class="flex flex-col items-center flex-1">
                <!-- Step Indicator -->
                <div class="relative mb-3">
                    <button wire:click="$set('step', {{ $stepItem['number'] }})"
                            type="button"
                            class="w-12 h-12 rounded-full font-bold text-lg transition-all duration-300 flex items-center justify-center
                            {{ $step === $stepItem['number'] 
                                ? 'bg-purple-600 text-white shadow-lg shadow-purple-600/50 scale-110' 
                                : ($step > $stepItem['number']
                                    ? 'bg-green-500 text-white'
                                    : 'bg-gray-100 text-gray-400 hover:bg-gray-200 cursor-pointer')
                            }}">
                        @if($step > $stepItem['number'])
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                        @else
                            {{ $stepItem['number'] }}
                        @endif
                    </button>

                    <!-- Progress Line -->
                    @if($stepItem['number'] < 6)
                        <div class="absolute top-1/2 left-[60%] w-[calc(100%-24px)] h-1 -translate-y-1/2 rounded-full
                                    {{ $step > $stepItem['number'] ? 'bg-green-500' : 'bg-gray-200' }}
                                    transition-colors duration-300"></div>
                    @endif
                </div>

                <!-- Step Label -->
                <span class="text-xs font-semibold text-gray-600 text-center mt-2">{{ $stepItem['title'] }}</span>
            </div>
        @endforeach
    </div>

    <!-- Progress Bar -->
    <div class="w-full h-1 bg-gray-200 rounded-full overflow-hidden">
        <div class="h-full bg-gradient-to-r from-purple-500 to-blue-500 transition-all duration-300"
             style="width: {{ ($step / 6) * 100 }}%"></div>
    </div>
</div>
