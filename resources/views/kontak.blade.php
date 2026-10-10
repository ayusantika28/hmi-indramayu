@extends('layouts.app')

@section('title', 'Kontak | HMI Cabang Indramayu')

@section(
    'description',
    'Informasi kontak dan media sosial HMI Cabang Indramayu.'
)

@section('content')


{{-- =========================================================
HERO KONTAK
========================================================= --}}

<section class="org-hero reveal">

    <div class="container">

        <div class="org-hero-content text-center">

            <span class="org-badge reveal">

                <i class="bi bi-chat-dots-fill"></i>

                Hubungi Kami

            </span>


            <h1 class="org-title reveal">

                Kontak

                <span>HMI Cabang Indramayu</span>

            </h1>


            <p class="org-description reveal">

                Terhubung dengan HMI Cabang Indramayu melalui
                alamat sekretariat, WhatsApp, email, dan media sosial resmi.

            </p>

        </div>

    </div>

</section>



{{-- =========================================================
INFORMASI KONTAK
========================================================= --}}

<section class="py-5">

    <div class="container py-5">


        {{-- =================================================
        HEADER
        ================================================== --}}

        <div class="text-center mb-5 reveal">

            <span class="text-success fw-semibold text-uppercase small">

                Informasi Kontak

            </span>


            <h2 class="display-6 fw-bold mt-2">

                Hubungi HMI Cabang Indramayu

            </h2>


            <p class="text-muted mb-0">

                Silakan hubungi kami melalui salah satu
                saluran komunikasi yang tersedia.

            </p>

        </div>



        {{-- =================================================
        CONTACT CARDS
        ================================================== --}}

        <div class="row g-4 justify-content-center">


            {{-- =================================================
            ALAMAT
            ================================================== --}}

            <div class="col-md-6 col-lg-4 reveal">

                <div
                    class="bg-white rounded-4 shadow-sm p-4 p-lg-5 h-100"
                    data-tilt
                >

                    <div
                        class="rounded-circle bg-success text-white
                               d-inline-flex align-items-center
                               justify-content-center mb-4"
                        style="width:65px;height:65px;"
                    >

                        <i
                            class="bi bi-geo-alt-fill"
                            style="font-size:30px;"
                        ></i>

                    </div>


                    <h4 class="fw-bold">

                        Alamat Sekretariat

                    </h4>


                    <p class="text-muted lh-lg mb-0">

                        Jl. Jenderal Sudirman No. 123,
                        Indramayu, Jawa Barat

                    </p>

                </div>

            </div>



            {{-- =================================================
            WHATSAPP
            ================================================== --}}

            <div class="col-md-6 col-lg-4 reveal">

                <div
                    class="bg-white rounded-4 shadow-sm p-4 p-lg-5 h-100"
                    data-tilt
                >

                    <div
                        class="rounded-circle bg-success text-white
                               d-inline-flex align-items-center
                               justify-content-center mb-4"
                        style="width:65px;height:65px;"
                    >

                        <i
                            class="bi bi-whatsapp"
                            style="font-size:30px;"
                        ></i>

                    </div>


                    <h4 class="fw-bold">

                        WhatsApp

                    </h4>


                    <p class="text-muted lh-lg mb-0">

                        +62 812-3456-7890

                    </p>

                </div>

            </div>



            {{-- =================================================
            EMAIL
            ================================================== --}}

            <div class="col-md-6 col-lg-4 reveal">

                <div
                    class="bg-white rounded-4 shadow-sm p-4 p-lg-5 h-100"
                    data-tilt
                >

                    <div
                        class="rounded-circle bg-success text-white
                               d-inline-flex align-items-center
                               justify-content-center mb-4"
                        style="width:65px;height:65px;"
                    >

                        <i
                            class="bi bi-envelope-fill"
                            style="font-size:30px;"
                        ></i>

                    </div>


                    <h4 class="fw-bold">

                        Email

                    </h4>


                    <p class="text-muted lh-lg mb-0">

                        info@hmiindramayu.or.id

                    </p>

                </div>

            </div>


        </div>

    </div>

</section>



{{-- =========================================================
MEDIA SOSIAL
========================================================= --}}

<section class="py-5 bg-white">

    <div class="container py-5">


        {{-- =================================================
        HEADER
        ================================================== --}}

        <div class="text-center mb-5 reveal">

            <span class="text-success fw-semibold text-uppercase small">

                Media Sosial

            </span>


            <h2 class="display-6 fw-bold mt-2">

                Ikuti HMI Cabang Indramayu

            </h2>


            <p class="text-muted mb-0">

                Dapatkan informasi terbaru mengenai kegiatan
                dan aktivitas HMI Cabang Indramayu.

            </p>

        </div>



        <div class="row g-4 justify-content-center">


            {{-- =================================================
            INSTAGRAM
            ================================================== --}}

            <div class="col-md-6 col-lg-4 reveal">

                <a
                    href="#"
                    class="text-decoration-none text-dark"
                >

                    <div
                        class="bg-light rounded-4 p-4
                               d-flex align-items-center
                               gap-3 h-100"
                        data-tilt
                    >

                        <div
                            class="rounded-circle bg-success text-white
                                   d-flex align-items-center
                                   justify-content-center flex-shrink-0"
                            style="width:60px;height:60px;"
                        >

                            <i
                                class="bi bi-instagram"
                                style="font-size:27px;"
                            ></i>

                        </div>


                        <div>

                            <h5 class="fw-bold mb-1">

                                Instagram

                            </h5>


                            <p class="text-muted mb-0">

                                @hmicabangindramayu

                            </p>

                        </div>

                    </div>

                </a>

            </div>



            {{-- =================================================
            FACEBOOK
            ================================================== --}}

            <div class="col-md-6 col-lg-4 reveal">

                <a
                    href="#"
                    class="text-decoration-none text-dark"
                >

                    <div
                        class="bg-light rounded-4 p-4
                               d-flex align-items-center
                               gap-3 h-100"
                        data-tilt
                    >

                        <div
                            class="rounded-circle bg-success text-white
                                   d-flex align-items-center
                                   justify-content-center flex-shrink-0"
                            style="width:60px;height:60px;"
                        >

                            <i
                                class="bi bi-facebook"
                                style="font-size:27px;"
                            ></i>

                        </div>


                        <div>

                            <h5 class="fw-bold mb-1">

                                Facebook

                            </h5>


                            <p class="text-muted mb-0">

                                HMI Cabang Indramayu

                            </p>

                        </div>

                    </div>

                </a>

            </div>



            {{-- =================================================
            YOUTUBE
            ================================================== --}}

            <div class="col-md-6 col-lg-4 reveal">

                <a
                    href="#"
                    class="text-decoration-none text-dark"
                >

                    <div
                        class="bg-light rounded-4 p-4
                               d-flex align-items-center
                               gap-3 h-100"
                        data-tilt
                    >

                        <div
                            class="rounded-circle bg-success text-white
                                   d-flex align-items-center
                                   justify-content-center flex-shrink-0"
                            style="width:60px;height:60px;"
                        >

                            <i
                                class="bi bi-youtube"
                                style="font-size:27px;"
                            ></i>

                        </div>


                        <div>

                            <h5 class="fw-bold mb-1">

                                YouTube

                            </h5>


                            <p class="text-muted mb-0">

                                HMI Cabang Indramayu

                            </p>

                        </div>

                    </div>

                </a>

            </div>


        </div>

    </div>

</section>



{{-- =========================================================
PESAN
========================================================= --}}

<section class="py-5">

    <div class="container py-5">

        <div class="row justify-content-center">

            <div class="col-lg-9 reveal">

                <div
                    class="bg-white rounded-4 shadow-sm
                           p-4 p-md-5 text-center"
                    data-tilt
                >

                    <div class="mb-4">

                        <div
                            class="rounded-circle bg-success text-white
                                   d-inline-flex align-items-center
                                   justify-content-center"
                            style="width:80px;height:80px;"
                        >

                            <i
                                class="bi bi-people-fill"
                                style="font-size:35px;"
                            ></i>

                        </div>

                    </div>


                    <h2 class="fw-bold">

                        Mari Terhubung

                    </h2>


                    <p class="text-muted lh-lg mb-0">

                        HMI Cabang Indramayu terbuka untuk komunikasi,
                        kolaborasi, diskusi, dan berbagai bentuk
                        kegiatan yang mendukung pengembangan mahasiswa,
                        kader, dan masyarakat.

                    </p>

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

                HMI Cabang Indramayu

            </span>


            <h2 class="fw-bold mt-2">

                Bersama Membangun Insan Cita

            </h2>


            <p class="text-muted mt-3 mb-0">

                Terhubung, berkolaborasi, dan bergerak bersama
                untuk memberikan manfaat bagi umat dan bangsa.

            </p>

        </div>

    </div>

</section>


@endsection
