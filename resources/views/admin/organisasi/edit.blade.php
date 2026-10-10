@extends('layouts.app')

@section('title', 'Edit Pengurus')

@section('content')

<div class="container py-5">

    <div class="mb-4">

        <a href="{{ route('admin.organisasi.index') }}"
           class="text-decoration-none text-muted">

            <i class="bi bi-arrow-left me-1"></i>
            Kembali ke Organisasi

        </a>

        <h1 class="fw-bold mt-3 mb-1">
            Edit Pengurus
        </h1>

        <p class="text-muted mb-0">
            Perbarui data pengurus HMI Cabang Indramayu.
        </p>

    </div>


    {{-- ERROR --}}

    @if($errors->any())

        <div class="alert alert-danger">

            <strong>
                Data belum dapat diperbarui.
            </strong>

            <ul class="mb-0 mt-2">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body p-4 p-md-5">

            <form action="{{ route(
                'admin.organisasi.update',
                ['organisasi' => $organisasi]
            ) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                @method('PUT')


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
                           value="{{ old('nama', $organisasi->nama) }}"
                           class="form-control form-control-lg"
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
                           value="{{ old('jabatan', $organisasi->jabatan) }}"
                           class="form-control form-control-lg"
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
                           value="{{ old('bidang', $organisasi->bidang) }}"
                           class="form-control form-control-lg">

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
                           value="{{ old('periode', $organisasi->periode) }}"
                           class="form-control form-control-lg">

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
                           value="{{ old('urutan', $organisasi->urutan) }}"
                           class="form-control form-control-lg"
                           min="0">

                </div>


                {{-- FOTO LAMA --}}

                @if($organisasi->foto)

                    <div class="mb-4">

                        <label class="form-label fw-semibold">
                            Foto Saat Ini
                        </label>

                        <div>

                            <img src="{{ asset('storage/' . $organisasi->foto) }}"
                                 alt="{{ $organisasi->nama }}"
                                 width="120"
                                 height="120"
                                 class="rounded-4 object-fit-cover">

                        </div>

                    </div>

                @endif


                {{-- FOTO BARU --}}

                <div class="mb-4">

                    <label for="foto"
                           class="form-label fw-semibold">

                        Ganti Foto

                    </label>

                    <input type="file"
                           id="foto"
                           name="foto"
                           class="form-control form-control-lg"
                           accept=".jpg,.jpeg,.png,.webp">

                    <div class="form-text">
                        Kosongkan jika tidak ingin mengganti foto.
                        Maksimal 5 MB.
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
                               {{ old('status', $organisasi->status) ? 'checked' : '' }}>

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

                        Simpan Perubahan

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
