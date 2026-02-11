<?php
use Livewire\Volt\Component;

new class extends Component {
    public int $step = 1;
    public string $device = 'mobile'; // mobile | desktop
    public bool $saved = false;
    
    public array $form = [
        'bride_name' => '',
        'groom_name' => '',
        'event_date' => '',
        'event_time' => '',
        'venue' => '',
        'city' => '',
        'gallery' => [],
        'theme_color' => '#8b5cf6',
        'font' => 'Playfair Display',
    ];

    public function mount()
    {
        // Load saved data from session or database if available
        $this->form = array_merge($this->form, session()->get('invitation_form', []));
    }

    public function nextStep()
    {
    logger('STEP:', [$this->step]);
    logger('FORM:', $this->form);

    $this->validateStep();

    if ($this->step < 6) {
        $this->step++;
        $this->triggerSave();
    }
    }

    public function prevStep()
    {
        if ($this->step > 1) {
            $this->step--;
        }
    }

    public function validateStep()
    {
        switch ($this->step) {
            case 1:
                $this->validate([
                    'form.bride_name' => 'required|min:2',
                    'form.groom_name' => 'required|min:2',
                ]);
                break;
            case 2:
                $this->validate([
                    'form.event_date' => 'required|date',
                    'form.event_time' => 'required',
                    'form.venue' => 'required|min:3',
                    'form.city' => 'required|min:2',
                ]);
                break;
            default:
                // Gallery, Theme, Preview, Publish - optional
                break;
        }
    }

    public function addGalleryImage($file)
    {
        // Handle image upload - store path temporarily
        if (count($this->form['gallery']) < 10) {
            $this->form['gallery'][] = [
                'temp_path' => $file,
                'uploaded_at' => now(),
            ];
            $this->triggerSave();
        }
    }

    public function removeGalleryImage($index)
    {
        unset($this->form['gallery'][$index]);
        $this->form['gallery'] = array_values($this->form['gallery']);
        $this->triggerSave();
    }

    public function updateThemeColor($color)
    {
        $this->form['theme_color'] = $color;
        $this->triggerSave();
    }

    public function updateFont($font)
    {
        $this->form['font'] = $font;
        $this->triggerSave();
    }

    public function switchDevice($device)
    {
        $this->device = $device;
    }

    public function triggerSave()
    {
        session()->put('invitation_form', $this->form);
        $this->saved = true;
        
        $this->dispatch('autosave', message: 'Perubahan tersimpan');
        
        // Reset saved indicator after 2 seconds
        $this->js('setTimeout(() => {
            document.dispatchEvent(new CustomEvent("autosave-fade"));
        }, 2000)');
    }

    public function publishInvitation()
    {
        $this->validateStep();
        
        // TODO: Save to database and redirect to published invitation
        session()->flash('message', 'Undangan berhasil dipublikasikan! Silakan bagikan link ke tamu Anda.');
        
        return redirect()->route('my-theme.template');
    }

public function isStepValid(): bool
{
    return match ($this->step) {
        1 => strlen(trim($this->form['bride_name'])) >= 2 
          && strlen(trim($this->form['groom_name'])) >= 2,

        2 => !empty($this->form['event_date'])
          && !empty($this->form['event_time'])
          && strlen(trim($this->form['venue'])) >= 3
          && strlen(trim($this->form['city'])) >= 2,

        default => true,
    };
}
}; ?>

<div class="h-screen bg-gradient-to-br from-[#F8FAFC] via-[#F1F0FF] to-[#F8FAFC] overflow-hidden" 
     x-data="{ device: 'mobile' }" 
     x-cloak>
    
    <!-- Main Container -->
    <div class="h-full flex flex-col md:flex-row">
        <!-- LEFT PANEL: Form -->
        <div class="w-full md:w-1/2 overflow-y-auto flex flex-col">
            <div class="flex-1 overflow-y-auto">
                <!-- Header -->
                <div class="sticky top-0 z-20 bg-white/80 backdrop-blur-md border-b border-gray-100 px-6 py-4">
                    <a href="{{ route('my-theme.template') }}" class="inline-flex items-center gap-2 text-sm text-purple-600 hover:text-purple-700 mb-4 font-semibold">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                        Kembali
                    </a>
                    <h1 class="text-2xl font-bold text-gray-900">Editor Undangan</h1>
                    <p class="text-sm text-gray-500 mt-1">Buat undangan digital impian Anda dalam hitungan menit</p>
                </div>

                <!-- Stepper -->
                <div class="px-6 py-8">
                    @include('livewire.pages.my-theme.studio._stepper')
                </div>

                <!-- Form Content -->
                <div class="px-6 pb-32">
                    <div class="bg-white rounded-3xl shadow-sm p-8 border border-gray-100">
                        @include('livewire.pages.my-theme.studio._form')
                    </div>
                </div>
            </div>

            <!-- Navigation Footer -->
            <div class="fixed bottom-0 left-0 right-0 md:static bg-white/95 backdrop-blur-md border-t border-gray-100 px-6 py-4">
                @include('livewire.pages.my-theme.studio._nav')
            </div>
        </div>

        <!-- RIGHT PANEL: Live Preview (Hidden on Mobile) -->
        <div class="hidden md:flex md:w-1/2 bg-gradient-to-br from-purple-50 to-blue-50 flex-col items-center justify-center p-8 relative overflow-hidden">
            <!-- Device Switcher -->
            <div class="absolute top-8 right-8 z-10 bg-white/80 backdrop-blur-sm px-4 py-2 rounded-full shadow-sm border border-gray-100 flex gap-4 text-xs font-semibold">
                <button @click="device = 'mobile'" 
                        :class="device === 'mobile' ? 'text-purple-600 border-b-2 border-purple-600' : 'text-gray-400 hover:text-gray-600'" 
                        class="pb-0.5 transition-colors">
                    📱 Mobile
                </button>
                <button @click="device = 'desktop'" 
                        :class="device === 'desktop' ? 'text-purple-600 border-b-2 border-purple-600' : 'text-gray-400 hover:text-gray-600'" 
                        class="pb-0.5 transition-colors">
                    💻 Desktop
                </button>
            </div>

            <!-- Preview Frame -->
            <div :class="device === 'mobile' ? 'w-[360px] h-[740px]' : 'w-[900px] h-[600px]'"
                 class="bg-white rounded-3xl shadow-2xl border-8 border-slate-900 overflow-hidden relative transition-all duration-300">
                
                <!-- Mock Phone Notch (Mobile only) -->
                <template x-if="device === 'mobile'">
                    <div class="absolute top-0 left-0 right-0 h-6 bg-slate-900 flex justify-center items-center z-20">
                        <div class="w-24 h-4 bg-slate-900 rounded-b-2xl"></div>
                    </div>
                </template>

                <!-- Preview Content -->
                @include('livewire.pages.my-theme.studio._preview')
            </div>

            <!-- Auto-save Indicator -->
            <div class="mt-6 text-center">
                <p class="text-xs text-gray-400 flex items-center gap-2 justify-center">
                    <span class="inline-block w-2 h-2 bg-green-400 rounded-full animate-pulse"></span>
                    Auto-saving...
                </p>
            </div>
        </div>
    </div>

</div>

@script
<script>
    document.addEventListener('autosave', (e) => {
        // Visual feedback for autosave can be added here
    });
</script>
@endscript
