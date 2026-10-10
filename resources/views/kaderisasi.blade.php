@extends('layouts.app')

@section('title', 'Kaderisasi | HMI Cabang Indramayu')

@section(
    'description',
    'Informasi kaderisasi HMI Cabang Indramayu, jenjang perkaderan formal, dan pengembangan kader.'
)

@section('content')


{{-- =========================================================
HERO KADERISASI
========================================================= --}}

<section class="org-hero reveal">

    <div class="container">

        <div class="org-hero-content text-center">

            <span class="org-badge reveal">
                <i class="bi bi-people-fill"></i>
                Kaderisasi HMI
            </span>

            <h1 class="org-title reveal">
                Membentuk Kader,
                <span>Membangun Insan Cita</span>
            </h1>

            <p class="org-description reveal">
                Kaderisasi merupakan proses pembinaan anggota dan kader
                HMI untuk mengembangkan kualitas keislaman,
                intelektualitas, kepemimpinan, dan pengabdian
                kepada masyarakat.
            </p>

        </div>

    </div>

</section>



{{-- =========================================================
PENGANTAR KADERISASI
========================================================= --}}

<section class="py-5">

    <div class="container py-5">

        <div class="row align-items-center g-5">


            {{-- TEXT --}}

            <div class="col-lg-6 reveal-left">

                <span class="text-success fw-semibold text-uppercase small">
                    Tentang Kaderisasi
                </span>

                <h2 class="display-6 fw-bold mt-2 mb-4">
                    Kaderisasi sebagai Jantung Organisasi
                </h2>

                <p class="text-muted lh-lg">
                    HMI merupakan organisasi kader yang menempatkan
                    proses kaderisasi sebagai bagian penting dalam
                    perjalanan organisasi. Melalui kaderisasi,
                    anggota dan kader mendapatkan ruang untuk
                    mengembangkan potensi, wawasan, sikap, dan
                    kemampuan kepemimpinan.
                </p>

                <p class="text-muted lh-lg mb-0">
                    Proses tersebut diarahkan untuk membentuk kader
                    yang memiliki kualitas keislaman, intelektual,
                    kemampuan mencipta, semangat pengabdian,
                    serta tanggung jawab terhadap kehidupan
                    masyarakat, umat, dan bangsa.
                </p>

            </div>


            {{-- CARD --}}

            <div class="col-lg-6 reveal-right">

                <div
                    class="bg-white rounded-4 shadow-sm p-4 p-md-5 home-profile-card"
                    data-tilt
                >

                    <div class="text-center">

                        <div class="mb-4">

                            <div
                                class="rounded-circle bg-success text-white d-inline-flex align-items-center justify-content-center"
                                style="width:90px;height:90px;"
                            >
                                <i
                                    class="bi bi-people-fill"
                                    style="font-size:42px;"
                                ></i>
                            </div>

                        </div>

                        <h3 class="fw-bold">
                            Organisasi Kader
                        </h3>

                        <p class="text-muted lh-lg mb-0">
                            Kaderisasi menjadi proses berkelanjutan
                            dalam membangun kualitas kader HMI agar
                            mampu berkontribusi bagi organisasi,
                            masyarakat, umat, dan bangsa.
                        </p>

                    </div>

                </div>

            </div>


        </div>

    </div>

</section>



{{-- =========================================================
JENJANG PERKADERAN FORMAL
========================================================= --}}

