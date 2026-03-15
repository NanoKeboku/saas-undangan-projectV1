<?php
use Livewire\Volt\Component;
use Livewire\Attributes\Layout;

new #[Layout('layouts.app')]
class extends Component {
    public string $billing = 'monthly'; // monthly | yearly
    public ?string $selectedPlan = null;

    // Checkout modal state
    public bool $showCheckout = false;
    public string $paymentMethod = 'qris'; // qris | transfer | va

    public array $plans = [
        [
            'id'       => 'basic',
            'name'     => 'Basic',
            'desc'     => 'Cocok untuk undangan sederhana',
            'price_monthly' => 99000,
            'price_yearly'  => 79000,
            'color'    => '#6B6B6B',
            'popular'  => false,
            'features' => [
                '1 Undangan Aktif',
                '3 Template Pilihan',
                'Link Publik (slug)',
                'RSVP & Ucapan',
                '50 Tamu',
            ],
            'disabled' => [],
        ],
        [
            'id'       => 'premium',
            'name'     => 'Premium',
            'desc'     => 'Paling populer untuk pasangan',
            'price_monthly' => 199000,
            'price_yearly'  => 159000,
            'color'    => '#2159D4',
            'popular'  => true,
            'features' => [
                '3 Undangan Aktif',
                'Semua Template',
                'Link Publik Custom',
                'RSVP & Ucapan',
                'Tamu Unlimited',
                'E-Gift (Amplop Digital)',
                'Live Studio Editor',
            ],
            'disabled' => [],
        ],
        [
            'id'       => 'pro',
            'name'     => 'Pro',
            'desc'     => 'Untuk wedding organizer & reseller',
            'price_monthly' => 399000,
            'price_yearly'  => 319000,
            'color'    => '#7c3aed',
            'popular'  => false,
            'features' => [
                'Undangan Unlimited',
                'Semua Template + Eksklusif',
                'Link Custom Domain',
                'RSVP & Ucapan',
                'Tamu Unlimited',
                'E-Gift + Payout Otomatis',
                'Live Studio Editor',
                'Priority Support',
                'White Label',
            ],
            'disabled' => [],
        ],
    ];

    public function selectPlan(string $planId): void
    {
        $this->selectedPlan = $planId;
        $this->showCheckout = true;
        $this->paymentMethod = 'qris';
    }

    public function closeCheckout(): void
    {
        $this->showCheckout = false;
        $this->selectedPlan = null;
    }

    public function getSelectedPlanDataProperty(): ?array
    {
        if (!$this->selectedPlan) return null;
        foreach ($this->plans as $plan) {
            if ($plan['id'] === $this->selectedPlan) return $plan;
        }
        return null;
    }

    public function getSelectedPriceProperty(): int
    {
        $plan = $this->selectedPlanData;
        if (!$plan) return 0;
        return $this->billing === 'yearly' ? $plan['price_yearly'] : $plan['price_monthly'];
    }
}; ?>

