@extends('layouts.app')

@section('title', 'Galeri | HMI Cabang Indramayu')

@section(
    'description',
    'Galeri dokumentasi kegiatan HMI Cabang Indramayu.'
)

@section('content')


{{-- =========================================================
HERO GALERI
========================================================= --}}

<section class="org-hero reveal">

    <div class="container">

        <div class="org-hero-content text-center">

            <span class="org-badge reveal">

                <i class="bi bi-images"></i>

                Galeri HMI

            </span>


            <h1 class="org-title reveal">

                Dokumentasi

                <span>Kegiatan HMI</span>

            </h1>


            <p class="org-description reveal">

                Kumpulan dokumentasi kegiatan, aktivitas,
                dan perjalanan HMI Cabang Indramayu.

            </p>

        </div>

    </div>

</section>



{{-- =========================================================
GALERI
========================================================= --}}

<section class="galeri-section py-5">

    <div class="container py-5">


        {{-- =================================================
        GRID KEGIATAN
        ================================================= --}}

        @if ($kegiatans->count())


            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4">


                @foreach ($kegiatans as $kegiatan)

                    @php
                        $fotoUtama = $kegiatan->dokumentasis->first();
                    @endphp


                    <div class="col reveal">


                        <button
                            type="button"
                            class="galeri-card w-100"
                            data-bs-toggle="modal"
                            data-bs-target="#galeriModal"
                            data-kegiatan-id="{{ $kegiatan->id }}"
                        >


                            {{-- =================================================
                            FOTO
                            ================================================== --}}

                            <div class="galeri-card-image">


                                @if ($fotoUtama)

                                    <img
                                        src="{{ asset(
                                            'storage/' . $fotoUtama->gambar
                                        ) }}"
                                        alt="{{ $kegiatan->judul }}"
                                        loading="lazy"
                                    >

                                @else

                                    <div class="galeri-card-placeholder">

                                        <i class="bi bi-images"></i>

                                    </div>

                                @endif



                                {{-- SHADOW / GRADIENT --}}

                                <div class="galeri-card-shadow"></div>



                                {{-- JUDUL --}}

                                <div class="galeri-card-title-overlay">

                                    <h3>

                                        {{ $kegiatan->judul }}

                                    </h3>

                                </div>



                                {{-- JUMLAH FOTO --}}

                                <span class="galeri-photo-count">

                                    <i class="bi bi-images"></i>

                                    {{ $kegiatan->dokumentasis->count() }}

                                </span>


                            </div>


                        </button>


                    </div>


                @endforeach


            </div>



            {{-- =================================================
            PAGINATION
            ================================================= --}}

            @if ($kegiatans->hasPages())

                <div class="d-flex justify-content-center mt-5 reveal">

                    {{ $kegiatans->links() }}

                </div>

            @endif


        @else


            {{-- =================================================
            EMPTY STATE
            ================================================= --}}

            <div class="text-center py-5 reveal">


                <div class="mb-4">

                    <div class="galeri-empty-icon">

                        <i class="bi bi-images"></i>

                    </div>

                </div>


                <h3 class="fw-bold">

                    Belum Ada Dokumentasi

                </h3>


                <p class="text-muted mb-0">

                    Dokumentasi kegiatan HMI Cabang Indramayu
                    akan ditampilkan di halaman ini.

                </p>


            </div>


        @endif


    </div>

</section>



{{-- =========================================================
MODAL GALERI
========================================================= --}}

<div
    class="modal fade"
    id="galeriModal"
    tabindex="-1"
    aria-labelledby="galeriModalTitle"
    aria-hidden="true"