<section class="py-5 bg-white">

    <div class="container py-5">


        {{-- HEADER --}}

        <div class="text-center mb-5 reveal">

            <span class="text-success fw-semibold text-uppercase small">
                Perkaderan Formal
            </span>

            <h2 class="display-6 fw-bold mt-2">
                Jenjang Perkaderan HMI
            </h2>

            <p class="text-muted mb-0">
                Perkaderan formal HMI dilaksanakan secara berjenjang
                sebagai bagian dari proses pembinaan kader.
            </p>

        </div>



        <div class="row g-4">


            {{-- =================================================
            LK I
            ================================================== --}}

            <div class="col-md-6 col-lg-4 reveal">

                <div
                    class="h-100 bg-white rounded-4 shadow-sm p-4 p-lg-5"
                    data-tilt
                >

                    <div class="mb-4">

                        <div
                            class="rounded-circle bg-success text-white d-inline-flex align-items-center justify-content-center"
                            style="width:65px;height:65px;"
                        >
                            <i
                                class="bi bi-1-circle-fill"
                                style="font-size:30px;"
                            ></i>
                        </div>

                    </div>

                    <span class="text-success fw-semibold small">
                        LK I
                    </span>

                    <h3 class="fw-bold mt-2">
                        Basic Training
                    </h3>

                    <p class="text-muted lh-lg">
                        Latihan Kader I merupakan jenjang awal
                        perkaderan formal HMI yang menjadi bagian
                        dari proses pembentukan kader.
                    </p>

                    <p class="text-muted lh-lg mb-0">
                        Pada tahap ini peserta diperkenalkan dengan
                        nilai-nilai dasar keislaman, ke-HMI-an,
                        kemahasiswaan, intelektualitas, dan
                        tanggung jawab sebagai kader.
                    </p>

                </div>

            </div>



            {{-- =================================================
            LK II
            ================================================== --}}

            <div class="col-md-6 col-lg-4 reveal">

                <div
                    class="h-100 bg-white rounded-4 shadow-sm p-4 p-lg-5"
                    data-tilt
                >

                    <div class="mb-4">

                        <div
                            class="rounded-circle bg-success text-white d-inline-flex align-items-center justify-content-center"
                            style="width:65px;height:65px;"
                        >
                            <i
                                class="bi bi-2-circle-fill"
                                style="font-size:30px;"
                            ></i>
                        </div>

                    </div>

                    <span class="text-success fw-semibold small">
                        LK II
                    </span>

                    <h3 class="fw-bold mt-2">
                        Intermediate Training
                    </h3>

                    <p class="text-muted lh-lg">
                        Latihan Kader II merupakan jenjang lanjutan
                        dalam proses perkaderan formal HMI.
                    </p>

                    <p class="text-muted lh-lg mb-0">
                        Tahapan ini diarahkan pada pengembangan
                        kemampuan intelektual, analisis, kepemimpinan,
                        serta kemampuan kader dalam memahami berbagai
                        persoalan yang berkembang di masyarakat.
                    </p>

                </div>

            </div>



            {{-- =================================================
            LK III
            ================================================== --}}

            <div class="col-md-6 col-lg-4 reveal">

                <div
                    class="h-100 bg-white rounded-4 shadow-sm p-4 p-lg-5"
                    data-tilt
                >

                    <div class="mb-4">

                        <div
                            class="rounded-circle bg-success text-white d-inline-flex align-items-center justify-content-center"
                            style="width:65px;height:65px;"
                        >
                            <i
                                class="bi bi-3-circle-fill"
                                style="font-size:30px;"
                            ></i>
                        </div>

                    </div>

                    <span class="text-success fw-semibold small">
                        LK III
                    </span>

                    <h3 class="fw-bold mt-2">
                        Advanced Training
                    </h3>

                    <p class="text-muted lh-lg">
                        Latihan Kader III merupakan jenjang perkaderan
                        formal tingkat lanjutan dalam HMI.
                    </p>

                    <p class="text-muted lh-lg mb-0">
                        Tahapan ini menjadi ruang pengembangan kapasitas
                        kader dalam kepemimpinan, pemikiran strategis,
                        serta kemampuan membaca persoalan umat,
                        masyarakat, dan bangsa.
                    </p>

                </div>

            </div>


        </div>

    </div>

</section>



{{-- =========================================================
ALUR PERKADERAN
========================================================= --}}

