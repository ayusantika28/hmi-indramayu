@extends('layouts.app')

@section('title', 'Tambah Pengurus')

@section('content')

<div class="container py-5">

    {{-- HEADER --}}

    <div class="mb-4">

        <a href="{{ route('admin.organisasi.index') }}"
           class="text-decoration-none text-muted">

            <i class="bi bi-arrow-left me-1"></i>

            Kembali ke Organisasi

        </a>

        <h1 class="fw-bold mt-3 mb-1">
            Tambah Pengurus
        </h1>

        <p class="text-muted mb-0">
            Tambahkan data pengurus HMI Cabang Indramayu.
        </p>

    </div>


    {{-- ERROR VALIDATION --}}

    @if($errors->any())

        <div class="alert alert-danger">

            <strong>
                Data belum dapat disimpan.
            </strong>

            <ul class="mb-0 mt-2">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    {{-- FORM --}}

    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body p-4 p-md-5">

            <form action="{{ route('admin.organisasi.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf


                {{-- NAMA --}}

                <div class="mb-4">

                    <label for="nama"
                           class="form-label fw-semibold">

                        Nama Pengurus
                        <span class="text-danger">*</span>

                    </label>

                    <input type="text"
                           id="nama"
                           name="nama"
                           value="{{ old('nama') }}"
                           class="form-control form-control-lg"
                           placeholder="Masukkan nama lengkap"
                           required>

                </div>


                {{-- JABATAN --}}

                <div class="mb-4">

                    <label for="jabatan"
                           class="form-label fw-semibold">

                        Jabatan
                        <span class="text-danger">*</span>

                    </label>

                    <input type="text"
                           id="jabatan"
                           name="jabatan"
                           value="{{ old('jabatan') }}"
                           class="form-control form-control-lg"
                           placeholder="Contoh: Ketua Umum"
                           required>

                </div>


                {{-- BIDANG --}}

                <div class="mb-4">

                    <label for="bidang"
                           class="form-label fw-semibold">

                        Bidang

                    </label>

                    <input type="text"
                           id="bidang"
                           name="bidang"
                           value="{{ old('bidang') }}"
                           class="form-control form-control-lg"
                           placeholder="Contoh: Bidang Organisasi">

                    <div class="form-text">
                        Kosongkan jika jabatan tidak memiliki bidang.
                    </div>

                </div>


                {{-- PERIODE --}}

                <div class="mb-4">

                    <label for="periode"
                           class="form-label fw-semibold">

                        Periode Kepengurusan

                    </label>

                    <input type="text"
                           id="periode"
                           name="periode"
                           value="{{ old('periode') }}"
                           class="form-control form-control-lg"
                           placeholder="Contoh: 2025 - 2026">

                </div>


                {{-- URUTAN --}}

                <div class="mb-4">

                    <label for="urutan"
                           class="form-label fw-semibold">

                        Urutan Tampilan

                    </label>

                    <input type="number"
                           id="urutan"
                           name="urutan"
                           value="{{ old('urutan', 0) }}"
                           class="form-control form-control-lg"
                           min="0">

                    <div class="form-text">
                        Angka lebih kecil akan tampil lebih dahulu.
                    </div>

                </div>


                {{-- FOTO --}}

                <div class="mb-4">

                    <label for="foto"
                           class="form-label fw-semibold">

                        Foto Pengurus

                    </label>

                    <input type="file"
                           id="foto"
                           name="foto"
                           class="form-control form-control-lg"
                           accept=".jpg,.jpeg,.png,.webp">

                    <div class="form-text">
                        Format JPG, JPEG, PNG atau WEBP. Maksimal 5 MB.
                    </div>

                </div>


                {{-- STATUS --}}

                <div class="mb-4">

                    <div class="form-check form-switch">

                        <input class="form-check-input"
                               type="checkbox"
                               role="switch"
                               id="status"
                               name="status"
                               value="1"
                               {{ old('status', true) ? 'checked' : '' }}>

                        <label class="form-check-label fw-semibold"
                               for="status">

                            Pengurus Aktif

                        </label>

                    </div>

                </div>


                {{-- BUTTON --}}

                <div class="d-flex flex-wrap gap-2 pt-3">

                    <button type="submit"
                            class="btn btn-success rounded-pill px-4">

                        <i class="bi bi-save me-2"></i>

                        Simpan Pengurus

                    </button>

                    <a href="{{ route('admin.organisasi.index') }}"
                       class="btn btn-outline-secondary rounded-pill px-4">

                        Batal

                    </a>

                </div>


            </form>

        </div>

    </div>

</div>

@endsection
