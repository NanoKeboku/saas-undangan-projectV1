<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hai</title>

    <!-- icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" />

    <!-- fav -->
    <link rel="shortcut icon" href="{{ asset('asset/img/logosa.png') }}" type="image/x-icon">

    <!-- aos -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- font -->
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,700;1,700&display=swap"
        rel="stylesheet" />

    <!-- boostrap -->
    <link href="{{ asset('asset/bootstraps/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('asset/css/homepage.css') }}" />

</head>

<body id="cover" class="d-flex align-items-center justify-content-center">
    <main class="cover-section">
        <section data-aos="fade-down" data-aos-duration="1200">
            <div class="cover-date-top">
                15 / 02 <span class="mx-2">|</span> 2026
            </div>
        </section>

        <section class="title" data-aos="zoom-in" data-aos-duration="1500" data-aos-delay="200">
            <p class="mb-2 small">
                THE WEDDING OF
            </p>
            <h1 class="cover-title">Adi & Violin</h1>
        </section>

        <section class="pesan" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="600">
            <p class="cover-guest-label">KEPADA YTH.</p>
            <span class="cover-guest-name">{{ $mycontact->name ?? 'Tamu Undangan' }}</span>

            <p class="small opacity-75 mb-4 mx-auto">
                Dengan segala hormat, kami mengundang Anda untuk menghadiri acara
                pernikahan kami.
            </p>

            <button class="btn-open-invitation" onclick="navigateToUndangan()">
                Buka Undangan
            </button>
        </section>
    </main>
    
    <script>
        // Inisialisasi AOS
        AOS.init({
            once: true, // Animasi hanya berjalan sekali saat dimuat
        });

        // Fungsi Navigasi ke Halaman Undangan
        function navigateToUndangan() {
            // Tambahkan class fade-out untuk efek transisi halus
            document.body.classList.add("fade-out");

            // Beri jeda 800ms (sesuai durasi CSS transition) baru pindah halaman
            setTimeout(function() {
                window.location.href = "/undangan";
            }, 800);
        }
    </script>
</body>

</html>
