@extends('layouts.app')

@section('title', 'Tujuan HMI | HMI Cabang Indramayu')

@section(
    'description',
    'Tujuan Himpunan Mahasiswa Islam sebagai arah pembinaan dan perjuangan kader HMI Cabang Indramayu.'
)

@section('content')

{{-- HERO TUJUAN --}}

<section class="org-hero reveal">

    <div class="container">

        <div class="org-hero-content text-center">

            <span class="org-badge reveal">
                <i class="bi bi-bullseye"></i>
                Tentang HMI
            </span>

            <h1 class="org-title reveal">
                Tujuan
                <span>HMI</span>
            </h1>

            <p class="org-description reveal">
                Landasan tujuan yang menjadi arah pembinaan
                dan perjuangan kader Himpunan Mahasiswa Islam.
            </p>

        </div>

    </div>

</section>


{{-- TUJUAN UTAMA --}}

<section class="py-5">

    <div class="container py-5">

        <div class="row justify-content-center">

            <div class="col-lg-9 reveal">

                <div
                    class="p-4 p-md-5 bg-white rounded-4 shadow-sm"
                    data-tilt
                >

                    <div class="text-center mb-4">

                        <div
                            class="rounded-circle bg-success text-white
                                   d-inline-flex align-items-center
                                   justify-content-center"
                            style="width:80px;height:80px;"
                        >

                            <i
                                class="bi bi-bullseye"
                                style="font-size:35px;"
                            ></i>

                        </div>

                    </div>

                    <h2 class="text-center fw-bold mb-4">
                        Tujuan Himpunan Mahasiswa Islam
                    </h2>

                    <p class="text-muted lh-lg text-center mb-0">
                        Terbinanya insan akademis, pencipta, pengabdi
                        yang bernafaskan Islam dan bertanggung jawab
                        atas terwujudnya masyarakat adil makmur yang
                        diridhai Allah SWT.
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- UNSUR TUJUAN --}}

<section class="py-5 bg-white">

    <div class="container py-5">

        <div class="text-center mb-5 reveal">

            <span class="text-success fw-semibold text-uppercase small">
                Nilai Pembinaan
            </span>

            <h2 class="display-6 fw-bold mt-2">
                Unsur dalam Tujuan HMI
            </h2>

            <p class="text-muted mb-0">
                Empat aspek penting dalam proses pembinaan kader.
            </p>

        </div>


        <div class="row g-4">


            {{-- AKADEMIS --}}

            <div class="col-md-6 col-lg-3 reveal">

                <div
                    class="h-100 p-4 rounded-4 shadow-sm
                           text-center bg-white"
                    data-tilt
                >

                    <div class="mb-3">

                        <i
                            class="bi bi-mortarboard-fill text-success"
                            style="font-size:45px;"
                        ></i>

                    </div>

                    <h4 class="fw-bold">
                        Akademis
                    </h4>

                    <p class="text-muted mb-0">
                        Mendorong kader untuk memiliki kemampuan
                        intelektual dan wawasan keilmuan.
                    </p>

                </div>

            </div>


            {{-- PENCIPTA --}}

            <div class="col-md-6 col-lg-3 reveal">

                <div
                    class="h-100 p-4 rounded-4 shadow-sm
                           text-center bg-white"
                    data-tilt
                >

                    <div class="mb-3">

                        <i
                            class="bi bi-lightbulb-fill text-success"
                            style="font-size:45px;"
                        ></i>

                    </div>

                    <h4 class="fw-bold">
                        Pencipta
                    </h4>

                    <p class="text-muted mb-0">
                        Membentuk kader yang mampu melahirkan
                        gagasan dan memberikan solusi.
                    </p>

                </div>

            </div>


            {{-- PENGABDI --}}

            <div class="col-md-6 col-lg-3 reveal">

                <div
                    class="h-100 p-4 rounded-4 shadow-sm
                           text-center bg-white"
                    data-tilt
                >

                    <div class="mb-3">

                        <i
                            class="bi bi-heart-fill text-success"
                            style="font-size:45px;"
                        ></i>

                    </div>

                    <h4 class="fw-bold">
                        Pengabdi
                    </h4>

                    <p class="text-muted mb-0">
                        Menumbuhkan kepedulian dan semangat
                        pengabdian kepada masyarakat.
                    </p>

                </div>

            </div>


            {{-- ISLAM --}}

            <div class="col-md-6 col-lg-3 reveal">

                <div
                    class="h-100 p-4 rounded-4 shadow-sm
                           text-center bg-white"
                    data-tilt
                >

                    <div class="mb-3">

                        <i
                            class="bi bi-moon-stars-fill text-success"
                            style="font-size:45px;"
                        ></i>

                    </div>

                    <h4 class="fw-bold">
                        Keislaman
                    </h4>

                    <p class="text-muted mb-0">
                        Membentuk kader yang bernafaskan nilai-nilai
                        Islam dalam kehidupan.
                    </p>

                </div>

            </div>


        </div>

    </div>

</section>


{{-- PENUTUP --}}

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
                Menuju Insan Cita
            </h2>

            <p class="text-muted mt-3 mb-0">
                Tujuan HMI menjadi arah dalam proses kaderisasi
                untuk melahirkan kader yang memiliki kemampuan
                akademik, kreativitas, pengabdian, dan nilai
                keislaman.
            </p>

        </div>

    </div>

</section>

@endsection
