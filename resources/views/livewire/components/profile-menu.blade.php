<div x-data="{ isOpen: false }" class="relative">
    <!-- Profile Button -->
    <button 
        @click="isOpen = !isOpen" 
        @click.outside="isOpen = false"
        class="flex items-center gap-3 p-2 rounded-2xl bg-white border border-gray-100 hover:border-[#2159D4]/20 hover:shadow-lg hover:shadow-[#2159D4]/5 transition-all duration-300"
    >
        <!-- Avatar -->
        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-[#2159D4] to-[#4A7FFF] flex items-center justify-center text-white font-bold text-sm shadow-lg shadow-[#2159D4]/20">
            {{ $this->getInitials($user->name ?? 'User') }}
        </div>
        
        <!-- User Info -->
        <div class="hidden md:block text-left">
            <p class="text-sm font-bold text-gray-800 leading-tight">{{ $user->name ?? 'User' }}</p>
            <p class="text-xs text-gray-500 leading-tight">{{ $user->email ?? 'user@example.com' }}</p>
        </div>
        
        <!-- Arrow -->
        <svg 
            class="hidden md:block w-4 h-4 text-gray-400 transition-transform duration-300" 
            :class="isOpen ? 'rotate-180' : ''" 
            fill="none" 
            stroke="currentColor" 
            viewBox="0 0 24 24"
        >
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
        </svg>
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
        class="absolute right-0 mt-3 w-72 bg-white rounded-2xl border border-gray-100 shadow-xl shadow-gray-200/50 overflow-hidden z-50"
        style="display: none;"
    >
        <!-- User Card -->
        <div class="p-4 bg-gradient-to-r from-[#F8FAFC] to-white border-b border-gray-100">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-[#2159D4] to-[#4A7FFF] flex items-center justify-center text-white font-bold shadow-lg shadow-[#2159D4]/20">
                    {{ $this->getInitials($user->name ?? 'User') }}
                </div>
                <div>
                    <p class="font-bold text-gray-800">{{ $user->name ?? 'User' }}</p>
                    <p class="text-sm text-gray-500">{{ $user->email ?? 'user@example.com' }}</p>
                </div>
            </div>
            
            <!-- Package Badge -->
            <div class="mt-3 inline-flex items-center gap-1.5 px-3 py-1.5 bg-[#2159D4]/10 rounded-full">
                <svg class="w-3.5 h-3.5 text-[#2159D4]" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                </svg>
                <span class="text-xs font-bold text-[#2159D4]">Free Plan</span>
            </div>
        </div>

        <!-- Menu Items -->
        <div class="py-2">
            <!-- My Profile -->
            <a href="{{ route('profile') }}" wire:navigate class="flex items-center gap-3 px-4 py-3 text-gray-700 hover:bg-[#F8FAFC] hover:text-[#2159D4] transition-colors">
                <div class="w-9 h-9 rounded-xl bg-[#F8FAFC] flex items-center justify-center">
                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <div>
                    <p class="font-semibold text-sm">My Profile</p>
                    <p class="text-xs text-gray-400">Account settings</p>
                </div>
            </a>

            <!-- Subscription / Package -->
            <a href="{{ route('package.index') }}" wire:navigate class="flex items-center gap-3 px-4 py-3 text-gray-700 hover:bg-[#F8FAFC] hover:text-[#2159D4] transition-colors">
                <div class="w-9 h-9 rounded-xl bg-[#F8FAFC] flex items-center justify-center">
                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                </div>
                <div>
                    <p class="font-semibold text-sm">My Package</p>
                    <p class="text-xs text-gray-400">Upgrade plan</p>
                </div>
            </a>
        </div>

    </div>
</div>
