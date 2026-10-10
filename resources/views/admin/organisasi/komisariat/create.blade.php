@extends('layouts.admin')


@section('title', 'Tambah Komisariat')

@section('content')

<div class="pc-container">
    <div class="pc-content">

        {{-- HEADER --}}
        <div class="page-header">
            <div class="page-block">

                <div class="row align-items-center">

                    <div class="col-md-8">

                        <div class="page-header-title">

                            <h5 class="m-b-10">
                                Tambah Komisariat
                            </h5>

                            <p class="m-b-0">
                                Tambahkan data komisariat baru.
                            </p>

                        </div>

                    </div>

                    <div class="col-md-4 text-md-end mt-3 mt-md-0">

                        <a href="{{ route('admin.komisariat.index') }}"
                           class="btn btn-light">

                            <i class="ti ti-arrow-left me-1"></i>

                            Kembali

                        </a>

                    </div>

                </div>

            </div>
        </div>


        {{-- VALIDATION ERROR --}}

        @if($errors->any())

            <div class="alert alert-danger">

                <strong>
                    Terdapat kesalahan:
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


        <form
            action="{{ route('admin.komisariat.store') }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf


            <div class="row">


                {{-- INFORMASI UTAMA --}}
                <div class="col-lg-8">

                    <div class="card">

                        <div class="card-header">

                            <h5 class="mb-0">
                                Informasi Komisariat
                            </h5>

                        </div>

                        <div class="card-body">

                            {{-- NAMA --}}
                            <div class="mb-3">

                                <label class="form-label">
                                    Nama Komisariat
                                    <span class="text-danger">*</span>
                                </label>

                                <input
                                    type="text"
                                    name="nama"
                                    value="{{ old('nama') }}"
                                    class="form-control @error('nama') is-invalid @enderror"
                                    placeholder="Contoh: Komisariat HMI Universitas Wiralodra"
                                    required
                                >

                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>


                            {{-- SLUG --}}
                            <div class="mb-3">

                                <label class="form-label">
                                    Slug
                                </label>

                                <input
                                    type="text"
                                    name="slug"
                                    value="{{ old('slug') }}"
                                    class="form-control @error('slug') is-invalid @enderror"
                                    placeholder="Otomatis jika dikosongkan"
                                >

                                <small class="text-muted">
                                    Bisa dikosongkan. Slug akan dibuat otomatis dari nama komisariat.
                                </small>

                                @error('slug')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>


                            <div class="row">

                                {{-- PERGURUAN TINGGI --}}
                                <div class="col-md-6 mb-3">

                                    <label class="form-label">
                                        Perguruan Tinggi
                                    </label>

                                    <input
                                        type="text"
                                        name="perguruan_tinggi"
                                        value="{{ old('perguruan_tinggi') }}"
                                        class="form-control"
                                        placeholder="Nama universitas/kampus"
                                    >

                                </div>


                                {{-- FAKULTAS --}}
                                <div class="col-md-6 mb-3">

                                    <label class="form-label">
                                        Fakultas
                                    </label>

                                    <input
                                        type="text"
                                        name="fakultas"
                                        value="{{ old('fakultas') }}"
                                        class="form-control"
                                        placeholder="Opsional"
                                    >

                                </div>

                            </div>


                            {{-- ALAMAT --}}
                            <div class="mb-3">

                                <label class="form-label">
                                    Alamat / Sekretariat
                                </label>

                                <textarea
                                    name="alamat"
                                    rows="3"
                                    class="form-control"
                                    placeholder="Alamat sekretariat komisariat"
                                >{{ old('alamat') }}</textarea>

                            </div>


                            <div class="row">

                                {{-- KETUA --}}
                                <div class="col-md-6 mb-3">

                                    <label class="form-label">
                                        Ketua Komisariat
                                    </label>

                                    <input
                                        type="text"
                                        name="ketua"
                                        value="{{ old('ketua') }}"
                                        class="form-control"
                                        placeholder="Nama ketua komisariat"
                                    >

                                </div>


                                {{-- PERIODE --}}
                                <div class="col-md-6 mb-3">

                                    <label class="form-label">
                                        Periode Kepengurusan
                                    </label>

                                    <input
                                        type="text"
                                        name="periode"
                                        value="{{ old('periode') }}"
                                        class="form-control"
                                        placeholder="Contoh: 2026-2027"
                                    >

                                </div>

                            </div>


                            {{-- JUMLAH ANGGOTA --}}
                            <div class="mb-3">

                                <label class="form-label">
                                    Jumlah Anggota
                                    <span class="text-danger">*</span>
                                </label>

                                <input
                                    type="number"
                                    name="jumlah_anggota"
                                    value="{{ old('jumlah_anggota', 0) }}"
                                    min="0"
                                    class="form-control"
                                    required
                                >

                            </div>


                            {{-- DESKRIPSI --}}
                            <div class="mb-3">

                                <label class="form-label">
                                    Deskripsi Komisariat
                                </label>

                                <textarea
                                    name="deskripsi"
                                    rows="6"
                                    class="form-control"
                                    placeholder="Tuliskan profil singkat komisariat..."
                                >{{ old('deskripsi') }}</textarea>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- SIDEBAR --}}
                <div class="col-lg-4">


                    {{-- LOGO --}}
                    <div class="card">

                        <div class="card-header">

                            <h5 class="mb-0">
                                Logo Komisariat
                            </h5>

                        </div>

                        <div class="card-body">

                            <input
                                type="file"
                                name="logo"
                                class="form-control @error('logo') is-invalid @enderror"
                                accept=".jpg,.jpeg,.png,.webp"
                            >

                            <small class="text-muted d-block mt-2">
                                JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
                            </small>

                            @error('logo')
                                <div class="text-danger small mt-1">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                    </div>


                    {{-- KONTAK --}}
                    <div class="card">

                        <div class="card-header">

                            <h5 class="mb-0">
                                Kontak
                            </h5>

                        </div>

                        <div class="card-body">

                            <div class="mb-3">

                                <label class="form-label">
                                    Telepon / WhatsApp
                                </label>

                                <input
                                    type="text"
                                    name="telepon"
                                    value="{{ old('telepon') }}"
                                    class="form-control"
                                    placeholder="08xxxxxxxxxx"
                                >

                            </div>


                            <div class="mb-3">

                                <label class="form-label">
                                    Email
                                </label>

                                <input
                                    type="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    class="form-control"
                                    placeholder="email@example.com"
                                >

                            </div>


                            <div class="mb-0">

                                <label class="form-label">
                                    Instagram
                                </label>

                                <input
                                    type="text"
                                    name="instagram"
                                    value="{{ old('instagram') }}"
                                    class="form-control"
                                    placeholder="@username"
                                >

                            </div>

                        </div>

                    </div>


                    {{-- PENGATURAN --}}
                    <div class="card">

                        <div class="card-header">

                            <h5 class="mb-0">
                                Pengaturan
                            </h5>

                        </div>

                        <div class="card-body">

                            <div class="mb-3">

                                <label class="form-label">
                                    Urutan Tampilan
                                </label>

                                <input
                                    type="number"
                                    name="urutan"
                                    value="{{ old('urutan', 0) }}"
                                    min="0"
                                    class="form-control"
                                >

                            </div>


                            <div class="form-check form-switch">

                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    name="status"
                                    value="1"
                                    id="status"
                                    {{ old('status', true) ? 'checked' : '' }}
                                >

                                <label
                                    class="form-check-label"
                                    for="status"
                                >
                                    Komisariat Aktif
                                </label>

                            </div>

                        </div>

                    </div>


                    {{-- SUBMIT --}}
                    <div class="d-grid gap-2">

                        <button
                            type="submit"
                            class="btn btn-primary"
                        >

                            <i class="ti ti-device-floppy me-1"></i>

                            Simpan Komisariat

                        </button>


                        <a
                            href="{{ route('admin.komisariat.index') }}"
                            class="btn btn-light"
                        >

                            Batal

                        </a>

                    </div>


                </div>

            </div>

        </form>

    </div>
</div>

@endsection
