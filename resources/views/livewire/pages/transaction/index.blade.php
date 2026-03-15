<?php
use Livewire\Volt\Component;
use Livewire\Attributes\Layout;

new #[Layout('layouts.app')]
class extends Component {

    public bool $showInvoice = false;
    public bool $showPayModal = false;
    public ?array $activeInvoice = null;
    public string $paymentMethod = 'qris';

    public array $transactions = [
        [
            'id'       => 1,
            'invoice'  => '#INV-2026-001',
            'date'     => '09 Feb 2026',
            'time'     => '14:20 WIB',
            'package'  => 'Premium Wedding',
            'period'   => '1 Bulan',
            'status'   => 'success',
            'amount'   => 199000,
            'method'   => 'QRIS',
        ],
        [
            'id'       => 2,
            'invoice'  => '#INV-2026-002',
            'date'     => '08 Feb 2026',
            'time'     => '09:45 WIB',
            'package'  => 'Live Studio Add-on',
            'period'   => '1 Bulan',
            'status'   => 'pending',
            'amount'   => 150000,
            'method'   => 'Transfer Bank',
        ],
        [
            'id'       => 3,
            'invoice'  => '#INV-2026-003',
            'date'     => '01 Jan 2026',
            'time'     => '11:00 WIB',
            'package'  => 'Basic Wedding',
            'period'   => '1 Bulan',
            'status'   => 'expired',
            'amount'   => 99000,
            'method'   => 'Virtual Account',
        ],
        [
            'id'       => 4,
            'invoice'  => '#INV-2025-012',
            'date'     => '15 Des 2025',
            'time'     => '16:30 WIB',
            'package'  => 'Premium Wedding',
            'period'   => '12 Bulan',
            'status'   => 'success',
            'amount'   => 1908000,
            'method'   => 'Transfer Bank',
        ],
    ];

    public function openInvoice(int $id): void
    {
        $this->activeInvoice = collect($this->transactions)->firstWhere('id', $id);
        $this->showInvoice = true;
    }

    public function openPayModal(int $id): void
    {
        $this->activeInvoice = collect($this->transactions)->firstWhere('id', $id);
        $this->paymentMethod = 'qris';
        $this->showPayModal = true;
    }

    public function closeModals(): void
    {
        $this->showInvoice = false;
        $this->showPayModal = false;
        $this->activeInvoice = null;
    }
}; ?>