>

    <div class="modal-dialog modal-xl modal-dialog-centered">

        <div class="modal-content galeri-modal-content">


            {{-- =================================================
            HEADER
            ================================================== --}}

            <div class="modal-header border-0">

                <div>

                    <div class="galeri-modal-label">

                        DOKUMENTASI KEGIATAN

                    </div>


                    <h5
                        class="modal-title fw-bold"
                        id="galeriModalTitle"
                    >
                    </h5>

                </div>


                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Tutup"
                ></button>

            </div>



            {{-- =================================================
            BODY
            ================================================== --}}

            <div class="modal-body pt-0">


                {{-- =================================================
                FOTO VIEWER
                ================================================== --}}

                <div class="galeri-viewer">


                    <div class="galeri-viewer-image">


                        <img
                            id="galeriModalImage"
                            src=""
                            alt=""
                        >



                        {{-- PREVIOUS --}}

                        <button
                            type="button"
                            class="galeri-nav galeri-prev"
                            id="galeriPrev"
                            aria-label="Foto sebelumnya"
                        >

                            <i class="bi bi-chevron-left"></i>

                        </button>



                        {{-- NEXT --}}

                        <button
                            type="button"
                            class="galeri-nav galeri-next"
                            id="galeriNext"
                            aria-label="Foto berikutnya"
                        >

                            <i class="bi bi-chevron-right"></i>

                        </button>



                        {{-- COUNTER --}}

                        <div
                            class="galeri-counter"
                            id="galeriCounter"
                        >
                        </div>


                    </div>



                    {{-- CAPTION --}}

                    <div class="galeri-viewer-info">

                        <p
                            class="galeri-caption"
                            id="galeriCaption"
                        >
                        </p>

                    </div>


                </div>



                {{-- =================================================
                INFORMASI KEGIATAN
                ================================================== --}}

                <div class="galeri-detail">


                    {{-- TANGGAL --}}

                    <div class="galeri-detail-item">

                        <div class="galeri-detail-icon">

                            <i class="bi bi-calendar3"></i>

                        </div>


                        <div>

                            <span>

                                Tanggal

                            </span>


                            <strong id="galeriTanggal">

                                -

                            </strong>

                        </div>

                    </div>



                    {{-- LOKASI --}}

                    <div
                        class="galeri-detail-item"
                        id="galeriLokasiContainer"
                    >

                        <div class="galeri-detail-icon">

                            <i class="bi bi-geo-alt-fill"></i>

                        </div>


                        <div>

                            <span>

                                Lokasi

                            </span>


                            <strong id="galeriLokasi">

                                -

                            </strong>

                        </div>

                    </div>


                </div>



                {{-- =================================================
                DESKRIPSI KEGIATAN
                ================================================== --}}

                <div class="galeri-description-box">


                    <div class="galeri-description-title">

                        <i class="bi bi-info-circle-fill"></i>

                        <span>

                            Tentang Kegiatan

                        </span>

                    </div>


                    <p id="galeriDescription">

                        -

                    </p>


                </div>


            </div>


        </div>

    </div>

</div>



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

                Mengabadikan Setiap Perjalanan

            </h2>


            <p class="text-muted mt-3 mb-0">

                Setiap kegiatan merupakan bagian dari perjalanan
                kader dan organisasi dalam belajar, berkarya,
                dan mengabdi.

            </p>


        </div>

    </div>

</section>


@endsection



{{-- =========================================================
JAVASCRIPT GALERI
========================================================= --}}

@push('scripts')

<script>

