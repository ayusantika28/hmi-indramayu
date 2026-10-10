
@extends('layouts.admin')

@section('title', 'Tambah Kegiatan')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="mb-4">

        <a href="{{ route('admin.kegiatan.index') }}"
           class="text-decoration-none text-muted">

            <i class="bi bi-arrow-left me-1"></i>

            Kembali ke Kegiatan

        </a>

        <h4 class="fw-bold mt-3 mb-1">
            Tambah Kegiatan
        </h4>

        <p class="text-muted mb-0">
            Tambahkan informasi kegiatan HMI Cabang Indramayu.
        </p>

    </div>


    {{-- ERROR --}}
    @if($errors->any())

        <div class="alert alert-danger border-0 rounded-3">

            <div class="fw-semibold mb-2">
                Data belum dapat disimpan.
            </div>

            <ul class="mb-0">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    {{-- FORM --}}
    <form action="{{ route('admin.kegiatan.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf


        <div class="row g-4">

            {{-- ==================================================
                 KOLOM UTAMA
            =================================================== --}}

            <div class="col-lg-8">

                <div class="card border-0 shadow-sm rounded-4">

                    <div class="card-body p-4">

                        <h5 class="fw-bold mb-4">
                            Informasi Kegiatan
                        </h5>


                        {{-- JUDUL --}}
                        <div class="mb-4">

                            <label for="judul"
                                   class="form-label fw-semibold">

                                Judul Kegiatan
                                <span class="text-danger">*</span>

                            </label>

                            <input type="text"
                                   id="judul"
                                   name="judul"
                                   value="{{ old('judul') }}"
                                   class="form-control form-control-lg"
                                   placeholder="Contoh: Seminar Kepemudaan HMI"
                                   required>

                        </div>


                        {{-- KATEGORI --}}
                        <div class="mb-4">

                            <label for="kategori"
                                   class="form-label fw-semibold">

                                Kategori Kegiatan
                                <span class="text-danger">*</span>

                            </label>

                            <select id="kategori"
                                    name="kategori"
                                    class="form-select form-select-lg"
                                    required>

                                <option value="">
                                    -- Pilih Kategori --
                                </option>

                                @foreach($kategoriKegiatan as $kategori)

                                    <option value="{{ $kategori }}"
                                        @selected(old('kategori') === $kategori)>

                                        {{ $kategori }}

                                    </option>

                                @endforeach

                            </select>

                            <div class="form-text">
                                Pilih kategori yang paling sesuai dengan kegiatan.
                            </div>

                        </div>


                        {{-- RINGKASAN --}}
                        <div class="mb-4">

                            <label for="excerpt"
                                   class="form-label fw-semibold">

                                Ringkasan

                            </label>

                            <textarea id="excerpt"
                                      name="excerpt"
                                      rows="3"
                                      class="form-control"
                                      placeholder="Ringkasan singkat kegiatan yang akan ditampilkan di halaman daftar kegiatan.">{{ old('excerpt') }}</textarea>

                        </div>


                        {{-- KONTEN --}}
                        <div class="mb-3">

                            <label for="konten"
                                   class="form-label fw-semibold">

                                Isi Kegiatan
                                <span class="text-danger">*</span>

                            </label>

                            <textarea id="konten"
                                      name="konten"
                                      rows="12"
                                      class="form-control"
                                      placeholder="Tuliskan informasi lengkap mengenai kegiatan..."
                                      required>{{ old('konten') }}</textarea>

                        </div>

                    </div>

                </div>


                {{-- ==================================================
                     PENDAFTARAN
                =================================================== --}}

                <div class="card border-0 shadow-sm rounded-4 mt-4">

                    <div class="card-body p-4">

                        <div class="d-flex align-items-start gap-3 mb-4">

                            <div class="bg-success-subtle text-success
                                        rounded-3 d-flex
                                        align-items-center
                                        justify-content-center"
                                 style="width:45px;height:45px;">

                                <i class="bi bi-person-plus fs-5"></i>

                            </div>

                            <div>

                                <h5 class="fw-bold mb-1">
                                    Pendaftaran Peserta
                                </h5>

                                <p class="text-muted mb-0">
                                    Aktifkan jika kegiatan menerima pendaftaran peserta.
                                </p>

                            </div>

                        </div>


                        {{-- AKTIF --}}
                        <div class="mb-4">

                            <div class="form-check form-switch">

                                <input type="hidden"
                                       name="pendaftaran_aktif"
                                       value="0">

                                <input class="form-check-input"
                                       type="checkbox"
                                       role="switch"
                                       id="pendaftaran_aktif"
                                       name="pendaftaran_aktif"
                                       value="1"
                                       {{ old('pendaftaran_aktif') ? 'checked' : '' }}>

                                <label class="form-check-label fw-semibold"
                                       for="pendaftaran_aktif">

                                    Buka pendaftaran peserta

                                </label>

                            </div>

                        </div>


                        <div class="row g-3">

                            {{-- MULAI --}}
                            <div class="col-md-6">

                                <label for="tanggal_mulai_pendaftaran"
                                       class="form-label fw-semibold">

                                    Mulai Pendaftaran

                                </label>

                                <input type="datetime-local"
                                       id="tanggal_mulai_pendaftaran"
                                       name="tanggal_mulai_pendaftaran"
                                       class="form-control"
                                       value="{{ old('tanggal_mulai_pendaftaran') }}">

                            </div>


                            {{-- SELESAI --}}
                            <div class="col-md-6">

                                <label for="tanggal_selesai_pendaftaran"
                                       class="form-label fw-semibold">

                                    Batas Pendaftaran

                                </label>

                                <input type="datetime-local"
                                       id="tanggal_selesai_pendaftaran"
                                       name="tanggal_selesai_pendaftaran"
                                       class="form-control"
                                       value="{{ old('tanggal_selesai_pendaftaran') }}">

                            </div>


                            {{-- KUOTA --}}
                            <div class="col-md-6">

                                <label for="kuota"
                                       class="form-label fw-semibold">

                                    Kuota Peserta

                                </label>

                                <input type="number"
                                       id="kuota"
                                       name="kuota"
                                       class="form-control"
                                       min="1"
                                       placeholder="Contoh: 100"
                                       value="{{ old('kuota') }}">

                                <div class="form-text">
                                    Kosongkan jika tidak ada batas kuota.
                                </div>

                            </div>


                            {{-- LINK --}}
                            <div class="col-md-6">

                                <label for="link_pendaftaran"
                                       class="form-label fw-semibold">

                                    Link Pendaftaran
                                    <span class="text-muted fw-normal">
                                        (Opsional)
                                    </span>

                                </label>

                                <input type="url"
                                       id="link_pendaftaran"
                                       name="link_pendaftaran"
                                       class="form-control"
                                       placeholder="https://..."
                                       value="{{ old('link_pendaftaran') }}">

                                <div class="form-text">
                                    Digunakan jika pendaftaran dilakukan melalui layanan eksternal.
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- ==================================================
                 SIDEBAR
            =================================================== --}}

            <div class="col-lg-4">

                {{-- DETAIL --}}
                <div class="card border-0 shadow-sm rounded-4">

                    <div class="card-body p-4">

                        <h5 class="fw-bold mb-4">
                            Detail Kegiatan
                        </h5>


                        {{-- TANGGAL --}}
                        <div class="mb-4">

                            <label for="tanggal"
                                   class="form-label fw-semibold">

                                Tanggal Kegiatan
                                <span class="text-danger">*</span>

                            </label>

                            <input type="date"
                                   id="tanggal"
                                   name="tanggal"
                                   class="form-control"
                                   value="{{ old('tanggal') }}"
                                   required>

                        </div>


                        {{-- LOKASI --}}
                        <div class="mb-4">

                            <label for="lokasi"
                                   class="form-label fw-semibold">

                                Lokasi

                            </label>

                            <input type="text"
                                   id="lokasi"
                                   name="lokasi"
                                   class="form-control"
                                   placeholder="Contoh: Sekretariat HMI Cabang Indramayu"
                                   value="{{ old('lokasi') }}">

                        </div>


                        {{-- STATUS --}}
                        <div class="mb-4">

                            <label for="status"
                                   class="form-label fw-semibold">

                                Status Publikasi
                                <span class="text-danger">*</span>

                            </label>

                            <select id="status"
                                    name="status"
                                    class="form-select"
                                    required>

                                <option value="published"
                                    @selected(old('status', 'published') === 'published')>

                                    Published

                                </option>

                                <option value="draft"
                                    @selected(old('status') === 'draft')>

                                    Draft

                                </option>

                            </select>

                            <div class="form-text">
                                Draft tidak akan ditampilkan kepada pengunjung.
                            </div>

                        </div>


                        {{-- GAMBAR --}}
                        <div class="mb-3">

                            <label for="gambar"
                                   class="form-label fw-semibold">

                                Gambar Kegiatan

                            </label>

                            <input type="file"
                                   id="gambar"
                                   name="gambar"
                                   class="form-control"
                                   accept=".jpg,.jpeg,.png,.webp">

                            <div class="form-text">
                                JPG, JPEG, PNG atau WEBP. Maksimal 5 MB.
                            </div>

                        </div>

                    </div>

                </div>


                {{-- BUTTON --}}
                <div class="card border-0 shadow-sm rounded-4 mt-4">

                    <div class="card-body p-4">

                        <button type="submit"
                                class="btn btn-success rounded-pill w-100 py-2">

                            <i class="bi bi-save me-2"></i>

                            Simpan Kegiatan

                        </button>


                        <a href="{{ route('admin.kegiatan.index') }}"
                           class="btn btn-outline-secondary rounded-pill w-100 mt-2 py-2">

                            Batal

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </form>

</div>

@endsection
