<?php
use Livewire\Volt\Component;
use Illuminate\Support\Facades\Auth;

new class extends Component {
    public $user;
    public $name = '';
    public $email = '';
    public $phone = '';
    public $wedding_date = '';
    public $couple_name = '';
    
    public function mount()
    {
        $this->user = Auth::user();
        $this->name = $this->user->name ?? '';
        $this->email = $this->user->email ?? '';
    }
    
    public function save()
    {
        // Save profile logic here
        session()->flash('success', 'Profile updated successfully!');
    }
}; ?>

<div class="min-h-screen p-6 lg:p-8 bg-[#F8FAFC]">
    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-2xl lg:text-3xl font-black text-gray-800">My Profile</h1>
            <p class="text-gray-500 mt-1">Manage your account settings and preferences</p>
        </div>

        <!-- Profile Card -->
        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
            <!-- Cover & Avatar -->
            <div class="relative h-32 bg-gradient-to-r from-[#2159D4] to-[#4A7FFF]">
                <div class="absolute -bottom-12 left-8">
                    <div class="w-24 h-24 rounded-2xl bg-gradient-to-br from-[#2159D4] to-[#4A7FFF] flex items-center justify-center text-white text-3xl font-black border-4 border-white shadow-lg">
                        {{ strtoupper(substr($name, 0, 2)) }}
                    </div>
                </div>
            </div>
            
            <div class="pt-16 pb-8 px-8">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">
                    <div>
                        <h2 class="text-xl font-bold text-gray-800">{{ $name }}</h2>
                        <p class="text-gray-500">{{ $email }}</p>
                    </div>
                    <div class="inline-flex items-center gap-2 px-4 py-2 bg-[#2159D4]/10 rounded-full">
                        <svg class="w-4 h-4 text-[#2159D4]" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <span class="text-sm font-bold text-[#2159D4]">Free Plan</span>
                    </div>
                </div>

                <!-- Tabs -->
                <div x-data="{ tab: 'profile' }" class="mt-8">
                    <!-- Tab Navigation -->
                    <div class="flex gap-2 p-1 bg-gray-50 rounded-2xl w-fit">
                        <button 
                            @click="tab = 'profile'" 
                            :class="tab === 'profile' ? 'bg-white text-[#2159D4] shadow-sm' : 'text-gray-500 hover:text-gray-700'"
                            class="px-6 py-2.5 rounded-xl font-semibold text-sm transition-all duration-200"
                        >
                            Profile
                        </button>
                        <button 
                            @click="tab = 'wedding'" 
                            :class="tab === 'wedding' ? 'bg-white text-[#2159D4] shadow-sm' : 'text-gray-500 hover:text-gray-700'"
                            class="px-6 py-2.5 rounded-xl font-semibold text-sm transition-all duration-200"
                        >
                            Wedding Info
                        </button>
                        <button 
                            @click="tab = 'notifications'" 
                            :class="tab === 'notifications' ? 'bg-white text-[#2159D4] shadow-sm' : 'text-gray-500 hover:text-gray-700'"
                            class="px-6 py-2.5 rounded-xl font-semibold text-sm transition-all duration-200"
                        >
                            Notifications
                        </button>
                    </div>

                    <!-- Tab Content - Profile -->
                    <div x-show="tab === 'profile'" x-transition class="mt-6">
                        <form wire:submit.prevent="save">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Name -->
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Full Name</label>
                                    <input 
                                        type="text" 
                                        wire:model="name"
                                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#2159D4] focus:ring-2 focus:ring-[#2159D4]/20 transition-all outline-none"
                                        placeholder="Enter your name"
                                    />
                                </div>

                                <!-- Email -->
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Email Address</label>
                                    <input 
                                        type="email" 
                                        wire:model="email"
                                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#2159D4] focus:ring-2 focus:ring-[#2159D4]/20 transition-all outline-none"
                                        placeholder="Enter your email"
                                    />
                                </div>

                                <!-- Phone -->
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Phone Number</label>
                                    <input 
                                        type="tel" 
                                        wire:model="phone"
                                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#2159D4] focus:ring-2 focus:ring-[#2159D4]/20 transition-all outline-none"
                                        placeholder="+62 812 3456 7890"
                                    />
                                </div>

                                <!-- Wedding Date -->
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Wedding Date</label>
                                    <input 
                                        type="date" 
                                        wire:model="wedding_date"
                                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#2159D4] focus:ring-2 focus:ring-[#2159D4]/20 transition-all outline-none"
                                    />
                                </div>
                            </div>

                            <div class="mt-8 flex justify-end">
                                <button 
                                    type="submit"
                                    class="px-8 py-3 bg-[#2159D4] text-white font-bold rounded-2xl hover:bg-[#1a47b8] transition-all shadow-lg shadow-[#2159D4]/20"
                                >
                                    Save Changes
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Tab Content - Wedding Info -->
                    <div x-show="tab === 'wedding'" x-transition style="display: none;" class="mt-6">
                        <form wire:submit.prevent="save">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Couple Name -->
                                <div class="md:col-span-2">
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Couple Name</label>
                                    <input 
                                        type="text" 
                                        wire:model="couple_name"
                                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#2159D4] focus:ring-2 focus:ring-[#2159D4]/20 transition-all outline-none"
                                        placeholder="Budi & Ani"
                                    />
                                    <p class="text-xs text-gray-400 mt-1">Names that will appear on your invitation</p>
                                </div>

                                <!-- Venue -->
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Wedding Venue</label>
                                    <input 
                                        type="text" 
                                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#2159D4] focus:ring-2 focus:ring-[#2159D4]/20 transition-all outline-none"
                                        placeholder="Wedding hall name"
                                    />
                                </div>

                                <!-- Address -->
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Venue Address</label>
                                    <input 
                                        type="text" 
                                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#2159D4] focus:ring-2 focus:ring-[#2159D4]/20 transition-all outline-none"
                                        placeholder="Full address"
                                    />
                                </div>
                            </div>

                            <div class="mt-8 flex justify-end">
                                <button 
                                    type="submit"
                                    class="px-8 py-3 bg-[#2159D4] text-white font-bold rounded-2xl hover:bg-[#1a47b8] transition-all shadow-lg shadow-[#2159D4]/20"
                                >
                                    Save Changes
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Tab Content - Notifications -->
                    <div x-show="tab === 'notifications'" x-transition style="display: none;" class="mt-6">
                        <div class="space-y-4">
                            <!-- Email Notifications -->
                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-2xl">
                                <div>
                                    <p class="font-semibold text-gray-800">Email Notifications</p>
                                    <p class="text-sm text-gray-500">Receive updates via email</p>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" checked class="sr-only peer">
                                    <div class="w-14 h-7 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-[#2159D4]/20 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all peer-checked:bg-[#2159D4]"></div>
                                </label>
                            </div>

                            <!-- RSVP Notifications -->
                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-2xl">
                                <div>
                                    <p class="font-semibold text-gray-800">RSVP Notifications</p>
                                    <p class="text-sm text-gray-500">Get notified when guests RSVP</p>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" checked class="sr-only peer">
                                    <div class="w-14 h-7 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-[#2159D4]/20 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all peer-checked:bg-[#2159D4]"></div>
                                </label>
                            </div>

                            <!-- Gift Notifications -->
                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-2xl">
                                <div>
                                    <p class="font-semibold text-gray-800">E-Gift Notifications</p>
                                    <p class="text-sm text-gray-500">Get notified when you receive gifts</p>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" checked class="sr-only peer">
                                    <div class="w-14 h-7 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-[#2159D4]/20 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all peer-checked:bg-[#2159D4]"></div>
                                </label>
                            </div>

                            <!-- Message Notifications -->
                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-2xl">
                                <div>
                                    <p class="font-semibold text-gray-800">Guest Messages</p>
                                    <p class="text-sm text-gray-500">Get notified of new guest messages</p>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" checked class="sr-only peer">
                                    <div class="w-14 h-7 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-[#2159D4]/20 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all peer-checked:bg-[#2159D4]"></div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div class="mt-4 p-4 bg-green-50 border border-green-200 rounded-2xl flex items-center gap-3">
                <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                <p class="text-green-700 font-medium">{{ session('success') }}</p>
            </div>
        @endif
    </div>
</div>
