@extends('layouts.admin')

@section('title', 'Dokumentasi Kegiatan')

@section('content')

<div class="container-fluid">

    {{-- =========================================================
         HEADER
    ========================================================== --}}

    <div class="d-flex flex-wrap justify-content-between
                align-items-center gap-3 mb-4">

        <div>

            <h4 class="fw-bold mb-1">
                Dokumentasi Kegiatan
            </h4>

            <p class="text-muted mb-0">
                Kelola dokumentasi untuk kegiatan:
                <strong>{{ $kegiatan->judul }}</strong>
            </p>

        </div>


        <a href="{{ route('admin.kegiatan.index') }}"
           class="btn btn-outline-secondary rounded-pill px-4">

            <i class="bi bi-arrow-left me-1"></i>

            Kembali

        </a>

    </div>


    {{-- =========================================================
         SUCCESS MESSAGE
    ========================================================== --}}

    @if(session('success'))

        <div class="alert alert-success border-0 shadow-sm rounded-3">

            <i class="bi bi-check-circle me-2"></i>

            {{ session('success') }}

        </div>

    @endif


    {{-- =========================================================
         ERROR MESSAGE
    ========================================================== --}}

    @if($errors->any())

        <div class="alert alert-danger border-0 shadow-sm rounded-3">

            <div class="fw-semibold mb-2">

                <i class="bi bi-exclamation-circle me-2"></i>

                Terjadi kesalahan:

            </div>

            <ul class="mb-0">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    <div class="row g-4">

        {{-- =====================================================
             UPLOAD DOKUMENTASI
        ====================================================== --}}

        <div class="col-lg-4">

            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-body p-4">

                    <h5 class="fw-bold mb-1">

                        <i class="bi bi-cloud-arrow-up me-2 text-success"></i>

                        Tambah Dokumentasi

                    </h5>

                    <p class="text-muted small mb-4">

                        Upload foto dokumentasi kegiatan.

                    </p>


                    <form
                        action="{{ route(
                            'admin.kegiatan.dokumentasi.store',
                            $kegiatan
                        ) }}"
                        method="POST"
                        enctype="multipart/form-data"
                    >

                        @csrf


                        {{-- GAMBAR --}}

                        <div class="mb-3">

                            <label class="form-label fw-semibold">

                                Gambar
                                <span class="text-danger">*</span>

                            </label>

                            <input
                                type="file"
                                name="gambar"
                                class="form-control"
                                accept=".jpg,.jpeg,.png,.webp"
                                required
                            >

                            <small class="text-muted">

                                JPG, JPEG, PNG atau WEBP.
                                Maksimal 5 MB.

                            </small>

                        </div>


                        {{-- CAPTION --}}

                        <div class="mb-3">

                            <label class="form-label fw-semibold">

                                Caption

                            </label>

                            <input
                                type="text"
                                name="caption"
                                class="form-control"
                                maxlength="255"
                                placeholder="Contoh: Pembukaan kegiatan"
                                value="{{ old('caption') }}"
                            >

                        </div>


                        {{-- URUTAN --}}

                        <div class="mb-4">

                            <label class="form-label fw-semibold">

                                Urutan

                            </label>

                            <input
                                type="number"
                                name="urutan"
                                class="form-control"
                                min="0"
                                value="{{ old('urutan', 0) }}"
                            >

                            <small class="text-muted">

                                Angka lebih kecil akan tampil lebih dahulu.

                            </small>

                        </div>


                        <button
                            type="submit"
                            class="btn btn-success rounded-pill px-4 w-100"
                        >

                            <i class="bi bi-upload me-1"></i>

                            Upload Dokumentasi

                        </button>

                    </form>

                </div>

            </div>

        </div>


        {{-- =====================================================
             DAFTAR DOKUMENTASI
        ====================================================== --}}

        <div class="col-lg-8">

            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-body p-4">

                    <div class="d-flex justify-content-between
                                align-items-center mb-4">

                        <div>

                            <h5 class="fw-bold mb-1">

                                Galeri Dokumentasi

                            </h5>

                            <p class="text-muted small mb-0">

                                {{ $dokumentasis->count() }}
                                dokumentasi

                            </p>

                        </div>

                    </div>


                    @if($dokumentasis->count())

                        <div class="row g-4">

                            @foreach($dokumentasis as $dokumentasi)

                                <div class="col-md-6">

                                    <div class="documentation-card">


                                        {{-- GAMBAR --}}

                                        <div class="documentation-image-wrapper">

                                            <img
                                                src="{{ asset(
                                                    'storage/' .
                                                    $dokumentasi->gambar
                                                ) }}"
                                                alt="{{ $dokumentasi->caption ?: 'Dokumentasi kegiatan' }}"
                                                class="documentation-image"
                                            >

                                            <div class="documentation-order">

                                                #{{ $dokumentasi->urutan }}

                                            </div>

                                        </div>


                                        {{-- CONTENT --}}

                                        <div class="p-3">

                                            <form
                                                action="{{ route(
                                                    'admin.kegiatan.dokumentasi.update',
                                                    [
                                                        'kegiatan' => $kegiatan,
                                                        'dokumentasi' => $dokumentasi
                                                    ]
                                                ) }}"
                                                method="POST"
                                            >

                                                @csrf

                                                @method('PUT')


                                                {{-- CAPTION --}}

                                                <div class="mb-2">

                                                    <label class="form-label
                                                                  small
                                                                  fw-semibold">

                                                        Caption

                                                    </label>

                                                    <input
                                                        type="text"
                                                        name="caption"
                                                        class="form-control form-control-sm"
                                                        maxlength="255"
                                                        value="{{ $dokumentasi->caption }}"
                                                        placeholder="Tambahkan caption"
                                                    >

                                                </div>


                                                {{-- URUTAN --}}

                                                <div class="mb-3">

                                                    <label class="form-label
                                                                  small
                                                                  fw-semibold">

                                                        Urutan

                                                    </label>

                                                    <input
                                                        type="number"
                                                        name="urutan"
                                                        class="form-control form-control-sm"
                                                        min="0"
                                                        value="{{ $dokumentasi->urutan }}"
                                                    >

                                                </div>


                                                <div class="d-flex gap-2">

                                                    {{-- UPDATE --}}

                                                    <button
                                                        type="submit"
                                                        class="btn btn-sm
                                                               btn-outline-success
                                                               rounded-pill
                                                               px-3"
                                                    >

                                                        <i class="bi bi-check-lg me-1"></i>

                                                        Simpan

                                                    </button>

                                            </form>


                                                    {{-- DELETE --}}

                                                    <form
                                                        action="{{ route(
                                                            'admin.kegiatan.dokumentasi.destroy',
                                                            [
                                                                'kegiatan' => $kegiatan,
                                                                'dokumentasi' => $dokumentasi
                                                            ]
                                                        ) }}"
                                                        method="POST"
                                                        onsubmit="return confirm(
                                                            'Yakin ingin menghapus dokumentasi ini?'
                                                        )"
                                                    >

                                                        @csrf

                                                        @method('DELETE')

                                                        <button
                                                            type="submit"
                                                            class="btn btn-sm
                                                                   btn-outline-danger
                                                                   rounded-pill
                                                                   px-3"
                                                        >

                                                            <i class="bi bi-trash me-1"></i>

                                                            Hapus

                                                        </button>

                                                    </form>

                                                </div>

                                        </div>

                                    </div>

                                </div>

                            @endforeach

                        </div>

                    @else

                        {{-- =================================================
                             EMPTY
                        ================================================== --}}

                        <div class="text-center py-5">

                            <i class="bi bi-images text-muted"
                               style="font-size: 55px;">
                            </i>

                            <h5 class="fw-bold mt-3">

                                Belum ada dokumentasi

                            </h5>

                            <p class="text-muted mb-0">

                                Upload foto dokumentasi kegiatan
                                menggunakan form di sebelah kiri.

                            </p>

                        </div>

                    @endif

                </div>

            </div>

        </div>

    </div>

