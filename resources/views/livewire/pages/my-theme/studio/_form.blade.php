<div class="space-y-8">
    {{-- STEP 1: Pasangan (Couple) --}}
    @if($step === 1)
        <div class="space-y-6">
            <div class="mb-4">
                <h2 class="text-2xl font-bold text-gray-900">Siapa mempelainya? 💍</h2>
                <p class="text-sm text-gray-500 mt-1">Masukkan nama lengkap kedua mempelai</p>
            </div>
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Nama Mempelai Wanita</label>
                    <input type="text" 
                           wire:model.live="bride_name"
                           placeholder="Contoh: Aisyah"
                           class="w-full px-5 py-4 rounded-2xl border border-gray-200 outline-none transition-all
                                  focus:border-purple-500 focus:ring-2 focus:ring-purple-200">
                    @error('bride_name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Nama Mempelai Pria</label>
                    <input type="text" 
                           wire:model.live="groom_name"
                           placeholder="Contoh: Rizky"
                           class="w-full px-5 py-4 rounded-2xl border border-gray-200 outline-none transition-all
                                  focus:border-purple-500 focus:ring-2 focus:ring-purple-200">
                    @error('groom_name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>
    
    {{-- STEP 2: Acara (Event) --}}
    @elseif($step === 2)
        <div class="space-y-6">
            <div class="mb-4">
                <h2 class="text-2xl font-bold text-gray-900">Waktu & Tempat 📍</h2>
                <p class="text-sm text-gray-500 mt-1">atur tanggal, waktu, dan lokasi acara</p>
            </div>
            <div class="grid grid-cols-1 gap-4">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Tanggal</label>
                    <input type="date" 
                           wire:model.live="event_date"
                           class="w-full px-5 py-4 rounded-2xl border border-gray-200 outline-none
                                  focus:border-purple-500 focus:ring-2 focus:ring-purple-200">
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Jam</label>
                        <input type="time" 
                               wire:model.live="event_time"
                               class="w-full px-5 py-4 rounded-2xl border border-gray-200 outline-none
                                      focus:border-purple-500 focus:ring-2 focus:ring-purple-200">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Kota</label>
                        <input type="text" 
                               wire:model.live="city"
                               placeholder="Contoh: Jakarta"
                               class="w-full px-5 py-4 rounded-2xl border border-gray-200 outline-none
                                      focus:border-purple-500 focus:ring-2 focus:ring-purple-200">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Nama Gedung / Venue</label>
                    <input type="text" 
                           wire:model.live="venue"
                           placeholder="Contoh: Grand Ballroom Hotel"
                           class="w-full px-5 py-4 rounded-2xl border border-gray-200 outline-none
                                  focus:border-purple-500 focus:ring-2 focus:ring-purple-200">
                </div>
            </div>
        </div>

    {{-- STEP 3: Galeri (Gallery) --}}
    @elseif($step === 3)
        <div class="space-y-6"
             x-data="{
                isDragging: false,
                handleFiles(files) {
                    Array.from(files).forEach(file => {
                        if (!file.type.startsWith('image/')) return;
                        if (file.size > 5 * 1024 * 1024) { alert('Ukuran file maksimal 5MB'); return; }
                        const reader = new FileReader();
                        reader.onload = e => {
                            $wire.addGalleryItem(e.target.result, file.name);
                        };
                        reader.readAsDataURL(file);
                    });
                }
             }">
            <div class="mb-4">
                <h2 class="text-2xl font-bold text-gray-900">Galeri Kenangan 🖼️</h2>
                <p class="text-sm text-gray-500 mt-1">Tambahkan foto-foto special kalian (maks. 8 foto)</p>
            </div>

            {{-- Drop Zone --}}
            <label
                @dragover.prevent="isDragging = true"
                @dragleave.prevent="isDragging = false"
                @drop.prevent="isDragging = false; handleFiles($event.dataTransfer.files)"
                :class="isDragging ? 'border-purple-500 bg-purple-50' : 'border-gray-200 hover:border-purple-400'"
                class="block border-2 border-dashed rounded-2xl p-8 text-center transition-colors cursor-pointer">
                <input type="file" accept="image/*" multiple class="hidden"
                       @change="handleFiles($event.target.files); $event.target.value = ''">
                <svg class="w-12 h-12 text-gray-400 mb-3 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                <p class="text-gray-600 font-medium">Klik atau drag foto ke sini</p>
                <p class="text-gray-400 text-sm mt-1">PNG, JPG maks. 5MB per foto</p>
            </label>

            {{-- Gallery Grid --}}
            @if(!empty($gallery))
                <div class="grid grid-cols-4 gap-2">
                    @foreach($gallery as $index => $img)
                        <div class="relative aspect-square rounded-xl overflow-hidden bg-gray-100 group">
                            <img src="{{ $img['data_url'] ?? '' }}" alt="Gallery" class="w-full h-full object-cover">
                            <button wire:click="removeGallery({{ $index }})"
                                    type="button"
                                    class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                    @endforeach
                </div>
                <p class="text-xs text-gray-400 text-right">{{ count($gallery) }}/8 foto</p>
            @endif
        </div>

    {{-- STEP 4: Tema (Theme) --}}
    @elseif($step === 4)
        <div class="space-y-6">
            <div class="mb-4">
                <h2 class="text-2xl font-bold text-gray-900">Tema Undangan 🎨</h2>
                <p class="text-sm text-gray-500 mt-1">Pilih warna dan font yang sesuai</p>
            </div>
            
            <!-- Color Picker -->
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Warna Tema</label>
                <div class="flex gap-3 flex-wrap">
                    @foreach(['#8b5cf6' => 'Ungu', '#ec4899' => 'Pink', '#ef4444' => 'Merah', '#f59e0b' => 'Emas', '#10b981' => 'Hijau', '#3b82f6' => 'Biru'] as $color => $name)
                        <button wire:click="setThemeColor('{{ $color }}')"
                                type="button"
                                title="{{ $name }}"
                                class="w-10 h-10 rounded-full transition-all hover:scale-110 {{ $theme_color === $color ? 'ring-2 ring-offset-2 ring-purple-500' : '' }}"
                                style="background-color: {{ $color }}">
                        </button>
                    @endforeach
                    <input type="color" 
                           wire:model.live="theme_color"
                           class="w-10 h-10 rounded-full cursor-pointer border-0">
                </div>
            </div>

            <!-- Font Picker -->
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Font</label>
                <select wire:model.live="font" 
                        class="w-full px-5 py-4 rounded-2xl border border-gray-200 outline-none
                               focus:border-purple-500 focus:ring-2 focus:ring-purple-200">
                    <option value="Playfair Display">Playfair Display (Elegant)</option>
                    <option value="Poppins">Poppins (Modern)</option>
                    <option value="Montserrat">Montserrat (Clean)</option>
                    <option value="Dancing Script">Dancing Script (Cursive)</option>
                    <option value="Lora">Lora (Classic)</option>
                </select>
            </div>

            <!-- Preview Colors -->
            <div class="p-4 rounded-xl" :style="'background-color: ' + theme_color + '20'">
                <p class="text-sm font-medium" :style="'color: ' + theme_color">Preview warna tema</p>
            </div>
        </div>

    {{-- STEP 5: Preview + Slug --}}
    @elseif($step === 5)
        <div class="space-y-6">
            <div class="mb-4">
                <h2 class="text-2xl font-bold text-gray-900">Atur Link Undangan 🔗</h2>
                <p class="text-sm text-gray-500 mt-1">Tentukan nama unik untuk URL undangan kamu</p>
            </div>

            {{-- Slug Input --}}
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Link Undangan</label>

                {{-- Input Group --}}
                <div class="flex rounded-2xl border transition-all overflow-hidden
                    @if($isSlugAvailable === true) border-green-400 ring-2 ring-green-100
                    @elseif($isSlugAvailable === false) border-red-400 ring-2 ring-red-100
                    @else border-gray-200 focus-within:border-purple-400 focus-within:ring-2 focus-within:ring-purple-100
                    @endif">

                    {{-- Prefix --}}
                    <span class="flex items-center px-4 bg-gray-50 border-r border-gray-200 text-gray-400 text-sm font-medium whitespace-nowrap select-none">
                        weddstu.com/
                    </span>

                    {{-- Input --}}
                    <input type="text"
                           wire:model.live.debounce.500ms="slug"
                           placeholder="nama-pasangan"
                           class="flex-1 px-4 py-4 outline-none bg-white text-gray-900 text-sm font-medium">

                    {{-- Loading Indicator --}}
                    <span wire:loading wire:target="updatedSlug"
                          class="flex items-center px-4 bg-white">
                        <svg class="animate-spin w-4 h-4 text-purple-500" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/>
                        </svg>
                    </span>

                    {{-- Status Badge --}}
                    <span wire:loading.remove wire:target="updatedSlug"
                          class="flex items-center px-4 bg-white">
                        @if($isSlugAvailable === true)
                            <span class="flex items-center gap-1 text-xs font-bold text-green-600">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                                </svg>
                                Tersedia
                            </span>
                        @elseif($isSlugAvailable === false)
                            <span class="flex items-center gap-1 text-xs font-bold text-red-500">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                                Sudah Dipakai
                            </span>
                        @endif
                    </span>
                </div>

                {{-- Preview URL --}}
                @if($slug)
                    <p class="mt-2 text-xs text-gray-400 font-mono">
                        🔗 weddstu.com/<span class="text-purple-600 font-semibold">{{ $slug }}</span>
                    </p>
                @endif

                {{-- Helper text --}}
                <p class="mt-1.5 text-xs text-gray-400">
                    Hanya huruf kecil, angka, dan tanda hubung (-). Otomatis dibuat dari nama pasangan.
                </p>
            </div>

            {{-- Ringkasan Data --}}
            <div class="bg-gray-50 rounded-2xl p-4 space-y-3">
                <h3 class="font-bold text-gray-700 text-sm">Ringkasan Data</h3>
                <div class="grid grid-cols-2 gap-y-2 gap-x-4 text-sm">
                    <span class="text-gray-400">Mempelai Wanita</span>
                    <span class="font-medium text-gray-800">{{ $bride_name ?: '-' }}</span>
                    <span class="text-gray-400">Mempelai Pria</span>
                    <span class="font-medium text-gray-800">{{ $groom_name ?: '-' }}</span>
                    <span class="text-gray-400">Tanggal</span>
                    <span class="font-medium text-gray-800">{{ $event_date ?: '-' }}</span>
                    <span class="text-gray-400">Waktu</span>
                    <span class="font-medium text-gray-800">{{ $event_time ?: '-' }}</span>
                    <span class="text-gray-400">Lokasi</span>
                    <span class="font-medium text-gray-800">{{ $venue ?: '-' }}</span>
                    <span class="text-gray-400">Kota</span>
                    <span class="font-medium text-gray-800">{{ $city ?: '-' }}</span>
                </div>
            </div>

            <div class="bg-purple-50 border border-purple-100 rounded-2xl p-4">
                <p class="text-purple-700 text-xs">
                    <strong>💡 Tips:</strong> Link ini yang akan kamu bagikan ke tamu undangan. Pilih yang mudah diingat!
                </p>
            </div>
        </div>

    {{-- STEP 6: Publikasi --}}
    @elseif($step === 6)
        <div class="space-y-6" x-data="{ showConfirm: false }" @open-publish-confirm.window="showConfirm = true">
            <div class="mb-4">
                <h2 class="text-2xl font-bold text-gray-900">Publikasi Undangan 🚀</h2>
                <p class="text-sm text-gray-500 mt-1">Undangan siap untuk dipublikasikan</p>
            </div>

            <div class="text-center py-8">
                <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Semua Sudah Siap!</h3>
                <p class="text-gray-600">Undangan "{{ $bride_name ?: 'Mempelai' }} & {{ $groom_name ?: 'Mempelai' }}" siap dipublikasikan.</p>
            </div>

            <div class="bg-gray-50 rounded-xl p-4 space-y-2">
                <h4 class="font-medium text-gray-700">Yang akan terjadi:</h4>
                <ul class="text-sm text-gray-600 space-y-1">
                    <li>✓ Undangan akan dapat diakses publik</li>
                    <li>✓ Tamu dapat RSVP</li>
                    <li>✓ Ucapan dapat terkirim</li>
                </ul>
            </div>

            @if($slug)
                <div class="bg-purple-50 border border-purple-100 rounded-xl p-4">
                    <p class="text-xs text-gray-500 mb-1">Link undangan kamu:</p>
                    <p class="font-mono text-purple-700 font-semibold text-sm">weddstu.com/{{ $slug }}</p>
                </div>
            @endif

            {{-- Confirm Modal --}}
            <div x-show="showConfirm"
                 x-cloak
                 x-transition
                 class="fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4">
                <div class="bg-white rounded-3xl p-8 max-w-sm w-full shadow-2xl" @click.stop>
                    <div class="text-center mb-6">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-3xl">🚀</span>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900">Publikasikan Sekarang?</h3>
                        <p class="text-sm text-gray-500 mt-2">Undangan akan langsung bisa diakses oleh tamu.</p>
                    </div>
                    <div class="flex gap-3">
                        <button @click="showConfirm = false"
                                type="button"
                                class="flex-1 px-4 py-3 rounded-2xl border border-gray-200 text-gray-600 font-semibold hover:bg-gray-50">
                            Batal
                        </button>
                        <button wire:click="publishInvitation"
                                type="button"
                                wire:loading.attr="disabled"
                                class="flex-1 px-4 py-3 rounded-2xl bg-gradient-to-r from-green-600 to-emerald-600 text-white font-semibold hover:shadow-lg">
                            <span wire:loading.remove wire:target="publishInvitation">✓ Publikasikan</span>
                            <span wire:loading wire:target="publishInvitation">Memproses...</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
