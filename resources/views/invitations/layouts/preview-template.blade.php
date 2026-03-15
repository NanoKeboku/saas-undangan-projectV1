<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preview Template — Weddstu</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-[#F1F5F9] antialiased" x-data="{ device: 'mobile' }">

    <div class="flex h-screen overflow-hidden">

        {{-- ===== SIDEBAR KIRI ===== --}}
        <aside class="w-72 flex-shrink-0 bg-white border-r border-gray-100 flex flex-col shadow-sm z-10">

            {{-- Header --}}
            <div class="px-6 py-5 border-b border-gray-100">
                <a href="{{ route('my-theme.template') }}"
                   class="inline-flex items-center gap-2 text-xs font-semibold text-gray-400 hover:text-purple-600 transition-colors mb-4">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/>
                    </svg>
                    Kembali ke Katalog
                </a>
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-xl bg-purple-100 flex items-center justify-center flex-shrink-0">
                        <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-[10px] text-gray-400 uppercase tracking-widest font-semibold">Template</p>
                        <h2 class="text-sm font-bold text-gray-900 leading-tight">{{ $templateName }}</h2>
                    </div>
                </div>
            </div>

            {{-- Device Toggle --}}
            <div class="px-6 py-4 border-b border-gray-100">
                <p class="text-[10px] text-gray-400 uppercase tracking-widest font-semibold mb-3">Mode Tampilan</p>
                <div class="flex gap-2 bg-gray-100 p-1 rounded-xl">
                    <button @click="device = 'mobile'"
                            :class="device === 'mobile' ? 'bg-white text-purple-700 shadow-sm' : 'text-gray-500'"
                            class="flex-1 flex items-center justify-center gap-1.5 py-2 rounded-lg text-xs font-semibold transition-all">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                        </svg>
                        Mobile
                    </button>
                    <button @click="device = 'desktop'"
                            :class="device === 'desktop' ? 'bg-white text-purple-700 shadow-sm' : 'text-gray-500'"
                            class="flex-1 flex items-center justify-center gap-1.5 py-2 rounded-lg text-xs font-semibold transition-all">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        Desktop
                    </button>
                </div>
            </div>

            {{-- Info Section --}}
            <div class="px-6 py-4 flex-1">
                <p class="text-[10px] text-gray-400 uppercase tracking-widest font-semibold mb-3">Detail Template</p>
                <ul class="space-y-2.5">
                    <li class="flex items-center gap-2.5 text-xs text-gray-600">
                        <span class="w-5 h-5 rounded-lg bg-green-50 flex items-center justify-center flex-shrink-0">✓</span>
                        Mobile Responsive
                    </li>
                    <li class="flex items-center gap-2.5 text-xs text-gray-600">
                        <span class="w-5 h-5 rounded-lg bg-green-50 flex items-center justify-center flex-shrink-0">✓</span>
                        RSVP & Ucapan
                    </li>
                    <li class="flex items-center gap-2.5 text-xs text-gray-600">
                        <span class="w-5 h-5 rounded-lg bg-green-50 flex items-center justify-center flex-shrink-0">✓</span>
                        Galeri Foto
                    </li>
                    <li class="flex items-center gap-2.5 text-xs text-gray-600">
                        <span class="w-5 h-5 rounded-lg bg-green-50 flex items-center justify-center flex-shrink-0">✓</span>
                        Musik Latar
                    </li>
                </ul>
            </div>

            {{-- CTA Buttons --}}
            <div class="px-6 py-5 border-t border-gray-100 space-y-3">
                <a href="{{ route('my-theme.studio.index') }}"
                   class="flex items-center justify-center gap-2 w-full py-3 px-4 bg-purple-600 hover:bg-purple-700 text-white text-sm font-bold rounded-2xl transition-all shadow-md shadow-purple-200 hover:shadow-lg hover:shadow-purple-200 hover:-translate-y-0.5">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                    Gunakan Template Ini
                </a>
                <a href="{{ route('my-theme.template') }}"
                   class="flex items-center justify-center gap-2 w-full py-3 px-4 bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-semibold rounded-2xl transition-all">
                    Lihat Template Lain
                </a>
            </div>

        </aside>

        {{-- ===== AREA PREVIEW UTAMA ===== --}}
        <main class="flex-1 flex flex-col items-center justify-center bg-[#F1F5F9] p-8 overflow-hidden">

            {{-- Label --}}
            <p class="text-xs text-gray-400 font-semibold uppercase tracking-widest mb-6">
                Preview Langsung
            </p>

            {{-- Frame Wrapper --}}
            <div class="transition-all duration-500 ease-in-out"
                 :class="device === 'mobile'
                    ? 'w-[390px] h-[780px]'
                    : 'w-full max-w-5xl h-[680px]'">

                {{-- Device Shell --}}
                <div class="w-full h-full rounded-[2rem] overflow-hidden shadow-2xl border-[8px] transition-all duration-500"
                     :class="device === 'mobile'
                        ? 'border-slate-800 rounded-[3rem]'
                        : 'border-slate-700 rounded-2xl'">

                    <iframe
                        src="{{ $renderUrl }}"
                        class="w-full h-full border-0 bg-white"
                        title="Preview {{ $templateName }}"
                        loading="lazy">
                    </iframe>

                </div>
            </div>

            {{-- URL hint --}}
            <p class="mt-5 text-[11px] text-gray-400 font-mono bg-white px-4 py-2 rounded-xl border border-gray-200">
                {{ $renderUrl }}
            </p>

        </main>

    </div>

    @livewireScripts
</body>
</html>
