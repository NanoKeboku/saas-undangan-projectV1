<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weddstu Editor</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300..700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
       /* KUNCI ANTI-BLINK: Paksa sembunyi elemen x-cloak sebelum Alpine siap */
        [x-cloak] { 
            display: none !important; 
        }

        .custom-scrollbar::-webkit-scrollbar { width: 5px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #e2e8f0; border-radius: 10px; }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: #cbd5e1; }   
            /* Firefox */
        .custom-scrollbar { 
             scrollbar-width: thin; 
             scrollbar-color: #e2e8f0 transparent; 
        }

    </style>
</head>
<body class="antialiased bg-[#F8FAFC] font-['Poppins']">
    <div x-data="{ expanded: true, mobileOpen: false }" x-cloak class="relative min-h-screen">
        
        @include('livewire.sidebar.sidebar')

        <header 
            class="fixed top-0 right-0 h-16 bg-white/80 backdrop-blur-xl border-b border-gray-100 z-[40] transition-all duration-500 ease-in-out"
            :class="expanded ? 'lg:left-80 left-0' : 'lg:left-24 left-0'"
        >
            <div class="h-full px-6 flex items-center justify-end gap-3">
                @livewire('components.notification-menu')
                @livewire('components.profile-menu')
            </div>
        </header>

        <button @click="expanded = !expanded" 
                class="hidden lg:flex fixed top-20 z-[60] p-2 bg-white border border-[#2159D4]/20 rounded-xl shadow-md transition-all duration-500 hover:bg-[#F8FAFC]"
                :style="expanded ? 'left: 18.5rem' : 'left: 4.5rem'">
            <svg :class="expanded ? 'rotate-0' : 'rotate-180'" class="w-5 h-5 text-[#2159D4] transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
        </button>

        <button @click="mobileOpen = !mobileOpen" 
                class="lg:hidden fixed top-4 left-4 z-[70] p-3 bg-white border border-[#2159D4]/20 rounded-2xl shadow-xl">
            <svg class="w-6 h-6 text-[#2159D4]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>

        <main 
            class="transition-all duration-500 ease-in-out min-h-screen pt-16"
            :class="expanded ? 'lg:pl-80' : 'lg:pl-24'"
        >
            <div class="p-4 lg:p-8">
                {{ $slot }}
            </div>
        </main>

        <div x-show="mobileOpen" 
             @click="mobileOpen = false" 
             x-transition.opacity 
             x-cloak
             class="fixed inset-0 bg-black/20 backdrop-blur-sm z-[45] lg:hidden">
        </div>
    </div>

    @livewireScripts
</body> 
</html>