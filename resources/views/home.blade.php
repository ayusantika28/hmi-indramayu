@extends('layouts.app')

@section('title', 'HMI Cabang Indramayu')

@section('content')

<style>
    /* =========================================================
       HERO
       ========================================================= */

    .hero-home {
        min-height: 650px;
        display: flex;
        align-items: center;
        position: relative;
        overflow: hidden;
        background: #f8f9fa;
    }

    .hero-home::before {
        content: "";
        position: absolute;
        width: 500px;
        height: 500px;
        border-radius: 50%;
        background: rgba(25, 135, 84, 0.08);
        top: -180px;
        right: -100px;
        animation: heroFloat 12s ease-in-out infinite;
    }

    .hero-home::after {
        content: "";
        position: absolute;
        width: 350px;
        height: 350px;
        border-radius: 50%;
        background: rgba(25, 135, 84, 0.06);
        bottom: -180px;
        left: -100px;
        animation: heroFloatReverse 15s ease-in-out infinite;
    }

    @keyframes heroFloat {
        0%,
        100% {
            transform: translate3d(0, 0, 0);
        }

        50% {
            transform: translate3d(-25px, 20px, 0);
        }
    }

    @keyframes heroFloatReverse {
        0%,
        100% {
            transform: translate3d(0, 0, 0);
        }

        50% {
            transform: translate3d(25px, -20px, 0);
        }
    }

    .hero-content {
        position: relative;
        z-index: 2;
    }

    .hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 8px 16px;
        border-radius: 50px;
        background: rgba(25, 135, 84, 0.1);
        color: #198754;
        font-size: 14px;
        font-weight: 700;
        margin-bottom: 20px;

        transition:
            transform 0.3s ease,
            background-color 0.3s ease;
    }

    .hero-badge:hover {
        transform: translateY(-3px);
        background: rgba(25, 135, 84, 0.15);
    }

    .hero-title {
        font-size: clamp(2.8rem, 6vw, 5rem);
        line-height: 1.05;
        font-weight: 800;
        margin-bottom: 20px;
        letter-spacing: -0.04em;
    }

    .hero-title span {
        color: #198754;
    }

    .hero-description {
        max-width: 620px;
        font-size: 1.15rem;
        line-height: 1.8;
        color: #6c757d;
        margin-bottom: 30px;
    }

    .hero-buttons {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
    }

    .hero-btn {
        border-radius: 50px;
        padding: 12px 24px;
        font-weight: 600;

        transition:
            transform 0.25s ease,
            box-shadow 0.25s ease,
            background-color 0.25s ease;
    }

    .hero-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(25, 135, 84, 0.18);
    }

    .hero-visual {
        position: relative;
        z-index: 2;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .hero-card {
        width: 380px;
        height: 380px;
        border-radius: 40px;
        background: #ffffff;

        box-shadow:
            0 25px 70px rgba(0, 0, 0, 0.12);

        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        padding: 40px;

        transition:
            transform 0.35s cubic-bezier(.2, .8, .2, 1),
            box-shadow 0.35s ease;

        will-change: transform;
    }

    .hero-card:hover {
        box-shadow:
            0 35px 90px rgba(0, 0, 0, 0.16);
    }

    .hero-logo {
        width: 130px;
        height: 130px;
        margin: 0 auto 25px;

        display: flex;
        align-items: center;
        justify-content: center;

        animation: logoFloat 4s ease-in-out infinite;
    }

    .hero-logo img {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    @keyframes logoFloat {
        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-8px);
        }
    }

    .hero-card h3 {
        font-weight: 800;
        margin-bottom: 10px;
    }

    .hero-card p {
        color: #6c757d;
        margin-bottom: 0;
        line-height: 1.7;
    }


    /* =========================================================
       SCROLL REVEAL
       ========================================================= */

    .reveal {
        opacity: 0;
        transform: translateY(35px);

        transition:
            opacity 0.8s cubic-bezier(.2, .8, .2, 1),
            transform 0.8s cubic-bezier(.2, .8, .2, 1);

        will-change:
            opacity,
            transform;
    }

    .reveal.is-visible {
        opacity: 1;
        transform: translateY(0);
    }

    .reveal-left {
        opacity: 0;
        transform: translateX(-40px);

        transition:
            opacity 0.8s ease,
            transform 0.8s cubic-bezier(.2, .8, .2, 1);
    }

    .reveal-left.is-visible {
        opacity: 1;
        transform: translateX(0);
    }

    .reveal-right {
        opacity: 0;
        transform: translateX(40px);

        transition:
            opacity 0.8s ease,
            transform 0.8s cubic-bezier(.2, .8, .2, 1);
    }

    .reveal-right.is-visible {
        opacity: 1;
        transform: translateX(0);
    }


    /* =========================================================
       BERITA
       ========================================================= */

    .home-news-card {
        border: 1px solid rgba(0, 107, 60, 0.08) !important;

        transition:
            transform 0.4s cubic-bezier(.2, .8, .2, 1),
            box-shadow 0.4s ease,
            border-color 0.3s ease;

        will-change: transform;
    }

    .home-news-card:hover {
        box-shadow:
            0 22px 50px rgba(15, 23, 42, 0.12) !important;

        border-color:
            rgba(0, 107, 60, 0.18) !important;
    }

    .home-news-image {
        position: relative;
        width: 100%;
        height: 230px;
        overflow: hidden;
        background: #198754;
    }

    .home-news-image img {
        width: 100%;
        height: 100%;
        display: block;
        object-fit: cover;

        transition:
            transform 0.7s cubic-bezier(.2, .8, .2, 1),
            filter 0.4s ease;
    }

    .home-news-card:hover .home-news-image img {
        transform: scale(1.08);
        filter: brightness(0.92);
    }

    .home-news-image::after {
        content: "";
        position: absolute;
        inset: 0;

        background:
            linear-gradient(
                to bottom,
                rgba(0, 0, 0, 0),
                rgba(0, 0, 0, 0.08)
            );

        pointer-events: none;
    }

    .home-news-placeholder {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .home-news-placeholder i {
        font-size: 50px;

        transition:
            transform 0.4s ease;
    }

    .home-news-card:hover .home-news-placeholder i {
        transform:
            scale(1.12)
            rotate(-4deg);
    }

    .home-news-link {
        display: inline-flex;
        align-items: center;

        transition:
            color 0.25s ease,
            transform 0.25s ease;
    }

    .home-news-link:hover {
        transform: translateX(4px);
    }

    .home-news-link i {
        transition:
            transform 0.25s ease;
    }

    .home-news-link:hover i {
        transform: translateX(4px);
    }


    /* =========================================================
       PROFIL SINGKAT
       ========================================================= */

    .home-profile-card {
        transition:
            transform 0.4s cubic-bezier(.2, .8, .2, 1),
            box-shadow 0.4s ease;
    }

    .home-profile-card:hover {
        box-shadow:
            0 22px 55px rgba(15, 23, 42, 0.11) !important;
    }

    .home-profile-item {
        border-radius: 16px;

        transition:
            transform 0.3s ease,
            background-color 0.3s ease;
    }

    .home-profile-item:hover {
        transform: translateY(-6px);
        background: rgba(0, 107, 60, 0.035);
    }

    .home-profile-item i {
        transition:
            transform 0.35s ease;
    }

    .home-profile-item:hover i {
        transform:
            scale(1.12)
            rotate(-4deg);
    }


    /* =========================================================
       STAGGER ANIMATION
       ========================================================= */

    .home-news-grid > .reveal:nth-child(1) {
        transition-delay: 0.05s;
    }

    .home-news-grid > .reveal:nth-child(2) {
        transition-delay: 0.12s;
    }

    .home-news-grid > .reveal:nth-child(3) {
        transition-delay: 0.19s;
    }


    /* =========================================================
       RESPONSIVE
       ========================================================= */

    @media (max-width: 991px) {

        .hero-home {
            min-height: auto;
            padding: 80px 0;
        }

        .hero-visual {
            margin-top: 50px;
        }

    }


    @media (max-width: 767.98px) {

        .hero-home::before,
        .hero-home::after {
            animation: none;
        }

        .hero-card {
            width: 100%;
            max-width: 380px;
        }

        .home-news-image {
            height: 220px;
        }

    }


    @media (max-width: 575px) {

        .hero-home {
            padding: 60px 0;
        }

        .hero-title {
            font-size: 2.7rem;
        }

        .hero-card {
            height: 330px;
            border-radius: 30px;
            padding: 30px;
        }

        .hero-logo {
            width: 110px;
            height: 110px;
            margin-bottom: 20px;
        }

        .hero-description {
            font-size: 1rem;
        }

        .hero-buttons {
            flex-direction: column;
        }

        .hero-btn {
            width: 100%;
        }

    }


    /* =========================================================
       REDUCED MOTION
       ========================================================= */

    @media (prefers-reduced-motion: reduce) {

        html {
            scroll-behavior: auto;
        }

        *,
        *::before,
        *::after {
            animation-duration: 0.01ms !important;
            animation-iteration-count: 1 !important;
            transition-duration: 0.01ms !important;
        }

        .reveal,
        .reveal-left,
        .reveal-right {
            opacity: 1;
            transform: none;
        }

    }
</style>


{{-- =========================================================
     HERO
     ========================================================= --}}

<section class="hero-home reveal">

    <div class="container">

        <div class="row align-items-center g-5">

            {{-- TEXT --}}
            <div class="col-lg-7">

                <div class="hero-content reveal-left">

                    <div class="hero-badge">

                        <i class="bi bi-mortarboard-fill"></i>

                        Himpunan Mahasiswa Islam

                    </div>

                    <h1 class="hero-title">

                        HMI Cabang
                        <span>Indramayu</span>

                    </h1>

                    <p class="hero-description">

                        Ruang informasi dan aktivitas
                        Himpunan Mahasiswa Islam Cabang Indramayu
                        dalam membangun kader yang berintegritas,
                        berintelektual, dan berkontribusi bagi umat
                        dan bangsa.

                    </p>

                    <div class="hero-buttons">

                        <a
                            href="{{ route('berita.index') }}"
                            class="btn btn-success hero-btn"
                        >

                            <i class="bi bi-newspaper me-2"></i>

                            Lihat Berita

                        </a>

                        <a
                            href="#tentang"
                            class="btn btn-outline-dark hero-btn"
                        >

                            Tentang HMI

                            <i class="bi bi-arrow-down ms-2"></i>

                        </a>

                    </div>

                </div>

            </div>


            {{-- VISUAL --}}
            <div class="col-lg-5">

                <div class="hero-visual reveal-right">

                    <div class="hero-card" data-tilt>

                        <div>

                            <div class="hero-logo">

                                <img
                                    src="{{ asset('images/logo-hmi.jpg') }}"
                                    alt="Logo HMI Cabang Indramayu"
                                >

                            </div>

                            <h3>
                                Insan Cita
                            </h3>

                            <p>
                                Membentuk insan akademis,
                                pencipta, pengabdi yang
                                bernafaskan Islam.
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =========================================================
     BERITA TERBARU
     ========================================================= --}}