document.addEventListener('DOMContentLoaded', function () {


    /*
    |--------------------------------------------------------------------------
    | MODAL
    |--------------------------------------------------------------------------
    */

    const modalElement =
        document.getElementById('galeriModal');


    if (!modalElement) {
        return;
    }


    const modal =
        bootstrap.Modal.getOrCreateInstance(modalElement);



    /*
    |--------------------------------------------------------------------------
    | ELEMENT MODAL
    |--------------------------------------------------------------------------
    */

    const modalTitle =
        document.getElementById('galeriModalTitle');


    const modalImage =
        document.getElementById('galeriModalImage');


    const modalCaption =
        document.getElementById('galeriCaption');


    const modalCounter =
        document.getElementById('galeriCounter');


    const modalTanggal =
        document.getElementById('galeriTanggal');


    const modalLokasi =
        document.getElementById('galeriLokasi');


    const modalLokasiContainer =
        document.getElementById('galeriLokasiContainer');


    const modalDescription =
        document.getElementById('galeriDescription');


    const previousButton =
        document.getElementById('galeriPrev');


    const nextButton =
        document.getElementById('galeriNext');


    const galleries = {};



    /*
    |--------------------------------------------------------------------------
    | DATA GALERI
    |--------------------------------------------------------------------------
    */

    @foreach ($kegiatans as $kegiatan)

        galleries['{{ $kegiatan->id }}'] = {

            title: @json($kegiatan->judul),

            tanggal: @json(
                $kegiatan->tanggal
                    ? $kegiatan->tanggal->translatedFormat('d F Y')
                    : '-'
            ),

            lokasi: @json(
                $kegiatan->lokasi ?: ''
            ),

            description: @json(
                $kegiatan->excerpt
                    ?: 'Dokumentasi kegiatan HMI Cabang Indramayu.'
            ),

            photos: [

                @foreach ($kegiatan->dokumentasis as $dokumentasi)

                    {

                        image: @json(
                            asset(
                                'storage/' . $dokumentasi->gambar
                            )
                        ),

                        caption: @json(
                            $dokumentasi->caption ?: ''
                        )

                    },

                @endforeach

            ]

        };

    @endforeach



    /*
    |--------------------------------------------------------------------------
    | STATE
    |--------------------------------------------------------------------------
    */

    let currentGallery = [];

    let currentIndex = 0;



    /*
    |--------------------------------------------------------------------------
    | TAMPILKAN FOTO
    |--------------------------------------------------------------------------
    */

    function showPhoto(index) {


        if (currentGallery.length === 0) {
            return;
        }



        /*
        | Kembali ke foto pertama
        */

        if (index >= currentGallery.length) {

            index = 0;

        }



        /*
        | Kembali ke foto terakhir
        */

        if (index < 0) {

            index =
                currentGallery.length - 1;

        }



        currentIndex = index;


        const photo =
            currentGallery[currentIndex];



        /*
        | FOTO
        */

        modalImage.src =
            photo.image;


        modalImage.alt =
            photo.caption ||
            'Dokumentasi kegiatan HMI Cabang Indramayu';



        /*
        | CAPTION
        */

        if (photo.caption) {

            modalCaption.textContent =
                photo.caption;

        } else {

            modalCaption.textContent =
                'Dokumentasi kegiatan HMI Cabang Indramayu.';

        }



        /*
        | COUNTER
        */

        modalCounter.textContent =
            'Foto ' +
            (currentIndex + 1) +
            ' dari ' +
            currentGallery.length;



        /*
        | NAVIGASI
        */

        if (currentGallery.length <= 1) {

            previousButton.style.display =
                'none';

            nextButton.style.display =
                'none';

        } else {

            previousButton.style.display =
                'flex';

            nextButton.style.display =
                'flex';

        }

    }



    /*
    |--------------------------------------------------------------------------
    | BUKA CARD
    |--------------------------------------------------------------------------
    */

    document
        .querySelectorAll('.galeri-card')
        .forEach(function (card) {


            card.addEventListener(
                'click',
                function () {


                    const kegiatanId =
                        this.getAttribute(
                            'data-kegiatan-id'
                        );


                    const data =
                        galleries[kegiatanId];


                    if (!data) {
                        return;
                    }



                    /*
                    | JUDUL
                    */

                    modalTitle.textContent =
                        data.title;



                    /*
                    | TANGGAL
                    */

                    modalTanggal.textContent =
                        data.tanggal || '-';



                    /*
                    | LOKASI
                    */

                    if (data.lokasi) {

                        modalLokasi.textContent =
                            data.lokasi;

                        modalLokasiContainer.style.display =
                            'flex';

                    } else {

                        modalLokasiContainer.style.display =
                            'none';

                    }



                    /*
                    | DESKRIPSI
                    */

                    modalDescription.textContent =
                        data.description ||
                        'Dokumentasi kegiatan HMI Cabang Indramayu.';



                    /*
                    | FOTO
                    */

                    currentGallery =
                        data.photos || [];


                    currentIndex = 0;


                    if (currentGallery.length === 0) {
                        return;
                    }


                    showPhoto(0);

                }
            );

        });



    /*
    |--------------------------------------------------------------------------
    | PREVIOUS
    |--------------------------------------------------------------------------
    */

    previousButton.addEventListener(
        'click',
        function (event) {


            event.preventDefault();

            event.stopPropagation();


            showPhoto(
                currentIndex - 1
            );

        }
    );



    /*
    |--------------------------------------------------------------------------
    | NEXT
    |--------------------------------------------------------------------------
    */

    nextButton.addEventListener(
        'click',
        function (event) {


            event.preventDefault();

            event.stopPropagation();


            showPhoto(
                currentIndex + 1
            );

        }
    );



    /*
    |--------------------------------------------------------------------------
    | KEYBOARD
    |--------------------------------------------------------------------------
    */

    document.addEventListener(
        'keydown',
        function (event) {


            if (
                !modalElement.classList.contains('show')
            ) {
                return;
            }



            if (event.key === 'ArrowLeft') {

                event.preventDefault();

                showPhoto(
                    currentIndex - 1
                );

            }



            if (event.key === 'ArrowRight') {

                event.preventDefault();

                showPhoto(
                    currentIndex + 1
                );

            }

        }
    );



    /*
    |--------------------------------------------------------------------------
    | SWIPE DI HP
    |--------------------------------------------------------------------------
    */

    let touchStartX = 0;


    modalImage.addEventListener(
        'touchstart',
        function (event) {


            touchStartX =
                event.changedTouches[0].screenX;

        },
        {
            passive: true
        }
    );


    modalImage.addEventListener(
        'touchend',
        function (event) {


            const touchEndX =
                event.changedTouches[0].screenX;


            const distance =
                touchEndX - touchStartX;


            if (Math.abs(distance) < 50) {
                return;
            }



            /*
            | Swipe kanan = foto sebelumnya
            */

            if (distance > 0) {

                showPhoto(
                    currentIndex - 1
                );

            }



            /*
            | Swipe kiri = foto berikutnya
            */

            else {

                showPhoto(
                    currentIndex + 1
                );

            }

        },
        {
            passive: true
        }
    );



    /*
    |--------------------------------------------------------------------------
    | RESET SAAT MODAL DITUTUP
    |--------------------------------------------------------------------------
    */

    modalElement.addEventListener(
        'hidden.bs.modal',
        function () {


            modalImage.src = '';

            modalImage.alt = '';

            modalCaption.textContent = '';

            modalCounter.textContent = '';

            currentGallery = [];

            currentIndex = 0;

        }
    );

});

</script>

@endpush
