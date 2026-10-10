
@extends('layouts.app')

@section('title', $komisariat->nama . ' | HMI Cabang Indramayu')

@section('description')
    Profil {{ $komisariat->nama }} di bawah naungan HMI Cabang Indramayu.
@endsection

@section('content')

{{-- =========================
     HERO
========================= --}}

<section class="komisariat-detail-hero">
    <div class="container">
        <div class="komisariat-detail-hero-inner">

            <a href="{{ route('organisasi.index') }}"
               class="komisariat-back">
                <i class="bi bi-arrow-left me-2"></i>
                Kembali ke Organisasi
            </a>

            <div class="row align-items-center g-5 mt-2">

                {{-- INFORMASI --}}
                <div class="col-lg-8">

                    <span class="komisariat-detail-badge">
                        <i class="bi bi-building me-1"></i>
                        KOMISARIAT
                    </span>

                    <h1 class="komisariat-detail-title mt-3">
                        {{ $komisariat->nama }}
                    </h1>

                    @if($komisariat->perguruan_tinggi)
                        <p class="komisariat-detail-campus">
                            <i class="bi bi-mortarboard-fill me-2"></i>
                            {{ $komisariat->perguruan_tinggi }}

                            @if($komisariat->fakultas)
                                — {{ $komisariat->fakultas }}
                            @endif
                        </p>
                    @endif

                </div>


                {{-- LOGO --}}
                <div class="col-lg-4">

                    <div class="komisariat-detail-logo-wrapper">

                        <div class="komisariat-detail-logo">

                            @if($komisariat->logo)

                                <img
                                    src="{{ asset('storage/' . $komisariat->logo) }}"
                                    alt="{{ $komisariat->nama }}"
                                >

                            @else

                                <img
                                    src="{{ asset('images/logo-hmi.jpg') }}"
                                    alt="Logo HMI"
                                >

                            @endif

                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>
</section>


{{-- =========================
     INFORMASI UTAMA
========================= --}}

<section class="py-5">
    <div class="container">

        <div class="row g-4">

            {{-- TENTANG --}}
            <div class="col-lg-8">

                <div class="komisariat-detail-box">

                    <span class="komisariat-section-label">
                        PROFIL KOMISARIAT
                    </span>

                    <h2 class="h3 fw-bold mt-2 mb-4">
                        Tentang {{ $komisariat->nama }}
                    </h2>

                    @if($komisariat->deskripsi)

                        <p class="text-muted lh-lg mb-0">
                            {{ $komisariat->deskripsi }}
                        </p>

                    @else

                        <p class="text-muted mb-0">
                            Informasi mengenai komisariat ini belum tersedia.
                        </p>

                    @endif

                </div>

            </div>


            {{-- DATA KOMISARIAT --}}
            <div class="col-lg-4">

                <div class="komisariat-detail-box">

                    <span class="komisariat-section-label">
                        INFORMASI
                    </span>

                    <div class="komisariat-info-list mt-3">

                        @if($komisariat->ketua)

                            <div class="komisariat-info-item">
                                <span>
                                    <i class="bi bi-person me-2"></i>
                                    Ketua
                                </span>

                                <strong>
                                    {{ $komisariat->ketua }}
                                </strong>
                            </div>

                        @endif


                        @if($komisariat->periode)

                            <div class="komisariat-info-item">
                                <span>
                                    <i class="bi bi-calendar3 me-2"></i>
                                    Periode
                                </span>

                                <strong>
                                    {{ $komisariat->periode }}
                                </strong>
                            </div>

                        @endif


                        <div class="komisariat-info-item">
                            <span>
                                <i class="bi bi-people me-2"></i>
                                Jumlah Anggota
                            </span>

                            <strong>
                                {{ number_format($komisariat->jumlah_anggota, 0, ',', '.') }}
                                orang
                            </strong>
                        </div>


                        @if($komisariat->fakultas)

                            <div class="komisariat-info-item">
                                <span>
                                    <i class="bi bi-mortarboard me-2"></i>
                                    Fakultas
                                </span>

                                <strong>
                                    {{ $komisariat->fakultas }}
                                </strong>
                            </div>

                        @endif

                    </div>

                </div>

            </div>

        </div>

    </div>
</section>


{{-- =========================
     KONTAK
========================= --}}

@if(
    $komisariat->alamat ||
    $komisariat->telepon ||
    $komisariat->email ||
    $komisariat->instagram
)

<section class="py-5 bg-light">

    <div class="container">

        <div class="text-center mb-5">

            <span class="text-success fw-semibold text-uppercase small">
                Informasi Kontak
            </span>

            <h2 class="display-6 fw-bold mt-2">
                Hubungi Komisariat
            </h2>

        </div>


        <div class="row g-4 justify-content-center">

            @if($komisariat->alamat)

                <div class="col-md-6 col-lg-3">

                    <div class="komisariat-contact-item">

                        <div class="komisariat-contact-icon">
                            <i class="bi bi-geo-alt"></i>
                        </div>

                        <h6 class="fw-bold">
                            Alamat
                        </h6>

                        <p class="text-muted small mb-0">
                            {{ $komisariat->alamat }}
                        </p>

                    </div>

                </div>

            @endif


            @if($komisariat->telepon)

                <div class="col-md-6 col-lg-3">

                    <div class="komisariat-contact-item">

                        <div class="komisariat-contact-icon">
                            <i class="bi bi-telephone"></i>
                        </div>

                        <h6 class="fw-bold">
                            Telepon
                        </h6>

                        <p class="text-muted small mb-0">
                            {{ $komisariat->telepon }}
                        </p>

                    </div>

                </div>

            @endif


            @if($komisariat->email)

                <div class="col-md-6 col-lg-3">

                    <div class="komisariat-contact-item">

                        <div class="komisariat-contact-icon">
                            <i class="bi bi-envelope"></i>
                        </div>

                        <h6 class="fw-bold">
                            Email
                        </h6>

                        <p class="text-muted small mb-0 text-break">
                            {{ $komisariat->email }}
                        </p>

                    </div>

                </div>

            @endif


            @if($komisariat->instagram)

                <div class="col-md-6 col-lg-3">

                    <div class="komisariat-contact-item">

                        <div class="komisariat-contact-icon">
                            <i class="bi bi-instagram"></i>
                        </div>

                        <h6 class="fw-bold">
                            Instagram
                        </h6>

                        <p class="text-muted small mb-0">
                            {{ $komisariat->instagram }}
                        </p>

                    </div>

                </div>

            @endif

        </div>

    </div>