<section class="py-5 bg-white reveal">

    <div class="container py-4">

        {{-- HEADER --}}
        <div class="row align-items-end mb-4">

            <div class="col-md-8">

                <span class="text-success fw-semibold text-uppercase small">

                    Informasi Terbaru

                </span>

                <h2 class="display-6 fw-bold mt-2 mb-2">

                    Berita Terbaru

                </h2>

                <p class="text-muted mb-0">

                    Ikuti informasi dan perkembangan terbaru
                    HMI Cabang Indramayu.

                </p>

            </div>

            <div class="col-md-4 text-md-end mt-3 mt-md-0">

                <a
                    href="{{ route('berita.index') }}"
                    class="btn btn-outline-dark rounded-pill px-4 hero-btn"
                >

                    Lihat Semua Berita

                    <i class="bi bi-arrow-right ms-1"></i>

                </a>

            </div>

        </div>


        {{-- LIST BERITA --}}
        <div class="row g-4 home-news-grid">

            @forelse($beritas as $berita)

                <div class="col-md-6 col-lg-4 reveal">

                    <article
                        class="card border-0 shadow-sm rounded-4 overflow-hidden h-100 home-news-card"
                        data-tilt
                    >

                        {{-- GAMBAR --}}
                        @if($berita->gambar)

                            <div class="home-news-image">

                                <img
                                    src="{{ asset('storage/' . $berita->gambar) }}"
                                    alt="{{ $berita->judul }}"
                                    loading="lazy"
                                >

                            </div>

                        @else

                            <div class="home-news-image home-news-placeholder">

                                <i class="bi bi-newspaper text-white"></i>

                            </div>

                        @endif


                        {{-- CONTENT --}}
                        <div class="card-body p-4 d-flex flex-column">

                            {{-- TANGGAL --}}
                            <div class="small text-muted mb-2">

                                <i class="bi bi-calendar3 me-1"></i>

                                {{ $berita->published_at->format('d F Y') }}

                            </div>


                            {{-- JUDUL --}}
                            <h3 class="h5 fw-bold mb-3">

                                {{ $berita->judul }}

                            </h3>


                            {{-- RINGKASAN --}}
                            <p class="text-muted flex-grow-1">

                                {{ Str::limit(
                                    $berita->excerpt ?? strip_tags($berita->konten),
                                    110
                                ) }}

                            </p>


                            {{-- DETAIL --}}
                            <a
                                href="{{ route(
                                    'berita.show',
                                    ['berita' => $berita->slug]
                                ) }}"
                                class="text-success fw-semibold text-decoration-none home-news-link"
                            >

                                Baca Selengkapnya

                                <i class="bi bi-arrow-right ms-1"></i>

                            </a>

                        </div>

                    </article>

                </div>

            @empty

                <div class="col-12">

                    <div class="text-center py-5">

                        <i
                            class="bi bi-newspaper text-muted"
                            style="font-size:50px;"
                        ></i>

                        <h4 class="fw-bold mt-3">

                            Belum ada berita

                        </h4>

                        <p class="text-muted">

                            Berita terbaru akan muncul
                            di bagian ini.

                        </p>

                    </div>

                </div>

            @endforelse

        </div>

    </div>

