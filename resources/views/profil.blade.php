@extends('layouts.app')

@section('title', 'Profil | HMI Cabang Indramayu')

@section(
    'description',
    'Profil HMI Cabang Indramayu sebagai ruang kaderisasi, pengembangan intelektual, dan pengabdian.'
)

@section('content')

{{-- =====================================================
     HERO PROFIL
     TETAP SAMA
===================================================== --}}

<section class="org-hero reveal">

    <div class="container">

        <div class="org-hero-content text-center">

            <span class="org-badge reveal">
                <i class="bi bi-building-fill"></i>
                Tentang Organisasi
            </span>

            <h1 class="org-title reveal">
                Profil HMI
                <span>Cabang Indramayu</span>
            </h1>

            <p class="org-description reveal">
                Mengenal lebih dekat Himpunan Mahasiswa Islam
                Cabang Indramayu sebagai ruang kaderisasi,
                pengembangan intelektual, dan pengabdian.
            </p>

        </div>

    </div>

</section>


{{-- =====================================================
     TENTANG HMI
===================================================== --}}

<section class="py-5">

    <div class="container py-5">

        <div class="row align-items-center g-5">

            <div class="col-lg-6 reveal-left">

                <span class="text-success fw-semibold text-uppercase small">
                    Tentang HMI
                </span>

                <h2 class="display-6 fw-bold mt-2 mb-4">
                    {{ $profileSetting?->nama_organisasi ?? 'Himpunan Mahasiswa Islam' }}
                </h2>

                @if ($profileSetting?->periode)
                    <p class="text-success fw-semibold mb-4">
                        Periode Kepengurusan {{ $profileSetting->periode }}
                    </p>
                @endif

                <p class="text-muted lh-lg">
                    Himpunan Mahasiswa Islam (HMI) merupakan organisasi
                    mahasiswa yang menjadi wadah pembinaan dan pengembangan
                    mahasiswa dalam aspek keislaman, keilmuan,
                    kepemimpinan, dan pengabdian kepada masyarakat.
                </p>

                <p class="text-muted lh-lg mb-0">
                    HMI Cabang Indramayu menjadi bagian dari perjalanan
                    organisasi HMI dalam membentuk kader yang memiliki
                    kemampuan intelektual, karakter kepemimpinan,
                    serta kepedulian terhadap persoalan masyarakat.
                </p>

            </div>


            <div class="col-lg-6 reveal-right">

                <div
                    class="bg-white rounded-4 shadow-sm p-4 p-md-5"
                    data-tilt
                >

                    <div class="text-center">

                        <div class="mb-4">

                            @if ($profileSetting?->logo)

                                <img
                                    src="{{ asset('storage/' . $profileSetting->logo) }}"
                                    alt="{{ $profileSetting->nama_organisasi ?? 'Logo HMI' }}"
                                    class="img-fluid"
                                    style="max-height:120px;"
                                >

                            @else

                                <i
                                    class="bi bi-people-fill text-success"
                                    style="font-size:70px;"
                                ></i>

                            @endif

                        </div>

                        <h3 class="fw-bold">
                            Insan Cita
                        </h3>

                        <p class="text-muted mb-0">
                            Membentuk insan akademis,
                            pencipta, pengabdi yang bernafaskan Islam
                            dan bertanggung jawab atas terwujudnya
                            masyarakat adil makmur yang diridhai Allah SWT.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =====================================================
     VISI & MISI
     DATA DARI PENGATURAN ADMIN
===================================================== --}}

@if ($profileSetting?->visi || $profileSetting?->misi)

<section class="py-5 bg-light">

    <div class="container py-5">

        <div class="text-center mb-5 reveal">

            <span class="text-success fw-semibold text-uppercase small">
                Arah Organisasi
            </span>

            <h2 class="display-6 fw-bold mt-2">
                Visi & Misi
            </h2>

            <p class="text-muted mb-0">
                Visi dan misi {{ $profileSetting->nama_organisasi ?? 'HMI Cabang Indramayu' }}.
            </p>

        </div>


        <div class="row g-4">

            {{-- VISI --}}

            @if ($profileSetting?->visi)

                <div class="col-lg-5 reveal-left">

                    <div
                        class="h-100 p-4 p-md-5 bg-white rounded-4 shadow-sm"
                        data-tilt
                    >

                        <div
                            class="rounded-circle bg-success text-white
                                   d-flex align-items-center
                                   justify-content-center mb-4"
                            style="width:55px;height:55px;"
                        >
                            <i class="bi bi-eye-fill"></i>
                        </div>

                        <span class="text-success fw-semibold text-uppercase small">
                            Visi
                        </span>

                        <h3 class="fw-bold mt-2 mb-3">
                            Visi Organisasi
                        </h3>

                        <p class="text-muted lh-lg mb-0">
                            {{ $profileSetting->visi }}
                        </p>

                    </div>

                </div>

            @endif


            {{-- MISI --}}

            @if ($profileSetting?->misi)

                <div class="col-lg-7 reveal-right">

                    <div
                        class="h-100 p-4 p-md-5 bg-white rounded-4 shadow-sm"
                        data-tilt
                    >

                        <div
                            class="rounded-circle bg-success text-white
                                   d-flex align-items-center
                                   justify-content-center mb-4"
                            style="width:55px;height:55px;"
                        >
                            <i class="bi bi-list-check"></i>
                        </div>

                        <span class="text-success fw-semibold text-uppercase small">
                            Misi
                        </span>

                        <h3 class="fw-bold mt-2 mb-3">
                            Misi Organisasi
                        </h3>

                        <div class="text-muted lh-lg">
                            {!! nl2br(e($profileSetting->misi)) !!}
                        </div>

                    </div>

                </div>

            @endif

        </div>

    </div>

