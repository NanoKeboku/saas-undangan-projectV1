<?php
use Livewire\Volt\Component;

new class extends Component {
    public $activeTab = 'semua';
}; ?>

<div class="min-h-screen p-6 md:p-10 bg-[#F1F5F9] font-['Poppins'] text-slate-800" x-data="{ activeTab: 'semua' }">
    <div class="max-w-7xl mx-auto space-y-8">

        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div>
                <h2 class="text-3xl font-black tracking-tight text-slate-900">RSVP Analytics</h2>
                <p class="text-sm text-slate-500 font-medium mt-1">Data kehadiran otomatis tersinkronisasi dengan katering & logistik.</p>
            </div>
            <div class="flex gap-3">
                <button class="px-6 py-3 bg-white border border-slate-200 rounded-2xl text-xs font-black uppercase tracking-widest hover:bg-slate-50 transition shadow-sm">
                    📥 Export Manifest
                </button>
                <button class="px-6 py-3 bg-slate-900 text-white rounded-2xl text-xs font-black uppercase tracking-widest shadow-xl shadow-slate-200 hover:opacity-90 transition">
                    💬 Blast Follow Up
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white p-6 rounded-[2.5rem] border border-white shadow-sm">
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Total Porsi Katering</p>
                <p class="text-4xl font-black mt-2 text-indigo-600">156 <span class="text-sm font-bold text-slate-300 italic uppercase">Pax</span></p>
                <p class="text-[10px] text-slate-400 mt-2">Dihitung dari total akumulasi pax hadir</p>
            </div>
            
            <div class="bg-emerald-500 p-6 rounded-[2.5rem] shadow-xl shadow-emerald-100 relative overflow-hidden text-white">
                <div class="relative z-10">
                    <p class="text-[10px] font-black opacity-80 uppercase tracking-widest">Konfirmasi Hadir</p>
                    <p class="text-4xl font-black mt-2">78 <span class="text-sm opacity-60">Invitations</span></p>
                    <div class="mt-4 bg-white/20 rounded-full h-1.5 w-full">
                        <div class="bg-white h-full rounded-full" style="width: 52%"></div>
                    </div>
                </div>
                <span class="absolute -right-4 -bottom-4 text-7xl opacity-10">✅</span>
            </div>

            <div class="bg-white p-6 rounded-[2.5rem] border border-white shadow-sm text-slate-400 opacity-60">
                <p class="text-[10px] font-black uppercase tracking-widest">Tidak Hadir</p>
                <p class="text-4xl font-black mt-2">12</p>
                <p class="text-[10px] mt-2 font-bold italic">Memberikan ucapan doa</p>
            </div>

            <div class="bg-amber-100 p-6 rounded-[2.5rem] border border-amber-200 shadow-sm">
                <p class="text-[10px] font-black text-amber-700 uppercase tracking-widest">Belum Respon</p>
                <p class="text-4xl font-black mt-2 text-amber-900">60</p>
                <p class="text-[10px] text-amber-700/60 mt-2 underline cursor-pointer hover:text-amber-900 font-bold">Kirim pengingat otomatis →</p>
            </div>
        </div>

        <div class="bg-white rounded-[3rem] shadow-sm border border-white overflow-hidden">
            <div class="flex border-b border-slate-50 px-8 pt-6 gap-8">
                <button @click="activeTab = 'semua'" :class="activeTab === 'semua' ? 'text-indigo-600 border-b-4 border-indigo-600' : 'text-slate-400 border-b-4 border-transparent'" class="pb-4 text-xs font-black uppercase tracking-widest transition-all">Semua</button>
                <button @click="activeTab = 'hadir'" :class="activeTab === 'hadir' ? 'text-emerald-600 border-b-4 border-emerald-600' : 'text-slate-400 border-b-4 border-transparent'" class="pb-4 text-xs font-black uppercase tracking-widest transition-all">Hadir</button>
                <button @click="activeTab = 'tidak'" :class="activeTab === 'tidak' ? 'text-rose-600 border-b-4 border-rose-600' : 'text-slate-400 border-b-4 border-transparent'" class="pb-4 text-xs font-black uppercase tracking-widest transition-all">Tidak Hadir</button>
                <button @click="activeTab = 'pending'" :class="activeTab === 'pending' ? 'text-amber-600 border-b-4 border-amber-600' : 'text-slate-400 border-b-4 border-transparent'" class="pb-4 text-xs font-black uppercase tracking-widest transition-all">Pending</button>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-slate-50/50 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">
                            <th class="px-8 py-5">Tamu Undangan</th>
                            <th class="px-8 py-5">Status & Pax</th>
                            <th class="px-8 py-5">Pesan / Catatan</th>
                            <th class="px-8 py-5">Timestamp</th>
                            <th class="px-8 py-5 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        <tr class="group hover:bg-slate-50/50 transition">
                            <td class="px-8 py-6">
                                <div class="flex items-center gap-4">
                                    <div class="w-10 h-10 bg-slate-100 rounded-2xl flex items-center justify-center font-black text-slate-500 text-xs">SA</div>
                                    <div>
                                        <p class="font-black text-sm text-slate-800">Siti Aisyah</p>
                                        <p class="text-[10px] font-bold text-slate-400 uppercase">Keluarga</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-8 py-6">
                                <div class="flex items-center gap-3">
                                    <span class="px-3 py-1 bg-emerald-100 text-emerald-700 rounded-lg text-[10px] font-black uppercase border border-emerald-200">Hadir</span>
                                    <span class="text-xs font-black text-slate-700">2 <span class="text-slate-300 font-bold">Pax</span></span>
                                </div>
                            </td>
                            <td class="px-8 py-6">
                                <div class="max-w-[200px] text-xs font-medium text-slate-500 leading-relaxed italic">
                                    "Semoga lancar & bahagia ya 💖"
                                </div>
                            </td>
                            <td class="px-8 py-6">
                                <p class="text-[10px] font-black text-slate-400 uppercase">5 Mnt Lalu</p>
                            </td>
                            <td class="px-8 py-6 text-right">
                                <button class="p-2 text-slate-300 hover:text-indigo-600 transition" title="Kirim WA">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                                </button>
                            </td>
                        </tr>

                        <tr class="bg-amber-50/30 group transition">
                            <td class="px-8 py-6">
                                <div class="flex items-center gap-4">
                                    <div class="w-10 h-10 bg-amber-100 rounded-2xl flex items-center justify-center font-black text-amber-600 text-xs text-opacity-50">DL</div>
                                    <div>
                                        <p class="font-black text-sm text-slate-800 opacity-60">Dewi Lestari</p>
                                        <p class="text-[10px] font-bold text-slate-400 uppercase">Teman SMA</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-8 py-6">
                                <span class="px-3 py-1 bg-white text-slate-400 rounded-lg text-[10px] font-black uppercase border border-slate-100 italic">No Response</span>
                            </td>
                            <td class="px-8 py-6 text-xs text-slate-300 italic font-medium">Belum mengisi RSVP...</td>
                            <td class="px-8 py-6">
                                <p class="text-[10px] font-black text-slate-300 uppercase">—</p>
                            </td>
                            <td class="px-8 py-6 text-right">
                                <button class="px-4 py-2 bg-amber-500 text-white text-[9px] font-black rounded-xl shadow-lg shadow-amber-200 hover:scale-105 transition-all">FOLLOW UP</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <div class="px-8 py-6 bg-slate-50/50 flex justify-between items-center border-t border-slate-100">
                <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Page 1 of 5</span>
                <div class="flex gap-2">
                    <button class="w-8 h-8 flex items-center justify-center bg-white border border-slate-200 rounded-xl text-xs font-bold text-slate-400 hover:text-slate-900 transition shadow-sm">←</button>
                    <button class="w-8 h-8 flex items-center justify-center bg-white border border-slate-200 rounded-xl text-xs font-bold text-slate-900 shadow-sm">1</button>
                    <button class="w-8 h-8 flex items-center justify-center bg-white border border-slate-200 rounded-xl text-xs font-bold text-slate-400 hover:text-slate-900 transition shadow-sm">→</button>
                </div>
            </div>
        </div>
    </div>
</div>