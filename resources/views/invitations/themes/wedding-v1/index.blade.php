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
    <!-- FONT AWESOME -->
    <script src="https://kit.fontawesome.com/60bfabd217.js" crossorigin="anonymous"></script>

    <!-- font -->
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,700;1,700&display=swap"
        rel="stylesheet" />
    <!-- boostrap -->
    <link href="{{ asset('asset/bootstraps/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('asset/css/homepage.css') }}" />
</head>

<body class="d-flex">
    
        @if (session()->has('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Terkirim!',
                    text: "{{ session('success') }}",
                    showConfirmButton: false,
                    timer: 2000
                })
            </script>
        @endif
        <button class="burger-menu" onclick="toggleNav()">
            <i class="fa-solid fa-bars"></i>
        </button>

        <div class="nav-overlay" id="navOverlay">
            <div class="nav-content">
                <button class="btn-close-nav" onclick="toggleNav()">CLOSE</button>

                <nav class="nav-list">
                    <a href="index.html" class="nav-link" onclick="toggleNav()"><span class="arrow">→</span> Home</a>
                    <a href="undangan.html" class="nav-link" onclick="toggleNav()"><span class="arrow">→</span> Bride
                        and Groom</a>
                    <a href="#event" class="nav-link" onclick="toggleNav()"><span class="arrow">→</span> Wedding
                        Event</a>
                    <a href="#gallery" class="nav-link" onclick="toggleNav()"><span class="arrow">→</span> Gallery</a>
                    <a href="#rsvp" class="nav-link" onclick="toggleNav()"><span class="arrow">→</span> RSVP</a>
                    <a href="#gift" class="nav-link" onclick="toggleNav()"><span class="arrow">→</span> Gift</a>
                </nav>

                <div class="mt-4 p-3 rounded nav-block ">
                    <small class="d-block opacity-50">Personalized for</small>
                    <span class="fw-bold">Nurul Latifah</span>
                </div>
            </div>
        </div>
        <section class="left-side sticky-top vh-100 align-items-center justify-content-center ">
            <div style="bottom: 80px; left: 40px" class="container position-absolute title-left" data-aos="fade-right"
                data-aos-duration="1000" data-aos-anchor-placement="bottom-bottom">
                <p>THE WEDDING OF</p>
                <h1>Adi & Violin</h1>
            </div>
            <div class="overlay"></div>
        </section>

        <section class="right-side">
            <img src="{{ asset('asset/img/2.webp') }}" class="bg-object-fit" alt="Background">
            <section class="hero vh-100 d-flex align-items-center flex-column justify-content-center">
                <div class="d-flex relative" data-aos="fade-up" data-aos-duration="1000"
                    data-aos-anchor-placement="bottom-bottom">
                    <p class="px-2">15/02</p>
                    <p>2026</p>
                </div>
                <section class="title text-center" data-aos="fade-up" data-aos-duration="1000"
                    data-aos-anchor-placement="bottom-bottom">
                    <p>The Wedding of</p>
                    <h1>Adi & Violin</h1>
                </section>
                <section class="pesan text-center" data-aos="fade-up" data-aos-duration="1000"
                    data-aos-anchor-placement="bottom-bottom">
                    <p class="px-5">
                        “Letakkan aku dalam hatimu, maka akupun akan meletakkanmu dalam
                        hatimu”
                        <br> QS. Baqarah : 152
                    </p>
                </section>
            </section>

            <section class="wanita vh-100 ">
                <div class="d-flex flex-column align-items-start justify-content-center text-wrap p-5"
                    data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="bottom-bottom">

                    <p>
                        THE BRIDE </p>
                    <h2 class="text-start name">Agnestya Lintang Violin Asian</h2>
                    <p>PUTRI KEDUA DARI</p>
                    <p>Sukirman & Asih Puji Astuti </p>
                    <a href="https://www.instagram.com/v.asiannn/" target="_blank" class="btn-instagram">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                            class="bi bi-instagram" viewBox="0 0 16 16">
                            <path
                                d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                        </svg>
                        v.asiannn
                    </a>
                    </p>
                </div>
            </section>
            <section class="pria vh-100 d-flex flex-column align-items-start justify-content-center text-wrap p-5">
                <div class="d-flex flex-column align-items-start justify-content-center text-wrap p-3"
                    data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="bottom-bottom">
                    <p>
                        THE BRIDE </p>
                    <h2 class="text-start name">Kunto Setiadi</h2>
                    <p>PUTRA KEDUA DARI</p>
                    <p>Supriyono & Tiwen</p>
                    <a href="https://www.instagram.com/adhi3199/" target="_blank" class="btn-instagram">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                            class="bi bi-instagram" viewBox="0 0 16 16">
                            <path
                                d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                        </svg>
                        adhi3199
                    </a>
                    </p>
                    <div></div>
            </section>
            <section id="event"
                class="save-the-date vh-100 d-flex align-items-center justify-content-center text-center ">

                <div class="p-4" data-aos="fade-up" data-aos-duration="1000"
                    data-aos-anchor-placement="bottom-bottom">
                    <h2 class="mb-3">SAVE THE DATE</h2>
                    <p>Sabtu, 01 Februari 2026</p>

                    <div class="d-flex justify-content-center my-4">
                        <div class="countdown-item"><span id="days" class="countdown-number">00</span><span
                                class="countdown-label">Hari</span></div>
                        <div class="countdown-item"><span id="hours" class="countdown-number">00</span><span
                                class="countdown-label">Jam</span></div>
                        <div class="countdown-item"><span id="minutes" class="countdown-number">00</span><span
                                class="countdown-label">Menit</span></div>
                        <div class="countdown-item"><span id="seconds" class="countdown-number">00</span><span
                                class="countdown-label">Detik</span></div>
                    </div>

                    <a href="https://www.google.com/calendar/render?action=TEMPLATE&text=The+Wedding+of+Adi+%26+Violin&details=Acara+pernikahan+Nada+Syamrotul+Jannah+%26+Aditya+Dwi+Rully+Murita&dates=20250906T010000Z/20250906T060000Z&location=Gedung+Balai+Prajurit+RM+Moedjono+Poerbonegoro,+Sidoarjo"
                        target="_blank" class="btn-instagram">
                        SIMPAN TANGGAL
                    </a>
                    <hr class="w-25 mx-auto my-5">

                    <p class="fst-italic small mb-2 letter-space">save our date</p>
                    <h2 class="display-5 mb-3">AKAD</h2>
                    <p class="mb-4">08.00 - 09.00 WIB</p>
                    <p class="fw-bold small">Gedung...</p>
                    <a href="#" target="_blank" class="btn-instagram">
                        Buka Maps
                    </a>
                </div>
            </section>
            <section class="resepsi-section d-flexalign-items-center justify-content-center text-center p-4">
                <div class="container">
                    <h2 data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="bottom-bottom"
                        class="display-5 mb-3">RESEPSI</h2>
                    <p data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="bottom-bottom"
                        class="fs-5 mb-4">11.00 – 13.00 WIB</p>

                    <p data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="bottom-bottom"
                        class="fw-bold mb-1">Gedung ....</p>
                    <p data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="bottom-bottom"
                        class="mb-4 opacity-75">
                        KALIBOTO RT03 / RW04,BENER,PURWOREJO
                    </p>


                    <a data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="bottom-bottom"
                        href="https://maps.app.goo.gl/YourGoogleMapsLinkHere" target="_blank" class="btn-instagram">
                        BUKA MAPS
                    </a>
                    <div class="mt-5" data-aos="fade-up" data-aos-duration="1000"
                        data-aos-anchor-placement="bottom-bottom">
                        <img src="{{ asset('asset/img/1.webp') }}" alt="Frame" class="wedding-frame-img shadow">

                        <p class=" text-uppercase mb-2 letter-space">Capture Your Moment</p>
                        <h2 class="mb-3">WEDDING FRAME</h2>

                        <p class="px-3 opacity-75 mb-4">
                            Unggah dan abadikan momen kamu saat menghadiri pernikahan kami dengan menggunakan Wedding
                            Frame di bawah
                            ini.
                        </p>

                        <a href="https://www.instagram.com/ar/YOUR_FILTER_ID" target="_blank" class="btn-instagram">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                                <path
                                    d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                            </svg>
                            WEDDING FRAME
                        </a>

                        <p class="mt-4 extra-small opacity-50 fst-italic">
                            *Disarankan untuk memperbarui aplikasi Instagram ke versi terbaru.
                        </p>
                    </div>
                </div>

            </section>
            <section id="gallery" class="gallery-section text-center">
                <div class="container">
                    <h2 data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="bottom-bottom"
                        class="gallery-title display-5 mb-3">OUR MOMENT</h2>
                    <p data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="bottom-bottom"
                        class="gallery-quote mb-2">
                        "And I'd choose you; in a hundred lifetimes, in a hundred worlds, in any version of reality, I'd
                        find you and
                        I'd choose you."
                    </p>
                    <p data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="bottom-bottom"
                        class="mb-5 text-secondary">Photo & Video by Instudio</p>

                    <div class="row g-3">
                        <div data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="bottom-bottom"
                            class="col-12 mb-2">
                            <img src="{{ asset('asset/img/1.webp') }}" class="gallery-item img-main"
                                alt="Main Moment">
                        </div>

                        <div data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="bottom-bottom"
                            class="col-6">
                            <img src="{{ asset('asset/img/1.webp') }}" class="gallery-item img-tall" alt="Moment 1">
                        </div>
                        <div data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="bottom-bottom"
                            class="col-6">
                            <img src="{{ asset('asset/img/3.webp') }}" class="gallery-item img-tall" alt="Moment 2">
                        </div>

                        <div data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="bottom-bottom"
                            class="col-6">
                            <img src=" {{ asset('asset/img/bg.webp') }}" class="gallery-item img-tall"
                                alt="Moment 3">
                        </div>
                        <div data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="bottom-bottom"
                            class="col-6">
                            <img src="{{ asset('asset/img/hero.webp') }}" class="gallery-item img-tall"
                                alt="Moment 4">
                        </div>
                    </div>
                </div>
            </section>
            <section class="rsvp-section text-center" id="rsvp">
                <div class="container pt-5">
                    <h2 data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="bottom-bottom"
                        class="display-5 mb-3">RSVP</h2>
                    <p data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="bottom-bottom"
                        class="mb-5">Bagi tamu undangan yang akan menghadiri acara pernikahan kami, mohon mengirimkan
                        konfirmasi kehadiran dengan mengisi formulir berikut ini:</p>

                    <form id="rsvpForm" class="mb-5 text-start" data-aos="fade-up" data-aos-duration="1000"
                        data-aos-anchor-placement="bottom-bottom">
                        <div class="mb-3">
                            <label class="form-label small">Nama</label>
                            <input type="text" class="form-control form-control-custom" id="nama"
                                placeholder="Masukkan Nama Anda">
                        </div>

                        <div class="mb-3" data-aos="fade-up" data-aos-duration="1000"
                            data-aos-anchor-placement="bottom-bottom">
                            <label class="form-label small">Konfirmasi Kehadiran</label>
                            <div class="d-flex gap-2">
                                <input type="radio" class="btn-check" name="kehadiran" id="hadir"
                                    value="Hadir">
                                <label class="btn btn-outline-light w-50" for="hadir">Hadir</label>

                                <input type="radio" class="btn-check" name="kehadiran" id="tidakHadir"
                                    value="Tidak Hadir">
                                <label class="btn btn-outline-light w-50" for="tidakHadir">Tidak Hadir</label>
                            </div>
                        </div>

                        <div class="mb-4" data-aos="fade-up" data-aos-duration="1000"
                            data-aos-anchor-placement="bottom-bottom">
                            <label class="form-label small">Doa & Ucapan</label>
                            <textarea class="form-control form-control-custom" id="ucapan" rows="4"
                                placeholder="Tulis doa & ucapan Anda"></textarea>
                        </div>

                        <button data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="bottom-bottom"
                            type="button" onclick="kirimWA()"
                            class="btn btn-light w-100 fw-bold py-2">KIRIM</button>
                    </form>

                    <hr class="my-5 opacity-25" data-aos="fade-up" data-aos-duration="1000"
                        data-aos-anchor-placement="bottom-bottom">

                    <h2 data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="bottom-bottom"
                        class="display-5 mb-3">WISHES</h2>
                    <p data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="bottom-bottom"
                        class="mb-4">Terima kasih telah memberikan ucapan selamat, saran pernikahan terbaik, hal-hal
                        lucu, atau
                        apa pun itu—semuanya istimewa bagi kami!</p>

                    <div class="wishes-container" data-aos="fade-up" data-aos-duration="1000"
                        data-aos-anchor-placement="bottom-bottom">
                        <div class="wish-card">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="fw-bold">Deby Gascoign 99 <span class="text-danger">✘</span></span>
                                <small class="opacity-50">4 months ago</small>
                            </div>
                            <p class="small mb-0">SAMAWA nada.. maaf blm bisa hadir masih di Luar kota</p>
                        </div>

                        <div class="wish-card">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="fw-bold">Cheesecake <span class="text-success">✔</span></span>
                                <small class="opacity-50">4 months ago</small>
                            </div>
                            <p class="small mb-0">Barakallahu laka wa baraka alayka... Semoga sakinah mawaddah
                                warahmah. Langgung sampai
                                surga-Nya aamiin 🤲🏻💖</p>
                        </div>
                    </div>
                </div>
            </section>
            <section id="gift" class="gift py-5 px-4">
                <div class="container width500">
                    <h2 class="gift-title" data-aos="fade-down">WEDDING GIFT</h2>
                    <p class=" mb-5 opacity-75" data-aos="fade-up">
                        Cinta, tawa, dan kebersamaan Anda di hari pernikahan kami adalah hadiah terindah.
                        Namun, jika Anda ingin memberikan hadiah, segala bentuk hadiah untuk kehidupan baru kami akan
                        sangat berarti.
                    </p>

                    <div class="gift-card" data-aos="fade-up">
                        <div class="d-flex align-items-center">
                            <div class="me-3">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/f/f0/Bank_Negara_Indonesia_logo_%282004%29.svg"
                                    alt="BNI" width="60">
                            </div>
                            <div class="gift-info">
                                <h6>BANK BNI</h6>
                                <p id="norek1">31991939970362</p>
                                <small class="d-block opacity-50 ">A/N AGNESTYA LINTANG VIOLIN ASIAN</small>
                            </div>
                        </div>
                        <button class="btn-copy" onclick="copyToClipboard('31991939970362')">
                            <i class="fa-regular fa-copy"></i>
                        </button>
                    </div>

                    <div class="gift-card" data-aos="fade-up">
                        <div class="d-flex align-items-center">
                            <div class="me-3">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2e/BRI_2020.svg/1200px-BRI_2020.svg.png"
                                    alt="BRI" width="60">
                            </div>
                            <div class="gift-info">
                                <h6>BANK BRI</h6>
                                <p id="norek2">007801026087534</p>
                                <small class="d-block opacity-50">A/N KUNTO SETIADI</small>
                            </div>
                        </div>
                        <button class="btn-copy" onclick="copyToClipboard('007801026087534')">
                            <i class="fa-regular fa-copy"></i>
                        </button>
                    </div>

                    <div class="gift-card" data-aos="fade-up">
                        <div class="d-flex align-items-center">
                            <div class="me-3">
                                <div
                                    class="bg-light text-dark rounded-circle d-flex align-items-center justify-content-center icon">
                                    <i class="fa-solid fa-gift"></i>
                                </div>
                            </div>
                            <div class="gift-info">
                                <h6>KIRIM KADO</h6>
                                <p class="addrs">Kaliboto RT03 / RW04, Bener, Purworejo</p>
                            </div>
                        </div>
                        <button class="btn-copy" onclick="copyToClipboard('Kaliboto RT03 / RW04, Bener, Purworejo')">
                            <i class="fa-regular fa-copy"></i>
                        </button>
                    </div>

                    <div class="gift-card trigger" id="giftToggle" onclick="toggleGiftForm()" data-aos="fade-up">
                        <div class="d-flex align-items-center" data-aos="fade-up">
                            <div class="me-3" data-aos="fade-up">
                                <div
                                    class="bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center icon">
                                    <i data-aos="fade-up" class="fa-solid fa-box-open"></i>
                                </div>
                            </div>
                            <div class="gift-info">
                                <p class="big">KONFIRMASIKAN KADOMU</p>
                            </div>
                        </div>
                        <i data-aos="fade-up" class="fa-solid fa-chevron-down arrow-icon"></i>
                    </div>

                    <div class="confirm-gift-wrapper" id="giftFormContainer" data-aos="fade-up">
                        <div class="confirm-gift-container p-4">
                            <h3 class="confirm-title text-center">KONFIRMASI KIRIM KADO</h3>
                            <form id="giftForm">
                                <input type="text" id="senderName" class="form-control form-gift-input"
                                    placeholder="Tuliskan Nama Anda Disini" required>
                                <input type="text" id="giftAmount" class="form-control form-gift-input"
                                    placeholder="Nominal/Kado" required>
                                <select id="targetAccount" class="form-select form-gift-input" required>
                                    <option value="" disabled selected>Rekening/Alamat Tujuan</option>
                                    <option value="BNI (Agnestya Lintang Violin Asian)">BNI (Agnestya Lintang Violin
                                        Asian)</option>
                                    <option value="BRI (Kunto Setiadi)">BRI (Kunto Setiadi)</option>
                                    <option value="Pondok Sidokare Asri (Alamat Fisik)">Pondok Sidokare Asri (Alamat
                                        Fisik)</option>
                                </select>
                                <button type="button" class="btn-wa-confirm" onclick="sendGiftWA()">KONFIRMASI VIA
                                    WHATSAPP</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <section class="thank-you-section text-center d-flex flex-column">
                <div class="container" data-aos="fade-up" data-aos-duration="1000"
                    data-aos-anchor-placement="bottom-bottom">
                    <h2 class="thank-you-title display-4 mb-4">THANK YOU</h2>

                    <p class="thank-you-text mb-4">
                        Saatnya mempersiapkan pakaian terbaikmu. Kami sudah menunggu momen ini.
                        Catat tanggalnya, dandani dirimu! Bergabunglah dengan kami untuk merayakan babak baru dalam
                        hidup kami.
                    </p>

                    <div class="couple-name-footer">
                        Adi & Violin
                    </div>
                </div>
                <div class="footer-credit mt-5" data-aos="fade-up" data-aos-duration="1000"
                    data-aos-anchor-placement="bottom-bottom">
                    <h3 class="brand-name">Instudio</h3>
                    <p class="copyright-text">Digital Wedding Invitation © 2025</p>

                    <div class="social-icons">
                        <a href="#"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#"><i class="fa-brands fa-facebook"></i></a>
                        <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
                    </div>
                </div>
            </section>

        </section>

        <audio id="bgMusic" loop>
            <source src="https://www.bensound.com/bensound-music/bensound-love.mp3" type="audio/mpeg">
        </audio>

        <div class="fixed-controls">
            <button class="control-btn" onclick="toggleFullScreen()" title="Full Screen">
                <i class="fa-solid fa-expand" id="fsIcon"></i>
            </button>

            <button class="control-btn" onclick="toggleMusic()" title="Play/Pause Music">
                <i class="fa-solid fa-compact-disc" id="musicIcon"></i>
            </button>
        </div>


        <script>
            AOS.init();
        </script>

        <script>
            const music = document.getElementById("bgMusic");
            const musicIcon = document.getElementById("musicIcon");

            // Fungsi Play/Pause Musik
            function toggleMusic() {
                if (music.paused) {
                    music.play();
                    musicIcon.classList.add("music-playing");
                } else {
                    music.pause();
                    musicIcon.classList.remove("music-playing");
                }
            }

            // Fungsi Full Screen Window
            function toggleFullScreen() {
                const fsIcon = document.getElementById("fsIcon");

                if (!document.fullscreenElement) {
                    document.documentElement.requestFullscreen();
                    fsIcon.classList.replace("fa-expand", "fa-compress");
                } else {
                    if (document.exitFullscreen) {
                        document.exitFullscreen();
                        fsIcon.classList.replace("fa-compress", "fa-expand");
                    }
                }
            }

            function openInvitation() {
                music.play();
                musicIcon.classList.add("music-playing");
            }
            const targetDate = new Date("Feb 6, 2026 08:00:00").getTime();

            const x = setInterval(function() {
                const now = new Date().getTime();
                const distance = targetDate - now;

                const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                document.getElementById("days").innerHTML = days;
                document.getElementById("hours").innerHTML = hours;
                document.getElementById("minutes").innerHTML = minutes;
                document.getElementById("seconds").innerHTML = seconds;

                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById("days").innerHTML = "00";
                    // dst...
                }
            }, 1000);

            function toggleNav() {
                const nav = document.getElementById('navOverlay');
                if (nav.classList.contains('active')) {
                    nav.classList.remove('active');
                    setTimeout(() => {
                        nav.style.display = 'none';
                    }, 400); // Menunggu animasi selesai
                } else {
                    nav.style.display = 'flex';
                    setTimeout(() => {
                        nav.classList.add('active');
                    }, 10); // Memberi jeda kecil untuk trigger animasi
                }
            }

            function sendGiftWA() {
                const name = document.getElementById('senderName').value;
                const amount = document.getElementById('giftAmount').value;
                const target = document.getElementById('targetAccount').value;
                const phoneNumber = "6282232947661"; // Nomor tujuan sesuai permintaan kamu

                if (name && amount && target) {
                    // Format teks sesuai permintaan kamu
                    const message =
                        `Hai, saya ${name} ingin konfirmasi pemberian angpao %26 kado pernikahan berupa ${amount}. Melalui _*${target}*_. Bisa dicek yaa.`;

                    const waLink = `https://api.whatsapp.com/send?phone=${phoneNumber}&text=${message}`;

                    window.open(waLink, '_blank');
                } else {
                    alert("Silakan lengkapi semua data form konfirmasi.");
                }
            }

            function copyToClipboard(text) {
                navigator.clipboard.writeText(text).then(() => {
                    alert("Nomor rekening berhasil disalin!");
                });
            }

            function toggleGiftForm() {
                const wrapper = document.getElementById('giftFormContainer');
                const trigger = document.getElementById('giftToggle');

                // Toggle class active
                wrapper.classList.toggle('active');
                trigger.classList.toggle('active');

                // Scroll otomatis ke form jika dibuka (opsional)
                if (wrapper.classList.contains('active')) {
                    setTimeout(() => {
                        wrapper.scrollIntoView({
                            behavior: 'smooth',
                            block: 'nearest'
                        });
                    }, 300);
                }
            }

            function sendGiftWA() {
                const name = document.getElementById('senderName').value;
                const amount = document.getElementById('giftAmount').value;
                const target = document.getElementById('targetAccount').value;
                const phoneNumber = "6282232947661";

                if (name && amount && target) {
                    // Teks pesan sesuai permintaan Anda
                    const message =
                        `Hai, saya ${name} ingin konfirmasi pemberian angpao %26 kado pernikahan berupa ${amount}. Melalui _*${target}*_. Bisa dicek yaa.`;
                    const waLink = `https://api.whatsapp.com/send?phone=${phoneNumber}&text=${message}`;
                    window.open(waLink, '_blank');
                } else {
                    alert("Mohon lengkapi semua data konfirmasi.");
                }
            }
        </script>

        {{-- sweetaler --}}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


        <script src="{{ asset('asset/bootstraps/js/bootstrap.min.js') }}"></script>
</body>

</html>
