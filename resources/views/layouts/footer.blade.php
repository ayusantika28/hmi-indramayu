<footer class="bg-dark text-white mt-5">

    <div class="container py-5">

        <div class="row g-4">

            <div class="col-md-6">

                <h5 class="fw-bold">
                    HMI Cabang Indramayu
                </h5>

                <p class="text-white-50 mb-0">
                    Himpunan Mahasiswa Islam
                    Cabang Indramayu.
                </p>

            </div>


            <div class="col-md-3">

                <h6 class="fw-bold">
                    Navigasi
                </h6>

                <ul class="list-unstyled">
                    <li class="mb-2">
                        <a href="{{ route('home') }}"
                           class="text-white-50 text-decoration-none">
                            Beranda
                        </a>
                    </li>

                    <li class="mb-2">
                        <a href="{{ route('berita.index') }}"
                           class="text-white-50 text-decoration-none">
                            Berita
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('organisasi.index') }}"
                           class="text-white-50 text-decoration-none">
                            Organisasi
                        </a>
                    </li>

                </ul>

            </div>

            <div class="col-md-3">

                <h6 class="fw-bold">
                    Ikuti Kami
                </h6>

                <div class="d-flex gap-3">

                    <a href="#" class="text-white fs-5">
                        <i class="bi bi-facebook"></i>
                    </a>

                    <a href="#" class="text-white fs-5">
                        <i class="bi bi-instagram"></i>
                    </a>

                    <a href="#" class="text-white fs-5">
                        <i class="bi bi-youtube"></i>
                    </a>

                </div>

            </div>

        </div>


        <hr class="border-secondary my-4">


        <div class="text-center text-white-50">
            © {{ date('Y') }}
            HMI Cabang Indramayu.
            All rights reserved.
        </div>

    </div>

</footer>
