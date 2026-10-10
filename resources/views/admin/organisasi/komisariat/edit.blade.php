@extends('layouts.admin')
@extends('layouts.admin')

@section('title', 'Edit Komisariat')

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
                                Edit Komisariat
                            </h5>

                            <p class="m-b-0">
                                Perbarui data komisariat HMI Cabang Indramayu.
                            </p>

                        </div>

                    </div>

                    <div class="col-md-4 text-md-end mt-3 mt-md-0">

                        <a
                            href="{{ route('admin.komisariat.index') }}"
                            class="btn btn-light"
                        >

                            <i class="ti ti-arrow-left me-1"></i>

                            Kembali

                        </a>

                    </div>

                </div>

            </div>
        </div>


        @if($errors->any())

            <div class="alert alert-danger">

                <strong>
                    Terdapat kesalahan:
                </strong>

                <ul class="mb-0 mt-2">

                    @foreach($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif


        <form
            action="{{ route('admin.komisariat.update', $komisariat) }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf
            @method('PUT')


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

                            <div class="mb-3">

                                <label class="form-label">
                                    Nama Komisariat
                                    <span class="text-danger">*</span>
                                </label>

                                <input
                                    type="text"
                                    name="nama"
                                    value="{{ old('nama', $komisariat->nama) }}"
                                    class="form-control @error('nama') is-invalid @enderror"
                                    required
                                >

                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>


                            <div class="mb-3">

                                <label class="form-label">
                                    Slug
                                </label>

                                <input
                                    type="text"
                                    name="slug"
                                    value="{{ old('slug', $komisariat->slug) }}"
                                    class="form-control @error('slug') is-invalid @enderror"
                                >

                                @error('slug')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>


                            <div class="row">

                                <div class="col-md-6 mb-3">

                                    <label class="form-label">
                                        Perguruan Tinggi
                                    </label>

                                    <input
                                        type="text"
                                        name="perguruan_tinggi"
                                        value="{{ old('perguruan_tinggi', $komisariat->perguruan_tinggi) }}"
                                        class="form-control"
                                    >

                                </div>


                                <div class="col-md-6 mb-3">

                                    <label class="form-label">
                                        Fakultas
                                    </label>

                                    <input
                                        type="text"
                                        name="fakultas"
                                        value="{{ old('fakultas', $komisariat->fakultas) }}"
                                        class="form-control"
                                    >

                                </div>

                            </div>


                            <div class="mb-3">

                                <label class="form-label">
                                    Alamat / Sekretariat
                                </label>

                                <textarea
                                    name="alamat"
                                    rows="3"
                                    class="form-control"
                                >{{ old('alamat', $komisariat->alamat) }}</textarea>

                            </div>


                            <div class="row">

                                <div class="col-md-6 mb-3">

                                    <label class="form-label">
                                        Ketua Komisariat
                                    </label>

                                    <input
                                        type="text"
                                        name="ketua"
                                        value="{{ old('ketua', $komisariat->ketua) }}"
                                        class="form-control"
                                    >

                                </div>


                                <div class="col-md-6 mb-3">

                                    <label class="form-label">
                                        Periode Kepengurusan
                                    </label>

                                    <input
                                        type="text"
                                        name="periode"
                                        value="{{ old('periode', $komisariat->periode) }}"
                                        class="form-control"
                                    >

                                </div>

                            </div>


                            <div class="mb-3">

                                <label class="form-label">
                                    Jumlah Anggota
                                    <span class="text-danger">*</span>
                                </label>

                                <input
                                    type="number"
                                    name="jumlah_anggota"
                                    value="{{ old('jumlah_anggota', $komisariat->jumlah_anggota) }}"
                                    min="0"
                                    class="form-control"
                                    required
                                >

                            </div>


                            <div class="mb-0">

                                <label class="form-label">
                                    Deskripsi Komisariat
                                </label>

                                <textarea
                                    name="deskripsi"
                                    rows="6"
                                    class="form-control"
                                >{{ old('deskripsi', $komisariat->deskripsi) }}</textarea>

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

                            @if($komisariat->logo)

                                <div class="text-center mb-3">

                                    <img
                                        src="{{ asset('storage/' . $komisariat->logo) }}"
                                        alt="{{ $komisariat->nama }}"
                                        class="img-fluid rounded"
                                        style="max-height: 180px;"
                                    >

                                </div>

                            @endif


                            <input
                                type="file"
                                name="logo"
                                class="form-control @error('logo') is-invalid @enderror"
                                accept=".jpg,.jpeg,.png,.webp"
                            >

                            <small class="text-muted d-block mt-2">
                                Kosongkan jika tidak ingin mengganti logo.
                                Maksimal 2 MB.
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
                                    value="{{ old('telepon', $komisariat->telepon) }}"
                                    class="form-control"
                                >

                            </div>


                            <div class="mb-3">

                                <label class="form-label">
                                    Email
                                </label>

                                <input
                                    type="email"
                                    name="email"
                                    value="{{ old('email', $komisariat->email) }}"
                                    class="form-control"
                                >

                            </div>


                            <div>

                                <label class="form-label">
                                    Instagram
                                </label>

                                <input
                                    type="text"
                                    name="instagram"
                                    value="{{ old('instagram', $komisariat->instagram) }}"
                                    class="form-control"
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
                                    value="{{ old('urutan', $komisariat->urutan) }}"
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
                                    {{ old('status', $komisariat->status) ? 'checked' : '' }}
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


                    <div class="d-grid gap-2">

                        <button
                            type="submit"
                            class="btn btn-primary"
                        >

                            <i class="ti ti-device-floppy me-1"></i>

                            Simpan Perubahan

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
