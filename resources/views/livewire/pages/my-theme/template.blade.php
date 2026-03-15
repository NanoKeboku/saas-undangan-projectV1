<?php
use Livewire\Volt\Component;
use Livewire\Attributes\Layout;

new #[Layout('layouts.app')] 
class extends Component {
    public array $templates = [
        [
            'id' => 1,
            'name' => 'Elegant Purple',
            'description' => 'Design mewah dengan warna ungu & emas. Cocok untuk pernikahan formal.',
            'image' => 'https://via.placeholder.com/400x300?text=Elegant+Purple',
            'color' => '#8b5cf6',
            'features' => ['🎨 Customizable', '📱 Mobile Ready', '✨ Smooth Animations'],
        ],
        [
            'id' => 2,
            'name' => 'Romantic Pink',
            'description' => 'Desain romantic dengan nuansa pink & soft. Sempurna untuk intimate wedding.',
            'image' => 'https://via.placeholder.com/400x300?text=Romantic+Pink',
            'color' => '#ec4899',
            'features' => ['💕 Romantic', '🎬 Video Support', '💌 RSVP Ready'],
        ],
        [
            'id' => 3,
            'name' => 'Golden Luxury',
            'description' => 'Kemewahan dengan dominasi emas. Untuk acara pernikahan grand & eksklusif.',
            'image' => 'https://via.placeholder.com/400x300?text=Golden+Luxury',
            'color' => '#f59e0b',
            'features' => ['👑 Luxury Feel', '🖼️ Gallery Ready', '📊 Analytics'],
        ],
        [
            'id' => 4,
            'name' => 'Modern Minimal',
            'description' => 'Desain clean & minimal. Untuk pasangan yang suka simplicity & elegance.',
            'image' => 'https://via.placeholder.com/400x300?text=Modern+Minimal',
            'color' => '#06b6d4',
            'features' => ['✌️ Minimal Design', '⚡ Super Fast', '🔐 Secure'],
        ],
    ];

    // Di dalam class Volt kamu
public function selectTemplate($templateId){
    // Cek apakah ID valid
    $exists = collect($this->templates)->contains('id', $templateId);
    
    if($exists) {
        session()->put('selected_template', $templateId);
        return redirect()->route('template.preview', ['id' => $templateId]);
    }
}
}; ?>

<div class="min-h-screen bg-[#F8FAFC]">
    
    <div class="py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto text-center mb-16">
            <h1 class="text-4xl md:text-5xl font-black text-black mb-4 tracking-tight">
                Pilih Template Undangan
            </h1>
            <p class="text-lg text-gray-500 max-w-2xl mx-auto font-medium">
                Mulai dari template yang indah dan kustomisasi sesuai gaya Anda.
            </p>
        </div>

        <div class="max-w-7xl mx-auto">
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($templates as $template)
                    <div class="group">
                        <div class="bg-white rounded-[32px] overflow-hidden shadow-sm border border-gray-100 hover:shadow-2xl transition-all duration-500 hover:-translate-y-3">
                            <div class="relative h-56 overflow-hidden bg-gray-200">
                                <img src="{{ $template['image'] }}" alt="{{ $template['name'] }}"
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                                
                                <div class="absolute top-4 right-4 w-10 h-10 rounded-full border-4 border-white shadow-lg"
                                     style="background-color: {{ $template['color'] }}"></div>
                            </div>

                            <div class="p-8">
                                <h3 class="text-xl font-bold text-black mb-3">{{ $template['name'] }}</h3>
                                <p class="text-sm text-gray-500 mb-6 line-clamp-2 leading-relaxed">{{ $template['description'] }}</p>

                                <div class="flex flex-wrap gap-2 mb-8">
                                    @foreach(array_slice($template['features'], 0, 2) as $feature)
                                        <span class="text-[10px] bg-gray-50 text-gray-500 px-3 py-1.5 rounded-xl font-bold uppercase tracking-wider">
                                            {{ $feature }}
                                        </span>
                                    @endforeach
                                </div>

                               <button 
                                type="button" 
                                wire:click="selectTemplate({{ $template['id'] }})"
                                wire:loading.attr="disabled"
                                class="w-full py-4 rounded-2xl font-black text-white transition-all duration-300 shadow-md group-hover:shadow-lg cursor-pointer disabled:opacity-50"
                                style="background: linear-gradient(135deg, {{ $template['color'] }} 0%, {{ $template['color'] }}dd 100%)">
                                
                                <span wire:loading.remove wire:target="selectTemplate">
                                    Pilih Template
                                </span>
                                <span wire:loading wire:target="selectTemplate">
                                    Memproses...
                                </span>
                            </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>