<section class="py-5">

    <div class="container py-5">


        <div class="text-center mb-5 reveal">

            <span class="text-success fw-semibold text-uppercase small">
                Proses Perkaderan
            </span>

            <h2 class="display-6 fw-bold mt-2">
                Perjalanan Kader
            </h2>

            <p class="text-muted mb-0">
                Perkaderan berlangsung melalui proses yang
                berkelanjutan dan bertahap.
            </p>

        </div>



        <div class="row g-4 justify-content-center">


            {{-- TAHAP 1 --}}

            <div class="col-md-4 reveal">

                <div
                    class="text-center h-100 p-4"
                    data-tilt
                >

                    <div
                        class="rounded-circle bg-success text-white d-inline-flex align-items-center justify-content-center mb-4"
                        style="width:70px;height:70px;"
                    >
                        <i
                            class="bi bi-person-plus-fill"
                            style="font-size:30px;"
                        ></i>
                    </div>

                    <h4 class="fw-bold">
                        Mengenal
                    </h4>

                    <p class="text-muted mb-0">
                        Mengenal nilai, identitas, tradisi,
                        dan kehidupan organisasi HMI.
                    </p>

                </div>

            </div>



            {{-- TAHAP 2 --}}

            <div class="col-md-4 reveal">

                <div
                    class="text-center h-100 p-4"
                    data-tilt
                >

                    <div
                        class="rounded-circle bg-success text-white d-inline-flex align-items-center justify-content-center mb-4"
                        style="width:70px;height:70px;"
                    >
                        <i
                            class="bi bi-book-half"
                            style="font-size:30px;"
                        ></i>
                    </div>

                    <h4 class="fw-bold">
                        Mengembangkan
                    </h4>

                    <p class="text-muted mb-0">
                        Mengembangkan kemampuan intelektual,
                        kepemimpinan, dan kapasitas kader.
                    </p>

                </div>

            </div>



            {{-- TAHAP 3 --}}

            <div class="col-md-4 reveal">

                <div
                    class="text-center h-100 p-4"
                    data-tilt
                >

                    <div
                        class="rounded-circle bg-success text-white d-inline-flex align-items-center justify-content-center mb-4"
                        style="width:70px;height:70px;"
                    >
                        <i
                            class="bi bi-hand-thumbs-up-fill"
                            style="font-size:30px;"
                        ></i>
                    </div>

                    <h4 class="fw-bold">
                        Mengabdi
                    </h4>

                    <p class="text-muted mb-0">
                        Mengimplementasikan pengetahuan dan
                        kemampuan melalui pengabdian kepada
                        masyarakat, umat, dan bangsa.
                    </p>

                </div>

            </div>


        </div>

    </div>

</section>



{{-- =========================================================
PENGEMBANGAN KADER
========================================================= --}}

<section class="py-5 bg-white">

    <div class="container py-5">


        <div class="text-center mb-5 reveal">

            <span class="text-success fw-semibold text-uppercase small">
                Pengembangan Kader
            </span>

            <h2 class="display-6 fw-bold mt-2">
                Perkaderan Nonformal
            </h2>

            <p class="text-muted mb-0">
                Pengembangan kader juga dapat dilakukan melalui
                berbagai aktivitas pembinaan dan pengembangan
                kapasitas.
            </p>

        </div>



        <div class="row g-4">


            {{-- UPGRADING --}}

            <div class="col-md-6 col-lg-3 reveal">

                <div
                    class="h-100 p-4 rounded-4 shadow-sm"
                    data-tilt
                >

                    <i
                        class="bi bi-graph-up-arrow text-success"
                        style="font-size:40px;"
                    ></i>

                    <h4 class="fw-bold mt-4">
                        Upgrading
                    </h4>

                    <p class="text-muted mb-0">
                        Kegiatan peningkatan pemahaman,
                        kapasitas, dan kemampuan kader.
                    </p>

                </div>

            </div>



            {{-- PELATIHAN --}}

            <div class="col-md-6 col-lg-3 reveal">

                <div
                    class="h-100 p-4 rounded-4 shadow-sm"
                    data-tilt
                >

                    <i
                        class="bi bi-easel2-fill text-success"
                        style="font-size:40px;"
                    ></i>

                    <h4 class="fw-bold mt-4">
                        Pelatihan
                    </h4>

                    <p class="text-muted mb-0">
                        Pengembangan keterampilan dan kompetensi
                        kader sesuai kebutuhan zaman.
                    </p>

                </div>

            </div>



            {{-- KAJIAN --}}

            <div class="col-md-6 col-lg-3 reveal">

                <div
                    class="h-100 p-4 rounded-4 shadow-sm"
                    data-tilt
                >

                    <i
                        class="bi bi-chat-square-text-fill text-success"
                        style="font-size:40px;"
                    ></i>

                    <h4 class="fw-bold mt-4">
                        Kajian & Diskusi
                    </h4>

                    <p class="text-muted mb-0">
                        Membangun tradisi intelektual melalui
                        kajian, diskusi, dan pertukaran gagasan.
                    </p>

                </div>

            </div>



            {{-- PEMBINAAN --}}

            <div class="col-md-6 col-lg-3 reveal">

                <div
                    class="h-100 p-4 rounded-4 shadow-sm"
                    data-tilt
                >

                    <i
                        class="bi bi-people-fill text-success"
                        style="font-size:40px;"
                    ></i>

                    <h4 class="fw-bold mt-4">
                        Pembinaan Kader
                    </h4>

                    <p class="text-muted mb-0">
                        Membangun proses pembinaan kader
                        secara berkelanjutan dalam kehidupan
                        organisasi.
                    </p>

                </div>

            </div>


        </div>

    </div>

