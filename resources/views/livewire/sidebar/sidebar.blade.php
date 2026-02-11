<?php
use Livewire\Volt\Component;

new class extends Component {}; ?>

<div x-data="{ 
    expanded: true, 
    mobileOpen: false 
}" class="relative min-h-screen bg-[#F8FAFC]">

    <button @click="mobileOpen = !mobileOpen" 
            class="lg:hidden fixed top-4 left-4 z-[70] p-3 bg-white border border-[#2159D4]/20 rounded-2xl shadow-xl">
        <svg class="w-6 h-6 text-[#2159D4]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
    </button>

    <button @click="expanded = !expanded" 
            class="hidden lg:flex fixed top-6 z-[70] p-2 bg-white border border-[#2159D4]/20 rounded-xl shadow-md hover:bg-[#F8FAFC] transition-all duration-500"
            :style="expanded ? 'left: 18.5rem' : 'left: 4.5rem'">
        <svg :class="expanded ? 'rotate-0' : 'rotate-180'" class="w-5 h-5 text-[#2159D4] transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
    </button>

    <aside 
        :class="{
            'w-80': expanded, 
            'w-24': !expanded,
            'translate-x-0': mobileOpen,
            '-translate-x-full lg:translate-x-0': !mobileOpen
        }"
        class="fixed left-0 top-0 h-screen bg-white border-r border-gray-100 flex flex-col p-6 transition-all duration-500 ease-in-out z-50 font-['Poppins'] shadow-[20px_0_40px_rgba(0,0,0,0.02)] overflow-hidden">
        
        <div class="mb-8 flex items-center h-14 shrink-0">
            <div :class="expanded ? 'px-2 w-full' : 'w-full flex justify-center'">
                <div class="flex items-center gap-4 py-4 bg-[#F8FAFC] border border-[#2159D4]/10 rounded-2xl justify-center min-w-[60px]">
                    <div class="w-8 h-8 bg-[#2159D4] rounded-xl flex items-center justify-center shrink-0 shadow-lg shadow-[#2159D4]/20">
                        <span class="text-white font-black text-sm">W</span>
                    </div>
                    <h1 x-show="expanded" x-transition class="text-lg font-black text-[#000000] tracking-tight whitespace-nowrap">WEDD<span class="text-[#2159D4]">STU</span></h1>
                </div>
            </div>
        </div>

        <nav class="flex-1 space-y-1 overflow-y-auto custom-scrollbar overflow-x-hidden pr-2">
            
            <a href="{{ route('dashboard') }}" wire:navigate 
               class="group relative flex items-center gap-4 px-5 py-4 rounded-2xl font-bold transition-all duration-300 {{ request()->routeIs('dashboard') ? 'bg-[#99B9FF]/20 text-[#2159D4]' : 'text-[#6B6B6B] hover:bg-[#F8FAFC]' }}">
                @if(request()->routeIs('dashboard'))
                    <div class="absolute left-0 w-1.5 h-6 bg-[#2159D4] rounded-r-full"></div>
                @endif
                <svg class="w-6 h-6 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                <span x-show="expanded" x-transition class="whitespace-nowrap">My Event</span>
            </a>

            <div x-data="{ open: {{ request()->routeIs('my-theme.*') ? 'true' : 'false' }} }">
                <button @click="expanded ? (open = !open) : (expanded = true, open = true)" 
                    class="w-full flex items-center justify-between px-5 py-4 rounded-2xl font-bold transition-all {{ request()->routeIs('my-theme.*') ? 'text-[#2159D4]' : 'text-[#6B6B6B] hover:bg-[#F8FAFC]' }}">
                    <div class="flex items-center gap-4">
                        <svg class="w-6 h-6 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path></svg>
                        <span x-show="expanded" x-transition class="whitespace-nowrap">My Theme</span>
                    </div>
                    <svg x-show="expanded" class="w-4 h-4 transition-transform duration-300" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3"><path d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div x-show="open && expanded" x-collapse class="mt-1 ml-11 space-y-1 border-l-2 border-[#99B9FF]/30">
                    <a href="{{ route('my-theme.template') }}" wire:navigate class="block px-6 py-2 text-sm font-bold {{ request()->routeIs('my-theme.template') ? 'text-[#2159D4]' : 'text-[#6B6B6B] hover:text-[#000000]' }}">Template</a>
                    <a href="{{ route('my-theme.studio') }}" wire:navigate class="block px-6 py-2 text-sm font-bold {{ request()->routeIs('my-theme.studio') ? 'text-[#2159D4]' : 'text-[#6B6B6B] hover:text-[#000000]' }}">Studio</a>
                </div>
            </div>

            <div x-data="{ open: {{ request()->routeIs('tamu.*') ? 'true' : 'false' }} }">
                <button @click="expanded ? (open = !open) : (expanded = true, open = true)" 
                    class="w-full flex items-center justify-between px-5 py-4 rounded-2xl font-bold transition-all {{ request()->routeIs('tamu.*') ? 'text-[#2159D4]' : 'text-[#6B6B6B] hover:bg-[#F8FAFC]' }}">
                    <div class="flex items-center gap-4">
                        <svg class="w-6 h-6 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                        <span x-show="expanded" x-transition class="whitespace-nowrap">Tamu Undangan</span>
                    </div>
                    <svg x-show="expanded" class="w-4 h-4 transition-transform duration-300" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3"><path d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div x-show="open && expanded" x-collapse class="mt-1 ml-11 space-y-1 border-l-2 border-[#99B9FF]/30">
                    <a href="{{ route('tamu.index') }}" wire:navigate class="block px-6 py-2 text-sm font-bold {{ request()->routeIs('tamu.index') ? 'text-[#2159D4]' : 'text-[#6B6B6B]' }}">Daftar Tamu</a>
                    <a href="{{ route('tamu.rsvp') }}" wire:navigate class="block px-6 py-2 text-sm font-bold {{ request()->routeIs('tamu.rsvp') ? 'text-[#2159D4]' : 'text-[#6B6B6B]' }}">RSVP</a>
                    <a href="{{ route('tamu.ucapan') }}" wire:navigate class="block px-6 py-2 text-sm font-bold {{ request()->routeIs('tamu.ucapan') ? 'text-[#2159D4]' : 'text-[#6B6B6B]' }}">Ucapan</a>
                </div>
            </div>

            <div x-data="{ open: {{ request()->routeIs('egift.*') ? 'true' : 'false' }} }">
                <button @click="expanded ? (open = !open) : (expanded = true, open = true)" 
                    class="w-full flex items-center justify-between px-5 py-4 rounded-2xl font-bold transition-all {{ request()->routeIs('egift.*') ? 'text-[#2159D4]' : 'text-[#6B6B6B] hover:bg-[#F8FAFC]' }}">
                    <div class="flex items-center gap-4">
                        <svg class="w-6 h-6 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span x-show="expanded" x-transition class="whitespace-nowrap">E-Gift</span>
                    </div>
                    <svg x-show="expanded" class="w-4 h-4 transition-transform duration-300" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3"><path d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div x-show="open && expanded" x-collapse class="mt-1 ml-11 space-y-1 border-l-2 border-[#99B9FF]/30">
                    <a href="{{ route('egift.index') }}" wire:navigate class="block px-6 py-2 text-sm font-bold {{ request()->routeIs('egift.index') ? 'text-[#2159D4]' : 'text-[#6B6B6B]' }}">Daftar Gift</a>
                    <a href="{{ route('egift.setting') }}" wire:navigate class="block px-6 py-2 text-sm font-bold {{ request()->routeIs('egift.setting') ? 'text-[#2159D4]' : 'text-[#6B6B6B]' }}">Setting</a>
                </div>
            </div>

            <div x-data="{ open: {{ request()->routeIs('my-theme.*') ? 'true' : 'false' }} }">
                <button @click="expanded ? (open = !open) : (expanded = true, open = true)" 
                    class="w-full flex items-center justify-between px-5 py-4 rounded-2xl font-bold transition-all {{ request()->routeIs('live.*') ? 'text-[#2159D4]' : 'text-[#6B6B6B] hover:bg-[#F8FAFC]' }}">
                    <div class="flex items-center gap-4">
                        <svg class="w-6 h-6 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                        <span x-show="expanded" x-transition class="whitespace-nowrap">Live Stream</span>
                    </div>
                    <svg x-show="expanded" class="w-4 h-4 transition-transform duration-300" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3"><path d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div x-show="open && expanded" x-collapse class="mt-1 ml-11 space-y-1 border-l-2 border-[#99B9FF]/30">
                    <a href="{{ route('my-theme.template') }}" wire:navigate class="block px-6 py-2 text-sm font-bold {{ request()->routeIs('my-theme.template') ? 'text-[#2159D4]' : 'text-[#6B6B6B]' }}">Template</a>
                    <a href="{{ route('my-theme.studio') }}" wire:navigate class="block px-6 py-2 text-sm font-bold {{ request()->routeIs('my-theme.studio.index') ? 'text-[#2159D4]' : 'text-[#6B6B6B]' }}">Studio</a>
                </div>
            </div>

            <div class="pt-4 border-t border-gray-50 mt-4">
                {{-- <a href="{{ route('package') }}" wire:navigate 
                   class="group relative flex items-center gap-4 px-5 py-4 rounded-2xl font-bold transition-all {{ request()->routeIs('package') ? 'bg-[#99B9FF]/20 text-[#2159D4]' : 'text-[#6B6B6B] hover:bg-[#F8FAFC]' }}">
                    @if(request()->routeIs('package'))
                        <div class="absolute left-0 w-1.5 h-6 bg-[#2159D4] rounded-r-full"></div>
                    @endif
                    <svg class="w-6 h-6 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                    <span x-show="expanded" x-transition class="whitespace-nowrap">My Package</span>
                </a> --}}

                <a href="{{ route('transaction') }}" wire:navigate 
                   class="group relative flex items-center gap-4 px-5 py-4 rounded-2xl font-bold transition-all {{ request()->routeIs('transaction') ? 'bg-[#99B9FF]/20 text-[#2159D4]' : 'text-[#6B6B6B] hover:bg-[#F8FAFC]' }}">
                    @if(request()->routeIs('transaction'))
                        <div class="absolute left-0 w-1.5 h-6 bg-[#2159D4] rounded-r-full"></div>
                    @endif
                    <svg class="w-6 h-6 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                    <span x-show="expanded" x-transition class="whitespace-nowrap">Transaction</span>
                </a>
            </div>

        </nav>

        <div class="mt-auto pt-6 border-t border-gray-100 shrink-0">
            <button class="w-full group flex items-center gap-4 px-5 py-4 rounded-2xl font-black text-[#6B6B6B] hover:text-red-600 hover:bg-red-50 transition-all duration-300">
                <div class="w-10 h-10 rounded-xl bg-gray-50 flex items-center justify-center group-hover:bg-red-100 transition-colors shrink-0">
                    <svg class="w-5 h-5 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                </div>
                <span x-show="expanded" x-transition class="whitespace-nowrap">Log Out</span>
            </button>
        </div>
    </aside>

    <div x-show="mobileOpen" @click="mobileOpen = false" x-transition.opacity class="fixed inset-0 bg-black/50 z-40 lg:hidden"></div>

    <main 
        :class="expanded ? 'lg:pl-80' : 'lg:pl-24'" 
        class="transition-all duration-500 ease-in-out min-h-screen">
        <div class="p-8">
            </div>
    </main>
</div>