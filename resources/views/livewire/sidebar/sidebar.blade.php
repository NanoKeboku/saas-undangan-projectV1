<aside 
    :class="{ 'w-80': expanded, 'w-24': !expanded, 'translate-x-0': mobileOpen, '-translate-x-full lg:translate-x-0': !mobileOpen }"
    class="fixed left-0 top-0 h-screen bg-white border-r border-gray-100 flex flex-col p-6 transition-all duration-500 ease-in-out z-50 overflow-hidden shadow-[20px_0_40px_rgba(0,0,0,0.02)]">
    
    <div class="mb-8 flex items-center h-14 shrink-0">
        <div :class="expanded ? 'px-2 w-full' : 'w-full flex justify-center'">
            <div class="flex items-center gap-4 py-4 bg-[#F8FAFC] border border-[#2159D4]/10 rounded-2xl justify-center min-w-[60px]">
                <div class="w-8 h-8 bg-[#2159D4] rounded-xl flex items-center justify-center shrink-0 shadow-lg shadow-[#2159D4]/20">
                    <span class="text-white font-black text-sm">W</span>
                </div>
                <h1 x-show="expanded" x-transition.opacity.duration.300ms class="text-lg font-black text-[#000000] tracking-tight whitespace-nowrap">
                    WEDD<span class="text-[#2159D4]">STU</span>
                </h1>
            </div>
        </div>
    </div>

    <nav class="flex-1 space-y-6 overflow-y-auto custom-scrollbar overflow-x-hidden pr-2">
        
        <div>
            <p x-show="expanded" class="px-5 mb-2 text-[10px] font-bold uppercase tracking-widest text-gray-400">Main Menu</p>
            <div class="space-y-1">
                <a href="{{ route('dashboard') }}" wire:navigate 
                   class="group relative flex items-center gap-4 px-5 py-3 rounded-2xl font-bold transition-all duration-300 {{ request()->routeIs('dashboard') ? 'bg-[#99B9FF]/20 text-[#2159D4]' : 'text-[#6B6B6B] hover:bg-[#F8FAFC] hover:text-black' }}">
                    @if(request()->routeIs('dashboard'))
                        <div class="absolute left-0 w-1.5 h-6 bg-[#2159D4] rounded-r-full"></div>
                    @endif
                    <svg class="w-6 h-6 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    <div x-show="expanded" x-transition.opacity class="flex flex-col leading-tight">
                        <span class="whitespace-nowrap">My Event</span>
                        <span class="text-[11px] font-medium opacity-70">Manajemen acara kamu</span>
                    </div>
                </a>
            </div>
        </div>

        <div>
            <p x-show="expanded" class="px-5 mb-2 text-[10px] font-bold uppercase tracking-widest text-gray-400">Management</p>
            <div class="space-y-1">
                
                <div x-data="{ open: {{ request()->routeIs('my-theme.*') ? 'true' : 'false' }} }">
                    <button @click="expanded ? (open = !open) : (expanded = true, open = true)" 
                        class="w-full flex items-center justify-between px-5 py-3 rounded-2xl font-bold transition-all {{ request()->routeIs('my-theme.*') ? 'text-[#2159D4]' : 'text-[#6B6B6B] hover:bg-[#F8FAFC]' }}">
                        <div class="flex items-center gap-4 text-left">
                            <svg class="w-6 h-6 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path></svg>
                            <div x-show="expanded" class="flex flex-col leading-tight">
                                <span class="whitespace-nowrap">My Theme</span>
                                <span class="text-[11px] font-medium opacity-70">Atur tampilan tema</span>
                            </div>
                        </div>
                        <svg x-show="expanded" class="w-4 h-4 transition-transform duration-300" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3"><path d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div x-show="open && expanded" x-collapse class="mt-1 ml-11 space-y-1 border-l-2 border-[#99B9FF]/30">
                        <a href="{{ route('my-theme.template') }}" wire:navigate class="block px-6 py-2 text-sm {{ request()->routeIs('my-theme.template') ? 'text-[#2159D4]' : 'text-[#6B6B6B] hover:text-black' }}">Template</a>
                        <a href="{{ route('my-theme.studio.index') }}" wire:navigate class="block px-6 py-2 text-sm {{ request()->routeIs('my-theme.studio.index') ? 'text-[#2159D4]' : 'text-[#6B6B6B] hover:text-black' }}">Studio</a>
                    </div>
                </div>

                <div x-data="{ open: {{ request()->routeIs('tamu.*') ? 'true' : 'false' }} }">
                    <button @click="expanded ? (open = !open) : (expanded = true, open = true)" 
                        class="w-full flex items-center justify-between px-5 py-3 rounded-2xl font-bold transition-all {{ request()->routeIs('tamu.*') ? 'text-[#2159D4]' : 'text-[#6B6B6B] hover:bg-[#F8FAFC]' }}">
                        <div class="flex items-center gap-4 text-left">
                            <svg class="w-6 h-6 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                            <div x-show="expanded" class="flex flex-col leading-tight">
                                <span class="whitespace-nowrap">Tamu Undangan</span>
                                <span class="text-[11px] font-medium opacity-70">Kelola daftar tamu</span>
                            </div>
                        </div>
                        <svg x-show="expanded" class="w-4 h-4 transition-transform duration-300" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3"><path d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div x-show="open && expanded" x-collapse class="mt-1 ml-11 space-y-1 border-l-2 border-[#99B9FF]/30">
                        <a href="{{ route('tamu.index') }}" wire:navigate class="block px-6 py-2 text-sm font-bold {{ request()->routeIs('tamu.index') ? 'text-[#2159D4]' : 'text-[#6B6B6B] hover:text-black' }}">Daftar Tamu</a>
                        <a href="{{ route('tamu.rsvp') }}" wire:navigate class="block px-6 py-2 text-sm font-bold {{ request()->routeIs('tamu.rsvp') ? 'text-[#2159D4]' : 'text-[#6B6B6B] hover:text-black' }}">RSVP</a>
                    </div>
                </div>

                <div x-data="{ open: {{ request()->routeIs('egift.*') ? 'true' : 'false' }} }">
                    <button @click="expanded ? (open = !open) : (expanded = true, open = true)" 
                        class="w-full flex items-center justify-between px-5 py-3 rounded-2xl font-bold transition-all {{ request()->routeIs('egift.*') ? 'text-[#2159D4]' : 'text-[#6B6B6B] hover:bg-[#F8FAFC]' }}">
                        <div class="flex items-center gap-4 text-left">
                            <svg class="w-6 h-6 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <div x-show="expanded" class="flex flex-col leading-tight">
                                <span class="whitespace-nowrap">E-Gift</span>
                                <span class="text-[11px] font-medium opacity-70">Amplop & Kado digital</span>
                            </div>
                        </div>
                        <svg x-show="expanded" class="w-4 h-4 transition-transform duration-300" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3"><path d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div x-show="open && expanded" x-collapse class="mt-1 ml-11 space-y-1 border-l-2 border-[#99B9FF]/30">
                        <a href="{{ route('egift.index') }}" wire:navigate class="block px-6 py-2 text-sm font-bold {{ request()->routeIs('egift.index') ? 'text-[#2159D4]' : 'text-[#6B6B6B] hover:text-black' }}">Daftar Gift</a>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <p x-show="expanded" class="px-5 mb-2 text-[10px] font-bold uppercase tracking-widest text-gray-400">Settings & Help</p>
            <div class="space-y-1">
                
                <a href="{{ route('settings') }}" wire:navigate 
                   class="group relative flex items-center gap-4 px-5 py-3 rounded-2xl transition-all duration-300 {{ request()->routeIs('settings') ? 'bg-[#99B9FF]/20 text-[#2159D4]' : 'text-[#6B6B6B] hover:bg-[#F8FAFC] hover:text-black' }}">
                    @if(request()->routeIs('settings'))
                        <div class="absolute left-0 w-1.5 h-6 bg-[#2159D4] rounded-r-full"></div>
                    @endif
                    <svg class="w-6 h-6 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    <div x-show="expanded" x-transition.opacity class="flex flex-col leading-tight">
                        <span class="font-bold whitespace-nowrap">Settings</span>
                        <span class="text-[11px] font-medium opacity-70">Preferences</span>
                    </div>
                </a>

                <a href="{{ route('transaction.index') }}" wire:navigate 
                   class="group relative flex items-center gap-4 px-5 py-3 rounded-2xl transition-all duration-300 {{ request()->routeIs('transaction.index') ? 'bg-[#99B9FF]/20 text-[#2159D4]' : 'text-[#6B6B6B] hover:bg-[#F8FAFC] hover:text-black' }}">
                    @if(request()->routeIs('transaction.index'))
                        <div class="absolute left-0 w-1.5 h-6 bg-[#2159D4] rounded-r-full"></div>
                    @endif
                    <svg class="w-6 h-6 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                    <div x-show="expanded" x-transition.opacity class="flex flex-col leading-tight">
                        <span class="font-bold whitespace-nowrap">Transaction</span>
                        <span class="text-[11px] font-medium opacity-70">Riwayat pembayaran</span>
                    </div>
                </a>

                <a href="#" class="group flex items-center gap-4 px-5 py-3 rounded-2xl text-[#6B6B6B] hover:bg-[#F8FAFC] hover:text-[#2159D4] transition-all">
                    <svg class="w-6 h-6 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <div x-show="expanded" x-transition.opacity class="flex flex-col leading-tight">
                        <span class="font-bold text-sm">Help & Support</span>
                        <span class="text-[11px] font-medium opacity-70">Pusat bantuan</span>
                    </div>
                </a>
            </div>
        </div>
    </nav>

    <div class="mt-auto pt-6 border-t border-gray-100 shrink-0">
        <a href="{{ route('logout') }}" wire:navigate 
           class="w-full group flex items-center gap-4 px-5 py-4 rounded-2xl text-[#6B6B6B] hover:text-red-600 hover:bg-red-50 transition-all duration-300">
            <div class="w-10 h-10 rounded-xl bg-gray-50 flex items-center justify-center group-hover:bg-red-100 transition-colors shrink-0">
                <svg class="w-5 h-5 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
            </div>
            <div x-show="expanded" class="flex flex-col leading-tight">
                <span class="font-black">Log Out</span>
                <span class="text-[11px] font-medium opacity-70">Sign out from account</span>
            </div>
        </a>
    </div>
</aside>