</section>


{{-- =========================================================
     PROFIL SINGKAT
     ========================================================= --}}

<section
    id="tentang"
    class="py-5 reveal"
>

    <div class="container py-5">

        <div class="row align-items-center g-5">

            {{-- TEXT --}}
            <div class="col-lg-6 reveal-left">

                <span class="text-success fw-semibold text-uppercase small">

                    Tentang Kami

                </span>

                <h2 class="display-6 fw-bold mt-2 mb-4">

                    Himpunan Mahasiswa Islam
                    Cabang Indramayu

                </h2>

                <p class="text-muted lh-lg">

                    Himpunan Mahasiswa Islam atau HMI merupakan organisasi
                    mahasiswa yang menjadi wadah pembinaan dan pengembangan
                    potensi mahasiswa dalam bidang keislaman, keilmuan,
                    kepemimpinan, dan pengabdian kepada masyarakat.

                </p>

                <p class="text-muted lh-lg">

                    HMI Cabang Indramayu hadir sebagai ruang bagi kader
                    untuk mengembangkan intelektualitas, membangun karakter,
                    serta mengambil peran dalam kehidupan masyarakat dan
                    pembangunan daerah.

                </p>

                <a
                    href="{{ route('profil') }}"
                    class="btn btn-success rounded-pill px-4 mt-2 hero-btn"
                >

                    Selengkapnya

                    <i class="bi bi-arrow-right ms-1"></i>

                </a>

            </div>


            {{-- VISUAL --}}
            <div class="col-lg-6 reveal-right">

                <div
                    class="p-4 p-md-5 bg-white rounded-4 shadow-sm home-profile-card"
                    data-tilt
                >

                    <div class="row g-4">

                        {{-- INTELEKTUAL --}}
                        <div class="col-6">

                            <div class="text-center p-4 home-profile-item">

                                <i
                                    class="bi bi-mortarboard-fill text-success"
                                    style="font-size: 40px;"
                                ></i>

                                <h5 class="fw-bold mt-3 mb-2">

                                    Intelektual

                                </h5>

                                <p class="text-muted small mb-0">

                                    Mengembangkan tradisi keilmuan
                                    dan berpikir kritis.

                                </p>

                            </div>

                        </div>


                        {{-- KADERISASI --}}
                        <div class="col-6">

                            <div class="text-center p-4 home-profile-item">

                                <i
                                    class="bi bi-people-fill text-success"
                                    style="font-size: 40px;"
                                ></i>

                                <h5 class="fw-bold mt-3 mb-2">

                                    Kaderisasi

                                </h5>

                                <p class="text-muted small mb-0">

                                    Membentuk kader yang berkarakter
                                    dan berintegritas.

                                </p>

                            </div>

                        </div>


                        {{-- KREATIVITAS --}}
                        <div class="col-6">

                            <div class="text-center p-4 home-profile-item">

                                <i
                                    class="bi bi-lightbulb-fill text-success"
                                    style="font-size: 40px;"
                                ></i>

                                <h5 class="fw-bold mt-3 mb-2">

                                    Kreativitas

                                </h5>

                                <p class="text-muted small mb-0">

                                    Mendorong gagasan dan inovasi
                                    kader mahasiswa.

                                </p>

                            </div>

                        </div>


                        {{-- PENGABDIAN --}}
                        <div class="col-6">

                            <div class="text-center p-4 home-profile-item">

                                <i
                                    class="bi bi-heart-fill text-success"
                                    style="font-size: 40px;"
                                ></i>

                                <h5 class="fw-bold mt-3 mb-2">

                                    Pengabdian

                                </h5>

                                <p class="text-muted small mb-0">

                                    Berkontribusi untuk masyarakat
                                    dan bangsa.

                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>
{{-- =========================================================
     KEGIATAN TERBARU
     ========================================================= --}}