</section>

@endif


{{-- =========================
     PENUTUP
========================= --}}

<section class="org-closing">

    <div class="container text-center">

        <div class="mx-auto" style="max-width:700px;">

            <span class="text-success fw-semibold text-uppercase small">
                HMI Cabang Indramayu
            </span>

            <h2 class="fw-bold mt-2">
                Bersama Membangun Insan Cita
            </h2>

            <p class="text-muted mt-3 mb-0">
                Membangun kader yang berintegritas,
                berintelektual, dan mampu memberikan
                kontribusi bagi umat dan bangsa.
            </p>

        </div>

    </div>

</section>


@endsection


@push('styles')

<style>

/* =========================================
   HERO DETAIL
========================================= */

.komisariat-detail-hero {
    background: #f8fafc;
    padding: 70px 0;
    border-bottom: 1px solid #e5e7eb;
}

.komisariat-detail-hero-inner {
    max-width: 1100px;
    margin: 0 auto;
}

.komisariat-back {
    color: var(--hmi-green);
    text-decoration: none;
    font-size: 0.88rem;
    font-weight: 600;
}

.komisariat-back:hover {
    color: var(--hmi-green-dark);
}

.komisariat-detail-badge {
    display: inline-block;
    background: rgba(0, 107, 60, 0.08);
    color: var(--hmi-green);
    font-size: 0.72rem;
    font-weight: 800;
    letter-spacing: 0.1em;
    padding: 7px 13px;
    border-radius: 6px;
}

.komisariat-detail-title {
    color: var(--text-dark);
    font-size: clamp(2rem, 4vw, 3.2rem);
    font-weight: 800;
    line-height: 1.2;
    text-transform: uppercase;
}

.komisariat-detail-campus {
    color: var(--text-muted);
    font-size: 1rem;
}

.komisariat-detail-campus i {
    color: var(--hmi-green);
}


/* LOGO */

.komisariat-detail-logo-wrapper {
    display: flex;
    justify-content: center;
}

.komisariat-detail-logo {
    width: 210px;
    height: 210px;

    padding: 12px;

    background: #fff;

    border: 1px solid rgba(0, 107, 60, 0.18);

    border-radius: 50%;

    display: flex;
    align-items: center;
    justify-content: center;

    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.08);

    overflow: hidden;
}

.komisariat-detail-logo img {
    width: 100%;
    height: 100%;
    object-fit: contain;
    border-radius: 50%;
}


/* =========================================
   DETAIL BOX
========================================= */

.komisariat-detail-box {
    background: #fff;

    border: 1px solid rgba(0, 107, 60, 0.15);

    border-radius: 16px;

    padding: 30px;

    height: 100%;
}

.komisariat-section-label {
    color: var(--hmi-green);

    font-size: 0.7rem;

    font-weight: 800;

    letter-spacing: 0.1em;
}


/* =========================================
   INFORMATION
========================================= */

.komisariat-info-list {
    display: flex;
    flex-direction: column;
}

.komisariat-info-item {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;

    gap: 15px;

    padding: 13px 0;

    border-bottom: 1px solid #eef0f2;

    font-size: 0.86rem;
}

.komisariat-info-item:last-child {
    border-bottom: 0;
}

.komisariat-info-item span {
    color: var(--text-muted);
}

.komisariat-info-item span i {
    color: var(--hmi-green);
}

.komisariat-info-item strong {
    color: var(--text-dark);
    text-align: right;
}


/* =========================================
   CONTACT
========================================= */

.komisariat-contact-item {
    background: #fff;

    border: 1px solid #e5e7eb;

    border-radius: 16px;

    padding: 25px;

    height: 100%;

    text-align: center;

    transition: all 0.25s ease;
}

.komisariat-contact-item:hover {
    border-color: rgba(0, 107, 60, 0.3);

    transform: translateY(-3px);

    box-shadow: 0 8px 25px rgba(0, 107, 60, 0.07);
}

.komisariat-contact-icon {
    width: 48px;
    height: 48px;

    margin: 0 auto 15px;

    border-radius: 50%;

    display: flex;
    align-items: center;
    justify-content: center;

    background: rgba(0, 107, 60, 0.08);

    color: var(--hmi-green);

    font-size: 1.2rem;
}


/* =========================================
   MOBILE
========================================= */

@media (max-width: 767.98px) {

    .komisariat-detail-hero {
        padding: 50px 0;
    }

    .komisariat-detail-title {
        font-size: 1.8rem;
    }

    .komisariat-detail-logo {
        width: 160px;
        height: 160px;
    }

    .komisariat-detail-box {
        padding: 22px;
    }

    .komisariat-info-item {
        flex-direction: column;
        gap: 5px;
    }

    .komisariat-info-item strong {
        text-align: left;
    }

}

</style>

@endpush
