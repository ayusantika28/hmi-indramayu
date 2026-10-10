@extends('layouts.app')

@section('title', 'Kegiatan HMI Cabang Indramayu')

@section(
    'description',
    'Kegiatan, program, dan aktivitas HMI Cabang Indramayu.'
)

@section('content')


{{-- =========================================================
HERO
========================================================= --}}

<section class="org-hero reveal">

    <div class="container">

        <div class="org-hero-content text-center">

            <span class="org-badge reveal">

                <i class="bi bi-calendar-event-fill"></i>

                Kegiatan HMI

            </span>


            <h1 class="org-title reveal">

                Kegiatan HMI

                <span>Cabang Indramayu</span>

            </h1>


            <p class="org-description reveal">

                Berbagai kegiatan, program, dan aktivitas
                HMI Cabang Indramayu dalam menjalankan
                peran organisasi dan pengabdian kepada masyarakat.

            </p>

        </div>

    </div>

</section>



{{-- =========================================================
DAFTAR KEGIATAN
========================================================= --}}

<section class="organigram-section">

    <div class="container">


        {{-- =================================================
        HEADER
        ================================================== --}}

        <div class="text-center mb-5 reveal">

            <span class="text-success fw-semibold text-uppercase small">

                Aktivitas Terkini

            </span>


            <h2 class="display-6 fw-bold mt-2">

                Kegiatan Terbaru

            </h2>


            <p class="text-muted mb-0">

                Informasi kegiatan HMI Cabang Indramayu
                yang telah dipublikasikan.

            </p>

        </div>



        @if ($kegiatans->count())


            {{-- =================================================
            GRID KEGIATAN
            ================================================== --}}

            <div class="row g-4">


                @foreach ($kegiatans as $kegiatan)


                    @php

                        $sekarang = now();


                        /*
                        |--------------------------------------------------------------------------
                        | Jumlah pendaftar
                        |--------------------------------------------------------------------------
                        */

                        $jumlahPendaftar =
                            $kegiatan->pendaftarans()->count();


                        /*
                        |--------------------------------------------------------------------------
                        | Status pendaftaran
                        |--------------------------------------------------------------------------
                        */

                        $pendaftaranBelumDibuka = false;

                        $pendaftaranDibuka = false;

                        $pendaftaranSudahDitutup = false;

                        $kuotaPenuh = false;


                        /*
                        |--------------------------------------------------------------------------
                        | Cek status pendaftaran
                        |--------------------------------------------------------------------------
                        */

                        if ($kegiatan->pendaftaran_aktif) {


                            /*
                            |--------------------------------------------------------------
                            | Pendaftaran belum dibuka
                            |--------------------------------------------------------------
                            */

                            if (
                                $kegiatan->tanggal_mulai_pendaftaran &&
                                $sekarang->lt(
                                    \Carbon\Carbon::parse(
                                        $kegiatan->tanggal_mulai_pendaftaran
                                    )
                                )
                            ) {

                                $pendaftaranBelumDibuka = true;

                            }


                            /*
                            |--------------------------------------------------------------
                            | Pendaftaran sudah ditutup
                            |--------------------------------------------------------------
                            */

                            elseif (
                                $kegiatan->tanggal_selesai_pendaftaran &&
                                $sekarang->gt(
                                    \Carbon\Carbon::parse(
                                        $kegiatan->tanggal_selesai_pendaftaran
                                    )
                                )
                            ) {

                                $pendaftaranSudahDitutup = true;

                            }


                            /*
                            |--------------------------------------------------------------
                            | Kuota penuh
                            |--------------------------------------------------------------
                            */

                            elseif (
                                !is_null($kegiatan->kuota) &&
                                $jumlahPendaftar >= $kegiatan->kuota
                            ) {

                                $kuotaPenuh = true;

                            }


                            /*
                            |--------------------------------------------------------------
                            | Pendaftaran sedang dibuka
                            |--------------------------------------------------------------
                            */

                            else {

                                $pendaftaranDibuka = true;

                            }

                        }


                        /*
                        |--------------------------------------------------------------------------
                        | Bisa daftar
                        |--------------------------------------------------------------------------
                        */

                        $bisaDaftar =
                            $pendaftaranDibuka &&
                            !$kuotaPenuh;

                    @endphp



                    {{-- =================================================
                    CARD KEGIATAN
                    ================================================== --}}

                    <div class="col-md-6 col-lg-4 reveal">


                        <article
                            class="kegiatan-card h-100"
                            data-tilt
                        >


                            {{-- =================================================
                            GAMBAR
                            ================================================== --}}

                            <a
                                href="{{ route(
                                    'kegiatan.show',
                                    $kegiatan
                                ) }}"
                                class="kegiatan-image"
                            >

                                @if ($kegiatan->gambar)

                                    <img
                                        src="{{ asset(
                                            'storage/' . $kegiatan->gambar
                                        ) }}"
                                        alt="{{ $kegiatan->judul }}"
                                        loading="lazy"
                                    >

                                @else

                                    <div class="kegiatan-image-placeholder">

                                        <i class="bi bi-image"></i>

                                    </div>

                                @endif

                            </a>



                            {{-- =================================================
                            CONTENT
                            ================================================== --}}

                            <div class="kegiatan-card-body d-flex flex-column">


                                {{-- =================================================
                                KATEGORI
                                ================================================== --}}

                                @if ($kegiatan->kategori)

                                    <div class="d-flex flex-wrap gap-2 mb-3">

                                        <span class="kegiatan-category">

                                            {{ $kegiatan->kategori }}

                                        </span>

                                    </div>

                                @endif



                                {{-- =================================================
                                JUDUL
                                ================================================== --}}

                                <h3>

                                    <a
                                        href="{{ route(
                                            'kegiatan.show',
                                            $kegiatan
                                        ) }}"
                                    >

                                        {{ $kegiatan->judul }}

                                    </a>

                                </h3>



                                {{-- =================================================
                                META
                                ================================================== --}}

                                <div class="kegiatan-meta">


                                    @if ($kegiatan->tanggal)

                                        <span>

                                            <i class="bi bi-calendar3"></i>

                                            {{ $kegiatan->tanggal->translatedFormat('d M Y') }}

                                        </span>

                                    @endif


                                    @if ($kegiatan->lokasi)

                                        <span>

                                            <i class="bi bi-geo-alt"></i>

                                            {{ Str::limit(
                                                $kegiatan->lokasi,
                                                30
                                            ) }}

                                        </span>

                                    @endif


                                </div>



                                {{-- =================================================
                                EXCERPT
                                ================================================== --}}

                                @if ($kegiatan->excerpt)

                                    <p>

                                        {{ Str::limit(
                                            $kegiatan->excerpt,
                                            110
                                        ) }}

                                    </p>

                                @endif



                                {{-- =================================================
                                INFO PENDAFTARAN
                                ================================================== --}}

                                @if ($kegiatan->pendaftaran_aktif)

                                    <div class="mt-3">


                                        {{-- BELUM DIBUKA --}}

                                        @if ($pendaftaranBelumDibuka)

                                            <div class="small text-warning">

                                                <i class="bi bi-clock-fill me-1"></i>

                                                Pendaftaran belum dibuka

                                            </div>


                                        {{-- KUOTA PENUH --}}

                                        @elseif ($kuotaPenuh)

                                            <div class="small text-danger">

                                                <i class="bi bi-x-circle-fill me-1"></i>

                                                Kuota pendaftaran sudah penuh

                                            </div>


                                        {{-- SUDAH DITUTUP --}}

                                        @elseif ($pendaftaranSudahDitutup)

                                            <div class="small text-danger">

                                                <i class="bi bi-x-circle-fill me-1"></i>

                                                Pendaftaran sudah ditutup

                                            </div>


                                        {{-- SEDANG DIBUKA --}}

                                        @elseif ($pendaftaranDibuka)

                                            <div class="small text-success mb-2">

                                                <i class="bi bi-check-circle-fill me-1"></i>

                                                Pendaftaran sedang dibuka

                                            </div>


                                            {{-- JUMLAH PESERTA --}}

                                            @if (!is_null($kegiatan->kuota))

                                                <div class="small text-muted">

                                                    <i class="bi bi-people me-1"></i>

                                                    {{ $jumlahPendaftar }}
                                                    /
                                                    {{ $kegiatan->kuota }}
                                                    peserta

                                                </div>

                                            @else

                                                <div class="small text-muted">

                                                    <i class="bi bi-people me-1"></i>

                                                    {{ $jumlahPendaftar }}
                                                    peserta

                                                </div>

                                            @endif

                                        @endif

                                    </div>

                                @endif



                                {{-- =================================================
                                TOMBOL
                                ================================================== --}}

                                <div class="d-flex flex-wrap gap-2 mt-auto pt-4">


                                    {{-- BACA SELENGKAPNYA --}}

                                    <a
                                        href="{{ route(
                                            'kegiatan.show',
                                            $kegiatan
                                        ) }}"
                                        class="kegiatan-read-more"
                                    >

                                        Baca Selengkapnya

                                        <i class="bi bi-arrow-right"></i>

                                    </a>



                                    {{-- DAFTAR --}}

                                    @if ($bisaDaftar)

                                        <a
                                            href="{{ route(
                                                'pendaftaran.create',
                                                $kegiatan
                                            ) }}"
                                            class="btn btn-success rounded-pill px-3"
                                        >

                                            <i class="bi bi-person-plus-fill me-1"></i>

                                            Daftar

                                        </a>


                                    @elseif ($kuotaPenuh)

                                        <span
                                            class="btn btn-secondary rounded-pill px-3 disabled"
                                        >

                                            <i class="bi bi-people-fill me-1"></i>

                                            Kuota Penuh

                                        </span>

                                    @endif


                                </div>


                            </div>


                        </article>


                    </div>


                @endforeach


            </div>



            {{-- =================================================
            PAGINATION
            ================================================== --}}

            @if ($kegiatans->hasPages())

                <div class="d-flex justify-content-center mt-5 reveal">

                    {{ $kegiatans->links() }}

                </div>

            @endif


        @else


            {{-- =================================================
            EMPTY STATE
            ================================================== --}}

            <div class="org-empty reveal">

                <i class="bi bi-calendar-event"></i>


                <h3 class="fw-bold mt-4">

                    Belum Ada Kegiatan

                </h3>


                <p class="text-muted">

                    Belum ada kegiatan yang dipublikasikan
                    oleh HMI Cabang Indramayu.

                </p>

            </div>


        @endif


    </div>

</section>



{{-- =========================================================
PENUTUP
========================================================= --}}

<section class="org-closing reveal">

    <div class="container text-center">

        <div
            class="mx-auto reveal"
            style="max-width:700px;"
        >

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