<div class="min-h-screen p-6 md:p-10 bg-[#F8FAFC] font-['Poppins']">
    <div class="max-w-5xl mx-auto space-y-8">

        {{-- Header --}}
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <div>
                <p class="text-[#6B6B6B] text-xs font-bold uppercase tracking-[0.2em] mb-1">Keuangan</p>
                <h1 class="text-3xl font-black tracking-tight text-black">Billing History</h1>
            </div>
            <div class="flex items-center gap-3">
                <div class="px-5 py-2.5 bg-[#EEF3FF] border border-[#99B9FF]/30 rounded-xl text-xs font-bold text-[#2159D4]">
                    Total Spend: <span class="font-black text-black">Rp {{ number_format(collect($transactions)->where('status', 'success')->sum('amount'), 0, ',', '.') }}</span>
                </div>
            </div>
        </div>

        {{-- Active Plan Card --}}
        <div class="bg-gradient-to-r from-[#2159D4] to-[#1a47b8] rounded-[2rem] p-6 text-white relative overflow-hidden shadow-xl shadow-[#2159D4]/20">
            <div class="absolute -right-8 -top-8 w-40 h-40 bg-white/5 rounded-full"></div>
            <div class="absolute -right-4 -bottom-10 w-56 h-56 bg-white/5 rounded-full"></div>
            <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div>
                    <p class="text-xs font-bold opacity-70 uppercase tracking-widest mb-1">Paket Aktif</p>
                    <h3 class="text-xl font-black">Premium Wedding</h3>
                    <p class="text-xs opacity-70 mt-1">Aktif hingga <span class="font-black opacity-100">09 Mar 2026</span></p>
                </div>
                <a href="{{ route('package.index') }}" wire:navigate
                   class="inline-flex items-center gap-2 px-5 py-3 bg-white/15 hover:bg-white/25 border border-white/20 rounded-2xl text-xs font-black transition-all backdrop-blur-sm">
                    Upgrade Paket →
                </a>
            </div>
        </div>

        {{-- Transaction Table --}}
        <div class="bg-white rounded-[2.5rem] border border-gray-100 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-[#F8FAFC] border-b border-gray-100">
                            <th class="px-7 py-4 text-[10px] font-black text-[#6B6B6B] uppercase tracking-widest">Invoice</th>
                            <th class="px-7 py-4 text-[10px] font-black text-[#6B6B6B] uppercase tracking-widest">Tanggal</th>
                            <th class="px-7 py-4 text-[10px] font-black text-[#6B6B6B] uppercase tracking-widest">Paket</th>
                            <th class="px-7 py-4 text-[10px] font-black text-[#6B6B6B] uppercase tracking-widest">Status</th>
                            <th class="px-7 py-4 text-[10px] font-black text-[#6B6B6B] uppercase tracking-widest text-right">Nominal</th>
                            <th class="px-7 py-4 text-[10px] font-black text-[#6B6B6B] uppercase tracking-widest text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @foreach($transactions as $trx)
                            @php
                                $statusCfg = match($trx['status']) {
                                    'success' => ['label' => 'Sukses',  'bg' => 'bg-emerald-50', 'text' => 'text-emerald-600', 'border' => 'border-emerald-100'],
                                    'pending' => ['label' => 'Pending', 'bg' => 'bg-amber-50',   'text' => 'text-amber-600',   'border' => 'border-amber-100'],
                                    'expired' => ['label' => 'Expired', 'bg' => 'bg-red-50',     'text' => 'text-red-500',     'border' => 'border-red-100'],
                                    default   => ['label' => 'Failed',  'bg' => 'bg-gray-50',    'text' => 'text-gray-500',    'border' => 'border-gray-100'],
                                };
                            @endphp
                            <tr class="hover:bg-[#F8FAFC] transition-colors">
                                <td class="px-7 py-5">
                                    <span class="text-xs font-black text-[#2159D4]">{{ $trx['invoice'] }}</span>
                                </td>
                                <td class="px-7 py-5">
                                    <p class="text-xs font-bold text-black">{{ $trx['date'] }}</p>
                                    <p class="text-[10px] text-[#6B6B6B]">{{ $trx['time'] }}</p>
                                </td>
                                <td class="px-7 py-5">
                                    <p class="text-xs font-bold text-black">{{ $trx['package'] }}</p>
                                    <p class="text-[10px] text-[#6B6B6B]">{{ $trx['period'] }} · {{ $trx['method'] }}</p>
                                </td>
                                <td class="px-7 py-5">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-tight border {{ $statusCfg['bg'] }} {{ $statusCfg['text'] }} {{ $statusCfg['border'] }}">
                                        {{ $statusCfg['label'] }}
                                    </span>
                                </td>
                                <td class="px-7 py-5 text-right">
                                    <span class="text-sm font-black text-black">Rp {{ number_format($trx['amount'], 0, ',', '.') }}</span>
                                </td>
                                <td class="px-7 py-5 text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        {{-- Detail Invoice --}}
                                        <button wire:click="openInvoice({{ $trx['id'] }})"
                                                class="p-2 hover:bg-[#EEF3FF] rounded-xl transition text-[#2159D4]" title="Lihat Invoice">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                            </svg>
                                        </button>
                                        {{-- Bayar (hanya pending) --}}
                                        @if($trx['status'] === 'pending')
                                            <button wire:click="openPayModal({{ $trx['id'] }})"
                                                    class="px-4 py-1.5 bg-[#2159D4] text-white text-[10px] font-black rounded-xl shadow-md shadow-[#2159D4]/20 hover:scale-105 transition">
                                                BAYAR
                                            </button>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Table Footer --}}
            <div class="px-7 py-4 border-t border-gray-100 flex justify-between items-center bg-[#F8FAFC]/50">
                <p class="text-[10px] font-bold text-[#6B6B6B] uppercase tracking-widest">
                    {{ count($transactions) }} transaksi
                </p>
                <a href="{{ route('package.index') }}" wire:navigate
                   class="text-xs font-black text-[#2159D4] hover:underline">
                    + Beli Paket Baru
                </a>
            </div>
        </div>

        {{-- Support Banner --}}
        <div class="bg-[#EEF3FF] border border-[#99B9FF]/30 rounded-2xl p-5 flex items-center justify-between gap-4">
            <div class="flex items-center gap-4">
                <span class="text-2xl">💬</span>
                <div>
                    <p class="text-sm font-black text-black">Ada kendala pembayaran?</p>
                    <p class="text-xs text-[#6B6B6B]">Tim support kami siap membantu 24/7.</p>
                </div>
            </div>
            <button class="px-5 py-2.5 bg-white border border-[#99B9FF]/30 rounded-xl text-xs font-black text-[#2159D4] hover:bg-[#EEF3FF] transition flex-shrink-0">
                Hubungi Support
            </button>
        </div>
    </div>

    {{-- ===================== INVOICE MODAL ===================== --}}
    @if($showInvoice && $activeInvoice)
    <div class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-end md:items-center justify-center p-0 md:p-4"
         wire:click.self="closeModals">
        <div class="bg-white w-full md:max-w-md rounded-t-[2.5rem] md:rounded-[2.5rem] shadow-2xl overflow-hidden">

            {{-- Invoice Header --}}
            <div class="px-7 pt-7 pb-5 border-b border-gray-100 flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-black text-black">Detail Invoice</h3>
                    <p class="text-xs text-[#6B6B6B] font-mono mt-0.5">{{ $activeInvoice['invoice'] }}</p>
                </div>
                <button wire:click="closeModals" class="w-9 h-9 rounded-xl bg-gray-100 hover:bg-gray-200 flex items-center justify-center transition">
                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <div class="px-7 py-6 space-y-5">
                {{-- Status --}}
                @php
                    $cfg = match($activeInvoice['status']) {
                        'success' => ['label' => 'Pembayaran Berhasil', 'bg' => 'bg-emerald-50', 'text' => 'text-emerald-600', 'icon' => '✅'],
                        'pending' => ['label' => 'Menunggu Pembayaran', 'bg' => 'bg-amber-50',   'text' => 'text-amber-600',   'icon' => '⏳'],
                        'expired' => ['label' => 'Transaksi Kedaluwarsa','bg' => 'bg-red-50',    'text' => 'text-red-500',     'icon' => '❌'],
                        default   => ['label' => 'Gagal',               'bg' => 'bg-gray-50',    'text' => 'text-gray-500',    'icon' => '❌'],
                    };
                @endphp
                <div class="flex items-center gap-3 p-4 rounded-2xl {{ $cfg['bg'] }}">
                    <span class="text-2xl">{{ $cfg['icon'] }}</span>
                    <p class="text-sm font-black {{ $cfg['text'] }}">{{ $cfg['label'] }}</p>
                </div>

                {{-- Invoice Details --}}
                <div class="space-y-3">
                    @foreach([
                        ['label' => 'No. Invoice',  'value' => $activeInvoice['invoice']],
                        ['label' => 'Tanggal',       'value' => $activeInvoice['date'] . ' · ' . $activeInvoice['time']],
                        ['label' => 'Paket',         'value' => $activeInvoice['package']],
                        ['label' => 'Periode',       'value' => $activeInvoice['period']],
                        ['label' => 'Metode',        'value' => $activeInvoice['method']],
                    ] as $row)
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-[#6B6B6B]">{{ $row['label'] }}</span>
                            <span class="font-bold text-black">{{ $row['value'] }}</span>
                        </div>
                    @endforeach
                    <div class="border-t border-gray-100 pt-3 flex justify-between items-center">
                        <span class="text-sm font-black text-black">Total</span>
                        <span class="text-lg font-black text-[#2159D4]">Rp {{ number_format($activeInvoice['amount'], 0, ',', '.') }}</span>
                    </div>
                </div>

                {{-- Actions --}}
                <div class="flex gap-3 pt-2">
                    @if($activeInvoice['status'] === 'pending')
                        <button wire:click="openPayModal({{ $activeInvoice['id'] }})"
                                class="flex-1 py-3 rounded-2xl bg-[#2159D4] text-white text-sm font-black shadow-lg shadow-[#2159D4]/25 hover:-translate-y-0.5 transition-all">
                            Bayar Sekarang
                        </button>
                    @else
                        <button class="flex-1 py-3 rounded-2xl bg-[#F8FAFC] border border-gray-200 text-sm font-black text-black hover:bg-gray-100 transition">
                            Download PDF
                        </button>
                    @endif
                    <button wire:click="closeModals"
                            class="px-5 py-3 rounded-2xl border border-gray-200 text-sm font-bold text-[#6B6B6B] hover:bg-gray-50 transition">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>
    @endif

    {{-- ===================== PAY MODAL ===================== --}}
    @if($showPayModal && $activeInvoice)
    <div class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-end md:items-center justify-center p-0 md:p-4"
         wire:click.self="closeModals">
        <div class="bg-white w-full md:max-w-lg rounded-t-[2.5rem] md:rounded-[2.5rem] shadow-2xl overflow-hidden">

            <div class="px-7 pt-7 pb-5 border-b border-gray-100 flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-black text-black">Selesaikan Pembayaran</h3>
                    <p class="text-xs text-[#6B6B6B] mt-0.5">{{ $activeInvoice['invoice'] }} · {{ $activeInvoice['package'] }}</p>
                </div>
                <button wire:click="closeModals" class="w-9 h-9 rounded-xl bg-gray-100 hover:bg-gray-200 flex items-center justify-center transition">
                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <div class="px-7 py-6 space-y-5 max-h-[65vh] overflow-y-auto">

                {{-- Amount --}}
                <div class="bg-[#EEF3FF] rounded-2xl p-4 flex justify-between items-center">
                    <span class="text-sm font-bold text-[#2159D4]">Total Tagihan</span>
                    <span class="text-xl font-black text-[#2159D4]">Rp {{ number_format($activeInvoice['amount'], 0, ',', '.') }}</span>
                </div>

                {{-- Payment Method --}}
                <div>
                    <p class="text-[10px] font-black text-[#6B6B6B] uppercase tracking-widest mb-3">Metode Pembayaran</p>
                    <div class="space-y-2">
                        @foreach([
                            ['id' => 'qris',     'label' => 'QRIS',            'sub' => 'Scan QR dari semua e-wallet & m-banking', 'icon' => '📱'],
                            ['id' => 'transfer', 'label' => 'Transfer Bank',   'sub' => 'BCA · Mandiri · BNI · BRI',                'icon' => '🏦'],
                            ['id' => 'va',       'label' => 'Virtual Account', 'sub' => 'Bayar via ATM atau m-banking',             'icon' => '💳'],
                        ] as $method)
                            <button wire:click="$set('paymentMethod', '{{ $method['id'] }}')"
                                    class="w-full flex items-center gap-4 p-4 rounded-2xl border-2 transition-all text-left
                                        {{ $paymentMethod === $method['id'] ? 'border-[#2159D4] bg-[#EEF3FF]' : 'border-gray-100 bg-white hover:border-gray-200' }}">
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

                {{-- Instructions --}}
                @if($paymentMethod === 'qris')
                    <div class="bg-[#F8FAFC] rounded-2xl p-5 text-center space-y-3">
                        <p class="text-xs font-black text-[#6B6B6B] uppercase tracking-widest">Scan QR Code</p>
                        <div class="w-40 h-40 bg-white border-2 border-dashed border-gray-200 rounded-2xl mx-auto flex items-center justify-center">
                            <div class="text-center">
                                <span class="text-4xl">📱</span>
                                <p class="text-[10px] text-gray-400 mt-1">QR akan muncul<br>setelah konfirmasi</p>
                            </div>
                        </div>
                        <p class="text-xs text-[#6B6B6B]">Berlaku selama <span class="font-black text-black">15 menit</span></p>
                    </div>

                @elseif($paymentMethod === 'transfer')
                    <div class="bg-[#F8FAFC] rounded-2xl p-5 space-y-3">
                        <p class="text-xs font-black text-[#6B6B6B] uppercase tracking-widest">Rekening Tujuan</p>
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
                            <p class="text-sm font-black text-amber-900 mt-1">Rp {{ number_format($activeInvoice['amount'], 0, ',', '.') }}</p>
                        </div>
                    </div>

                @elseif($paymentMethod === 'va')
                    <div class="bg-[#F8FAFC] rounded-2xl p-5 space-y-2">
                        <p class="text-xs font-black text-[#6B6B6B] uppercase tracking-widest mb-3">Pilih Bank VA</p>
                        @foreach(['BCA Virtual Account', 'Mandiri Virtual Account', 'BNI Virtual Account'] as $va)
                            <div class="bg-white border border-gray-100 rounded-xl p-3 flex justify-between items-center">
                                <p class="text-xs font-bold text-black">{{ $va }}</p>
                                <p class="text-[10px] font-mono text-[#2159D4] font-black">Akan digenerate</p>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            <div class="px-7 py-5 border-t border-gray-100">
                <button wire:click="closeModals"
                        class="w-full py-4 rounded-2xl bg-[#2159D4] text-white font-black text-sm shadow-lg shadow-[#2159D4]/25 hover:-translate-y-0.5 transition-all">
                    Konfirmasi Pembayaran
                </button>
            </div>
        </div>
    </div>
    @endif
</div>
