<?php
use Livewire\Volt\Component;

new class extends Component {
}; ?>

<div class="min-h-screen p-6 md:p-12 bg-[#F8FAFC] font-['Poppins']">
    <div class="max-w-5xl mx-auto">
        
        <div class="mb-3 flex justify-between items-end">
            <div>
                <h2 class="text-[#6B6B6B] text-sm font-bold uppercase tracking-[0.2em] mb-1">Dashboard</h2>
                <h1 class="text-4xl font-black text-[#000000] tracking-tight">Main Hub.</h1>
            </div>
            <div class="hidden md:block">
                <span class="text-xs font-bold text-[#6B6B6B] bg-white px-4 py-2 rounded-full border border-[#99B9FF]/20 shadow-sm">
                    Monday, 09 Feb 2026
                </span>
            </div>
        </div>

        <div class="relative overflow-hidden bg-white rounded-[3.5rem] border border-white shadow-[0_20px_50px_rgba(33,89,212,0.05)]">
            
            <div class="absolute -top-24 -right-24 w-64 h-64 bg-[#99B9FF]/10 rounded-full blur-3xl"></div>
            <div class="absolute -bottom-24 -left-24 w-64 h-64 bg-[#2159D4]/5 rounded-full blur-3xl"></div>

            <div class="relative z-10 p-8 md:p-20 flex flex-col items-center text-center">
                <div class="relative mb-8">
                    <div class="w-24 h-24 bg-gradient-to-br from-[#99B9FF] to-[#2159D4] rounded-[2.5rem] flex items-center justify-center rotate-12 shadow-2xl shadow-[#2159D4]/30 animate-pulse">
                        <svg class="w-12 h-12 text-white -rotate-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6h-6"></path>
                        </svg>
                    </div>
                    <div class="absolute -bottom-2 -right-2 w-10 h-10 bg-white rounded-2xl shadow-lg flex items-center justify-center text-xl">
                        ✨
                    </div>
                </div>

                <h3 class="text-3xl font-black text-[#000000] leading-tight">
                    Waktunya Bikin Momen <br> Jadi Luar Biasa.
                </h3>
                
                <p class="mt-4 text-[#6B6B6B] max-w-sm font-medium leading-relaxed">
                    Undangan digital, buku tamu, hingga live streaming studio dalam satu platform. Mulai buat event pertamamu sekarang.
                </p>

                <div class="mt-10 flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('my-theme.template') }}" 
                       wire:navigate 
                       class="group relative px-10 py-5 bg-[#2159D4] text-white rounded-[2rem] font-black text-xs uppercase tracking-widest shadow-xl shadow-[#2159D4]/30 hover:scale-105 active:scale-95 transition-all">
                        <span class="relative z-10 flex items-center gap-2">
                            Mulai Buat Event 
                            <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
                        </span>
                    </a>
                </div>
            </div>

            <div class="bg-[#F8FAFC] border-t border-[#E6EEF9] p-8 grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="flex items-center gap-4 p-4">
                    <div class="w-10 h-10 rounded-xl bg-white flex items-center justify-center shadow-sm text-[#2159D4]">
                        📊
                    </div>
                    <div>
                        <p class="text-[10px] font-black text-[#6B6B6B] uppercase tracking-tighter">Real-time</p>
                        <p class="text-xs font-bold text-[#000000]">RSVP Analytics</p>
                    </div>
                </div>
                <div class="flex items-center gap-4 p-4 border-x border-[#E6EEF9]">
                    <div class="w-10 h-10 rounded-xl bg-white flex items-center justify-center shadow-sm text-[#2159D4]">
                        🎬
                    </div>
                    <div>
                        <p class="text-[10px] font-black text-[#6B6B6B] uppercase tracking-tighter">Broadcast</p>
                        <p class="text-xs font-bold text-[#000000]">Live Studio Overlay</p>
                    </div>
                </div>
                <div class="flex items-center gap-4 p-4">
                    <div class="w-10 h-10 rounded-xl bg-white flex items-center justify-center shadow-sm text-[#2159D4]">
                        🎁
                    </div>
                    <div>
                        <p class="text-[10px] font-black text-[#6B6B6B] uppercase tracking-tighter">Finance</p>
                        <p class="text-xs font-bold text-[#000000]">Digital Gift Tracking</p>
                    </div>
                </div>
            </div>
        </div>

            <div class="mt-16 text-center">
                <p class="text-gray-400 font-medium italic">
                    💡 Tip: Semua perubahan dapat diedit setelah dipublikasikan. Jadi, coba saja!
                </p>
            </div>
   
    </div>
        <div class="relative overflow-hidden py-24">
        {{-- <div class="absolute inset-0 bg-[#0a0a1a] z-0">
             <div class="absolute top-0 left-1/4 w-96 h-96 bg-purple-500 rounded-full mix-blend-screen filter blur-[128px] opacity-20 animate-pulse"></div>
             <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-blue-500 rounded-full mix-blend-screen filter blur-[128px] opacity-20 animate-pulse delay-1000"></div>
        </div> --}}

        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <div class="bg-gradient-to-r from-purple-600/80 to-blue-600/80 backdrop-blur-xl rounded-[40px] p-10 md:p-16 text-white shadow-2xl border border-white/10">
                <h2 class="text-4xl font-black mb-12 text-center tracking-tighter">Apa yang Bisa Anda Lakukan?</h2>
                
                <div class="grid md:grid-cols-3 gap-10">
                    <div class="bg-white/5 backdrop-blur-md rounded-3xl p-8 border border-white/10 hover:bg-white/10 transition-all duration-300">
                        <div class="text-5xl mb-6">✨</div>
                        <h3 class="text-xl font-black mb-3">Kustomisasi Penuh</h3>
                        <p class="text-sm text-white/70 leading-relaxed">Ubah warna, font, dan layout sesuai preferensi Anda tanpa batas.</p>
                    </div>
                    
                    <div class="bg-white/5 backdrop-blur-md rounded-3xl p-8 border border-white/10 hover:bg-white/10 transition-all duration-300">
                        <div class="text-5xl mb-6">📱</div>
                        <h3 class="text-xl font-black mb-3">Mobile Optimized</h3>
                        <p class="text-sm text-white/70 leading-relaxed">Tampil sempurna di semua perangkat. Tamu bisa buka dari HP dengan lancar.</p>
                    </div>
                    
                    <div class="bg-white/5 backdrop-blur-md rounded-3xl p-8 border border-white/10 hover:bg-white/10 transition-all duration-300">
                        <div class="text-5xl mb-6">🚀</div>
                        <h3 class="text-xl font-black mb-3">Instan & Cepat</h3>
                        <p class="text-sm text-white/70 leading-relaxed">Publish undangan dalam hitungan menit. Share link ke tamu Anda langsung.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
         <p class="mt-8 text-center text-[10px] font-bold text-[#6B6B6B] uppercase tracking-[0.3em]">
            Need help? <a href="#" class="text-[#2159D4] hover:underline">Read Documentation</a>
        </p>
</div>