</div>


{{-- =============================================================
     STYLE
============================================================= --}}

<style>

    /*
    |--------------------------------------------------------------
    | Documentation card
    |--------------------------------------------------------------
    */

    .documentation-card {

        border: 1px solid #e9ecef;

        border-radius: 16px;

        overflow: hidden;

        background: #fff;

        height: 100%;

    }


    /*
    |--------------------------------------------------------------
    | Image wrapper
    |--------------------------------------------------------------
    */

    .documentation-image-wrapper {

        position: relative;

        width: 100%;

        height: 220px;

        background: #f1f3f5;

        overflow: hidden;

    }


    /*
    |--------------------------------------------------------------
    | Image
    |--------------------------------------------------------------
    */

    .documentation-image {

        width: 100%;

        height: 100%;

        object-fit: cover;

        display: block;

    }


    /*
    |--------------------------------------------------------------
    | Order badge
    |--------------------------------------------------------------
    */

    .documentation-order {

        position: absolute;

        top: 12px;

        right: 12px;

        background: rgba(0, 0, 0, .65);

        color: #fff;

        padding: 5px 10px;

        border-radius: 20px;

        font-size: 12px;

        font-weight: 600;

    }


    /*
    |--------------------------------------------------------------
    | Mobile
    |--------------------------------------------------------------
    */

    @media (max-width: 768px) {

        .documentation-image-wrapper {

            height: 200px;

        }

    }

</style>

@endsection
