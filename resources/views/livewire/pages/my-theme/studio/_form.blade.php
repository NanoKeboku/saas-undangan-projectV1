<!-- Dynamic Form Based on Current Step -->

{{-- STEP 1: Couple Information --}}
@if($step === 1)
    <div class="space-y-6" x-data="{ focus: null }">
        <div class="mb-8">
            <h2 class="text-xl font-bold text-gray-900 mb-2">Siapa mempelainya?</h2>
            <p class="text-sm text-gray-500">Masukkan nama lengkap pasangan Anda</p>
        </div>

        <!-- Bride Name -->
        <div class="space-y-6">
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">
            Nama Mempelai Wanita
        </label>
        <input type="text"
               wire:model.defer="form.bride_name"
               class="w-full px-4 py-3 rounded-2xl border border-gray-200 focus:ring-2 focus:ring-purple-500 focus:border-transparent"
               placeholder="Contoh: Aisyah Putri">
        @error('form.bride_name')
            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">
            Nama Mempelai Pria
        </label>
        <input type="text"
               wire:model.defer="form.groom_name"
               class="w-full px-4 py-3 rounded-2xl border border-gray-200 focus:ring-2 focus:ring-purple-500 focus:border-transparent"
               placeholder="Contoh: Muhammad Rizky">
        @error('form.groom_name')
            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
        @enderror
    </div>
</div>


        <!-- Motivational Message -->
        <div class="mt-8 p-4 bg-gradient-to-r from-purple-50 to-blue-50 rounded-2xl border border-purple-200">
            <p class="text-sm text-purple-900 font-medium">✨ Tip: Gunakan nama panggilan agar undangan terasa personal dan hangat!</p>
        </div>
    </div>

{{-- STEP 2: Event Details --}}
@elseif($step === 2)
    <div class="space-y-6">
        <div class="mb-8">
            <h2 class="text-xl font-bold text-gray-900 mb-2">Kapan dan di mana?</h2>
            <p class="text-sm text-gray-500">Informasi acara yang akan ditampilkan di undangan</p>
        </div>

        <!-- Event Date -->
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-3">📅 Tanggal Pernikahan</label>
            <input type="date" 
                   wire:model.live="form.event_date"
                   class="w-full px-5 py-3.5 rounded-2xl border-2 border-gray-200 hover:border-purple-300 focus:border-purple-500 focus:ring-2 focus:ring-purple-500/20 transition-all duration-200 text-gray-900 font-medium"
                   min="{{ now()->format('Y-m-d') }}">
            @error('form.event_date')
                <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- Event Time -->
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-3">🕐 Waktu Acara</label>
            <input type="time" 
                   wire:model.live="form.event_time"
                   class="w-full px-5 py-3.5 rounded-2xl border-2 border-gray-200 hover:border-purple-300 focus:border-purple-500 focus:ring-2 focus:ring-purple-500/20 transition-all duration-200 text-gray-900 font-medium">
            @error('form.event_time')
                <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- Venue -->
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-3">🏛️ Nama Venue</label>
            <input type="text" 
                   wire:model.live="form.venue"
                   placeholder="Contoh: Grand Hyatt Jakarta"
                   class="w-full px-5 py-3.5 rounded-2xl border-2 border-gray-200 hover:border-purple-300 focus:border-purple-500 focus:ring-2 focus:ring-purple-500/20 transition-all duration-200 text-gray-900 placeholder-gray-400 font-medium">
            @error('form.venue')
                <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- City -->
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-3">📍 Kota</label>
            <input type="text" 
                   wire:model.live="form.city"
                   placeholder="Contoh: Jakarta, Indonesia"
                   class="w-full px-5 py-3.5 rounded-2xl border-2 border-gray-200 hover:border-purple-300 focus:border-purple-500 focus:ring-2 focus:ring-purple-500/20 transition-all duration-200 text-gray-900 placeholder-gray-400 font-medium">
            @error('form.city')
                <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- Info Box -->
        <div class="p-4 bg-blue-50 rounded-2xl border border-blue-200">
            <p class="text-sm text-blue-900 font-medium">ℹ️ Informasi ini akan ditampilkan di halaman utama undangan digital Anda</p>
        </div>
    </div>