</section>

@endif


{{-- =====================================================
     NILAI ORGANISASI
===================================================== --}}

<section class="py-5 bg-white">

    <div class="container py-5">

        <div class="text-center mb-5 reveal">

            <span class="text-success fw-semibold text-uppercase small">
                Nilai Kaderisasi
            </span>

            <h2 class="display-6 fw-bold mt-2">
                Nilai yang Dikembangkan
            </h2>

            <p class="text-muted mb-0">
                Nilai-nilai yang menjadi bagian dari proses
                pembinaan kader HMI.
            </p>

        </div>


        <div class="row g-4">

            {{-- KEILMUAN --}}

            <div class="col-md-6 col-lg-3 reveal">

                <div
                    class="h-100 p-4 rounded-4 shadow-sm bg-white"
                    data-tilt
                >

                    <i
                        class="bi bi-book text-success"
                        style="font-size:40px;"
                    ></i>

                    <h4 class="fw-bold mt-4">
                        Keilmuan
                    </h4>

                    <p class="text-muted mb-0">
                        Membangun tradisi intelektual dan
                        kemampuan berpikir kritis.
                    </p>

                </div>

            </div>


            {{-- INTEGRITAS --}}

            <div class="col-md-6 col-lg-3 reveal">

                <div
                    class="h-100 p-4 rounded-4 shadow-sm bg-white"
                    data-tilt
                >

                    <i
                        class="bi bi-person-check text-success"
                        style="font-size:40px;"
                    ></i>

                    <h4 class="fw-bold mt-4">
                        Integritas
                    </h4>

                    <p class="text-muted mb-0">
                        Membentuk kader yang memiliki
                        karakter dan tanggung jawab.
                    </p>

                </div>

            </div>


            {{-- KREATIVITAS --}}

            <div class="col-md-6 col-lg-3 reveal">

                <div
                    class="h-100 p-4 rounded-4 shadow-sm bg-white"
                    data-tilt
                >

                    <i
                        class="bi bi-lightbulb text-success"
                        style="font-size:40px;"
                    ></i>

                    <h4 class="fw-bold mt-4">
                        Kreativitas
                    </h4>

                    <p class="text-muted mb-0">
                        Mendorong lahirnya gagasan,
                        inovasi, dan solusi.
                    </p>

                </div>

            </div>


            {{-- PENGABDIAN --}}

            <div class="col-md-6 col-lg-3 reveal">

                <div
                    class="h-100 p-4 rounded-4 shadow-sm bg-white"
                    data-tilt
                >

                    <i
                        class="bi bi-heart text-success"
                        style="font-size:40px;"
                    ></i>

                    <h4 class="fw-bold mt-4">
                        Pengabdian
                    </h4>

                    <p class="text-muted mb-0">
                        Berkontribusi bagi masyarakat,
                        umat, dan bangsa.
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>




{{-- =====================================================
     PENUTUP
===================================================== --}}

<section class="org-closing reveal">

    <div class="container text-center">

        <div
            class="mx-auto reveal"
            style="max-width:700px;"
        >

            <span class="text-success fw-semibold text-uppercase small">
                {{ $profileSetting?->nama_organisasi ?? 'HMI Cabang Indramayu' }}
            </span>

            <h2 class="fw-bold mt-2">
                Mengenal HMI, Memahami Perjuangan
            </h2>

            <p class="text-muted mt-3 mb-0">
                Menjadi bagian dari proses pembentukan kader
                yang berilmu, berintegritas, dan mampu memberikan
                manfaat bagi umat dan bangsa.
            </p>

        </div>

    </div>

</section>

@endsection
