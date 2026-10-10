@extends('layouts.app')

@section('title', 'Sejarah HMI | HMI Cabang Indramayu')

@section(
    'description',
    'Mengenal sejarah dan perjalanan Himpunan Mahasiswa Islam hingga menjadi bagian dari gerakan mahasiswa Indonesia.'
)

@section('content')

{{-- HERO SEJARAH --}}

<section class="org-hero reveal">

    <div class="container">

        <div class="org-hero-content text-center">

            <span class="org-badge reveal">
                <i class="bi bi-clock-history"></i>
                Tentang HMI
            </span>

            <h1 class="org-title reveal">
                Sejarah
                <span>HMI</span>
            </h1>

            <p class="org-description reveal">
                Mengenal perjalanan Himpunan Mahasiswa Islam
                dari awal berdiri hingga menjadi bagian dari
                gerakan mahasiswa Indonesia.
            </p>

        </div>

    </div>

</section>


{{-- SEJARAH SINGKAT --}}

<section class="py-5">

    <div class="container py-5">

        <div class="row justify-content-center">

            <div class="col-lg-9 reveal">

                <div
                    class="bg-white rounded-4 shadow-sm
                           p-4 p-md-5"
                    data-tilt
                >

                    <div class="d-flex align-items-center gap-3 mb-4">

                        <div
                            class="rounded-circle bg-success text-white
                                   d-flex align-items-center
                                   justify-content-center flex-shrink-0"
                            style="width:60px;height:60px;"
                        >
                            <i
                                class="bi bi-book-half"
                                style="font-size:27px;"
                            ></i>
                        </div>

                        <div>
                            <span class="text-success fw-semibold text-uppercase small">
                                Tentang Perjalanan HMI
                            </span>

                            <h2 class="fw-bold mb-0 mt-1">
                                Sejarah Singkat HMI
                            </h2>
                        </div>

                    </div>

                    <p class="text-muted lh-lg">
                        Himpunan Mahasiswa Islam (HMI) merupakan organisasi
                        mahasiswa yang lahir dari semangat untuk membangun
                        kehidupan mahasiswa yang memiliki wawasan keislaman,
                        keilmuan, dan kebangsaan.
                    </p>

                    <p class="text-muted lh-lg">
                        Dalam perjalanannya, HMI berkembang menjadi salah satu
                        organisasi mahasiswa yang memiliki perhatian terhadap
                        persoalan pendidikan, keumatan, kemasyarakatan,
                        kebangsaan, dan pengembangan intelektual kader.
                    </p>

                    <p class="text-muted lh-lg mb-0">
                        Perjalanan HMI tersebut kemudian berkembang melalui
                        berbagai cabang di berbagai daerah, termasuk HMI
                        Cabang Indramayu.
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- PERJALANAN HMI --}}

<section class="py-5 bg-white">

    <div class="container py-5">

        <div class="text-center mb-5 reveal">

            <span class="text-success fw-semibold text-uppercase small">
                Perjalanan
            </span>

            <h2 class="display-6 fw-bold mt-2">
                Perjalanan HMI
            </h2>

            <p class="text-muted mb-0">
                Perjalanan organisasi, kader, dan perkembangan HMI
                dari waktu ke waktu.
            </p>

        </div>


        <div class="row g-4">


            {{-- AWAL BERDIRI --}}

            <div class="col-md-4 reveal">

                <div
                    class="h-100 p-4 rounded-4 shadow-sm bg-white"
                    data-tilt
                >

                    <i
                        class="bi bi-flag-fill text-success"
                        style="font-size:40px;"
                    ></i>

                    <h4 class="fw-bold mt-4">
                        Awal Berdiri
                    </h4>

                    <p class="text-muted mb-0">
                        HMI lahir sebagai wadah pembinaan mahasiswa
                        dalam pengembangan keislaman dan intelektual.
                    </p>

                </div>

            </div>


            {{-- PERKEMBANGAN KADER --}}

            <div class="col-md-4 reveal">

                <div
                    class="h-100 p-4 rounded-4 shadow-sm bg-white"
                    data-tilt
                >

                    <i
                        class="bi bi-people-fill text-success"
                        style="font-size:40px;"
                    ></i>

                    <h4 class="fw-bold mt-4">
                        Perkembangan Kader
                    </h4>

                    <p class="text-muted mb-0">
                        Kader HMI berkembang di berbagai daerah dan
                        mengambil peran dalam kehidupan masyarakat.
                    </p>

                </div>

            </div>


            {{-- HMI CABANG INDRAMAYU --}}

            <div class="col-md-4 reveal">

                <div
                    class="h-100 p-4 rounded-4 shadow-sm bg-white"
                    data-tilt
                >

                    <i
                        class="bi bi-building-fill text-success"
                        style="font-size:40px;"
                    ></i>

                    <h4 class="fw-bold mt-4">
                        HMI Cabang Indramayu
                    </h4>

                    <p class="text-muted mb-0">
                        HMI Cabang Indramayu menjadi bagian dari
                        perjalanan dan perkembangan HMI di daerah.
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
                Menjaga Perjalanan, Melanjutkan Perjuangan
            </h2>

            <p class="text-muted mt-3 mb-0">
                Memahami sejarah menjadi bagian penting dalam
                mengenal perjalanan organisasi dan meneruskan
                nilai perjuangan HMI.
            </p>

        </div>

    </div>

</section>

@endsection
