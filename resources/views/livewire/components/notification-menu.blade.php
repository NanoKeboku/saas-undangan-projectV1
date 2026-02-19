<div x-data="{ isOpen: false }" class="relative">
    <!-- Notification Button -->
    <button 
        @click="isOpen = !isOpen" 
        @click.outside="isOpen = false"
        class="relative p-3 rounded-2xl bg-white border border-gray-100 hover:border-[#2159D4]/20 hover:shadow-lg hover:shadow-[#2159D4]/5 transition-all duration-300"
    >
        <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
        </svg>
        
        <!-- Unread Badge -->
        @if($this->getUnreadCount() > 0)
            <span class="absolute -top-1 -right-1 w-5 h-5 bg-red-500 text-white text-xs font-bold rounded-full flex items-center justify-center animate-pulse">
                {{ $this->getUnreadCount() }}
            </span>
        @endif
    </button>

    <!-- Dropdown Menu -->
    <div 
        x-show="isOpen"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-95 translate-y-1"
        x-transition:enter-end="opacity-100 scale-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 scale-100 translate-y-0"
        x-transition:leave-end="opacity-0 scale-95 translate-y-1"
        class="absolute right-0 mt-3 w-96 bg-white rounded-2xl border border-gray-100 shadow-xl shadow-gray-200/50 overflow-hidden z-50"
        style="display: none;"
    >
        <!-- Header -->
        <div class="p-4 bg-gradient-to-r from-[#F8FAFC] to-white border-b border-gray-100 flex items-center justify-between">
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5 text-[#2159D4]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                </svg>
                <h3 class="font-bold text-gray-800">Notifications</h3>
                @if($this->getUnreadCount() > 0)
                    <span class="px-2 py-0.5 bg-red-100 text-red-600 text-xs font-bold rounded-full">
                        {{ $this->getUnreadCount() }} baru
                    </span>
                @endif
            </div>
            @if($this->getUnreadCount() > 0)
                <button 
                    wire:click="markAllAsRead" 
                    class="text-xs text-[#2159D4] hover:text-[#1a47b8] font-medium transition-colors"
                >
                    Tandai semua dibaca
                </button>
            @endif
        </div>

        <!-- Notification List -->
        <div class="max-h-[400px] overflow-y-auto custom-scrollbar">
            @forelse($notifications as $notification)
                <div 
                    class="p-4 border-b border-gray-50 hover:bg-[#F8FAFC] transition-colors cursor-pointer {{ $notification['read'] ? 'opacity-60' : 'bg-blue-50/50' }}"
                    wire:click="markAsRead({{ $notification['id'] }})"
                >
                    <div class="flex gap-3">
                        <!-- Icon -->
                        <div class="w-10 h-10 rounded-xl flex items-center justify-center shrink-0 
                            @switch($notification['type'])
                                @case('rsvp') bg-green-100 text-green-600 @break
                                @case('ucapan') bg-purple-100 text-purple-600 @break
                                @case('gift') bg-yellow-100 text-yellow-600 @break
                                @default bg-blue-100 text-blue-600
                            @endswitch
                        ">
                            @switch($notification['icon'])
                                @case('check')
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    @break
                                @case('message')
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                    </svg>
                                    @break
                                @case('gift')
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    @break
                                @case('check-circle')
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    @break
                            @endswitch
                        </div>
                        
                        <!-- Content -->
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center justify-between gap-2">
                                <p class="font-semibold text-sm text-gray-800 truncate">{{ $notification['title'] }}</p>
                                @if(!$notification['read'])
                                    <span class="w-2 h-2 bg-[#2159D4] rounded-full shrink-0"></span>
                                @endif
                            </div>
                            <p class="text-sm text-gray-600 mt-0.5 line-clamp-2">{{ $notification['message'] }}</p>
                            <p class="text-xs text-gray-400 mt-1">{{ $notification['time'] }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="p-8 text-center">
                    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-3">
                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                        </svg>
                    </div>
                    <p class="text-gray-500 font-medium">No notifications yet</p>
                    <p class="text-sm text-gray-400 mt-1">Notifications will appear here</p>
                </div>
            @endforelse
        </div>

        <!-- Footer -->
        <div class="p-3 border-t border-gray-100 bg-gray-50">
            <a href="#" class="block w-full text-center text-sm font-semibold text-[#2159D4] hover:text-[#1a47b8] py-2 rounded-xl hover:bg-[#2159D4]/5 transition-colors">
                Lihat Semua Notifikasi
            </a>
        </div>
    </div>
</div>
