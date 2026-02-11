<?php
use Livewire\Volt\Component;

new class extends Component {
    // Logic: Ambil data transaksi dari database
}; ?>

<div class="min-h-screen p-6 md:p-10 bg-[#F8FAFC] font-['Poppins'] text-[#000000]">
    <div class="max-w-6xl mx-auto space-y-8">
        
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <div>
                <h2 class="text-3xl font-black tracking-tight text-[#000000]">Billing History</h2>
                <p class="text-sm font-medium text-[#6B6B6B] mt-1">Kelola semua invoice dan riwayat langganan lu di sini.</p>
            </div>
            
            <div class="flex gap-3">
                <button class="px-5 py-2.5 bg-white border border-[#2159D4]/10 rounded-xl text-xs font-bold text-[#6B6B6B] shadow-sm hover:bg-gray-50 transition">
                    Export PDF
                </button>
                <div class="px-5 py-2.5 bg-[#99B9FF]/10 border border-[#99B9FF]/20 rounded-xl text-xs font-bold text-[#2159D4]">
                    Total Spend: <span class="font-black text-[#000000]">Rp 1.250.000</span>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-[2.5rem] border border-[#2159D4]/10 shadow-[0_20px_50px_rgba(33,89,212,0.02)] overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-[#F8FAFC]/50 border-b border-[#E6EEF9]">
                            <th class="px-8 py-5 text-[10px] font-black text-[#6B6B6B] uppercase tracking-widest">No. Invoice</th>
                            <th class="px-8 py-5 text-[10px] font-black text-[#6B6B6B] uppercase tracking-widest">Tanggal</th>
                            <th class="px-8 py-5 text-[10px] font-black text-[#6B6B6B] uppercase tracking-widest">Package</th>
                            <th class="px-8 py-5 text-[10px] font-black text-[#6B6B6B] uppercase tracking-widest">Status</th>
                            <th class="px-8 py-5 text-[10px] font-black text-[#6B6B6B] uppercase tracking-widest text-right">Nominal</th>
                            <th class="px-8 py-5 text-[10px] font-black text-[#6B6B6B] uppercase tracking-widest text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        <tr class="hover:bg-slate-50/50 transition-colors group">
                            <td class="px-8 py-6">
                                <span class="text-xs font-black text-[#2159D4]">#INV-2026-001</span>
                            </td>
                            <td class="px-8 py-6">
                                <p class="text-xs font-bold text-[#000000]">09 Feb 2026</p>
                                <p class="text-[10px] text-[#6B6B6B]">14:20 WIB</p>
                            </td>
                            <td class="px-8 py-6">
                                <div class="flex items-center gap-2">
                                    <div class="w-2 h-2 rounded-full bg-[#2159D4]"></div>
                                    <span class="text-xs font-bold">Premium Wedding</span>
                                </div>
                            </td>
                            <td class="px-8 py-6">
                                <span class="inline-flex items-center px-3 py-1 rounded-full bg-emerald-50 text-emerald-600 text-[10px] font-black uppercase tracking-tighter border border-emerald-100">
                                    Success
                                </span>
                            </td>
                            <td class="px-8 py-6 text-right">
                                <span class="text-sm font-black text-[#000000]">Rp 450.000</span>
                            </td>
                            <td class="px-8 py-6 text-center">
                                <button class="p-2 hover:bg-[#99B9FF]/20 rounded-xl transition text-[#2159D4]">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                </button>
                            </td>
                        </tr>

                        <tr class="hover:bg-slate-50/50 transition-colors group">
                            <td class="px-8 py-6">
                                <span class="text-xs font-black text-[#2159D4]">#INV-2026-002</span>
                            </td>
                            <td class="px-8 py-6 text-xs font-bold text-[#000000]">08 Feb 2026</td>
                            <td class="px-8 py-6">
                                <div class="flex items-center gap-2">
                                    <div class="w-2 h-2 rounded-full bg-orange-400"></div>
                                    <span class="text-xs font-bold">Live Studio Add-on</span>
                                </div>
                            </td>
                            <td class="px-8 py-6">
                                <span class="inline-flex items-center px-3 py-1 rounded-full bg-orange-50 text-orange-600 text-[10px] font-black uppercase tracking-tighter border border-orange-100">
                                    Pending
                                </span>
                            </td>
                            <td class="px-8 py-6 text-right font-black text-sm">Rp 150.000</td>
                            <td class="px-8 py-6 text-center">
                                <button class="px-4 py-1.5 bg-[#2159D4] text-white text-[10px] font-black rounded-lg shadow-lg shadow-[#2159D4]/20 hover:scale-105 transition">
                                    BAYAR
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="bg-[#F8FAFC]/50 px-8 py-5 border-t border-[#E6EEF9] flex justify-between items-center">
                <p class="text-[10px] font-bold text-[#6B6B6B] uppercase tracking-widest">Showing 2 of 24 transactions</p>
                <div class="flex gap-2">
                    <button class="p-2 bg-white border border-[#2159D4]/10 rounded-lg text-[#6B6B6B] hover:text-[#2159D4]"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg></button>
                    <button class="p-2 bg-white border border-[#2159D4]/10 rounded-lg text-[#6B6B6B] hover:text-[#2159D4]"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg></button>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="p-6 bg-gradient-to-br from-[#2159D4] to-[#1e4bb3] rounded-[2rem] text-white shadow-xl shadow-[#2159D4]/20 relative overflow-hidden">
                <div class="relative z-10">
                    <h4 class="text-sm font-bold opacity-80 uppercase tracking-widest">Active Plan</h4>
                    <p class="text-2xl font-black mt-2">Premium Studio Bundle</p>
                    <p class="text-xs mt-4 font-medium opacity-70">Renew on March 09, 2026</p>
                </div>
                <svg class="absolute -right-4 -bottom-4 w-32 h-32 opacity-10" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/></svg>
            </div>
            
            <div class="p-6 bg-[#99B9FF]/10 border-2 border-dashed border-[#99B9FF]/30 rounded-[2rem] flex flex-col justify-center items-center text-center">
                <p class="text-xs font-bold text-[#2159D4] uppercase tracking-[0.2em]">Butuh Bantuan Billing?</p>
                <p class="text-[11px] text-[#6B6B6B] mt-1">Tim support kami siap membantu kendala pembayaran lu.</p>
                <button class="mt-4 text-xs font-black text-[#000000] underline decoration-[#99B9FF] decoration-2">Contact Support</button>
            </div>
        </div>
    </div>
</div>  