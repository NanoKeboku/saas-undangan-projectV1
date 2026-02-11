<?php
use Livewire\Volt\Component;

new class extends Component {
    // Simulasi State untuk Filter & Search
    public $search = '';
    public $filterMethod = 'Semua';
}; ?>

<div class="min-h-screen p-6 md:p-10 bg-gradient-to-br from-[#F8FAFC] to-[#EEF2FF] font-['Poppins']">

  <div class="max-w-7xl mx-auto space-y-10">

    <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
      <div>
        <div class="inline-flex items-center gap-2 px-3 py-1 bg-emerald-100 text-emerald-700 rounded-full text-[10px] font-black uppercase tracking-widest mb-3">
          <span class="relative flex h-2 w-2">
            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
            <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
          </span>
          Sistem Monitoring Aktif
        </div>
        <h2 class="text-4xl font-black text-slate-800 tracking-tight leading-none">
          Digital Gift Center
        </h2>
        <p class="text-sm text-slate-500 mt-2">
          Pantau amplop digital dan kado fisik dari tamu undangan secara transparan.
        </p>
      </div>

      <div class="flex gap-3">
        <button class="flex items-center gap-2 px-6 py-3 bg-white border border-slate-200 rounded-2xl text-sm font-bold text-slate-700 hover:bg-slate-50 transition shadow-sm">
          <span>📊</span> Lihat Laporan
        </button>
        <button class="flex items-center gap-2 px-6 py-3 bg-slate-900 text-white rounded-2xl text-sm font-bold hover:opacity-90 transition shadow-lg shadow-slate-900/20">
          <span>✨</span> Kelola QRIS
        </button>
      </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
      <div class="bg-white p-6 rounded-[2.5rem] shadow-sm border border-white/50 relative overflow-hidden group">
        <div class="absolute -right-4 -top-4 w-24 h-24 bg-emerald-50 rounded-full group-hover:scale-150 transition-transform duration-700"></div>
        <div class="relative">
          <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Total Terkumpul</p>
          <p class="text-3xl font-black mt-2 text-emerald-600 leading-none">Rp 8.250.000</p>
          <div class="mt-4 flex items-center gap-1 text-[10px] font-bold text-emerald-500 bg-emerald-50 w-fit px-2 py-1 rounded-lg">
            ↑ 12% dari kemarin
          </div>
        </div>
      </div>

      <div class="bg-white p-6 rounded-[2.5rem] shadow-sm border border-white/50">
        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Total Transaksi</p>
        <p class="text-3xl font-black mt-2 text-slate-800 leading-none">46 <span class="text-sm font-bold text-slate-400">Gift</span></p>
        <div class="mt-4 flex -space-x-2">
           <div class="w-6 h-6 rounded-full bg-indigo-200 border-2 border-white text-[8px] flex items-center justify-center font-bold">A</div>
           <div class="w-6 h-6 rounded-full bg-pink-200 border-2 border-white text-[8px] flex items-center justify-center font-bold">B</div>
           <div class="w-6 h-6 rounded-full bg-emerald-200 border-2 border-white text-[8px] flex items-center justify-center font-bold">C</div>
           <div class="w-6 h-6 rounded-full bg-slate-100 border-2 border-white text-[8px] flex items-center justify-center font-bold text-slate-400">+43</div>
        </div>
      </div>

      <div class="bg-white p-6 rounded-[2.5rem] shadow-sm border border-white/50">
        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Rata-rata Nominal</p>
        <p class="text-3xl font-black mt-2 text-slate-800 leading-none">Rp 179k</p>
        <div class="mt-4 w-full bg-slate-100 h-1.5 rounded-full overflow-hidden">
            <div class="bg-indigo-500 h-full w-[65%]"></div>
        </div>
      </div>

      <div class="bg-white p-6 rounded-[2.5rem] shadow-sm border border-white/50">
        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Gift Terbesar</p>
        <p class="text-3xl font-black mt-2 text-indigo-600 leading-none">Rp 1.0M</p>
        <p class="mt-4 text-[10px] font-bold text-slate-400 uppercase italic">Oleh: Keluarga Wijaya</p>
      </div>
    </div>

    <div class="bg-white rounded-[3rem] shadow-xl shadow-slate-200/50 overflow-hidden border border-white">
      
      <div class="p-8 space-y-8">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
          <div>
            <h3 class="text-xl font-black text-slate-800 tracking-tight">Daftar Hadir Digital</h3>
            <p class="text-xs text-slate-400 font-bold uppercase tracking-widest mt-1">Real-time Transaction Logs</p>
          </div>
          
          <div class="flex items-center gap-2">
            <button class="p-3 bg-slate-50 text-slate-600 rounded-xl hover:bg-slate-100 transition">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
            </button>
            <button class="p-3 bg-slate-50 text-slate-600 rounded-xl hover:bg-slate-100 transition">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2-8H7a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2V3z"></path></svg>
            </button>
          </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4">
          <div class="lg:col-span-2 relative">
            <input type="text" placeholder="Cari nama atau pesan tamu..." 
                   class="w-full pl-12 pr-4 py-4 bg-slate-50 border-none rounded-2xl text-sm font-bold focus:ring-4 focus:ring-indigo-500/10 transition outline-none">
            <span class="absolute left-5 top-1/2 -translate-y-1/2 opacity-30">🔍</span>
          </div>
          
          <select class="px-4 py-4 bg-slate-50 border-none rounded-2xl text-xs font-black uppercase tracking-widest outline-none focus:ring-4 focus:ring-indigo-500/10 transition">
            <option>Semua Metode</option>
            <option>Bank BCA</option>
            <option>QRIS</option>
            <option>Dana/Gopay</option>
          </select>

          <select class="px-4 py-4 bg-slate-50 border-none rounded-2xl text-xs font-black uppercase tracking-widest outline-none focus:ring-4 focus:ring-indigo-500/10 transition">
            <option>Semua Status</option>
            <option>✅ Terverifikasi</option>
            <option>⏳ Menunggu</option>
          </select>

          <button class="py-4 bg-indigo-50 text-indigo-600 rounded-2xl text-xs font-black uppercase tracking-widest hover:bg-indigo-100 transition">
            Terapkan Filter
          </button>
        </div>
      </div>

      <div class="overflow-x-auto">
        <table class="w-full">
          <thead>
            <tr class="bg-slate-50/50 border-y border-slate-100">
              <th class="px-8 py-5 text-left text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Pemberi Gift</th>
              <th class="px-8 py-5 text-left text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Metode & Status</th>
              <th class="px-8 py-5 text-left text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Nominal</th>
              <th class="px-8 py-5 text-left text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Pesan Singkat</th>
              <th class="px-8 py-5 text-right text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Aksi</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-slate-50">
            <tr class="group hover:bg-slate-50/80 transition-all duration-300">
              <td class="px-8 py-6">
                <div class="flex items-center gap-4">
                  <div class="w-10 h-10 bg-indigo-600 rounded-full flex items-center justify-center text-white font-black text-xs shadow-lg shadow-indigo-200">
                    AW
                  </div>
                  <div>
                    <p class="text-sm font-black text-slate-800">Ani Wijaya</p>
                    <p class="text-[10px] text-slate-400 font-bold uppercase tracking-tighter">Tamu VIP • 10:12 WIB</p>
                  </div>
                </div>
              </td>
              <td class="px-8 py-6">
                <div class="space-y-2">
                    <div class="flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                        <span class="text-xs font-black text-slate-700 uppercase tracking-tighter">BCA Transfer</span>
                    </div>
                    <span class="px-2 py-1 bg-emerald-50 text-emerald-600 text-[9px] font-black rounded-lg uppercase tracking-widest border border-emerald-100">
                        Terverifikasi
                    </span>
                </div>
              </td>
              <td class="px-8 py-6">
                <p class="text-base font-black text-slate-800 tracking-tight">Rp 250.000</p>
              </td>
              <td class="px-8 py-6 max-w-[200px]">
                <p class="text-xs text-slate-500 font-medium leading-relaxed truncate group-hover:whitespace-normal">
                    "Semoga sakinah mawaddah warahmah ya Ani & Budi! Ditunggu dedek bayinya..."
                </p>
              </td>
              <td class="px-8 py-6 text-right">
                <div class="flex justify-end gap-2">
                    <button class="p-2 bg-white border border-slate-100 text-slate-400 rounded-xl hover:text-indigo-600 hover:border-indigo-100 transition shadow-sm">
                        👁️
                    </button>
                    <button class="p-2 bg-white border border-slate-100 text-slate-400 rounded-xl hover:text-emerald-600 hover:border-emerald-100 transition shadow-sm">
                        ✅
                    </button>
                </div>
              </td>
            </tr>

            <tr class="group hover:bg-slate-50/80 transition-all duration-300">
              <td class="px-8 py-6">
                <div class="flex items-center gap-4">
                  <div class="w-10 h-10 bg-pink-500 rounded-full flex items-center justify-center text-white font-black text-xs shadow-lg shadow-pink-200">
                    BS
                  </div>
                  <div>
                    <p class="text-sm font-black text-slate-800">Budi Santoso</p>
                    <p class="text-[10px] text-slate-400 font-bold uppercase tracking-tighter">Teman Kantor • 19:32 WIB</p>
                  </div>
                </div>
              </td>
              <td class="px-8 py-6">
                <div class="space-y-2">
                    <div class="flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-yellow-500 animate-pulse"></span>
                        <span class="text-xs font-black text-slate-700 uppercase tracking-tighter">Dana E-Wallet</span>
                    </div>
                    <span class="px-2 py-1 bg-yellow-50 text-yellow-600 text-[9px] font-black rounded-lg uppercase tracking-widest border border-yellow-100">
                        Menunggu Konfirmasi
                    </span>
                </div>
              </td>
              <td class="px-8 py-6">
                <p class="text-base font-black text-slate-800 tracking-tight">Rp 100.000</p>
              </td>
              <td class="px-8 py-6 italic text-slate-300 text-xs">
                — Tidak ada pesan
              </td>
              <td class="px-8 py-6 text-right">
                <div class="flex justify-end gap-2">
                    <button class="p-2 bg-white border border-slate-100 text-slate-400 rounded-xl hover:text-indigo-600 hover:border-indigo-100 transition shadow-sm">
                        👁️
                    </button>
                    <button class="px-4 py-2 bg-indigo-600 text-white text-[10px] font-black rounded-xl hover:bg-indigo-700 transition shadow-md shadow-indigo-100">
                        VERIFIKASI
                    </button>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="p-8 bg-slate-50/30 flex items-center justify-between border-t border-slate-50">
        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-[0.2em]">Menampilkan 2 dari 46 Data</p>
        <div class="flex gap-2">
            <button class="px-4 py-2 bg-white border border-slate-200 rounded-xl text-[10px] font-black disabled:opacity-50">PREV</button>
            <button class="px-4 py-2 bg-slate-900 text-white rounded-xl text-[10px] font-black shadow-lg shadow-slate-900/10">NEXT</button>
        </div>
      </div>
    </div>
  </div>
</div>