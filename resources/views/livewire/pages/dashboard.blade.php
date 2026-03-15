<?php
use Livewire\Volt\Component;
use Livewire\Attributes\Layout;

new #[Layout('layouts.app')]
class extends Component {

    // Simulasi data undangan dari session (nanti dari DB)
    public array $events = [];

    public function mount(): void
    {
        $session = session()->get('temp_invitation', []);

        if (! empty($session)) {
            $this->events = [
                [
                    'id'          => 1,
                    'bride'       => $session['bride_name'] ?? 'Mempelai Wanita',
                    'groom'       => $session['groom_name'] ?? 'Mempelai Pria',
                    'slug'        => $session['slug'] ?? 'nama-pasangan',
                    'template'    => 'wedding-v1',
                    'theme_color' => $session['theme_color'] ?? '#8b5cf6',
                    'event_date'  => $session['event_date'] ?? null,
                    'status'      => 'draft', // draft | pending | active | expired
                    'created_at'  => now()->subDays(1)->format('d M Y'),
                ],
            ];
        }
    }
}; ?>

<div class="min-h-screen p-6 md:p-10 bg-[#F8FAFC] font-['Poppins']">
    <div class="max-w-5xl mx-auto space-y-8">

        {{-- Header --}}
        <div class="flex items-end justify-between">
            <div>
                <p class="text-[#6B6B6B] text-xs font-bold uppercase tracking-[0.2em] mb-1">Selamat Datang</p>
                <h1 class="text-3xl font-black text-black tracking-tight">My Events.</h1>
            </div>
            <a href="{{ route('my-theme.template') }}" wire:navigate
               class="flex items-center gap-2 px-5 py-3 bg-[#2159D4] text-white text-xs font-black uppercase tracking-widest rounded-2xl shadow-lg shadow-[#2159D4]/20 hover:scale-105 transition-all">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"/>
                </svg>
                Buat Undangan
            </a>
        </div>

        {{-- Empty State --}}
        @if(empty($events))
            <div class="bg-white rounded-[2.5rem] border border-gray-100 shadow-sm p-16 flex flex-col items-center text-center">
                <div class="w-20 h-20 bg-[#F1F5FF] rounded-[1.5rem] flex items-center justify-center mb-6 text-4xl">
                    💍
                </div>
                <h3 class="text-xl font-black text-gray-900 mb-2">Belum Ada Undangan</h3>
                <p class="text-sm text-gray-400 max-w-xs mb-8 leading-relaxed">
                    Buat undangan digital pertamamu sekarang. Pilih template, isi data, dan bagikan ke tamu.
                </p>
                <a href="{{ route('my-theme.template') }}" wire:navigate
                   class="px-8 py-4 bg-[#2159D4] text-white text-sm font-black rounded-2xl shadow-lg shadow-[#2159D4]/20 hover:scale-105 transition-all">
                    Mulai Buat Undangan →
                </a>
            </div>

        {{-- Event List --}}
        @else
            <div class="space-y-4">
                @foreach($events as $event)
                    @php
                        $statusConfig = match($event['status']) {
                            'active'  => ['label' => 'Aktif',   'bg' => 'bg-green-100',  'text' => 'text-green-700',  'dot' => 'bg-green-500'],
                            'pending' => ['label' => 'Pending', 'bg' => 'bg-yellow-100', 'text' => 'text-yellow-700', 'dot' => 'bg-yellow-500'],
                            'expired' => ['label' => 'Expired', 'bg' => 'bg-red-100',    'text' => 'text-red-700',    'dot' => 'bg-red-500'],
                            default   => ['label' => 'Draft',   'bg' => 'bg-gray-100',   'text' => 'text-gray-600',   'dot' => 'bg-gray-400'],
                        };
                    @endphp

                    <div class="bg-white rounded-[2rem] border border-gray-100 shadow-sm p-6 flex flex-col md:flex-row md:items-center gap-6 hover:shadow-md transition-shadow">

                        {{-- Color Accent --}}
                        <div class="w-14 h-14 rounded-2xl flex items-center justify-center text-2xl flex-shrink-0"
                             style="background-color: {{ $event['theme_color'] }}20">
                            💍
                        </div>

                        {{-- Info --}}
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center gap-3 mb-1">
                                <h3 class="text-base font-black text-gray-900 truncate">
                                    {{ $event['bride'] }} & {{ $event['groom'] }}
                                </h3>
                                {{-- Status Badge --}}
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[11px] font-bold {{ $statusConfig['bg'] }} {{ $statusConfig['text'] }} flex-shrink-0">
                                    <span class="w-1.5 h-1.5 rounded-full {{ $statusConfig['dot'] }}"></span>
                                    {{ $statusConfig['label'] }}
                                </span>
                            </div>
                            <p class="text-xs text-gray-400 mb-2">
                                {{ $event['template'] }} · Dibuat {{ $event['created_at'] }}
                            </p>
                            {{-- URL --}}
                            <div class="flex items-center gap-2">
                                <span class="text-xs font-mono text-gray-400 bg-gray-50 px-3 py-1.5 rounded-lg border border-gray-100">
                                    weddstu.com/<span class="{{ $event['status'] === 'active' ? 'text-[#2159D4]' : 'text-gray-400' }}">{{ $event['slug'] }}</span>
                                </span>
                                @if($event['status'] !== 'active')
                                    <span class="text-[10px] text-gray-400 italic">belum aktif</span>
                                @endif
                            </div>
                        </div>

                        {{-- Actions --}}
                        <div class="flex items-center gap-2 flex-shrink-0">
                            {{-- Preview --}}
                            <a href="{{ route('template.preview', $event['id']) }}"
                               class="px-4 py-2.5 text-xs font-bold text-gray-600 bg-gray-100 hover:bg-gray-200 rounded-xl transition-all">
                                Preview
                            </a>

                            {{-- Edit --}}
                            <a href="{{ route('my-theme.studio.index') }}" wire:navigate
                               class="px-4 py-2.5 text-xs font-bold text-[#2159D4] bg-[#EEF3FF] hover:bg-[#dde8ff] rounded-xl transition-all">
                                Edit
                            </a>

                            {{-- CTA berdasarkan status --}}
                            @if($event['status'] === 'draft')
                                <a href="{{ route('package.index') }}" wire:navigate
                                   class="px-5 py-2.5 text-xs font-black text-white bg-[#2159D4] hover:bg-[#1a47b8] rounded-xl shadow-md shadow-[#2159D4]/20 transition-all hover:scale-105">
                                    Aktifkan →
                                </a>
                            @elseif($event['status'] === 'active')
                                <button onclick="navigator.clipboard.writeText('weddstu.com/{{ $event['slug'] }}')"
                                        class="px-5 py-2.5 text-xs font-black text-white bg-green-600 hover:bg-green-700 rounded-xl transition-all">
                                    Salin Link
                                </button>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Info Banner --}}
            <div class="bg-[#EEF3FF] border border-[#99B9FF]/30 rounded-2xl p-5 flex items-start gap-4">
                <span class="text-2xl flex-shrink-0">💡</span>
                <div>
                    <p class="text-sm font-bold text-[#2159D4] mb-1">Undangan masih berstatus Draft</p>
                    <p class="text-xs text-[#4a6fa5] leading-relaxed">
                        Pilih paket untuk mengaktifkan undangan dan mendapatkan link publik yang bisa dibagikan ke tamu.
                    </p>
                </div>
            </div>
        @endif

    </div>
</div>
