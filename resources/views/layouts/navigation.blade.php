<nav class="navbar navbar-expand-lg shadow-sm sticky-top public-navbar">

    <div class="container">

        {{-- BRAND / LOGO --}}
        <a class="navbar-brand d-flex align-items-center"
           href="{{ route('home') }}">

            <img src="{{ asset('images/logo-hmi.jpg') }}"
                 alt="Logo HMI Cabang Indramayu"
                 class="public-logo">

            <div class="brand-text ms-2">
                <div class="brand-title">
                    HMI
                </div>

                <div class="brand-subtitle">
                    Cabang Indramayu
                </div>
            </div>

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


        {{-- NAVIGATION --}}
        <div class="collapse navbar-collapse"
             id="mainNavbar">

            <ul class="navbar-nav ms-auto align-items-lg-center">


                {{-- BERANDA --}}
                <li class="nav-item">

                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                       href="{{ route('home') }}">

                        Beranda

                    </a>

                </li>


                {{-- TENTANG HMI --}}
                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle
                              {{ request()->routeIs('profil')
                              || request()->routeIs('sejarah')
                              || request()->routeIs('tujuan')
                              || request()->routeIs('nilai-dasar-perjuangan')
                              ? 'active' : '' }}"
                       href="#"
                       role="button"
                       data-bs-toggle="dropdown"
                       aria-expanded="false">

                        Tentang HMI

                    </a>


                    <ul class="dropdown-menu">

                        <li>
                            <a class="dropdown-item"
                               href="{{ route('profil') }}">

                                Profil

                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item"
                               href="{{ route('sejarah') }}">

                                Sejarah

                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item"
                               href="{{ route('tujuan') }}">

                                Tujuan

                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item"
                               href="{{ route('nilai-dasar-perjuangan') }}">

                                Nilai Dasar Perjuangan

                            </a>
                        </li>

                    </ul>

                </li>


                {{-- ORGANISASI --}}
                <li class="nav-item">

                    <a class="nav-link
                              {{ request()->routeIs('organisasi.*') ? 'active' : '' }}"
                       href="{{ route('organisasi.index') }}">

                        Organisasi

                    </a>

                </li>


                {{-- BERITA --}}
                <li class="nav-item">

                    <a class="nav-link
                              {{ request()->routeIs('berita.*') ? 'active' : '' }}"
                       href="{{ route('berita.index') }}">

                        Berita

                    </a>

                </li>


                {{-- KEGIATAN --}}
                <li class="nav-item">

                    <a class="nav-link"
                       href="#">

                        Kegiatan

                    </a>

                </li>


                {{-- GALERI --}}
                <li class="nav-item">

                    <a class="nav-link"
                       href="#">

                        Galeri

                    </a>

                </li>


                {{-- KONTAK --}}
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


<style>

/* ===============================
   NAVBAR
================================ */

.public-navbar {
    background: #ffffff;
    min-height: 72px;
    z-index: 1030;
}


/* ===============================
   LOGO
================================ */

.public-logo {
    width: 42px;
    height: 42px;
    object-fit: contain;
    border-radius: 50%;
    display: block;
}


/* ===============================
   BRAND
================================ */

.brand-title {
    font-size: 17px;
    font-weight: 800;
    line-height: 1;
    color: #111111;
}

.brand-subtitle {
    font-size: 11px;
    font-weight: 600;
    color: #198754;
    margin-top: 4px;
    line-height: 1;
}


/* ===============================
   MENU
================================ */

.public-navbar .nav-link {
    color: #333333;
    font-weight: 600;
    padding: 10px 14px;
    transition: .2s ease;
}

.public-navbar .nav-link:hover,
.public-navbar .nav-link.active {
    color: #198754;
}


/* ===============================
   DROPDOWN
================================ */

.public-navbar .dropdown-menu {
    border: none;
    border-radius: 12px;
    padding: 8px;
    box-shadow: 0 8px 25px rgba(0, 0, 0, .10);
}

.public-navbar .dropdown-item {
    border-radius: 8px;
    padding: 9px 14px;
    font-weight: 500;
}

.public-navbar .dropdown-item:hover {
    background: #f1f8f4;
    color: #198754;
}


/* ===============================
   MOBILE
================================ */

@media (max-width: 991px) {

    .public-logo {
        width: 38px;
        height: 38px;
    }

    .public-navbar .navbar-nav {
        padding-top: 10px;
        padding-bottom: 10px;
    }

    .public-navbar .nav-link {
        padding: 10px 5px;
    }

    .public-navbar .dropdown-menu {
        box-shadow: none;
        border: 1px solid #eeeeee;
    }

}

</style>
