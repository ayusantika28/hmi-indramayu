<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'HMI Cabang Indramayu')
    </title>

    <meta name="description"
          content="@yield('description', 'Website resmi HMI Cabang Indramayu')">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>

        body {
            background: #f8f9fa;
            color: #212529;
        }

        .navbar {
            background: #ffffff;
        }

        .navbar-brand {
            font-weight: 800;
            letter-spacing: .3px;
        }

        .navbar .nav-link {
            font-weight: 500;
            color: #333;
        }

        .navbar .nav-link:hover,
        .navbar .nav-link.active {
            color: #198754;
        }

        footer {
            margin-top: 80px;
        }

    </style>

    @stack('styles')

</head>


<body>


{{-- NAVBAR --}}

<nav class="navbar navbar-expand-lg shadow-sm sticky-top">

    <div class="container">


        {{-- LOGO / BRAND --}}

        <a class="navbar-brand"
           href="{{ url('/') }}">

            HMI CABANG INDRAMAYU

        </a>


        {{-- MOBILE BUTTON --}}

        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#mainNavbar"
                aria-controls="mainNavbar"
                aria-expanded="false"
                aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>

        </button>


        {{-- MENU --}}

        <div class="collapse navbar-collapse"
             id="mainNavbar">

            <ul class="navbar-nav ms-auto align-items-lg-center">


                <li class="nav-item">

                    <a class="nav-link
                              {{ request()->is('/') ? 'active' : '' }}"
                       href="{{ url('/') }}">

                        Beranda

                    </a>

                </li>


                <li class="nav-item">

                    <a class="nav-link
                              {{ request()->is('berita*') ? 'active' : '' }}"
                       href="{{ route('berita.index') }}">

                        Berita

                    </a>

                </li>


                <li class="nav-item">

                    <a class="nav-link"
                       href="#">

                        Profil

                    </a>

                </li>


                <li class="nav-item">

                    <a class="nav-link"
                       href="#">

                        Kegiatan

                    </a>

                </li>


                <li class="nav-item">

                    <a class="nav-link"
                       href="#">

                        Galeri

                    </a>

                </li>


                <li class="nav-item">

                    <a class="nav-link"
                       href="#">

                        Kontak

                    </a>

                </li>

            </ul>

        </div>

    </div>

</nav>



{{-- CONTENT --}}

<main>

    @yield('content')

</main>



{{-- FOOTER --}}

<footer class="bg-dark text-white">

    <div class="container py-5">

        <div class="row g-4">


            <div class="col-md-6">

                <h5 class="fw-bold">

                    HMI Cabang Indramayu

                </h5>

                <p class="text-white-50 mb-0">

                    Himpunan Mahasiswa Islam
                    Cabang Indramayu.

                </p>

            </div>


            <div class="col-md-3">

                <h6 class="fw-bold">
                    Navigasi
                </h6>

                <ul class="list-unstyled">

                    <li class="mb-2">

                        <a href="{{ url('/') }}"
                           class="text-white-50 text-decoration-none">

                            Beranda

                        </a>

                    </li>

                    <li>

                        <a href="{{ route('berita.index') }}"
                           class="text-white-50 text-decoration-none">

                            Berita

                        </a>

                    </li>

                </ul>

            </div>


            <div class="col-md-3">

                <h6 class="fw-bold">
                    Ikuti Kami
                </h6>

                <div class="d-flex gap-3">

                    <a href="#"
                       class="text-white fs-5">

                        <i class="bi bi-facebook"></i>

                    </a>

                    <a href="#"
                       class="text-white fs-5">

                        <i class="bi bi-instagram"></i>

                    </a>

                    <a href="#"
                       class="text-white fs-5">

                        <i class="bi bi-youtube"></i>

                    </a>

                </div>

            </div>


        </div>

        <hr class="border-secondary my-4">


        <div class="text-center text-white-50">

            © {{ date('Y') }}
            HMI Cabang Indramayu.
            All rights reserved.

        </div>

    </div>

</footer>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>

@stack('scripts')

</body>

</html>