</section>



{{-- =========================================================
KADERISASI HMI CABANG INDRAMAYU
========================================================= --}}

<section class="py-5">

    <div class="container py-5">

        <div class="row justify-content-center">

            <div class="col-lg-9 reveal">

                <div
                    class="bg-white rounded-4 shadow-sm p-4 p-md-5 text-center"
                    data-tilt
                >

                    <span class="text-success fw-semibold text-uppercase small">
                        HMI Cabang Indramayu
                    </span>

                    <h2 class="display-6 fw-bold mt-2 mb-4">
                        Kaderisasi di Cabang Indramayu
                    </h2>

                    <p class="text-muted lh-lg mb-0">
                        HMI Cabang Indramayu terus mengembangkan
                        proses kaderisasi sebagai bagian dari upaya
                        membentuk kader yang memiliki kapasitas
                        keislaman, intelektual, kepemimpinan, dan
                        pengabdian.
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>



{{-- =========================================================
KEGIATAN KADERISASI
========================================================= --}}

<section class="py-5 bg-white">

    <div class="container py-5">


        <div class="text-center mb-5 reveal">

            <span class="text-success fw-semibold text-uppercase small">
                Aktivitas Kaderisasi
            </span>

            <h2 class="display-6 fw-bold mt-2">
                Kegiatan Kaderisasi
            </h2>

            <p class="text-muted mb-0">
                Berbagai kegiatan yang mendukung proses
                pembinaan dan pengembangan kader HMI.
            </p>

        </div>



        <div class="row justify-content-center">

            <div class="col-lg-8 reveal">

                <div
                    class="p-4 p-md-5 rounded-4 shadow-sm text-center"
                    data-tilt
                >

                    <div class="mb-4">

                        <i
                            class="bi bi-calendar-event text-success"
                            style="font-size:55px;"
                        ></i>

                    </div>

                    <h3 class="fw-bold">
                        Temukan Kegiatan Kaderisasi
                    </h3>

                    <p class="text-muted lh-lg">
                        Ikuti berbagai kegiatan HMI Cabang Indramayu,
                        mulai dari kajian, diskusi, pelatihan,
                        perkaderan, hingga aktivitas pengembangan
                        kapasitas kader.
                    </p>

                    <a
                        href="{{ route('kegiatan.index') }}"
                        class="btn btn-success rounded-pill px-4"
                    >
                        <i class="bi bi-calendar3 me-2"></i>
                        Lihat Kegiatan
                    </a>

                </div>

            </div>

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
                Kader HMI
            </span>

            <h2 class="fw-bold mt-2">
                Membentuk Insan Cita
            </h2>

            <p class="text-muted mt-3 mb-0">
                Kaderisasi adalah proses untuk membangun kualitas
                kader agar mampu berpikir, berkarya, memimpin,
                dan mengabdi bagi umat dan bangsa.
            </p>

        </div>

    </div>

</section>


@endsection
