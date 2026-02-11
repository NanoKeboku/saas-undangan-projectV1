<?php
use Livewire\Volt\Component;

new class extends Component {
    // Logic untuk toggle visibility, hapus ucapan, dll.
}; ?>

<div class="min-h-screen p-6 md:p-12 bg-[#F1F6FF] font-['Poppins'] text-slate-800">

    <div class="max-w-7xl mx-auto space-y-12">

        <div class="flex flex-col md:flex-row justify-between items-center gap-6">
            <div class="text-center md:text-left">
                <h2 class="text-4xl font-black text-slate-900 tracking-tight italic">Wishes Wall</h2>
                <p class="text-sm text-slate-400 font-bold uppercase tracking-[0.2em] mt-2">Daftar Doa & Harapan Tamu</p>
            </div>
            
            <div class="flex gap-4">
                <div class="bg-white px-6 py-3 rounded-2xl shadow-sm border border-white flex items-center gap-3">
                    <span class="text-2xl">💌</span>
                    <div>
                        <p class="text-[10px] font-black text-slate-400 uppercase">Total Ucapan</p>
                        <p class="text-lg font-black text-slate-800">1,284</p>
                    </div>
                </div>
                <div class="bg-emerald-500 px-6 py-3 rounded-2xl shadow-lg shadow-emerald-200 flex items-center gap-3 text-white">
                    <span class="text-2xl">✨</span>
                    <div>
                        <p class="text-[10px] font-black opacity-80 uppercase">Lolos Moderasi</p>
                        <p class="text-lg font-black">99%</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-wrap justify-between items-center gap-4 bg-white/50 p-3 rounded-[2rem] backdrop-blur-md">
            <div class="flex gap-2">
                <button class="px-6 py-2.5 rounded-full bg-slate-900 text-white text-[10px] font-black uppercase tracking-widest shadow-xl shadow-slate-200 transition">Semua</button>
                <button class="px-6 py-2.5 rounded-full bg-white text-slate-500 text-[10px] font-black uppercase tracking-widest hover:bg-slate-50 transition">Pending</button>
                <button class="px-6 py-2.5 rounded-full bg-white text-slate-500 text-[10px] font-black uppercase tracking-widest hover:bg-slate-50 transition">Dihapus</button>
            </div>
            
            <div class="relative">
                <input type="text" placeholder="Cari kata kunci ucapan..." class="pl-10 pr-4 py-2.5 bg-white border-none rounded-full text-xs font-bold shadow-sm focus:ring-2 focus:ring-indigo-500 outline-none w-64">
                <span class="absolute left-4 top-1/2 -translate-y-1/2 opacity-30 text-xs">🔍</span>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="group bg-white p-8 rounded-[3rem] shadow-sm border border-white relative transition-all hover:-translate-y-2 hover:shadow-2xl">
                <div class="absolute -top-3 -left-3 w-10 h-10 bg-yellow-400 rounded-2xl flex items-center justify-center text-xl shadow-lg rotate-12 group-hover:rotate-0 transition-transform">⭐</div>
                
                <div class="flex items-center gap-4 mb-6">
                    <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center text-white text-xl font-black shadow-lg shadow-indigo-100">B</div>
                    <div>
                        <p class="font-black text-slate-800 text-lg">Budi Santoso</p>
                        <p class="text-[10px] font-bold text-indigo-500 uppercase tracking-widest">Sahabat Mempelai</p>
                    </div>
                </div>
                
                <p class="text-sm leading-relaxed text-slate-600 font-medium italic">
                    "Semoga lancar acaranya, sakinah mawaddah warahmah, bahagia selalu sampai tua bersama. Kalian pasangan yang sangat menginspirasi kami semua! 🤍"
                </p>
                
                <div class="mt-8 pt-6 border-t border-slate-50 flex justify-between items-center">
                    <span class="text-[10px] font-black text-slate-300 uppercase">5 Menit Lalu</span>
                    <div class="flex gap-2">
                        <button class="text-xs font-black text-rose-500 bg-rose-50 px-3 py-1 rounded-lg hover:bg-rose-500 hover:text-white transition">Hapus</button>
                    </div>
                </div>
            </div>

            <div class="bg-white/70 p-8 rounded-[3rem] shadow-sm border border-white relative transition-all hover:bg-white hover:shadow-xl group">
                <div class="flex items-center gap-4 mb-6">
                    <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-rose-400 to-pink-500 flex items-center justify-center text-white text-xl font-black shadow-lg shadow-pink-100">S</div>
                    <div>
                        <p class="font-black text-slate-800 text-lg text-opacity-80">Siti Aisyah</p>
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Keluarga Besar</p>
                    </div>
                </div>
                <p class="text-sm leading-relaxed text-slate-500 font-medium">
                    "MasyaAllah tabarakallah, semoga Allah mudahkan setiap langkah kalian, jadi keluarga yang penuh berkah dan segera diberikan keturunan yang sholeh/sholehah. Amin! 🤲"
                </p>
                <div class="mt-8 pt-6 border-t border-slate-50 flex justify-between items-center opacity-0 group-hover:opacity-100 transition-opacity">
                    <span class="text-[10px] font-black text-slate-300 uppercase tracking-tighter">1 Jam Lalu</span>
                    <button class="text-[10px] font-black text-indigo-600 bg-indigo-50 px-3 py-1 rounded-lg hover:bg-indigo-600 hover:text-white transition uppercase">Sematkan</button>
                </div>
            </div>
        </div>

        <div class="bg-slate-900 rounded-[3rem] shadow-2xl overflow-hidden mt-16">
            <div class="p-8 border-b border-slate-800 flex justify-between items-center">
                <div>
                    <h3 class="text-xl font-black text-white tracking-tight">Bulk Moderation</h3>
                    <p class="text-[10px] text-slate-500 font-bold uppercase mt-1">Kelola ucapan secara massal untuk tampilan undangan</p>
                </div>
                <button class="px-5 py-2 bg-rose-600 text-white text-[10px] font-black rounded-xl hover:bg-rose-700 transition">HAPUS SEMUA SPAM</button>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em] bg-slate-800/50">
                            <th class="px-8 py-5">Pengirim</th>
                            <th class="px-8 py-5">Isi Pesan</th>
                            <th class="px-8 py-5">Status</th>
                            <th class="px-8 py-5 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-800">
                        <tr class="hover:bg-white/5 transition group">
                            <td class="px-8 py-6">
                                <p class="text-sm font-black text-white">Ahmad Fauzi</p>
                                <p class="text-[10px] text-slate-500 font-bold uppercase tracking-tighter">Kemarin, 21:04</p>
                            </td>
                            <td class="px-8 py-6">
                                <p class="text-xs text-slate-400 line-clamp-1 group-hover:line-clamp-none transition-all">"Selamat menempuh hidup baru! Semoga langgeng, bahagia, dan sukses selalu 🙏"</p>
                            </td>
                            <td class="px-8 py-6">
                                <span class="px-3 py-1 bg-emerald-500/10 text-emerald-500 rounded-lg text-[10px] font-black uppercase border border-emerald-500/20">Ditampilkan</span>
                            </td>
                            <td class="px-8 py-6 text-right">
                                <div class="flex justify-end gap-2">
                                    <button class="p-2 bg-slate-800 text-slate-400 rounded-xl hover:text-white transition">👁️</button>
                                    <button class="p-2 bg-slate-800 text-rose-400 rounded-xl hover:bg-rose-600 hover:text-white transition">🗑️</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>