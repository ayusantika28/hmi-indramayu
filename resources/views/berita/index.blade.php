@extends('layouts.app')

@section('title', 'Berita | HMI Cabang Indramayu')

@section('description', 'Berita dan informasi terbaru HMI Cabang Indramayu.')

@section('content')

{{-- =========================================================
HERO
========================================================= --}}

<section class="org-hero reveal">

    <div class="container">

        <div class="org-hero-content text-center">

            <span class="org-badge reveal">

                <i class="bi bi-newspaper"></i>

                Informasi & Kabar Organisasi

            </span>


            <h1 class="org-title reveal">

                Berita HMI

                <span>Cabang Indramayu</span>

            </h1>


            <p class="org-description reveal">

                Informasi terbaru mengenai kegiatan,
                kaderisasi, dan aktivitas HMI Cabang Indramayu
                sebagai bagian dari dinamika organisasi.

            </p>

        </div>

    </div>

</section>


{{-- =========================================================
DAFTAR BERITA
========================================================= --}}

<section class="organigram-section">

    <div class="container">

        {{-- =================================================
        BERITA
        ================================================== --}}

        @if($beritas->count())

            <div class="row g-4">

                @foreach($beritas as $berita)

                    <div class="col-md-6 col-lg-4 reveal">

                        <article
                            class="card border-0 shadow-sm rounded-4 overflow-hidden h-100"
                            data-tilt
                        >

                            {{-- =================================================
                            GAMBAR
                            ================================================== --}}

                            @if($berita->gambar)

                                <img
                                    src="{{ asset('storage/' . $berita->gambar) }}"
                                    alt="{{ $berita->judul }}"
                                    loading="lazy"
                                    style="
                                        width:100%;
                                        height:220px;
                                        object-fit:cover;
                                    "
                                >

                            @else

                                <div
                                    class="bg-secondary d-flex
                                           align-items-center
                                           justify-content-center"
                                    style="height:220px;"
                                >

                                    <i
                                        class="bi bi-newspaper text-white"
                                        style="font-size:50px;"
                                    ></i>

                                </div>

                            @endif


                            {{-- =================================================
                            CONTENT
                            ================================================== --}}

                            <div class="card-body p-4 d-flex flex-column">


                                {{-- TANGGAL --}}

                                @if($berita->published_at)

                                    <div class="small text-muted mb-2">

                                        <i class="bi bi-calendar3 me-1"></i>

                                        {{ $berita->published_at->format('d F Y') }}

                                    </div>

                                @endif


                                {{-- JUDUL --}}

                                <h2 class="h5 fw-bold mb-3">

                                    {{ $berita->judul }}

                                </h2>


                                {{-- EXCERPT --}}

                                <p class="text-muted flex-grow-1">

                                    {{ Str::limit(
                                        $berita->excerpt
                                            ?? strip_tags($berita->konten),
                                        120
                                    ) }}

                                </p>


                                {{-- TOMBOL --}}

                                <a
                                    href="{{ route(
                                        'berita.show',
                                        ['berita' => $berita->slug]
                                    ) }}"
                                    class="btn btn-dark rounded-pill
                                           align-self-start px-4"
                                >

                                    Baca Selengkapnya

                                    <i class="bi bi-arrow-right ms-1"></i>

                                </a>

                            </div>

                        </article>

                    </div>

                @endforeach

            </div>


            {{-- =================================================
            PAGINATION
            ================================================== --}}

            @if($beritas->hasPages())

                <div class="mt-5 d-flex justify-content-center reveal">

                    {{ $beritas->links() }}

                </div>

            @endif


        @else

            {{-- =================================================
            EMPTY
            ================================================== --}}

            <div class="text-center py-5 reveal">

                <i
                    class="bi bi-newspaper text-muted"
                    style="font-size:60px;"
                ></i>


                <h4 class="fw-bold mt-3">

                    Belum Ada Berita

                </h4>


                <p class="text-muted">

                    Berita yang sudah dipublikasikan
                    akan muncul di halaman ini.

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
            class="mx-auto"
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