<section class="py-5 bg-light reveal">

    <div class="container py-4">

        <div class="row align-items-end mb-4">

            <div class="col-md-8">

                <span class="text-success fw-semibold text-uppercase small">
                    Aktivitas Organisasi
                </span>

                <h2 class="display-6 fw-bold mt-2 mb-2">
                    Kegiatan Terbaru
                </h2>

                <p class="text-muted mb-0">
                    Ikuti berbagai kegiatan dan aktivitas
                    HMI Cabang Indramayu.
                </p>

            </div>

            <div class="col-md-4 text-md-end mt-3 mt-md-0">

                <a
                    href="{{ route('kegiatan.index') }}"
                    class="btn btn-outline-dark rounded-pill px-4 hero-btn"
                >
                    Lihat Semua Kegiatan
                    <i class="bi bi-arrow-right ms-1"></i>
                </a>

            </div>

        </div>


        <div class="row g-4">

            @forelse($kegiatans as $kegiatan)

                <div class="col-md-6 col-lg-4 reveal">

                    <article
                        class="card border-0 shadow-sm rounded-4 overflow-hidden h-100 home-event-card"
                        data-tilt
                    >

                        <a
                            href="{{ route('kegiatan.show', $kegiatan) }}"
                            class="home-event-image"
                        >

                            @if ($kegiatan->gambar)

                                <img
                                    src="{{ asset('storage/' . $kegiatan->gambar) }}"
                                    alt="{{ $kegiatan->judul }}"
                                    loading="lazy"
                                >

                            @else

                                <div class="home-event-image home-event-placeholder">

                                    <i class="bi bi-calendar-event text-white"></i>

                                </div>

                            @endif

                        </a>


                        <div class="card-body p-4 d-flex flex-column">

                            @if ($kegiatan->kategori)

                                <div class="mb-3">

                                    <span class="home-event-category">
                                        {{ $kegiatan->kategori }}
                                    </span>

                                </div>

                            @endif


                            <h3 class="h5 fw-bold mb-3">

                                <a
                                    href="{{ route('kegiatan.show', $kegiatan) }}"
                                    class="text-dark text-decoration-none"
                                >
                                    {{ $kegiatan->judul }}
                                </a>

                            </h3>


                            <div class="home-event-meta mb-3">

                                @if ($kegiatan->tanggal)

                                    <span>
                                        <i class="bi bi-calendar3"></i>

                                        {{ $kegiatan->tanggal->translatedFormat('d M Y') }}
                                    </span>

                                @endif


                                @if ($kegiatan->lokasi)

                                    <span>
                                        <i class="bi bi-geo-alt"></i>

                                        {{ Str::limit($kegiatan->lokasi, 25) }}
                                    </span>

                                @endif

                            </div>


                            @if ($kegiatan->excerpt)

                                <p class="text-muted flex-grow-1">
                                    {{ Str::limit($kegiatan->excerpt, 110) }}
                                </p>

                            @else

                                <p class="text-muted flex-grow-1">
                                    Informasi kegiatan HMI Cabang Indramayu.
                                </p>

                            @endif


                            <a
                                href="{{ route('kegiatan.show', $kegiatan) }}"
                                class="text-success fw-semibold text-decoration-none home-event-link mt-auto"
                            >
                                Lihat Kegiatan

                                <i class="bi bi-arrow-right ms-1"></i>
                            </a>

                        </div>

                    </article>

                </div>

            @empty

                <div class="col-12">

                    <div class="text-center py-5">

                        <i
                            class="bi bi-calendar-event text-muted"
                            style="font-size:50px;"
                        ></i>

                        <h4 class="fw-bold mt-3">
                            Belum Ada Kegiatan
                        </h4>

                        <p class="text-muted mb-0">
                            Kegiatan terbaru akan muncul
                            di bagian ini.
                        </p>

                    </div>

                </div>

            @endforelse

        </div>

    </div>

