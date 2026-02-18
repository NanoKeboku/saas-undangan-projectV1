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
        <div class="space-y-6">
            <div class="mb-4">
                <h2 class="text-2xl font-bold text-gray-900">Galeri Kenangan 🖼️</h2>
                <p class="text-sm text-gray-500 mt-1">Tambahkan foto-foto special kalian</p>
            </div>
            <div class="border-2 border-dashed border-gray-200 rounded-2xl p-8 text-center hover:border-purple-400 transition-colors cursor-pointer">
                <div class="flex flex-col items-center">
                    <svg class="w-12 h-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <p class="text-gray-600 font-medium">Klik untuk upload foto</p>
                    <p class="text-gray-400 text-sm mt-1">PNG, JPG max 5MB</p>
                </div>
            </div>
            @if(!empty($gallery))
                <div class="grid grid-cols-4 gap-2">
                    @foreach($gallery as $index => $img)
                        <div class="relative aspect-square rounded-lg overflow-hidden bg-gray-100">
                            <img src="{{ $img['temp_path'] ?? '' }}" alt="Gallery" class="w-full h-full object-cover">
                            <button wire:click="removeGallery({{ $index }})" 
                                    class="absolute top-1 right-1 bg-red-500 text-white rounded-full p-1">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                    @endforeach
                </div>
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
                        <button wire:click="theme_color = '{{ $color }}'"
                                :class="theme_color === '{{ $color }}' ? 'ring-2 ring-offset-2 ring-purple-500' : ''"
                                class="w-10 h-10 rounded-full transition-all hover:scale-110"
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

    {{-- STEP 5: Preview --}}
    @elseif($step === 5)
        <div class="space-y-6">
            <div class="mb-4">
                <h2 class="text-2xl font-bold text-gray-900">Preview Final 👁️</h2>
                <p class="text-sm text-gray-500 mt-1">Periksa undangan sebelum dipublikasikan</p>
            </div>
            
            <div class="bg-gray-50 rounded-xl p-4 space-y-3">
                <h3 class="font-bold text-gray-700">Ringkasan Data:</h3>
                <div class="grid grid-cols-2 gap-2 text-sm">
                    <span class="text-gray-500">Mempelai Wanita:</span>
                    <span class="font-medium">{{ $bride_name ?: '-' }}</span>
                    <span class="text-gray-500">Mempelai Pria:</span>
                    <span class="font-medium">{{ $groom_name ?: '-' }}</span>
                    <span class="text-gray-500">Tanggal:</span>
                    <span class="font-medium">{{ $event_date ?: '-' }}</span>
                    <span class="text-gray-500">Waktu:</span>
                    <span class="font-medium">{{ $event_time ?: '-' }}</span>
                    <span class="text-gray-500">Lokasi:</span>
                    <span class="font-medium">{{ $venue ?: '-' }}</span>
                    <span class="text-gray-500">Kota:</span>
                    <span class="font-medium">{{ $city ?: '-' }}</span>
                </div>
            </div>

            <div class="bg-purple-50 border border-purple-200 rounded-xl p-4">
                <p class="text-purple-800 text-sm">
                    <strong>💡 Tips:</strong> Pastikan semua data sudah benar sebelum mempublikasikan undangan.
                </p>
            </div>
        </div>

    {{-- STEP 6: Publikasi --}}
    @elseif($step === 6)
        <div class="space-y-6">
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
                    <li>✓.ucapan dapat terkirim</li>
                </ul>
            </div>
        </div>
    @endif
</div>
