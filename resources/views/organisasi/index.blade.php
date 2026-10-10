@extends('layouts.app')

@section('title', 'Struktur Organisasi | HMI Cabang Indramayu')

@section(
    'description',
    'Struktur kepengurusan HMI Cabang Indramayu.'
)

@section('content')


{{-- =========================================================
HERO
========================================================= --}}

<section class="org-hero reveal">

    <div class="container">

        <div class="org-hero-content text-center">

            <span class="org-badge reveal">

                <i class="bi bi-diagram-3-fill"></i>

                Struktur Organisasi

            </span>

            <h1 class="org-title reveal">

                Kepengurusan HMI

                <span>Cabang Indramayu</span>

            </h1>

            <p class="org-description reveal">

                Mengenal susunan kepengurusan HMI Cabang Indramayu
                sebagai bagian dari proses pengelolaan organisasi,
                kaderisasi, dan pengabdian.

            </p>

        </div>

    </div>

</section>



{{-- =========================================================
ORGANIGRAM
========================================================= --}}

<section class="organigram-section">

    <div class="container">

        @if ($organisasis->count())

            @php

                /*
                |--------------------------------------------------------------------------
                | Pisahkan pengurus berdasarkan jabatan
                |--------------------------------------------------------------------------
                */

                $ketua = $organisasis->first(function ($item) {

                    return str_contains(
                        strtolower($item->jabatan),
                        'ketua umum'
                    );

                });


                $sekretaris = $organisasis->filter(function ($item) {

                    return str_contains(
                        strtolower($item->jabatan),
                        'sekretaris'
                    );

                });


                $bendahara = $organisasis->filter(function ($item) {

                    return str_contains(
                        strtolower($item->jabatan),
                        'bendahara'
                    );

                });


                /*
                |--------------------------------------------------------------------------
                | ID pengurus utama
                |--------------------------------------------------------------------------
                */

                $utamaIds = collect();


                if ($ketua) {

                    $utamaIds->push($ketua->id);

                }


                $sekretaris->each(function ($item) use ($utamaIds) {

                    $utamaIds->push($item->id);

                });


                $bendahara->each(function ($item) use ($utamaIds) {

                    $utamaIds->push($item->id);

                });


                /*
                |--------------------------------------------------------------------------
                | Pengurus bidang
                |--------------------------------------------------------------------------
                */

                $bidang = $organisasis->filter(function ($item) use ($utamaIds) {

                    return !$utamaIds->contains($item->id);

                });

            @endphp



            <div class="organigram">


                {{-- =================================================
                LEVEL 1 — KETUA UMUM
                ================================================== --}}

                @if ($ketua)

                    <div class="org-level">

                        <div
                            class="org-card leader reveal"
                            data-tilt
                        >

                            @if ($ketua->foto)

                                <div class="org-photo">

                                    <img
                                        src="{{ asset('storage/' . $ketua->foto) }}"
                                        alt="{{ $ketua->nama }}"
                                        loading="lazy"
                                    >

                                </div>

                            @else

                                <div class="org-photo">

                                    <div class="org-placeholder">

                                        <i class="bi bi-person-circle"></i>

                                    </div>

                                </div>

                            @endif


                            <div class="org-body">

                                <div class="org-position">

                                    {{ $ketua->jabatan }}

                                </div>


                                <h3 class="org-name">

                                    {{ $ketua->nama }}

                                </h3>


                                @if ($ketua->bidang)

                                    <p class="org-field">

                                        {{ $ketua->bidang }}

                                    </p>

                                @endif


                                @if ($ketua->periode)

                                    <div class="org-period">

                                        <i class="bi bi-calendar3"></i>

                                        {{ $ketua->periode }}

                                    </div>

                                @endif

                            </div>

                        </div>

                    </div>

                @endif



                {{-- =================================================
                LEVEL 2 — SEKRETARIS & BENDAHARA
                ================================================== --}}

                @if ($sekretaris->count() || $bendahara->count())

                    <div class="org-level org-middle">


                        {{-- SEKRETARIS --}}

                        @foreach ($sekretaris as $pengurus)

                            <div
                                class="org-card reveal"
                                data-tilt
                            >

                                @if ($pengurus->foto)

                                    <div class="org-photo">

                                        <img
                                            src="{{ asset('storage/' . $pengurus->foto) }}"
                                            alt="{{ $pengurus->nama }}"
                                            loading="lazy"
                                        >

                                    </div>

                                @else

                                    <div class="org-photo">

                                        <div class="org-placeholder">

                                            <i class="bi bi-person-circle"></i>

                                        </div>

                                    </div>

                                @endif


                                <div class="org-body">

                                    <div class="org-position">

                                        {{ $pengurus->jabatan }}

                                    </div>


                                    <h3 class="org-name">

                                        {{ $pengurus->nama }}

                                    </h3>


                                    @if ($pengurus->bidang)

                                        <p class="org-field">

                                            {{ $pengurus->bidang }}

                                        </p>

                                    @endif


                                    @if ($pengurus->periode)

                                        <div class="org-period">

                                            <i class="bi bi-calendar3"></i>

                                            {{ $pengurus->periode }}

                                        </div>

                                    @endif

                                </div>

                            </div>

                        @endforeach



                        {{-- BENDAHARA --}}

                        @foreach ($bendahara as $pengurus)

                            <div
                                class="org-card reveal"
                                data-tilt
                            >

                                @if ($pengurus->foto)

                                    <div class="org-photo">

                                        <img
                                            src="{{ asset('storage/' . $pengurus->foto) }}"
                                            alt="{{ $pengurus->nama }}"
                                            loading="lazy"
                                        >

                                    </div>

                                @else

                                    <div class="org-photo">

                                        <div class="org-placeholder">

                                            <i class="bi bi-person-circle"></i>

                                        </div>

                                    </div>

                                @endif


                                <div class="org-body">

                                    <div class="org-position">

                                        {{ $pengurus->jabatan }}

                                    </div>


                                    <h3 class="org-name">

                                        {{ $pengurus->nama }}

                                    </h3>


                                    @if ($pengurus->bidang)

                                        <p class="org-field">

                                            {{ $pengurus->bidang }}

                                        </p>

                                    @endif


                                    @if ($pengurus->periode)

                                        <div class="org-period">

                                            <i class="bi bi-calendar3"></i>

                                            {{ $pengurus->periode }}

                                        </div>

                                    @endif

                                </div>

                            </div>

                        @endforeach


                    </div>

                @endif



                {{-- =================================================
                LEVEL 3 — BIDANG
                ================================================== --}}

                @if ($bidang->count())

                    <div class="org-level org-fields">

                        @foreach ($bidang as $pengurus)

                            <div
                                class="org-card reveal"
                                data-tilt
                            >

                                @if ($pengurus->foto)

                                    <div class="org-photo">

                                        <img
                                            src="{{ asset('storage/' . $pengurus->foto) }}"
                                            alt="{{ $pengurus->nama }}"
                                            loading="lazy"
                                        >

                                    </div>

                                @else

                                    <div class="org-photo">

                                        <div class="org-placeholder">

                                            <i class="bi bi-person-circle"></i>

                                        </div>

                                    </div>

                                @endif


                                <div class="org-body">

                                    <div class="org-position">

                                        {{ $pengurus->jabatan }}

                                    </div>


                                    <h3 class="org-name">

                                        {{ $pengurus->nama }}

                                    </h3>


                                    @if ($pengurus->bidang)

                                        <p class="org-field">

                                            {{ $pengurus->bidang }}

                                        </p>

                                    @endif


                                    @if ($pengurus->periode)

                                        <div class="org-period">

                                            <i class="bi bi-calendar3"></i>

                                            {{ $pengurus->periode }}

                                        </div>

                                    @endif

                                </div>

                            </div>

                        @endforeach

                    </div>

                @endif


            </div>


        @else

            {{-- =================================================
            EMPTY STATE
            ================================================== --}}

            <div class="org-empty reveal">

                <i class="bi bi-diagram-3"></i>

                <h3 class="fw-bold mt-4">

                    Struktur Kepengurusan Belum Tersedia

                </h3>

                <p class="text-muted">

                    Data kepengurusan HMI Cabang Indramayu
                    akan ditampilkan setelah ditambahkan
                    melalui halaman administrasi.

                </p>

            </div>

        @endif

    </div>