</section>


{{-- =========================================================
     GALERI
========================================================= --}}
<section class="py-5 bg-light" id="galeri">
    <div class="container py-lg-4">

        {{-- HEADER --}}
        <div class="row align-items-end mb-5">
            <div class="col-lg-8 reveal">

                <span class="badge rounded-pill bg-success-subtle text-success px-3 py-2 mb-3">
                    <i class="bi bi-images me-1"></i>
                    Dokumentasi
                </span>

                <h2 class="display-6 fw-bold mb-3">
                    Galeri Kegiatan
                </h2>

                <p class="text-muted mb-0">
                    Dokumentasi kegiatan dan aktivitas
                    HMI Cabang Indramayu.
                </p>

            </div>

            <div class="col-lg-4 text-lg-end mt-4 mt-lg-0 reveal">

                <a
                    href="{{ route('galeri.index') }}"
                    class="btn btn-outline-success rounded-pill px-4"
                >
                    Lihat Semua Galeri
                    <i class="bi bi-arrow-right ms-2"></i>
                </a>

            </div>
        </div>


        {{-- GALERI GRID --}}
        <div class="row g-4">

            @forelse ($galeri as $dokumentasi)

                <div class="col-md-6 col-lg-4 reveal">

                    <a
                        href="{{ route('galeri.index') }}"
                        class="text-decoration-none"
                    >

                        <div class="home-gallery-card" data-tilt>

                            {{-- FOTO --}}
                            <img
                                src="{{ asset('storage/' . $dokumentasi->gambar) }}"
                                alt="{{ $dokumentasi->kegiatan->judul ?? 'Dokumentasi Kegiatan HMI' }}"
                                loading="lazy"
                            >

                            {{-- OVERLAY --}}
                            <div class="home-gallery-overlay">

                                {{-- ICON --}}
                                <div class="home-gallery-icon">
                                    <i class="bi bi-images"></i>
                                </div>

                                {{-- CONTENT --}}
                                <div>

                                    <h3>
                                        {{ $dokumentasi->kegiatan->judul ?? 'Kegiatan HMI' }}
                                    </h3>

                                    @if ($dokumentasi->caption)
                                        <p>
                                            {{ $dokumentasi->caption }}
                                        </p>
                                    @else
                                        <p>
                                            Dokumentasi kegiatan
                                            HMI Cabang Indramayu.
                                        </p>
                                    @endif

                                </div>

                            </div>

                        </div>

                    </a>

                </div>

            @empty

                {{-- EMPTY STATE --}}
                <div class="col-12">

                    <div class="text-center py-5">

                        <div
                            class="d-inline-flex align-items-center justify-content-center rounded-circle bg-success-subtle text-success mb-3"
                            style="width: 80px; height: 80px;"
                        >
                            <i class="bi bi-images fs-2"></i>
                        </div>

                        <h4 class="fw-bold mb-2">
                            Belum Ada Dokumentasi
                        </h4>

                        <p class="text-muted mb-0">
                            Dokumentasi kegiatan HMI Cabang
                            Indramayu akan ditampilkan di sini.
                        </p>

                    </div>

                </div>

            @endforelse

        </div>

    </div>
