<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weddstu Editor</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-[#F8FAFC]">

    <div x-data="{ expanded: true }" class="flex min-h-screen">
        
        @include('sidebar.sidebar')

        <div class="flex-1 transition-all duration-300">
            
            <header class="top-0 backdrop-blur-md border-b border-white px-8 py-4 flex items-center justify-between">
                <div class="flex items-center gap-6">
                    <h2 class="text-xl font-black text-black">My Event</h2>
                </div>

                <div class="flex items-center gap-4">
                    <div class="relative hidden md:block">
                        <input type="text" placeholder="Search" class="pl-12 pr-6 py-2.5 w-64 bg-white border border-[#2159D4]/20 rounded-full text-xs font-bold outline-none">
                        <span class="absolute left-4 top-3 text-[#2159D4]"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg></span>
                    </div>
                    <button class="w-10 h-10 border border-[#2159D4]/30 rounded-full bg-white flex items-center justify-center text-[#2159D4]"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg></button>
                    <button class="w-10 h-10 border border-[#2159D4]/30 rounded-full bg-white flex items-center justify-center text-[#2159D4]"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"/></svg></button>
                </div>
            </header>

            <main>
                {{ $slot }}
            </main>
        </div>
    </div>
</body>
</html>