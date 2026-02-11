<?php
use Livewire\Volt\Component;
use Livewire\WithPagination;

new class extends Component {
    use WithPagination;

    // State Management
    public $search = '';
    public $openModal = false;
    public $isEdit = false;
    
    // Form Fields
    public $guestId;
    public $name;
    public $category = 'Teman';
    public $whatsapp;

    // Simulasi Data (Ganti ke Model Guest::query() kalau sudah ada Database)
    public function getGuestsProperty()
    {
        $data = collect([
            [
                'id' => 1, 
                'name' => 'Budi Santoso', 
                'category' => 'Teman Kantor', 
                'whatsapp' => '62812345678', 
                'status' => 'WhatsApp Terkirim', 
                'status_color' => 'emerald',
                'rsvp' => 'Hadir (2 Orang)', 
                'last_seen' => '2 Jam Lalu',
                'initials' => 'BS',
                'bg' => 'from-blue-600 to-indigo-400'
            ],
            [
                'id' => 2, 
                'name' => 'Siti Aisyah', 
                'category' => 'Keluarga Besar', 
                'whatsapp' => '62812987654', 
                'status' => 'Link Dibuka', 
                'status_color' => 'amber',
                'rsvp' => 'Belum Merespon', 
                'last_seen' => '10 Menit Lalu',
                'initials' => 'SA',
                'bg' => 'from-pink-500 to-rose-400'
            ],
        ]);

        if ($this->search) {
            return $data->filter(fn($item) => 
                str_contains(strtolower($item['name']), strtolower($this->search)) ||
                str_contains(strtolower($item['category']), strtolower($this->search))
            );
        }

        return $data;
    }

    public function addGuest() 
    {
        $this->resetForm();
        $this->isEdit = false;
        $this->openModal = true;
    }

    public function editGuest($id) 
    {
        $this->isEdit = true;
        $this->guestId = $id;
        
        // Simulasi ambil data satu user (Nanti ganti ke Database)
        $guest = collect($this->getGuestsProperty())->firstWhere('id', $id);
        
        $this->name = $guest['name'];
        $this->category = $guest['category'];
        $this->whatsapp = $guest['whatsapp'];
        
        $this->openModal = true;
    }

    public function saveGuest() 
    {
        $this->validate([
            'name' => 'required|min:3',
            'whatsapp' => 'required|numeric',
        ]);

        // Logic DB: Guest::updateOrCreate(['id' => $this->guestId], [...])
        
        $this->openModal = false;
        $this->resetForm();
        // $this->dispatch('notify', 'Data Berhasil Disimpan');
    }

    public function deleteGuest($id) 
    {
        // Logic DB: Guest::destroy($id);
    }

    public function resetForm() 
    {
        $this->guestId = null;
        $this->name = '';
        $this->category = 'Teman';
        $this->whatsapp = '';
    }
}; ?>

