@extends('layouts.admin')

@section('title', 'Pengaturan Profil')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h1 class="h3 mb-1">
                Pengaturan Profil HMI
            </h1>

            <p class="text-muted mb-0">
                Kelola logo, periode kepengurusan, visi, dan misi HMI Cabang Indramayu.
            </p>
        </div>

    </div>


    {{-- FLASH MESSAGE --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <i class="bi bi-check-circle me-2"></i>
            {{ session('success') }}

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert">
            </button>
        </div>
    @endif


    {{-- VALIDATION ERROR --}}
    @if($errors->any())
        <div class="alert alert-danger">

            <strong>
                Terjadi kesalahan:
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
        action="{{ route('admin.profile-setting.update') }}"
        method="POST"
        enctype="multipart/form-data">

        @csrf
        @method('PUT')


        <div class="row g-4">


            {{-- KIRI --}}
            <div class="col-lg-8">

                {{-- IDENTITAS ORGANISASI --}}
                <div class="card border-0 shadow-sm mb-4">

                    <div class="card-header bg-white border-0 pt-4 px-4">

                        <h5 class="mb-1">
                            <i class="bi bi-building me-2"></i>
                            Identitas Organisasi
                        </h5>

                        <small class="text-muted">
                            Informasi utama organisasi yang ditampilkan di website.
                        </small>

                    </div>


                    <div class="card-body p-4">

                        {{-- NAMA --}}
                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                Nama Organisasi
                            </label>

                            <input
                                type="text"
                                name="nama_organisasi"
                                class="form-control"
                                value="{{ old('nama_organisasi', $profile->nama_organisasi) }}"
                                placeholder="HMI Cabang Indramayu"
                                required
                            >

                        </div>


                        {{-- PERIODE --}}
                        <div class="mb-0">

                            <label class="form-label fw-semibold">
                                Periode Kepengurusan
                            </label>

                            <input
                                type="text"
                                name="periode"
                                class="form-control"
                                value="{{ old('periode', $profile->periode) }}"
                                placeholder="Contoh: 2026–2027"
                            >

                            <small class="text-muted">
                                Contoh: 2026–2027
                            </small>

                        </div>

                    </div>

                </div>


                {{-- VISI --}}
                <div class="card border-0 shadow-sm mb-4">

                    <div class="card-header bg-white border-0 pt-4 px-4">

                        <h5 class="mb-1">
                            <i class="bi bi-bullseye me-2"></i>
                            Visi
                        </h5>

                        <small class="text-muted">
                            Visi kepengurusan yang sedang berjalan.
                        </small>

                    </div>


                    <div class="card-body p-4">

                        <textarea
                            name="visi"
                            class="form-control"
                            rows="4"
                            placeholder="Masukkan visi kepengurusan..."
                        >{{ old('visi', $profile->visi) }}</textarea>

                    </div>

                </div>


                {{-- MISI --}}
                <div class="card border-0 shadow-sm mb-4">

                    <div class="card-header bg-white border-0 pt-4 px-4">

                        <h5 class="mb-1">
                            <i class="bi bi-list-check me-2"></i>
                            Misi
                        </h5>

                        <small class="text-muted">
                            Masukkan setiap misi pada baris yang berbeda.
                        </small>

                    </div>


                    <div class="card-body p-4">

                        <textarea
                            name="misi"
                            class="form-control"
                            rows="10"
                            placeholder="Contoh:
Membangun kader yang berkualitas
Meningkatkan peran organisasi
Memperkuat hubungan dengan masyarakat"
                        >{{ old('misi', $profile->misi) }}</textarea>

                        <div class="form-text">
                            Gunakan satu baris untuk satu poin misi.
                        </div>

                    </div>

                </div>


                {{-- BUTTON --}}
                <div class="d-flex justify-content-end gap-2 mb-4">

                    <a
                        href="{{ route('admin.dashboard') }}"
                        class="btn btn-light px-4">

                        Batal

                    </a>


                    <button
                        type="submit"
                        class="btn btn-success px-4">

                        <i class="bi bi-save me-2"></i>

                        Simpan Pengaturan

                    </button>

                </div>

            </div>


            {{-- KANAN --}}
            <div class="col-lg-4">

                <div class="card border-0 shadow-sm">

                    <div class="card-header bg-white border-0 pt-4 px-4">

                        <h5 class="mb-1">
                            <i class="bi bi-image me-2"></i>
                            Logo HMI
                        </h5>

                        <small class="text-muted">
                            Logo yang digunakan pada website.
                        </small>

                    </div>


                    <div class="card-body p-4">

                        {{-- PREVIEW --}}
                        <div class="text-center mb-4">

                            <div
                                class="border rounded-4 p-4 bg-light">

                                @if($profile->logo)

                                    <img
                                        src="{{ asset('storage/' . $profile->logo) }}"
                                        alt="Logo HMI"
                                        class="img-fluid"
                                        style="
                                            width: 180px;
                                            height: 180px;
                                            object-fit: contain;
                                        "
                                    >

                                @else

                                    <div
                                        class="text-muted py-5">

                                        <i
                                            class="bi bi-image fs-1 d-block mb-2">
                                        </i>

                                        Belum ada logo

                                    </div>

                                @endif

                            </div>

                        </div>


                        {{-- UPLOAD --}}
                        <label class="form-label fw-semibold">
                            Ganti Logo
                        </label>

                        <input
                            type="file"
                            name="logo"
                            class="form-control"
                            accept=".jpg,.jpeg,.png,.webp"
                        >

                        <small class="text-muted d-block mt-2">
                            JPG, JPEG, PNG atau WEBP.
                            Maksimal 5 MB.
                        </small>

                    </div>

                </div>

            </div>

        </div>

    </form>

</div>

@endsection
