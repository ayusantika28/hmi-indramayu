@extends('layouts.app')

@section('title', 'Pendaftaran - ' . $kegiatan->judul)

@section('content')

<div class="container py-5">

    {{-- HEADER --}}
    <div class="mb-4">

        <a href="{{ url()->previous() }}"
           class="text-decoration-none text-muted">

            <i class="bi bi-arrow-left me-1"></i>

            Kembali ke Kegiatan

        </a>

    </div>


    <div class="row g-4 justify-content-center">

        {{-- INFORMASI KEGIATAN --}}
        <div class="col-lg-5">

            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">

                @if($kegiatan->gambar)

                    <img src="{{ asset('storage/' . $kegiatan->gambar) }}"
                         alt="{{ $kegiatan->judul }}"
                         class="w-100"
                         style="height:260px; object-fit:cover;">

                @else

                    <div class="bg-light d-flex align-items-center justify-content-center"
                         style="height:260px;">

                        <i class="bi bi-calendar-event text-muted"
                           style="font-size:70px;"></i>

                    </div>

                @endif


                <div class="card-body p-4">

                    <span class="badge bg-success rounded-pill mb-3">

                        {{ $kegiatan->kategori }}

                    </span>


                    <h3 class="fw-bold mb-3">

                        {{ $kegiatan->judul }}

                    </h3>


                    @if($kegiatan->excerpt)

                        <p class="text-muted">

                            {{ $kegiatan->excerpt }}

                        </p>

                    @endif


                    <hr>


                    {{-- TANGGAL --}}
                    <div class="d-flex gap-3 mb-3">

                        <div class="text-success">

                            <i class="bi bi-calendar3 fs-5"></i>

                        </div>

                        <div>

                            <small class="text-muted d-block">
                                Tanggal Kegiatan
                            </small>

                            <strong>
                                {{ $kegiatan->tanggal?->translatedFormat('d F Y') }}
                            </strong>

                        </div>

                    </div>


                    {{-- LOKASI --}}
                    @if($kegiatan->lokasi)

                        <div class="d-flex gap-3 mb-3">

                            <div class="text-success">

                                <i class="bi bi-geo-alt fs-5"></i>

                            </div>

                            <div>

                                <small class="text-muted d-block">
                                    Lokasi
                                </small>

                                <strong>
                                    {{ $kegiatan->lokasi }}
                                </strong>

                            </div>

                        </div>

                    @endif


                    {{-- KUOTA --}}
                    @if(!is_null($kegiatan->kuota))

                        <div class="d-flex gap-3">

                            <div class="text-success">

                                <i class="bi bi-people fs-5"></i>

                            </div>

                            <div>

                                <small class="text-muted d-block">
                                    Kuota Peserta
                                </small>

                                <strong>

                                    {{ $kegiatan->pendaftarans()->count() }}
                                    /
                                    {{ $kegiatan->kuota }}
                                    Peserta

                                </strong>

                            </div>

                        </div>

                    @endif

                </div>

            </div>

        </div>


        {{-- FORM --}}
        <div class="col-lg-7">

            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-body p-4 p-md-5">

                    <div class="mb-4">

                        <h3 class="fw-bold mb-1">

                            Form Pendaftaran

                        </h3>

                        <p class="text-muted mb-0">

                            Silakan lengkapi data diri Anda.

                        </p>

                    </div>


                    {{-- ERROR --}}
                    @if($errors->any())

                        <div class="alert alert-danger rounded-3">

                            <strong>
                                Pendaftaran belum dapat diproses.
                            </strong>

                            <ul class="mb-0 mt-2">

                                @foreach($errors->all() as $error)

                                    <li>
                                        {{ $error }}
                                    </li>

                                @endforeach

                            </ul>

                        </div>

                    @endif


                    <form action="{{ route('pendaftaran.store', $kegiatan) }}"
                          method="POST">

                        @csrf


                        {{-- NAMA --}}
                        <div class="mb-4">

                            <label for="nama"
                                   class="form-label fw-semibold">

                                Nama Lengkap
                                <span class="text-danger">*</span>

                            </label>

                            <input type="text"
                                   id="nama"
                                   name="nama"
                                   value="{{ old('nama') }}"
                                   class="form-control form-control-lg @error('nama') is-invalid @enderror"
                                   placeholder="Masukkan nama lengkap"
                                   required>

                            @error('nama')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        {{-- EMAIL --}}
                        <div class="mb-4">

                            <label for="email"
                                   class="form-label fw-semibold">

                                Email
                                <span class="text-danger">*</span>

                            </label>

                            <input type="email"
                                   id="email"
                                   name="email"
                                   value="{{ old('email') }}"
                                   class="form-control form-control-lg @error('email') is-invalid @enderror"
                                   placeholder="nama@email.com"
                                   required>

                            @error('email')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        {{-- NO HP --}}
                        <div class="mb-4">

                            <label for="no_hp"
                                   class="form-label fw-semibold">

                                Nomor WhatsApp
                                <span class="text-danger">*</span>

                            </label>

                            <input type="text"
                                   id="no_hp"
                                   name="no_hp"
                                   value="{{ old('no_hp') }}"
                                   class="form-control form-control-lg @error('no_hp') is-invalid @enderror"
                                   placeholder="Contoh: 081234567890"
                                   required>

                            @error('no_hp')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        {{-- INSTANSI --}}
                        <div class="mb-4">

                            <label for="instansi"
                                   class="form-label fw-semibold">

                                Asal Komisariat / Instansi

                                <span class="text-muted fw-normal">
                                    (Opsional)
                                </span>

                            </label>

                            <input type="text"
                                   id="instansi"
                                   name="instansi"
                                   value="{{ old('instansi') }}"
                                   class="form-control form-control-lg @error('instansi') is-invalid @enderror"
                                   placeholder="Contoh: HMI Komisariat ..."
                                   >

                            @error('instansi')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        {{-- KETERANGAN --}}
                        <div class="mb-4">

                            <label for="keterangan"
                                   class="form-label fw-semibold">

                                Keterangan

                                <span class="text-muted fw-normal">
                                    (Opsional)
                                </span>

                            </label>

                            <textarea id="keterangan"
                                      name="keterangan"
                                      rows="4"
                                      class="form-control @error('keterangan') is-invalid @enderror"
                                      placeholder="Tuliskan keterangan jika diperlukan...">{{ old('keterangan') }}</textarea>

                            @error('keterangan')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        {{-- PERSETUJUAN --}}
                        <div class="alert alert-light border rounded-3 mb-4">

                            <div class="d-flex gap-2">

                                <i class="bi bi-info-circle text-success"></i>

                                <small class="text-muted">

                                    Pastikan data yang Anda masukkan sudah benar.
                                    Email yang sama tidak dapat digunakan untuk
                                    mendaftar dua kali pada kegiatan ini.

                                </small>

                            </div>

                        </div>


                        {{-- SUBMIT --}}
                        <button type="submit"
                                class="btn btn-success rounded-pill w-100 py-3 fw-semibold">

                            <i class="bi bi-person-plus me-2"></i>

                            Daftar Sekarang

                        </button>


                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection

