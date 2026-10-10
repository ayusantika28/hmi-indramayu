@extends('layouts.app')

@section('title', 'Nilai Dasar Perjuangan | HMI Cabang Indramayu')

@section(
    'description',
    'Nilai Dasar Perjuangan sebagai landasan pemikiran, sikap, dan perjuangan kader HMI.'
)

@section('content')

{{-- HEADER --}}

<section class="org-hero reveal">

    <div class="container">

        <div class="org-hero-content text-center">

            <span class="org-badge reveal">
                <i class="bi bi-book-half"></i>
                Tentang HMI
            </span>

            <h1 class="org-title reveal">
                Nilai Dasar
                <span>Perjuangan</span>
            </h1>

            <p class="org-description reveal">
                Nilai dasar yang menjadi landasan pemikiran,
                sikap, dan perjuangan kader Himpunan Mahasiswa Islam.
            </p>

        </div>

    </div>

</section>


{{-- PENGANTAR --}}

<section class="py-5">

    <div class="container py-5">

        <div class="row justify-content-center">

            <div class="col-lg-9 reveal">

                <div
                    class="bg-white rounded-4 shadow-sm
                           p-4 p-md-5"
                    data-tilt
                >

                    <div class="text-center mb-4 reveal">

                        <div
                            class="rounded-circle bg-success text-white
                                   d-inline-flex align-items-center
                                   justify-content-center"
                            style="width:80px;height:80px;"
                        >

                            <i
                                class="bi bi-book-half"
                                style="font-size:35px;"
                            ></i>

                        </div>

                    </div>

                    <h2 class="fw-bold text-center mb-4 reveal">
                        Nilai Dasar Perjuangan HMI
                    </h2>

                    <p class="text-muted lh-lg reveal">
                        Nilai Dasar Perjuangan (NDP) merupakan salah satu
                        landasan penting dalam proses pembinaan kader HMI.
                        NDP menjadi kerangka nilai dalam memahami hubungan
                        manusia dengan Allah SWT, manusia dengan sesama,
                        serta manusia dengan lingkungan dan kehidupan.
                    </p>

                    <p class="text-muted lh-lg mb-0 reveal">
                        Melalui pemahaman terhadap nilai-nilai tersebut,
                        kader diharapkan mampu mengembangkan sikap kritis,
                        bertanggung jawab, berkeislaman, dan memiliki
                        kepedulian terhadap persoalan masyarakat.
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- NILAI --}}

<section class="py-5 bg-white">

    <div class="container py-5">

        <div class="text-center mb-5 reveal">

            <span class="text-success fw-semibold text-uppercase small">
                Landasan Kader
            </span>

            <h2 class="display-6 fw-bold mt-2">
                Prinsip Perjuangan
            </h2>

            <p class="text-muted mt-3 mb-0">
                Nilai-nilai yang menjadi bagian penting dalam
                pembentukan karakter dan orientasi perjuangan kader HMI.
            </p>

        </div>


        <div class="row g-4">


            {{-- KETUHANAN --}}

            <div class="col-md-6 col-lg-4 reveal">

                <div
                    class="h-100 p-4 rounded-4 shadow-sm bg-white"
                    data-tilt
                >

                    <i
                        class="bi bi-stars text-success"
                        style="font-size:40px;"
                    ></i>

                    <h4 class="fw-bold mt-4">
                        Ketuhanan
                    </h4>

                    <p class="text-muted mb-0">
                        Menjadikan nilai keislaman sebagai dasar
                        dalam membangun sikap dan kehidupan kader.
                    </p>

                </div>

            </div>


            {{-- KEMANUSIAAN --}}

            <div class="col-md-6 col-lg-4 reveal">

                <div
                    class="h-100 p-4 rounded-4 shadow-sm bg-white"
                    data-tilt
                >

                    <i
                        class="bi bi-person-hearts text-success"
                        style="font-size:40px;"
                    ></i>

                    <h4 class="fw-bold mt-4">
                        Kemanusiaan
                    </h4>

                    <p class="text-muted mb-0">
                        Menumbuhkan kepedulian terhadap sesama
                        dan menjunjung tinggi martabat manusia.
                    </p>

                </div>

            </div>


            {{-- INTELEKTUALITAS --}}

            <div class="col-md-6 col-lg-4 reveal">

                <div
                    class="h-100 p-4 rounded-4 shadow-sm bg-white"
                    data-tilt
                >

                    <i
                        class="bi bi-lightbulb-fill text-success"
                        style="font-size:40px;"
                    ></i>

                    <h4 class="fw-bold mt-4">
                        Intelektualitas
                    </h4>

                    <p class="text-muted mb-0">
                        Mengembangkan kemampuan berpikir kritis,
                        ilmiah, dan bertanggung jawab.
                    </p>

                </div>

            </div>


            {{-- PERSAUDARAAN --}}

            <div class="col-md-6 col-lg-4 reveal">

                <div
                    class="h-100 p-4 rounded-4 shadow-sm bg-white"
                    data-tilt
                >

                    <i
                        class="bi bi-people-fill text-success"
                        style="font-size:40px;"
                    ></i>

                    <h4 class="fw-bold mt-4">
                        Persaudaraan
                    </h4>

                    <p class="text-muted mb-0">
                        Membangun hubungan yang dilandasi
                        ukhuwah dan kepedulian.
                    </p>

                </div>

            </div>


            {{-- KEBANGSAAN --}}

            <div class="col-md-6 col-lg-4 reveal">

                <div
                    class="h-100 p-4 rounded-4 shadow-sm bg-white"
                    data-tilt
                >

                    <i
                        class="bi bi-building-fill text-success"
                        style="font-size:40px;"
                    ></i>

                    <h4 class="fw-bold mt-4">
                        Kebangsaan
                    </h4>

                    <p class="text-muted mb-0">
                        Mengembangkan kepedulian terhadap kehidupan
                        masyarakat, bangsa, dan negara.
                    </p>

                </div>

            </div>


            {{-- PENGABDIAN --}}

            <div class="col-md-6 col-lg-4 reveal">

                <div
                    class="h-100 p-4 rounded-4 shadow-sm bg-white"
                    data-tilt
                >

                    <i
                        class="bi bi-hand-thumbs-up-fill text-success"
                        style="font-size:40px;"
                    ></i>

                    <h4 class="fw-bold mt-4">
                        Pengabdian
                    </h4>

                    <p class="text-muted mb-0">
                        Mendorong kader untuk memberikan manfaat
                        nyata bagi masyarakat.
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
                Nilai Dasar Perjuangan
            </span>

            <h2 class="fw-bold mt-2">
                Nilai sebagai Pedoman
            </h2>

            <p class="text-muted mt-3 mb-0">
                Nilai Dasar Perjuangan menjadi salah satu
                landasan dalam proses kaderisasi dan pengembangan
                kualitas kader HMI.
            </p>

        </div>

    </div>

</section>

@endsection