{{-- STEP 3: Gallery Photos --}}
@elseif($step === 3)
    <div class="space-y-6">
        <div class="mb-8">
            <h2 class="text-xl font-bold text-gray-900 mb-2">Tambahkan Foto Kenangan</h2>
            <p class="text-sm text-gray-500">Bagikan momen spesial Anda bersama pasangan (Opsional)</p>
        </div>

        <!-- Upload Area -->
        <div class="border-3 border-dashed border-purple-300 rounded-3xl p-8 text-center hover:bg-purple-50/50 transition-colors cursor-pointer group"
             @drop="$wire.addGalleryImage(event.dataTransfer.files[0])"
             @dragover.prevent="$el.classList.add('bg-purple-50')"
             @dragleave="$el.classList.remove('bg-purple-50')">
            <div class="text-4xl mb-3">📸</div>
            <p class="text-sm font-semibold text-gray-900 mb-1">Drag and drop foto di sini</p>
            <p class="text-xs text-gray-500 mb-4">atau klik untuk memilih dari device</p>
            <input type="file" 
                   accept="image/*" 
                   multiple
                   class="hidden"
                   @change="Array.from($event.target.files).forEach(f => $wire.addGalleryImage(f))">
            <button type="button"
                    @click="$el.previousElementSibling.click()"
                    class="inline-block px-6 py-2 bg-purple-600 text-white rounded-full text-xs font-bold hover:bg-purple-700 transition-colors">
                Pilih Foto
            </button>
            <p class="text-[10px] text-gray-400 mt-3">Format: JPG, PNG | Max: 5MB per gambar | Max: 10 gambar</p>
        </div>

        <!-- Gallery Preview -->
        @if(!empty($form['gallery']))
            <div>
                <p class="text-sm font-semibold text-gray-700 mb-4">
                    📷 {{ count($form['gallery']) }} dari 10 foto
                </p>
                <div class="grid grid-cols-3 gap-3">
                    @foreach($form['gallery'] as $index => $image)
                        <div class="relative aspect-square rounded-2xl overflow-hidden bg-gray-100 group">
                            <img src="{{ $image['temp_path'] ?? 'https://via.placeholder.com/200' }}" 
                                 alt="Gallery preview" 
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                            <button type="button"
                                    wire:click="removeGalleryImage({{ $index }})"
                                    class="absolute top-2 right-2 bg-red-500 text-white p-1.5 rounded-full opacity-0 group-hover:opacity-100 transition-opacity">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Info -->
        <div class="p-4 bg-amber-50 rounded-2xl border border-amber-200">
            <p class="text-sm text-amber-900 font-medium">💡 Tip: Gunakan foto berkualitas tinggi untuk hasil terbaik di undangan digital Anda!</p>
        </div>
    </div>

{{-- STEP 4: Theme Customization --}}
@elseif($step === 4)
    <div class="space-y-6">
        <div class="mb-8">
            <h2 class="text-xl font-bold text-gray-900 mb-2">Pilih Tema</h2>
            <p class="text-sm text-gray-500">Kustomisasi warna dan font sesuai preferensi Anda</p>
        </div>

        <!-- Color Picker -->
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-4">🎨 Warna Tema</label>
            <div class="grid grid-cols-5 gap-3">
                @foreach([
                    '#8b5cf6' => 'Purple',
                    '#ec4899' => 'Pink',
                    '#f59e0b' => 'Amber',
                    '#06b6d4' => 'Cyan',
                    '#10b981' => 'Emerald',
                    '#6366f1' => 'Indigo',
                    '#dc2626' => 'Red',
                    '#7c3aed' => 'Violet',
                ] as $color => $name)
                    <button type="button"
                            wire:click="updateThemeColor('{{ $color }}')"
                            title="{{ $name }}"
                            class="w-14 h-14 rounded-2xl border-4 transition-all duration-200 hover:scale-110 shadow-sm
                                   {{ $form['theme_color'] === $color 
                                       ? 'border-gray-900 ring-2 ring-purple-500 scale-110' 
                                       : 'border-white hover:border-gray-200' }}"
                            style="background-color: {{ $color }}">
                    </button>
                @endforeach
            </div>
        </div>

        <!-- Font Picker -->
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-4">✍️ Font Utama</label>
            <div class="grid grid-cols-2 gap-3">
                @foreach([
                    'Playfair Display' => 'Playfair',
                    'Poppins' => 'Poppins',
                    'Merriweather' => 'Merriweather',
                    'Fredoka' => 'Fredoka',
                ] as $fontValue => $fontLabel)
                    <button type="button"
                            wire:click="updateFont('{{ $fontValue }}')"
                            class="p-4 rounded-2xl border-2 transition-all duration-200 text-center
                                   {{ $form['font'] === $fontValue 
                                       ? 'border-purple-600 bg-purple-50 ring-2 ring-purple-300' 
                                       : 'border-gray-200 hover:border-purple-300 bg-white' }}"
                            style="font-family: '{{ $fontValue }}', serif">
                        <p class="font-bold text-lg">{{ $fontLabel }}</p>
                        <p class="text-xs text-gray-500 mt-1">Contoh teks</p>
                    </button>
                @endforeach
            </div>
        </div>

        <!-- Preview Box -->
        <div class="p-6 rounded-2xl border-2 border-gray-200" 
             style="border-color: {{ $form['theme_color'] }}"
             wire:key="theme-preview-{{ $form['theme_color'] }}-{{ $form['font'] }}">
            <p class="text-xs text-gray-500 mb-3">Preview dengan tema Anda:</p>
            <div class="text-center" style="font-family: '{{ $form['font'] }}', serif">
                <p class="text-2xl font-bold mb-2" style="color: {{ $form['theme_color'] }}">
                    {{ $form['bride_name'] ?? 'Bride' }} & {{ $form['groom_name'] ?? 'Groom' }}
                </p>
                <p class="text-sm" style="color: {{ $form['theme_color'] }}; opacity: 0.7">
                    {{ $form['event_date'] ?? '2026-06-15' }}
                </p>
            </div>
        </div>
    </div>