</section>

@push('scripts')

<script>
document.addEventListener('DOMContentLoaded', function () {

    /*
    |--------------------------------------------------------------------------
    | SCROLL REVEAL
    |--------------------------------------------------------------------------
    */

    const revealElements = document.querySelectorAll(
        '.reveal, .reveal-left, .reveal-right'
    );

    if (revealElements.length) {

        const revealObserver = new IntersectionObserver(
            function (entries, observer) {

                entries.forEach(function (entry) {

                    if (!entry.isIntersecting) {
                        return;
                    }

                    entry.target.classList.add('is-visible');

                    observer.unobserve(entry.target);

                });

            },
            {
                threshold: 0.12,
                rootMargin: '0px 0px -50px 0px'
            }
        );

        revealElements.forEach(function (element) {

            revealObserver.observe(element);

        });

    }


    /*
    |--------------------------------------------------------------------------
    | CURSOR TILT
    |--------------------------------------------------------------------------
    */

    const tiltCards = document.querySelectorAll('[data-tilt]');

    tiltCards.forEach(function (card) {

        card.addEventListener('mousemove', function (event) {

            const rect = card.getBoundingClientRect();

            const x = event.clientX - rect.left;
            const y = event.clientY - rect.top;

            const centerX = rect.width / 2;
            const centerY = rect.height / 2;

            const rotateX =
                ((y - centerY) / centerY) * -3;

            const rotateY =
                ((x - centerX) / centerX) * 3;

            card.style.transform =
                `perspective(900px)
                 rotateX(${rotateX}deg)
                 rotateY(${rotateY}deg)
                 translateY(-6px)`;

        });


        card.addEventListener('mouseleave', function () {

            card.style.transform = '';

        });

    });

});
</script>

@endpush

@endsection
