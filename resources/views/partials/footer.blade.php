<footer class="footer-section mt-5">

    <div class="container py-5">

        <div class="row g-4">

            {{-- IDENTITAS HMI --}}
            <div class="col-lg-5">

                <div class="d-flex align-items-center gap-3 mb-3">

                    <img
                        src="{{ asset('images/logo-hmi.jpg') }}"
                        alt="Logo HMI Cabang Indramayu"
                        width="55"
                        height="55"
                        class="rounded"
                    >

                    <div>
                        <h5 class="fw-bold mb-0">
                            HMI Cabang Indramayu
                        </h5>

                        <small>
                            Himpunan Mahasiswa Islam
                        </small>
                    </div>

                </div>

                <p class="footer-description mb-0">
                    Website resmi Himpunan Mahasiswa Islam
                    Cabang Indramayu sebagai media informasi,
                    komunikasi, kaderisasi, dan dokumentasi organisasi.
                </p>

            </div>


            {{-- NAVIGASI --}}
            <div class="col-6 col-lg-2">

                <h6 class="fw-bold mb-3">
                    Navigasi
                </h6>

                <ul class="list-unstyled footer-links">

                    <li>
                        <a href="{{ route('home') }}">
                            Beranda
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('profil') }}">
                            Tentang HMI
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('berita.index') }}">
                            Berita
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('kegiatan.index') }}">
                            Kegiatan
                        </a>
                    </li>

                </ul>

            </div>


            {{-- ORGANISASI --}}
            <div class="col-6 col-lg-2">

                <h6 class="fw-bold mb-3">
                    Organisasi
                </h6>

                <ul class="list-unstyled footer-links">

                    <li>
                        <a href="{{ route('organisasi.index') }}">
                            Organisasi
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('kaderisasi') }}">
                            Kaderisasi
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('galeri.index') }}">
                            Galeri
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('kontak') }}">
                            Kontak
                        </a>
                    </li>

                </ul>

            </div>


            {{-- HUBUNGI KAMI --}}
            <div class="col-lg-3">

                <h6 class="fw-bold mb-3">
                    Hubungi Kami
                </h6>

                <p class="mb-2">
                    <i class="bi bi-geo-alt me-2"></i>
                    Indramayu, Jawa Barat
                </p>

                <p class="mb-2">
                    <i class="bi bi-envelope me-2"></i>
                    info@hmiindramayu.or.id
                </p>

                <div class="social-links mt-3">

                    <a
                        href="#"
                        aria-label="Instagram"
                        title="Instagram"
                    >
                        <i class="bi bi-instagram"></i>
                    </a>

                    <a
                        href="#"
                        aria-label="Facebook"
                        title="Facebook"
                    >
                        <i class="bi bi-facebook"></i>
                    </a>

                    <a
                        href="#"
                        aria-label="YouTube"
                        title="YouTube"
                    >
                        <i class="bi bi-youtube"></i>
                    </a>

                </div>

            </div>

        </div>

    </div>


    {{-- FOOTER BOTTOM --}}
    <div class="footer-bottom">

        <div class="container">

            <div class="d-flex flex-column flex-md-row
                        justify-content-between
                        align-items-center gap-2 py-3">

                <small>
                    © {{ date('Y') }} HMI Cabang Indramayu.
                    All rights reserved.
                </small>

                <small>
                    Himpunan Mahasiswa Islam
                </small>

            </div>

        </div>

    </div>

</footer>
