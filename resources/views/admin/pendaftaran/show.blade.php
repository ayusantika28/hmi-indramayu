@extends('layouts.admin')

@section('title', 'Detail Peserta')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="mb-4">

        <a href="{{ route(
            'admin.kegiatan.pendaftaran.index',
            $kegiatan
        ) }}"
           class="text-decoration-none text-muted">

            <i class="bi bi-arrow-left me-1"></i>

            Kembali ke Daftar Peserta

        </a>

        <h4 class="fw-bold mt-3 mb-1">

            Detail Peserta

        </h4>

        <p class="text-muted mb-0">

            {{ $kegiatan->judul }}

        </p>

    </div>


    <div class="row g-4">

        {{-- DATA PESERTA --}}
        <div class="col-lg-8">

            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-body p-4">

                    <h5 class="fw-bold mb-4">

                        Informasi Peserta

                    </h5>


                    {{-- NAMA --}}
                    <div class="mb-4">

                        <small class="text-muted d-block">
                            Nama Lengkap
                        </small>

                        <div class="fw-semibold fs-5">

                            {{ $pendaftaran->nama }}

                        </div>

                    </div>


                    {{-- EMAIL --}}
                    <div class="mb-4">

                        <small class="text-muted d-block">
                            Email
                        </small>

                        <div class="fw-semibold">

                            {{ $pendaftaran->email }}

                        </div>

                    </div>


                    {{-- NO HP --}}
                    <div class="mb-4">

                        <small class="text-muted d-block">
                            Nomor WhatsApp
                        </small>

                        <div class="fw-semibold">

                            {{ $pendaftaran->no_hp }}

                        </div>

                    </div>


                    {{-- INSTANSI --}}
                    <div class="mb-4">

                        <small class="text-muted d-block">
                            Instansi / Organisasi
                        </small>

                        <div class="fw-semibold">

                            {{ $pendaftaran->instansi ?: '-' }}

                        </div>

                    </div>


                    {{-- KETERANGAN --}}
                    <div class="mb-4">

                        <small class="text-muted d-block">
                            Keterangan
                        </small>

                        <div>

                            @if($pendaftaran->keterangan)

                                {!! nl2br(
                                    e($pendaftaran->keterangan)
                                ) !!}

                            @else

                                <span class="text-muted">
                                    Tidak ada keterangan.
                                </span>

                            @endif

                        </div>

                    </div>


                    {{-- TANGGAL --}}
                    <div>

                        <small class="text-muted d-block">
                            Waktu Pendaftaran
                        </small>

                        <div class="fw-semibold">

                            {{ $pendaftaran->created_at->format('d F Y H:i') }}

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- STATUS --}}
        <div class="col-lg-4">

            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-body p-4">

                    <h5 class="fw-bold mb-4">

                        Status Peserta

                    </h5>


                    <form action="{{ route(
                        'admin.kegiatan.pendaftaran.status',
                        [
                            'kegiatan' => $kegiatan,
                            'pendaftaran' => $pendaftaran
                        ]
                    ) }}"
                          method="POST">

                        @csrf
                        @method('PUT')


                        <label for="status"
                               class="form-label fw-semibold">

                            Status

                        </label>


                        <select name="status"
                                id="status"
                                class="form-select mb-3">

                            <option value="terdaftar"
                                @selected(
                                    $pendaftaran->status === 'terdaftar'
                                )>

                                Terdaftar

                            </option>

                            <option value="hadir"
                                @selected(
                                    $pendaftaran->status === 'hadir'
                                )>

                                Hadir

                            </option>

                            <option value="batal"
                                @selected(
                                    $pendaftaran->status === 'batal'
                                )>

                                Batal

                            </option>

                        </select>


                        <button type="submit"
                                class="btn btn-success
                                       rounded-pill w-100">

                            <i class="bi bi-check-lg me-1"></i>

                            Simpan Status

                        </button>

                    </form>

                </div>

            </div>


            {{-- HAPUS --}}
            <div class="card border-0 shadow-sm rounded-4 mt-4">

                <div class="card-body p-4">

                    <h6 class="fw-bold">

                        Hapus Peserta

                    </h6>

                    <p class="text-muted small">

                        Data peserta akan dihapus secara permanen.

                    </p>


                    <form action="{{ route(
                        'admin.kegiatan.pendaftaran.destroy',
                        [
                            'kegiatan' => $kegiatan,
                            'pendaftaran' => $pendaftaran
                        ]
                    ) }}"
                          method="POST"
                          onsubmit="return confirm(
                              'Yakin ingin menghapus peserta ini?'
                          );">

                        @csrf
                        @method('DELETE')


                        <button type="submit"
                                class="btn btn-outline-danger
                                       rounded-pill w-100">

                            <i class="bi bi-trash me-1"></i>

                            Hapus Peserta

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
