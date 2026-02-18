<div class="w-full h-full overflow-y-auto" 
     x-data="{
        bride: @entangle('bride_name').live,
        groom: @entangle('groom_name').live,
        event_date: @entangle('event_date').live,
        event_time: @entangle('event_time').live,
        venue: @entangle('venue').live,
        city: @entangle('city').live,
        theme_color: @entangle('theme_color').live,
        font: @entangle('font').live,
        gallery: @entangle('gallery').live,

        formatDate(dateStr) {
            if (!dateStr) return 'Segera Ditentukan';
            const date = new Date(dateStr);
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            return date.toLocaleDateString('id-ID', options);
        }
     }"
     :key="'preview-' + bride + '-' + theme_color">
    
    <div class="min-h-full flex flex-col bg-white" :style="'font-family: ' + font + ', serif'">
        
        <!-- COVER SECTION -->
        <div class="flex-1 flex items-center justify-center p-8 text-center min-h-[300px]"
             :style="'background: linear-gradient(135deg, ' + theme_color + ' 0%, ' + theme_color + 'dd 100%);'">
            
            <!-- Decorative Elements -->
            <div class="absolute top-0 right-0 w-32 h-32 opacity-20" style="background: radial-gradient(circle, white 1px, transparent 1px); background-size: 20px 20px;"></div>
            <div class="absolute bottom-0 left-0 w-40 h-40 opacity-10" style="background: radial-gradient(circle, white 1px, transparent 1px); background-size: 30px 30px;"></div>

            <div class="relative z-10">
                <!-- Decorative Element -->
                <div class="mb-6 flex justify-center">
                    <div class="flex items-center gap-2">
                        <span class="text-lg">✦</span>
                        <span class="text-lg">✦</span>
                        <span class="text-lg">✦</span>
                        <span class="text-lg">✦</span>
                        <span class="text-lg">✦</span>
                    </div>
                </div>

                <!-- Main Text -->
                <p class="text-sm tracking-widest text-white/80 uppercase mb-4 font-light">Dengan Segenap Hati</p>
                
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-2 leading-tight" 
                    x-text="bride || 'Bride Name'">
                </h1>
                
                <p class="text-2xl font-light text-white mb-4">&</p>
                
                <h2 class="text-4xl md:text-5xl font-bold text-white mb-8 leading-tight"
                    x-text="groom || 'Groom Name'">
                </h2>

                <!-- Divider -->
                <div class="flex justify-center mb-6">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-px" style="background-color: rgba(255,255,255,0.5)"></div>
                        <span>💍</span>
                        <div class="w-12 h-px" style="background-color: rgba(255,255,255,0.5)"></div>
                    </div>
                </div>

                <p class="text-sm text-white/70 uppercase tracking-widest">akan merayakan</p>
            </div>
        </div>

        <!-- OPENING SECTION -->
        <div class="flex-1 flex items-center justify-center p-8 text-center bg-gradient-to-b from-white to-gray-50">
            <div>
                <p class="text-gray-600 leading-relaxed mb-6 italic text-sm max-w-xs mx-auto">
                    "Dua hati yang berbeda, kini menyatu menjadi satu cinta yang indah. Kami mengundang Anda untuk merayakan momen sakral ini bersama kami."
                </p>
                
                <div class="flex justify-center mb-6">
                    <span class="mx-1 text-xl">✦</span>
                    <span class="mx-1 text-xl">✦</span>
                    <span class="mx-1 text-xl">✦</span>
                </div>
            </div>
        </div>

        <!-- EVENT DETAILS SECTION -->
        <div class="p-8 text-center" 
             :style="'background-color: rgba(' + hexToRgb(theme_color) + ', 0.05);'">
            <h3 class="text-2xl font-bold mb-8" :style="'color: ' + theme_color">
                📅 Acara Kami
            </h3>

            <div class="space-y-6 max-w-xs mx-auto">
                <!-- Date -->
                <div>
                    <p class="text-xs uppercase tracking-widest text-gray-500 mb-2">Tanggal</p>
                    <p class="text-lg font-semibold text-gray-900" x-text="formatDate(event_date)">
                        Segera Ditentukan
                    </p>
                </div>

                <!-- Divider -->
                <div class="border-t border-gray-300"></div>

                <!-- Time -->
                <div>
                    <p class="text-xs uppercase tracking-widest text-gray-500 mb-2">Waktu</p>
                    <p class="text-lg font-semibold text-gray-900" x-text="event_time || '19:00'"></p>
                </div>

                <!-- Divider -->
                <div class="border-t border-gray-300"></div>

                <!-- Venue -->
                <div>
                    <p class="text-xs uppercase tracking-widest text-gray-500 mb-2">Lokasi</p>
                    <p class="text-lg font-semibold text-gray-900" x-text="venue || 'Venue'"></p>
                    <p class="text-sm text-gray-600 mt-1" x-text="city || 'City'"></p>
                </div>
            </div>

            <!-- Map Placeholder -->
            <div class="mt-8 rounded-2xl overflow-hidden h-32 bg-gray-200 flex items-center justify-center">
                <p class="text-gray-500 text-sm">📍 Google Maps akan ditampilkan di sini</p>
            </div>
        </div>

        <!-- GALLERY SECTION -->
        <template x-if="gallery && gallery.length > 0">
            <div class="p-8 bg-gradient-to-b from-gray-50 to-white">
                <h3 class="text-2xl font-bold text-center mb-8" :style="'color: ' + theme_color">
                    🖼️ Galeri Kenangan
                </h3>
                
                <div class="grid grid-cols-2 gap-4">
                    <template x-for="(img, index) in gallery.slice(0, 4)" :key="index">
                        <div class="rounded-2xl overflow-hidden h-32 bg-gray-200">
                            <img :src="img.temp_path || 'https://via.placeholder.com/200'" 
                                 alt="Gallery" 
                                 class="w-full h-full object-cover">
                        </div>
                    </template>
                </div>

                <template x-if="gallery.length > 4">
                    <p class="text-center text-sm text-gray-500 mt-4">
                        +<span x-text="gallery.length - 4"></span> foto lainnya
                    </p>
                </template>
            </div>
        </template>

        <!-- RSVP SECTION -->
        <div class="p-8 text-center bg-white">
            <h3 class="text-2xl font-bold mb-4" :style="'color: ' + theme_color">
                💌 Konfirmasi Kehadiran
            </h3>
            <p class="text-gray-600 text-sm mb-6">Kami sangat berharap kehadiran Anda</p>
            <button class="px-8 py-3 rounded-full text-white font-semibold transition-transform hover:scale-105"
                    :style="'background-color: ' + theme_color">
                Konfirmasi Kehadiran
            </button>
        </div>

        <!-- FOOTER -->
        <div class="p-6 text-center text-gray-500 text-xs bg-gray-50 border-t border-gray-100">
            <p>Terima kasih telah menjadi bagian dari kebahagiaan kami</p>
            <p class="mt-2">💌 Powered by <strong>Invited</strong></p>
        </div>
    </div>
</div>

@push('scripts')
<script>
function hexToRgb(hex) {
    // Convert hex to RGB for rgba() usage
    if (!hex) return '0,0,0';
    
    // Remove # if present
    hex = hex.replace('#', '');
    
    // Parse hex values
    const r = parseInt(hex.substring(0, 2), 16);
    const g = parseInt(hex.substring(2, 4), 16);
    const b = parseInt(hex.substring(4, 6), 16);
    
    return `${r}, ${g}, ${b}`;
}
</script>
@endpush
