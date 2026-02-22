<div x-data="{ isOpen: false }" class="relative">
    <button 
        @click="isOpen = !isOpen; mobileOpen = false" 
        @click.outside="isOpen = false"
        class="relative p-3 rounded-2xl bg-white border border-gray-100 hover:border-[#2159D4]/20 hover:shadow-lg hover:shadow-[#2159D4]/5 transition-all duration-300"
    >
        <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
        </svg>
        
        @if($this->getUnreadCount() > 0)
            <span class="absolute -top-1 -right-1 w-5 h-5 bg-red-500 text-white text-[10px] font-bold rounded-full flex items-center justify-center animate-pulse border-2 border-white">
                {{ $this->getUnreadCount() }}
            </span>
        @endif
    </button>

    <div 
        x-show="isOpen"
        x-cloak
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-95 translate-y-1"
        x-transition:enter-end="opacity-100 scale-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 scale-100 translate-y-0"
        x-transition:leave-end="opacity-0 scale-95 translate-y-1"
        
        /* - fixed inset-x-4: Margin 16px kiri-kanan di mobile agar tidak "gepeng".
           - z-[41]: Berada di belakang overlay sidebar (z-45) tapi di depan header (z-40).
           - top-[76px]: Jarak presisi di bawah header mobile.
        */
        class="fixed inset-x-4 top-[76px] sm:absolute sm:inset-x-auto sm:right-0 sm:top-full sm:mt-3 sm:w-96 bg-white rounded-[24px] border border-gray-100 shadow-[0_20px_50px_rgba(0,0,0,0.1)] overflow-hidden z-[41]"
        style="display: none;"
        @click.stop
    >
        <div class="p-4 bg-gradient-to-r from-[#F8FAFC] to-white border-b border-gray-100 flex items-center justify-between">
            <div class="flex items-center gap-2">
                <div class="w-1 h-4 bg-[#2159D4] rounded-full"></div>
                <h3 class="font-bold text-gray-800 text-sm sm:text-base">Notifications</h3>
                @if($this->getUnreadCount() > 0)
                    <span class="px-2 py-0.5 bg-red-100 text-red-600 text-[10px] font-bold rounded-full">
                        {{ $this->getUnreadCount() }} baru
                    </span>
                @endif
            </div>
            @if($this->getUnreadCount() > 0)
                <button 
                    wire:click="markAllAsRead" 
                    class="text-[11px] text-[#2159D4] hover:text-[#1a47b8] font-bold transition-colors"
                >
                    Tandai semua dibaca
                </button>
            @endif
        </div>

        <div class="max-h-[60vh] sm:max-h-[400px] overflow-y-auto custom-scrollbar bg-white">
            @forelse($notifications as $notification)
                <div 
                    class="p-4 border-b border-gray-50 hover:bg-[#F8FAFC] transition-colors cursor-pointer {{ $notification['read'] ? 'opacity-60' : 'bg-blue-50/30' }}"
                    wire:click="markAsRead({{ $notification['id'] }})"
                >
                    <div class="flex gap-3">
                        <div class="w-10 h-10 rounded-xl flex items-center justify-center shrink-0 
                            @switch($notification['type'])
                                @case('rsvp') bg-green-100 text-green-600 @break
                                @case('ucapan') bg-purple-100 text-purple-600 @break
                                @case('gift') bg-yellow-100 text-yellow-600 @break
                                @default bg-blue-100 text-blue-600
                            @endswitch
                        ">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        
                        <div class="flex-1 min-w-0 text-left">
                            <div class="flex items-center justify-between gap-2">
                                <p class="font-bold text-xs sm:text-sm text-gray-800 truncate leading-tight">{{ $notification['title'] }}</p>
                                @if(!$notification['read'])
                                    <span class="w-2 h-2 bg-[#2159D4] rounded-full shrink-0 shadow-[0_0_8px_rgba(33,89,212,0.4)]"></span>
                                @endif
                            </div>
                            <p class="text-xs text-gray-600 mt-1 line-clamp-2 leading-relaxed">{{ $notification['message'] }}</p>
                            <p class="text-[10px] text-gray-400 mt-1.5 font-medium flex items-center gap-1">
                                <svg class="w-3 h-3 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" stroke-width="2" stroke-linecap="round"></path></svg>
                                {{ $notification['time'] }}
                            </p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="p-12 text-center">
                    <div class="w-16 h-16 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-3 border border-dashed border-gray-200">
                        <svg class="w-8 h-8 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                        </svg>
                    </div>
                    <p class="text-gray-400 text-sm font-bold">Belum ada kabar baru</p>
                </div>
            @endforelse
        </div>

        <div class="p-3 border-t border-gray-100 bg-[#F8FAFC]">
            <a href="#" class="block w-full text-center text-[11px] font-black text-gray-600 hover:text-[#2159D4] py-2.5 bg-white border border-gray-200 rounded-xl shadow-sm transition-all active:scale-95">
                LIHAT SEMUA NOTIFIKASI
            </a>
        </div>
    </div>
</div>