@php
    $profileSetting = \App\Models\ProfileSetting::first();
@endphp
<nav class="navbar navbar-expand-lg navbar-light sticky-top">

    <div class="container">

        {{-- LOGO --}}

        <a
            class="navbar-brand d-flex align-items-center gap-2"
            href="{{ route('home') }}"
        >

            <img
    src="{{ $profileSetting?->logo
        ? asset('storage/' . $profileSetting->logo)
        : asset('images/logo-hmi.jpg') }}"
    alt="{{ $profileSetting?->nama_organisasi ?? 'HMI Cabang Indramayu' }}"
    class="navbar-logo"
>

            <div class="navbar-brand-text">

                <div class="navbar-brand-title">
                    HMI
                </div>

                <div class="navbar-brand-subtitle">
                    Cabang Indramayu
                </div>

            </div>

        </a>


        {{-- MOBILE TOGGLE --}}

        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#mainNavbar"
            aria-controls="mainNavbar"
            aria-expanded="false"
            aria-label="Buka menu navigasi"
        >

            <span class="navbar-toggler-icon"></span>

        </button>


        {{-- NAVIGATION --}}

        <div
            class="collapse navbar-collapse"
            id="mainNavbar"
        >

            <ul class="navbar-nav ms-auto align-items-lg-center">


                {{-- BERANDA --}}

                <li class="nav-item">

                    <a
                        class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                        href="{{ route('home') }}"
                    >
                        Beranda
                    </a>

                </li>


                {{-- TENTANG HMI --}}

                <li class="nav-item dropdown">

                    <a
                        class="nav-link dropdown-toggle
                        {{
                            request()->routeIs(
                                'profil',
                                'sejarah',
                                'tujuan',
                                'nilai-dasar-perjuangan'
                            )
                            ? 'active'
                            : ''
                        }}"
                        href="#"
                        role="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                    >
                        Tentang HMI
                    </a>


                    <ul class="dropdown-menu border-0 shadow">


                        {{-- PROFIL --}}

                        <li>

                            <a
                                class="dropdown-item {{ request()->routeIs('profil') ? 'active' : '' }}"
                                href="{{ route('profil') }}"
                            >
                                <i class="bi bi-person-vcard me-2"></i>
                                Profil HMI
                            </a>

                        </li>


                        {{-- SEJARAH --}}

                        <li>

                            <a
                                class="dropdown-item {{ request()->routeIs('sejarah') ? 'active' : '' }}"
                                href="{{ route('sejarah') }}"
                            >
                                <i class="bi bi-clock-history me-2"></i>
                                Sejarah HMI
                            </a>

                        </li>


                        {{-- TUJUAN --}}

                        <li>

                            <a
                                class="dropdown-item {{ request()->routeIs('tujuan') ? 'active' : '' }}"
                                href="{{ route('tujuan') }}"
                            >
                                <i class="bi bi-bullseye me-2"></i>
                                Tujuan HMI
                            </a>

                        </li>


                        {{-- NDP --}}

                        <li>

                            <a
                                class="dropdown-item {{ request()->routeIs('nilai-dasar-perjuangan') ? 'active' : '' }}"
                                href="{{ route('nilai-dasar-perjuangan') }}"
                            >
                                <i class="bi bi-book-half me-2"></i>
                                Nilai Dasar Perjuangan
                            </a>

                        </li>


                    </ul>

                </li>


                {{-- ORGANISASI --}}

                <li class="nav-item">

                    <a
                        class="nav-link {{ request()->routeIs('organisasi.*') ? 'active' : '' }}"
                        href="{{ route('organisasi.index') }}"
                    >
                        Organisasi
                    </a>

                </li>


                {{-- BERITA --}}

                <li class="nav-item">

                    <a
                        class="nav-link {{ request()->routeIs('berita.*') ? 'active' : '' }}"
                        href="{{ route('berita.index') }}"
                    >
                        Berita
                    </a>

                </li>


                {{-- KEGIATAN --}}

                <li class="nav-item">

                    <a
                        class="nav-link {{ request()->routeIs('kegiatan.*') ? 'active' : '' }}"
                        href="{{ route('kegiatan.index') }}"
                    >
                        Kegiatan
                    </a>

                </li>


                {{-- KADERISASI --}}

                <li class="nav-item">

                    <a
                        class="nav-link {{ request()->routeIs('kaderisasi') ? 'active' : '' }}"
                        href="{{ route('kaderisasi') }}"
                    >
                        Kaderisasi
                    </a>

                </li>


                {{-- GALERI --}}

                <li class="nav-item">

                    <a
                        class="nav-link {{ request()->routeIs('galeri.index') ? 'active' : '' }}"
                        href="{{ route('galeri.index') }}"
                    >
                        Galeri
                    </a>

                </li>


                {{-- KONTAK --}}

                <li class="nav-item ms-lg-3 mt-2 mt-lg-0">

                    <a
                        href="{{ route('kontak') }}"
                        class="btn btn-success rounded-pill px-4"
                    >

                        <i class="bi bi-envelope me-2"></i>

                        Kontak

                    </a>

                </li>


            </ul>

        </div>

    </div>

</nav>