<div class="min-h-screen p-6 md:p-10 bg-[#F1F5F9] font-['Poppins'] text-slate-800">
    <div class="max-w-7xl mx-auto space-y-8">

        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 bg-white p-8 rounded-[2.5rem] shadow-sm border border-white">
            <div class="space-y-1">
                <div class="flex items-center gap-2">
                    <span class="p-2 bg-blue-50 text-blue-600 rounded-lg">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </span>
                    <h2 class="text-2xl font-black tracking-tight text-slate-900">Guest Management</h2>
                </div>
                <p class="text-sm text-slate-400 font-medium">Kelola & monitor efektivitas undangan dalam satu layar.</p>
            </div>

            <div class="flex items-center gap-3">
                <button class="px-5 py-3 bg-white border border-slate-200 rounded-2xl font-bold text-sm hover:bg-slate-50 transition">
                    Export Data
                </button>
                <button wire:click="addGuest" class="px-6 py-3 bg-[#2159D4] text-white rounded-2xl font-bold text-sm shadow-xl shadow-blue-200 hover:scale-105 active:scale-95 transition-all flex items-center gap-2">
                    <span>+</span> Tambah Penerima
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white p-6 rounded-[2rem] border border-white shadow-sm hover:shadow-md transition">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Total Guest</p>
                        <p class="text-3xl font-black mt-1 text-slate-900">120</p>
                    </div>
                    <div class="p-3 bg-blue-50 text-blue-600 rounded-2xl text-xl">👥</div>
                </div>
            </div>
            <div class="bg-white p-6 rounded-[2rem] border border-white shadow-sm">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Delivered</p>
                        <p class="text-3xl font-black mt-1 text-blue-600">87</p>
                    </div>
                    <div class="text-right">
                        <span class="text-[10px] font-bold text-blue-500 bg-blue-50 px-2 py-1 rounded-lg">72%</span>
                    </div>
                </div>
            </div>
            <div class="bg-white p-6 rounded-[2rem] border border-white shadow-sm">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Opened</p>
                        <p class="text-3xl font-black mt-1 text-emerald-500">54</p>
                    </div>
                    <div class="text-right">
                        <span class="text-[10px] font-bold text-emerald-500 bg-emerald-50 px-2 py-1 rounded-lg">45%</span>
                    </div>
                </div>
            </div>
            <div class="bg-indigo-900 p-6 rounded-[2rem] shadow-xl shadow-indigo-200 relative overflow-hidden">
                <div class="relative z-10">
                    <p class="text-[10px] font-black text-indigo-300 uppercase tracking-widest">RSVP Confirmation</p>
                    <p class="text-3xl font-black mt-1 text-white">32</p>
                    <p class="text-[10px] text-indigo-200 mt-2">Menunggu: 88 Tamu</p>
                </div>
                <div class="absolute -right-4 -bottom-4 text-6xl opacity-20 text-white">💌</div>
            </div>
        </div>

        <div class="bg-white rounded-[2.5rem] shadow-sm border border-white overflow-hidden">
            <div class="p-8 border-b border-slate-50 flex flex-wrap justify-between items-center gap-4">
                <div class="flex items-center gap-4 bg-slate-50 px-4 py-2 rounded-2xl border border-slate-100 focus-within:ring-2 ring-blue-500/20 transition">
                    <span class="text-slate-400 text-sm">🔍</span>
                    <input type="text" wire:model.live="search" placeholder="Cari nama atau kategori..." class="bg-transparent border-none focus:ring-0 text-sm font-bold placeholder:text-slate-300 w-64 text-slate-700">
                </div>
                <div class="flex gap-2">
                    <button class="px-4 py-2 bg-slate-900 text-white text-[10px] font-black rounded-xl hover:opacity-90 transition uppercase tracking-widest">Kirim Massal (WA)</button>
                    <button class="px-4 py-2 bg-slate-100 text-slate-600 text-[10px] font-black rounded-xl hover:bg-slate-200 transition uppercase tracking-widest">Filter</button>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] bg-slate-50/50 text-left">
                            <th class="px-8 py-5"><input type="checkbox" class="rounded text-blue-600"></th>
                            <th class="px-8 py-5 text-slate-400">Detail Tamu</th>
                            <th class="px-8 py-5 text-slate-400">Status Kirim</th>
                            <th class="px-8 py-5 text-slate-400">Respon RSVP</th>
                            <th class="px-8 py-5 text-slate-400">Terakhir Dilihat</th>
                            <th class="px-8 py-5 text-right text-slate-400">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @forelse($this->guests as $guest)
                        <tr class="group hover:bg-blue-50/30 transition" wire:key="{{ $guest['id'] }}">
                            <td class="px-8 py-6"><input type="checkbox" class="rounded text-blue-600"></td>
                            <td class="px-8 py-6">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 bg-gradient-to-tr {{ $guest['bg'] }} rounded-full flex items-center justify-center text-white font-black text-xs">
                                        {{ $guest['initials'] }}
                                    </div>
                                    <div>
                                        <p class="font-black text-sm text-slate-900">{{ $guest['name'] }}</p>
                                        <p class="text-[10px] font-bold text-indigo-500 uppercase">{{ $guest['category'] }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-8 py-6">
                                <div class="flex items-center gap-2">
                                    <div class="w-2 h-2 rounded-full bg-{{ $guest['status_color'] }}-500 {{ $guest['status_color'] == 'amber' ? 'animate-pulse' : '' }}"></div>
                                    <span class="text-xs font-bold text-slate-600 italic">{{ $guest['status'] }}</span>
                                </div>
                            </td>
                            <td class="px-8 py-6">
                                <span class="px-3 py-1 {{ $guest['rsvp'] == 'Belum Merespon' ? 'bg-slate-100 text-slate-400' : 'bg-emerald-100 text-emerald-700' }} rounded-xl text-[10px] font-black uppercase tracking-wider border border-current">
                                    {{ $guest['rsvp'] }}
                                </span>
                            </td>
                            <td class="px-8 py-6 text-xs font-bold text-slate-400 uppercase tracking-tighter">
                                {{ $guest['last_seen'] }}
                            </td>
                            <td class="px-8 py-6 text-right">
                                <div class="flex justify-end gap-2 opacity-0 group-hover:opacity-100 transition">
                                    <a href="https://wa.me/{{ $guest['whatsapp'] }}?text=Halo%20{{ urlencode($guest['name']) }},%20kami%20mengundang%20anda..." 
                                       target="_blank" 
                                       class="p-2 bg-white border border-slate-200 rounded-xl hover:bg-blue-600 hover:text-white transition shadow-sm" title="Kirim Ulang">📲</a>
                                    <button wire:click="editGuest({{ $guest['id'] }})" class="p-2 bg-white border border-slate-200 rounded-xl hover:bg-slate-900 hover:text-white transition shadow-sm" title="Edit">✏️</button>
                                    <button onclick="confirm('Yakin hapus tamu ini?') || event.stopImmediatePropagation()" 
                                            wire:click="deleteGuest({{ $guest['id'] }})" 
                                            class="p-2 bg-red-50 text-red-500 rounded-xl hover:bg-red-500 hover:text-white transition shadow-sm" title="Hapus">🗑️</button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-8 py-10 text-center text-slate-400 font-bold">Data tamu tidak ditemukan...</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div x-show="$wire.openModal" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 scale-90"
         x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-90"
         class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm flex items-center justify-center z-50 p-4" 
         x-cloak>
        
        <div class="bg-white rounded-[3rem] p-10 w-full max-w-xl shadow-2xl border border-white" @click.away="$wire.openModal = false">
            <div class="flex justify-between items-start mb-8 text-slate-900">
                <div>
                    <h3 class="text-2xl font-black tracking-tight">{{ $isEdit ? 'Update Guest' : 'Add New Guest' }}</h3>
                    <p class="text-xs text-slate-400 font-bold uppercase tracking-widest mt-1">Lengkapi data penerima undangan</p>
                </div>
                <button @click="$wire.openModal = false" class="text-slate-300 hover:text-slate-900 text-2xl font-black transition">&times;</button>
            </div>

            <form wire:submit.prevent="saveGuest" class="space-y-6">
                <div class="grid grid-cols-2 gap-4">
                    <div class="col-span-2 space-y-2">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Nama Lengkap</label>
                        <input type="text" wire:model="name" placeholder="Misal: Bapak Budi Santoso" class="w-full px-5 py-4 bg-slate-50 border-none rounded-2xl text-sm font-bold focus:ring-4 focus:ring-blue-500/10 transition outline-none text-slate-700">
                        @error('name') <span class="text-red-500 text-[10px] font-bold">{{ $message }}</span> @enderror
                    </div>
                    
                    <div class="space-y-2">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Kategori</label>
                        <select wire:model="category" class="w-full px-5 py-4 bg-slate-50 border-none rounded-2xl text-xs font-black uppercase outline-none focus:ring-4 focus:ring-blue-500/10 transition text-slate-700">
                            <option value="Teman">Teman</option>
                            <option value="Keluarga Besar">Keluarga</option>
                            <option value="VIP">VIP</option>
                            <option value="Teman Kantor">Teman Kantor</option>
                        </select>
                    </div>

                    <div class="space-y-2">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">WhatsApp Number</label>
                        <input type="text" wire:model="whatsapp" placeholder="62812xxx" class="w-full px-5 py-4 bg-slate-50 border-none rounded-2xl text-sm font-bold focus:ring-4 focus:ring-blue-500/10 transition outline-none text-slate-700">
                        @error('whatsapp') <span class="text-red-500 text-[10px] font-bold">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="pt-4 flex gap-3">
                    <button type="button" @click="$wire.openModal = false" class="flex-1 py-4 bg-slate-100 text-slate-600 rounded-2xl font-black text-[11px] uppercase tracking-widest hover:bg-slate-200 transition">Batal</button>
                    <button type="submit" class="flex-1 py-4 bg-slate-900 text-white rounded-2xl font-black text-[11px] uppercase tracking-widest shadow-xl shadow-slate-200 hover:scale-105 active:scale-95 transition-all">
                        {{ $isEdit ? 'Update Tamu' : 'Simpan Tamu' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>