<div class="min-h-screen p-6 md:p-10 bg-[#F8FAFC] font-['Poppins']"
     x-data="{ showCheckout: @entangle('showCheckout').live }">

    <div class="max-w-5xl mx-auto space-y-10">

        {{-- Header --}}
        <div class="text-center">
            <p class="text-[#6B6B6B] text-xs font-bold uppercase tracking-[0.2em] mb-2">Pilih Paket</p>
            <h1 class="text-3xl font-black text-black tracking-tight">Aktifkan Undangan Kamu</h1>
            <p class="text-sm text-[#6B6B6B] mt-2">Bayar sekali, undangan aktif selamanya selama periode berlaku.</p>
        </div>

        {{-- Billing Toggle --}}
        <div class="flex justify-center">
            <div class="inline-flex items-center bg-white border border-gray-100 rounded-2xl p-1 shadow-sm gap-1">
                <button wire:click="$set('billing', 'monthly')"
                        class="px-5 py-2 rounded-xl text-xs font-bold transition-all {{ $billing === 'monthly' ? 'bg-[#2159D4] text-white shadow-md' : 'text-[#6B6B6B] hover:text-black' }}">
                    Bulanan
                </button>
                <button wire:click="$set('billing', 'yearly')"
                        class="px-5 py-2 rounded-xl text-xs font-bold transition-all flex items-center gap-2 {{ $billing === 'yearly' ? 'bg-[#2159D4] text-white shadow-md' : 'text-[#6B6B6B] hover:text-black' }}">
                    Tahunan
                    <span class="px-2 py-0.5 rounded-full text-[10px] font-black
                        {{ $billing === 'yearly' ? 'bg-white/20 text-white' : 'bg-green-100 text-green-700' }}">
                        Hemat 20%
                    </span>
                </button>
            </div>
        </div>

        {{-- Pricing Cards --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($plans as $plan)
                @php
                    $price = $billing === 'yearly' ? $plan['price_yearly'] : $plan['price_monthly'];
                @endphp
                <div class="relative bg-white rounded-[2rem] border transition-all duration-300
                    {{ $plan['popular'] ? 'border-[#2159D4] shadow-xl shadow-[#2159D4]/10 scale-[1.02]' : 'border-gray-100 shadow-sm hover:shadow-md hover:-translate-y-1' }}">

                    {{-- Popular Badge --}}
                    @if($plan['popular'])
                        <div class="absolute -top-3.5 left-1/2 -translate-x-1/2">
                            <span class="px-4 py-1.5 bg-[#2159D4] text-white text-[10px] font-black uppercase tracking-widest rounded-full shadow-lg shadow-[#2159D4]/30">
                                ⭐ Paling Populer
                            </span>
                        </div>
                    @endif

                    <div class="p-7">
                        {{-- Plan Header --}}
                        <div class="mb-6">
                            <div class="w-10 h-10 rounded-2xl mb-4 flex items-center justify-center"
                                 style="background-color: {{ $plan['color'] }}15">
                                <div class="w-4 h-4 rounded-full" style="background-color: {{ $plan['color'] }}"></div>
                            </div>
                            <h3 class="text-lg font-black text-black">{{ $plan['name'] }}</h3>
                            <p class="text-xs text-[#6B6B6B] mt-1">{{ $plan['desc'] }}</p>
                        </div>

                        {{-- Price --}}
                        <div class="mb-6">
                            <div class="flex items-end gap-1">
                                <span class="text-xs font-bold text-[#6B6B6B] mb-1">Rp</span>
                                <span class="text-3xl font-black text-black">{{ number_format($price, 0, ',', '.') }}</span>
                                <span class="text-xs text-[#6B6B6B] mb-1">/{{ $billing === 'yearly' ? 'bln' : 'bln' }}</span>
                            </div>
                            @if($billing === 'yearly')
                                <p class="text-[11px] text-green-600 font-bold mt-1">
                                    Hemat Rp {{ number_format(($plan['price_monthly'] - $plan['price_yearly']) * 12, 0, ',', '.') }}/tahun
                                </p>
                            @endif
                        </div>

                        {{-- CTA Button --}}
                        <button wire:click="selectPlan('{{ $plan['id'] }}')"
                                class="w-full py-3 rounded-2xl text-sm font-black transition-all duration-200 mb-6
                                    {{ $plan['popular']
                                        ? 'bg-[#2159D4] text-white shadow-lg shadow-[#2159D4]/25 hover:shadow-xl hover:shadow-[#2159D4]/30 hover:-translate-y-0.5'
                                        : 'bg-[#F8FAFC] text-black border border-gray-200 hover:bg-gray-100' }}">
                            Pilih {{ $plan['name'] }}
                        </button>

                        {{-- Features --}}
                        <ul class="space-y-3">
                            @foreach($plan['features'] as $feature)
                                <li class="flex items-center gap-3 text-xs text-[#3a3a3a]">
                                    <svg class="w-4 h-4 flex-shrink-0" style="color: {{ $plan['color'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    {{ $feature }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- FAQ / Guarantee --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach([
                ['icon' => '🔒', 'title' => 'Pembayaran Aman', 'desc' => 'Transaksi dienkripsi & diproses secara aman'],
                ['icon' => '↩️', 'title' => 'Garansi 7 Hari', 'desc' => 'Tidak puas? Refund penuh dalam 7 hari'],
                ['icon' => '💬', 'title' => 'Support 24/7', 'desc' => 'Tim kami siap membantu kapan saja'],
            ] as $item)
                <div class="bg-white rounded-2xl border border-gray-100 p-5 flex items-start gap-4">
                    <span class="text-2xl">{{ $item['icon'] }}</span>
                    <div>
                        <p class="text-sm font-black text-black">{{ $item['title'] }}</p>
                        <p class="text-xs text-[#6B6B6B] mt-0.5">{{ $item['desc'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- ===================== CHECKOUT MODAL ===================== --}}
    <div x-show="showCheckout"
         x-cloak
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-end md:items-center justify-center p-0 md:p-4"
         @click.self="$wire.closeCheckout()">

        @if($selectedPlanData)
        <div class="bg-white w-full md:max-w-lg rounded-t-[2.5rem] md:rounded-[2.5rem] shadow-2xl overflow-hidden"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="translate-y-full md:translate-y-0 md:scale-95 md:opacity-0"
             x-transition:enter-end="translate-y-0 md:scale-100 md:opacity-100">

            {{-- Modal Header --}}
            <div class="px-7 pt-7 pb-5 border-b border-gray-100 flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-black text-black">Checkout</h3>
                    <p class="text-xs text-[#6B6B6B] mt-0.5">Paket {{ $selectedPlanData['name'] }}</p>
                </div>
                <button wire:click="closeCheckout" class="w-9 h-9 rounded-xl bg-gray-100 hover:bg-gray-200 flex items-center justify-center transition">
                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <div class="px-7 py-6 space-y-6 max-h-[70vh] overflow-y-auto">

                {{-- Order Summary --}}
                <div class="bg-[#F8FAFC] rounded-2xl p-4 space-y-3">
                    <p class="text-[10px] font-black text-[#6B6B6B] uppercase tracking-widest">Ringkasan Pesanan</p>
                    <div class="flex justify-between items-center">
                        <span class="text-sm font-bold text-black">Paket {{ $selectedPlanData['name'] }}</span>
                        <span class="text-sm font-black text-black">Rp {{ number_format($this->selectedPrice, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between items-center text-xs text-[#6B6B6B]">
                        <span>Periode</span>
                        <span class="font-bold">{{ $billing === 'yearly' ? '12 Bulan' : '1 Bulan' }}</span>
                    </div>
                    <div class="border-t border-gray-200 pt-3 flex justify-between items-center">
                        <span class="text-sm font-black text-black">Total</span>
                        <span class="text-lg font-black text-[#2159D4]">
                            Rp {{ number_format($billing === 'yearly' ? $this->selectedPrice * 12 : $this->selectedPrice, 0, ',', '.') }}
                        </span>
                    </div>
                </div>

                {{-- Payment Method --}}
                <div>
                    <p class="text-[10px] font-black text-[#6B6B6B] uppercase tracking-widest mb-3">Metode Pembayaran</p>
                    <div class="space-y-2">
                        @foreach([
                            ['id' => 'qris',     'label' => 'QRIS',            'sub' => 'Scan QR dari semua e-wallet & m-banking',  'icon' => '📱'],
                            ['id' => 'transfer', 'label' => 'Transfer Bank',   'sub' => 'BCA · Mandiri · BNI · BRI',                 'icon' => '🏦'],
                            ['id' => 'va',       'label' => 'Virtual Account', 'sub' => 'Bayar via ATM atau m-banking',              'icon' => '💳'],
                        ] as $method)
                            <button wire:click="$set('paymentMethod', '{{ $method['id'] }}')"
                                    class="w-full flex items-center gap-4 p-4 rounded-2xl border-2 transition-all text-left
                                        {{ $paymentMethod === $method['id']
                                            ? 'border-[#2159D4] bg-[#EEF3FF]'
                                            : 'border-gray-100 bg-white hover:border-gray-200' }}">
                                <span class="text-2xl">{{ $method['icon'] }}</span>
                                <div class="flex-1">
                                    <p class="text-sm font-black text-black">{{ $method['label'] }}</p>
                                    <p class="text-xs text-[#6B6B6B]">{{ $method['sub'] }}</p>
                                </div>
                                <div class="w-5 h-5 rounded-full border-2 flex items-center justify-center flex-shrink-0
                                    {{ $paymentMethod === $method['id'] ? 'border-[#2159D4]' : 'border-gray-300' }}">
                                    @if($paymentMethod === $method['id'])
                                        <div class="w-2.5 h-2.5 rounded-full bg-[#2159D4]"></div>
                                    @endif
                                </div>
                            </button>
                        @endforeach
                    </div>
                </div>

                {{-- Payment Instructions --}}
                @if($paymentMethod === 'qris')
                    <div class="bg-[#F8FAFC] rounded-2xl p-5 text-center space-y-3">
                        <p class="text-xs font-black text-[#6B6B6B] uppercase tracking-widest">Scan QR Code</p>
                        {{-- QR Placeholder --}}
                        <div class="w-40 h-40 bg-white border-2 border-dashed border-gray-200 rounded-2xl mx-auto flex items-center justify-center">
                            <div class="text-center">
                                <span class="text-4xl">📱</span>
                                <p class="text-[10px] text-gray-400 mt-1">QR akan muncul<br>setelah konfirmasi</p>
                            </div>
                        </div>
                        <p class="text-xs text-[#6B6B6B]">Berlaku selama <span class="font-black text-black">15 menit</span></p>
                    </div>

                @elseif($paymentMethod === 'transfer')
                    <div class="bg-[#F8FAFC] rounded-2xl p-5 space-y-4">
                        <p class="text-xs font-black text-[#6B6B6B] uppercase tracking-widest">Pilih Bank Tujuan</p>
                        <div class="grid grid-cols-2 gap-2">
                            @foreach(['BCA', 'Mandiri', 'BNI', 'BRI'] as $bank)
                                <div class="bg-white border border-gray-100 rounded-xl p-3 text-center">
                                    <p class="text-xs font-black text-black">{{ $bank }}</p>
                                    <p class="text-[10px] text-[#6B6B6B] mt-0.5 font-mono">1234 5678 9012</p>
                                    <p class="text-[10px] text-[#6B6B6B]">a.n. PT Weddstu</p>
                                </div>
                            @endforeach
                        </div>
                        <div class="bg-amber-50 border border-amber-100 rounded-xl p-3">
                            <p class="text-xs text-amber-700 font-bold">⚠️ Transfer tepat nominal:</p>
                            <p class="text-sm font-black text-amber-900 mt-1">
                                Rp {{ number_format($billing === 'yearly' ? $this->selectedPrice * 12 : $this->selectedPrice, 0, ',', '.') }}
                            </p>
                        </div>
                    </div>

                @elseif($paymentMethod === 'va')
                    <div class="bg-[#F8FAFC] rounded-2xl p-5 space-y-4">
                        <p class="text-xs font-black text-[#6B6B6B] uppercase tracking-widest">Pilih Bank VA</p>
                        <div class="space-y-2">
                            @foreach(['BCA Virtual Account', 'Mandiri Virtual Account', 'BNI Virtual Account'] as $va)
                                <div class="bg-white border border-gray-100 rounded-xl p-3 flex justify-between items-center">
                                    <p class="text-xs font-bold text-black">{{ $va }}</p>
                                    <p class="text-[10px] font-mono text-[#2159D4] font-black">Akan digenerate</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

            </div>

            {{-- Modal Footer --}}
            <div class="px-7 py-5 border-t border-gray-100 bg-white">
                <button wire:click="closeCheckout"
                        class="w-full py-4 rounded-2xl bg-[#2159D4] text-white font-black text-sm shadow-lg shadow-[#2159D4]/25 hover:shadow-xl hover:shadow-[#2159D4]/30 hover:-translate-y-0.5 transition-all">
                    Konfirmasi Pembayaran — Rp {{ number_format($billing === 'yearly' ? $this->selectedPrice * 12 : $this->selectedPrice, 0, ',', '.') }}
                </button>
                <p class="text-center text-[10px] text-[#6B6B6B] mt-3">
                    Dengan melanjutkan, kamu menyetujui <span class="underline cursor-pointer">Syarat & Ketentuan</span> kami.
                </p>
            </div>
        </div>
        @endif
    </div>
</div>
