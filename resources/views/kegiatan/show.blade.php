@extends('layouts.app')

@section('title', $kegiatan->judul . ' - Kegiatan HMI')

@section('content')

{{-- =====================================================
DETAIL KEGIATAN
===================================================== --}}

<section class="kegiatan-detail">

<div class="container">

    {{-- BREADCRUMB / KEMBALI --}}

    <div class="mb-4">

        <a href="{{ route('kegiatan.index') }}"
           class="kegiatan-back">

            <i class="bi bi-arrow-left"></i>

            Kembali ke Kegiatan

        </a>

    </div>


    {{-- HEADER ARTIKEL --}}

    <article class="kegiatan-detail-article">

        <div class="kegiatan-detail-header">

            {{-- KATEGORI --}}

            @if($kegiatan->kategori)

                <span class="kegiatan-detail-category">

                    {{ $kegiatan->kategori }}

                </span>

            @endif


            {{-- JUDUL --}}

            <h1>

                {{ $kegiatan->judul }}

            </h1>


            {{-- META --}}

            <div class="kegiatan-detail-meta">

                <span>

                    <i class="bi bi-calendar3"></i>

                    {{ $kegiatan->tanggal?->format('d F Y') }}

                </span>


                @if($kegiatan->lokasi)

                    <span>

                        <i class="bi bi-geo-alt"></i>

                        {{ $kegiatan->lokasi }}

                    </span>

                @endif

            </div>

        </div>


        {{-- GAMBAR UTAMA --}}

        @if($kegiatan->gambar)

            <div class="kegiatan-detail-image">

                <img src="{{ asset(
                    'storage/' . $kegiatan->gambar
                ) }}"
                     alt="{{ $kegiatan->judul }}">

            </div>

        @endif


        {{-- ISI --}}

        <div class="kegiatan-detail-content">

            {{-- RINGKASAN --}}

            @if($kegiatan->excerpt)

                <div class="kegiatan-detail-excerpt">

                    {{ $kegiatan->excerpt }}

                </div>

            @endif


            {{-- KONTEN --}}

            <div class="kegiatan-detail-body">

                {!! nl2br(e($kegiatan->konten)) !!}

            </div>

        </div>

        {{-- =====================================================
        DOKUMENTASI KEGIATAN
        ===================================================== --}}

        @if($kegiatan->dokumentasis->count())

            <div class="kegiatan-dokumentasi">

                <div class="kegiatan-dokumentasi-header">

                    <span class="kegiatan-dokumentasi-label">
                        Dokumentasi
                    </span>

                    <h2>
                        Dokumentasi Kegiatan
                    </h2>

                    <p>
                        Dokumentasi kegiatan {{ $kegiatan->judul }}.
                    </p>

                </div>


                <div class="row g-4">

                    @foreach($kegiatan->dokumentasis as $dokumentasi)

                        <div class="col-md-6 col-lg-4">

                            <div class="kegiatan-dokumentasi-card">

                                <a href="{{ asset(
                                    'storage/' . $dokumentasi->gambar
                                ) }}"
                                target="_blank"
                                class="kegiatan-dokumentasi-image">

                                    <img
                                        src="{{ asset(
                                            'storage/' . $dokumentasi->gambar
                                        ) }}"
                                        alt="{{ $dokumentasi->caption ?: $kegiatan->judul }}"
                                        loading="lazy">

                                </a>


                                @if($dokumentasi->caption)

                                    <div class="kegiatan-dokumentasi-caption">

                                        {{ $dokumentasi->caption }}

                                    </div>

                                @endif

                            </div>

                        </div>

                    @endforeach

                </div>

            </div>

        @endif
        
        {{-- FOOTER ARTIKEL --}}

        <div class="kegiatan-detail-footer">

            <a href="{{ route('kegiatan.index') }}"
               class="btn btn-success rounded-pill px-4">

                <i class="bi bi-arrow-left me-2"></i>

                Kembali ke Kegiatan

            </a>

        </div>

    </article>

</div>

</section>

@endsection
