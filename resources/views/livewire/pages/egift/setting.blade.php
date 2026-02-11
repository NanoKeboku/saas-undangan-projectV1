<?php
use Livewire\Volt\Component;
use Livewire\WithFileUploads;

new class extends Component {
    use WithFileUploads;

    public $gifts = [];

    public function mount()
    {
        // Data default agar form tidak kosong saat pertama buka
        $this->gifts = [
            [
                'type' => 'bank',
                'provider' => 'BCA',
                'account_name' => '',
                'account_number' => '',
                'is_active' => true
            ]
        ];
    }

    public function addGift()
    {
        $this->gifts[] = [
            'type' => 'bank',
            'provider' => 'BCA',
            'account_name' => '',
            'account_number' => '',
            'is_active' => true
        ];
    }

    public function removeGift($index)
    {
        unset($this->gifts[$index]);
        $this->gifts = array_values($this->gifts); // Reset index array
    }

    public function saveGifts()
    {
        // Logic simpan ke DB di sini
        session()->flash('message', 'Pengaturan kado berhasil disimpan!');
    }
}; ?>

<div class="min-h-screen p-4 md:p-12 bg-[#F1F6FF] font-['Poppins']" x-data="{ 
    message: null,
    copyToClipboard(text) {
        navigator.clipboard.writeText(text);
        this.message = 'Berhasil disalin!';
        setTimeout(() => this.message = null, 2000);
    }
}">
    <template x-if="message">
        <div class="fixed top-10 left-1/2 -translate-x-1/2 z-50 bg-slate-900 text-white px-6 py-3 rounded-2xl shadow-2xl text-sm font-bold animate-bounce">
            <span x-text="message"></span>
        </div>
    </template>

    <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-10">
        
        <div class="space-y-6">
            <div class="flex justify-between items-center">
                <div>
                    <h2 class="text-2xl font-black text-slate-900">Pengaturan E-Gift</h2>
                    <p class="text-xs text-slate-500 font-medium uppercase tracking-widest mt-1">Kado Digital & Fisik</p>
                </div>
                <button wire:click="addGift" class="px-4 py-2 bg-white text-[#2159D4] border-2 border-[#2159D4] rounded-xl text-xs font-black hover:bg-[#2159D4] hover:text-white transition-all">
                    + TAMBAH METODE
                </button>
            </div>

            <div class="space-y-4">
                @foreach($gifts as $index => $gift)
                <div wire:key="gift-{{ $index }}" class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-100 relative group transition-all hover:border-[#2159D4]/30">
                    <button wire:click="removeGift({{ $index }})" class="absolute -top-2 -right-2 w-8 h-8 bg-red-50 text-red-500 rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all hover:bg-red-500 hover:text-white shadow-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>

                    <div class="grid grid-cols-2 gap-4">
                        <div class="col-span-1 space-y-2">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Jenis Kado</label>
                            <select wire:model.live="gifts.{{ $index }}.type" class="w-full px-4 py-3 bg-slate-50 border-none rounded-xl text-xs font-bold focus:ring-2 focus:ring-[#2159D4]/10 outline-none">
                                <option value="bank">Transfer Bank</option>
                                <option value="wallet">E-Wallet (QRIS/Num)</option>
                                <option value="address">Kirim Kado (Alamat)</option>
                            </select>
                        </div>

                        <div class="col-span-1 space-y-2">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Nama Bank / Platform</label>
                            <input type="text" wire:model.live="gifts.{{ $index }}.provider" placeholder="Contoh: BCA, Mandiri, Dana" class="w-full px-4 py-3 bg-slate-50 border-none rounded-xl text-xs font-bold focus:ring-2 focus:ring-[#2159D4]/10 outline-none">
                        </div>

                        <div class="col-span-2 space-y-2">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Atas Nama (Penerima)</label>
                            <input type="text" wire:model.live="gifts.{{ $index }}.account_name" placeholder="Masukkan nama pemilik rekening..." class="w-full px-4 py-3 bg-slate-50 border-none rounded-xl text-xs font-bold focus:ring-2 focus:ring-[#2159D4]/10 outline-none">
                        </div>

                        <div class="col-span-2 space-y-2">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest">
                                {{ $gift['type'] === 'address' ? 'Alamat Lengkap Pengiriman' : 'Nomor Rekening / HP' }}
                            </label>
                            @if($gift['type'] === 'address')
                                <textarea wire:model.live="gifts.{{ $index }}.account_number" rows="3" class="w-full px-4 py-3 bg-slate-50 border-none rounded-xl text-xs font-bold focus:ring-2 focus:ring-[#2159D4]/10 outline-none resize-none"></textarea>
                            @else
                                <input type="text" wire:model.live="gifts.{{ $index }}.account_number" placeholder="Masukkan nomor..." class="w-full px-4 py-3 bg-slate-50 border-none rounded-xl text-xs font-bold focus:ring-2 focus:ring-[#2159D4]/10 outline-none">
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <button wire:click="saveGifts" class="w-full py-4 bg-[#2159D4] text-white rounded-[2rem] font-black text-sm shadow-xl shadow-[#2159D4]/20 hover:scale-[1.02] active:scale-95 transition-all">
                SIMPAN PERUBAHAN
            </button>
        </div>

        <div class="flex flex-col items-center">
            <div class="sticky top-12">
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.3em] mb-6 text-center">Tampilan di Undangan</p>
                
                <div class="w-[320px] h-[600px] bg-white rounded-[3rem] border-[10px] border-slate-900 shadow-2xl overflow-y-auto custom-scrollbar relative">
                    <div class="absolute top-0 w-full h-6 bg-slate-900 flex justify-center items-end pb-1 z-20">
                        <div class="w-16 h-3 bg-slate-900 rounded-full"></div>
                    </div>

                    <div class="p-6 pt-12 space-y-6">
                        <div class="text-center">
                            <h3 class="font-black text-lg text-slate-800">Wedding Gift</h3>
                            <p class="text-[10px] text-slate-500 leading-relaxed mt-2">Doa restu Anda merupakan karunia terindah bagi kami. Namun jika ingin memberi tanda kasih, dapat melalui:</p>
                        </div>

                        <div class="space-y-4">
                            @foreach($gifts as $gift)
                            @if($gift['account_name'] && $gift['account_number'])
                            <div class="bg-slate-50 rounded-3xl p-5 border border-slate-100 text-center space-y-3">
                                <div class="flex justify-center">
                                    <span class="px-3 py-1 bg-white rounded-full text-[9px] font-black text-[#2159D4] border border-[#2159D4]/20 uppercase">
                                        {{ $gift['provider'] }}
                                    </span>
                                </div>
                                
                                <div class="space-y-1">
                                    <p class="text-[10px] font-medium text-slate-400">Atas Nama:</p>
                                    <p class="text-xs font-black text-slate-800 uppercase tracking-tight">{{ $gift['account_name'] }}</p>
                                </div>

                                <div class="bg-white rounded-2xl p-3 border border-slate-100 flex items-center justify-between gap-2">
                                    <span class="text-[11px] font-bold text-slate-600 truncate">{{ $gift['account_number'] }}</span>
                                    <button @click="copyToClipboard('{{ $gift['account_number'] }}')" class="flex-shrink-0 p-2 bg-slate-900 text-white rounded-xl hover:bg-[#2159D4] transition-all">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2"></path></svg>
                                    </button>
                                </div>
                            </div>
                            @endif
                            @endforeach
                            
                            @if(count(array_filter(array_column($gifts, 'account_name'))) == 0)
                            <div class="py-20 text-center">
                                <div class="w-12 h-12 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-3">
                                    <svg class="w-6 h-6 text-slate-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                                </div>
                                <p class="text-[10px] font-bold text-slate-300 uppercase tracking-widest">Belum ada data kado</p>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .custom-scrollbar::-webkit-scrollbar { width: 3px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #CBD5E1; border-radius: 10px; }
    </style>
</div>