{{-- STEP 5: Preview --}}
@elseif($step === 5)
    <div class="space-y-6">
        <div class="mb-8">
            <h2 class="text-xl font-bold text-gray-900 mb-2">Preview Undangan</h2>
            <p class="text-sm text-gray-500">Lihat seperti apa tampilan undangan digital Anda</p>
        </div>

        <!-- Device Toggle (Mobile Only) -->
        <div class="md:hidden">
            <label class="block text-sm font-semibold text-gray-700 mb-3">Pilih Device:</label>
            <div class="flex gap-3">
                <button @click="device = 'mobile'"
                        :class="device === 'mobile' ? 'bg-purple-600 text-white' : 'bg-gray-100 text-gray-600'"
                        class="flex-1 py-2 rounded-lg text-sm font-semibold transition-colors">📱 Mobile</button>
                <button @click="device = 'desktop'"
                        :class="device === 'desktop' ? 'bg-purple-600 text-white' : 'bg-gray-100 text-gray-600'"
                        class="flex-1 py-2 rounded-lg text-sm font-semibold transition-colors">💻 Desktop</button>
            </div>
        </div>

        <!-- Summary -->
        <div class="space-y-4">
            <div class="p-4 bg-gradient-to-r from-purple-50 to-blue-50 rounded-2xl border border-purple-200">
                <p class="text-sm font-semibold text-gray-900 mb-2">📋 Ringkasan Data:</p>
                <ul class="text-sm space-y-1 text-gray-700">
                    <li>👰 {{ $form['bride_name'] ?? '-' }} & 🤵 {{ $form['groom_name'] ?? '-' }}</li>
                    <li>📅 {{ $form['event_date'] ?? '-' }} | 🕐 {{ $form['event_time'] ?? '-' }}</li>
                    <li>🏛️ {{ $form['venue'] ?? '-' }} - {{ $form['city'] ?? '-' }}</li>
                    <li>📸 {{ count($form['gallery']) }} foto galeri</li>
                </ul>
            </div>

            <p class="text-xs text-gray-500 text-center">Lihat preview di panel sebelah kanan (desktop) atau scroll ke atas di mobile</p>
        </div>
    </div>

{{-- STEP 6: Publish --}}
@elseif($step === 6)
    <div class="space-y-6">
        <div class="mb-8">
            <h2 class="text-xl font-bold text-gray-900 mb-2">Selesai! 🎉</h2>
            <p class="text-sm text-gray-500">Undangan Anda siap untuk dipublikasikan</p>
        </div>

        <!-- Checklist -->
        <div class="space-y-3">
            <div class="flex items-center gap-3 p-3 bg-green-50 rounded-xl border border-green-200">
                <svg class="w-5 h-5 text-green-600 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                </svg>
                <span class="text-sm font-semibold text-gray-900">Data pasangan telah diisi</span>
            </div>
            <div class="flex items-center gap-3 p-3 bg-green-50 rounded-xl border border-green-200">
                <svg class="w-5 h-5 text-green-600 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                </svg>
                <span class="text-sm font-semibold text-gray-900">Detail acara telah diisi</span>
            </div>
            <div class="flex items-center gap-3 p-3 bg-green-50 rounded-xl border border-green-200">
                <svg class="w-5 h-5 text-green-600 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                </svg>
                <span class="text-sm font-semibold text-gray-900">Tema sudah dikustomisasi</span>
            </div>
        </div>

        <!-- Action Box -->
        <div class="p-6 bg-gradient-to-br from-purple-100 to-blue-100 rounded-3xl border-2 border-purple-300">
            <p class="text-sm text-purple-900 font-medium mb-4">🚀 Setelah dipublikasikan, Anda akan mendapatkan:</p>
            <ul class="text-sm space-y-2 text-purple-800">
                <li class="flex items-center gap-2">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"></path></svg>
                    Link unik untuk dibagikan ke tamu
                </li>
                <li class="flex items-center gap-2">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"></path></svg>
                    Premium design & elegant template
                </li>
                <li class="flex items-center gap-2">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"></path></svg>
                    Akses ke analytics tamu yang hadir
                </li>
            </ul>
        </div>

        <p class="text-xs text-center text-gray-500">Anda masih bisa mengedit undangan setelah publikasi</p>
    </div>
@endif