</section>



{{-- =========================================================
KOMISARIAT
========================================================= --}}

<section class="komisariat-section py-5">

    <div class="container">


        {{-- HEADER --}}

        <div class="text-center mb-5 reveal">

            <span class="komisariat-badge">

                KOMISARIAT

            </span>


            <h2 class="display-6 fw-bold mt-3 mb-4 text-uppercase">

                Komisariat HMI Se-Ruang Lingkup
                HMI Cabang Indramayu

            </h2>


            <p class="komisariat-intro mx-auto mb-0">

                Komisariat merupakan ujung tombak perkaderan HMI
                yang berada di lingkungan Perguruan Tinggi.
                Berikut adalah daftar Komisariat yang berada
                di bawah naungan HMI Cabang Indramayu.

            </p>

        </div>



        {{-- =================================================
        LIST KOMISARIAT
        ================================================== --}}

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">

            @forelse ($komisariats as $komisariat)

                <div class="col reveal">

                    <div
                        class="komisariat-bento-card h-100 d-flex flex-column"
                        data-tilt
                    >


                        {{-- HEADER --}}

                        <div class="kb-header">

                            <div class="kb-icon">

                                @if ($komisariat->logo)

                                    <img
                                        src="{{ asset('storage/' . $komisariat->logo) }}"
                                        alt="{{ $komisariat->nama }}"
                                        loading="lazy"
                                    >

                                @else

                                    <i class="bi bi-building-fill"></i>

                                @endif

                            </div>


                            <h3 class="kb-title">

                                {{ $komisariat->nama }}

                            </h3>

                        </div>



                        {{-- BODY --}}

                        <div class="kb-body flex-grow-1">


                            @if ($komisariat->perguruan_tinggi)

                                <div class="kb-campus">

                                    <i class="bi bi-mortarboard-fill"></i>

                                    <span>

                                        {{ $komisariat->perguruan_tinggi }}

                                        @if ($komisariat->fakultas)

                                            — {{ $komisariat->fakultas }}

                                        @endif

                                    </span>

                                </div>

                            @endif



                            @if ($komisariat->deskripsi)

                                <p class="kb-desc">

                                    {{ $komisariat->deskripsi }}

                                </p>

                            @else

                                <p class="kb-desc">

                                    Komisariat HMI di
                                    {{ $komisariat->perguruan_tinggi ?? 'lingkungan perguruan tinggi' }}

                                </p>

                            @endif



                            {{-- JUMLAH ANGGOTA --}}

                            <div class="kb-stats mt-3">

                                <span class="kb-stat-badge">

                                    <i class="bi bi-people-fill"></i>

                                    {{ $komisariat->jumlah_anggota ?? 0 }}
                                    Anggota

                                </span>

                            </div>

                        </div>



                        {{-- FOOTER --}}

                        <div class="kb-footer mt-4">

                            <a
                                href="{{ route(
                                    'organisasi.komisariat.show',
                                    $komisariat->slug
                                ) }}"
                                class="kb-btn w-100 text-center"
                            >

                                Lihat Profil Komisariat

                                <i class="bi bi-arrow-right ms-2"></i>

                            </a>

                        </div>


                    </div>

                </div>

            @empty

                <div class="col-12">

                    <div class="komisariat-empty reveal">

                        <i class="bi bi-building"></i>

                        <h4 class="fw-bold mt-3">

                            Belum Ada Komisariat

                        </h4>

                        <p class="text-muted mb-0">

                            Data komisariat belum tersedia.

                        </p>

                    </div>

                </div>

            @endforelse

        </div>


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
