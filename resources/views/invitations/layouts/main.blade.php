<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    {{-- SEO MAIN--}}
    <meta name="description" content="E Pintar Ki Hajar, Aplikasi pintar untuk anak dibangku sekolah" />
    <meta name="keywords" content="epintar, platfoarm pendidikan untuk anak SD">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="https://epintarkihajar.com/">
    <meta name="author" content="epintar" />

      {{-- SEO SOSMED --}}
    <meta property="og:title" content="Berbagai Website Siap Pakai | INSTUDIO">
    <meta property="og:description" content="Jelajahi solusi website profesional siap pakai dari INSTUDIO.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://instudio.id/">
    <meta property="og:image" content="{{ asset('asset/img/bg-main.png') }}">
    <meta property="og:locale" content="id_ID">


    <link rel="shortcut icon" href="{{ asset('asset/img/logo_instudio.svg') }}" type="image/x-icon">

    <title>DS | E-Wedding Instudio</title>
    <link href="{{ asset('css-ds/styles.css') }}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <!-- Include stylesheet -->
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />

    {{-- icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body>

    @yield('content')

    {{-- sweetaler --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js-ds/scripts.js ') }}"></script>
    <!-- Include the Quill library -->
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>

    {{-- animaton gsap --}}
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/gsap.min.js"></script>

    <script>
        gsap.from(".navbar-ts", {
            y: -50,
            opacity: 0,
            duration: 1,
            ease: "power3.out"
        });
        
        gsap.from(".head-menu", {
            y: -50,
            opacity: 0,
            duration: 1,
            ease: "power3.out"
        });

        gsap.from(".fade-item", {
            opacity: 0,
            y: 30,
            duration: 1,
            stagger: 0.2,
            ease: "power3.out",
            delay: 0.3
        });
    </script>

</body>

</html>
