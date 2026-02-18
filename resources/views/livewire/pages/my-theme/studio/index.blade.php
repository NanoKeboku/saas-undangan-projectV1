<div class="h-screen bg-gradient-to-br from-[#F8FAFC] via-[#F1F0FF] to-[#F8FAFC] overflow-hidden" 
     x-data="studioWizard()"
     x-init="initAlpine()"
     wire:key="studio-wizard">
    
    <div class="h-full flex flex-col md:flex-row">
        <!-- Left Panel: Form Editor -->
        <div class="w-full md:w-1/2 overflow-y-auto flex flex-col bg-white/40 backdrop-blur-sm">
            <div class="flex-1 overflow-y-auto">
                <!-- Header -->
                <div class="sticky top-0 z-20 bg-white/80 backdrop-blur-md border-b border-gray-100 px-6 py-4 flex items-center justify-between">
                    <div>
                        <a href="{{ route('my-theme.template') }}" wire:navigate class="inline-flex items-center gap-2 text-sm text-purple-600 hover:text-purple-700 font-semibold">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                            Kembali
                        </a>
                        <h1 class="text-xl font-bold text-gray-900">Editor Undangan</h1>
                    </div>
                </div>

                <!-- Stepper -->
                <div class="px-6 py-6">
                    @include('livewire.pages.my-theme.studio._stepper')
                </div>

                <!-- Form Content -->
                <div class="px-6 pb-32">
                    <div class="bg-white rounded-3xl shadow-sm p-8 border border-gray-100">
                        @include('livewire.pages.my-theme.studio._form')
                    </div>
                </div>
            </div>

            <!-- Navigation -->
            <div class="fixed bottom-0 left-0 right-0 md:static bg-white/95 backdrop-blur-md border-t border-gray-100 px-6 py-4">
                @include('livewire.pages.my-theme.studio._nav')
            </div>
        </div>

        <!-- Right Panel: Preview -->
        <div class="hidden md:flex md:w-1/2 bg-[#F1F5F9] flex-col items-center justify-center p-8 relative overflow-hidden">
            <!-- Device Toggle -->
            <div class="absolute top-8 flex gap-2 bg-white p-1 rounded-xl shadow-sm border border-gray-200 z-10">
                <button @click="device = 'mobile'" 
                        :class="device === 'mobile' ? 'bg-purple-100 text-purple-700' : 'text-gray-500'" 
                        class="px-4 py-1.5 rounded-lg text-xs font-bold transition-all">Mobile</button>
                <button @click="device = 'desktop'" 
                        :class="device === 'desktop' ? 'bg-purple-100 text-purple-700' : 'text-gray-500'" 
                        class="px-4 py-1.5 rounded-lg text-xs font-bold transition-all">Desktop</button>
            </div>

            <!-- Preview Frame -->
            <div :class="device === 'mobile' ? 'w-[375px] h-[700px]' : 'w-full h-full max-w-4xl max-h-[600px]'"
                 class="bg-white rounded-[2.5rem] shadow-2xl border-[10px] border-slate-900 overflow-hidden relative transition-all duration-500">
                @include('livewire.pages.my-theme.studio._preview')
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
function studioWizard() {
    return {
        // Device state - Alpine only
        device: 'mobile',
        
        // Initialize Alpine with Livewire data
        initAlpine() {
            // Set initial values from Livewire to Alpine
            this.$watch('device', value => {
                @this.device = value;
            });
        },
        
        // Computed: Check if can proceed to next step (Alpine-side for instant feedback)
        canProceed() {
            const step = @this.step;
            const bride = @this.bride_name;
            const groom = @this.groom_name;
            const eventDate = @this.event_date;
            const eventTime = @this.event_time;
            const venue = @this.venue;
            
            if (step === 1) {
                return bride && bride.length >= 2 && groom && groom.length >= 2;
            }
            if (step === 2) {
                return eventDate && eventTime && venue && venue.length >= 3;
            }
            return true;
        }
    }
}
</script>
@endpush
