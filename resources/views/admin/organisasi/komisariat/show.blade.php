@extends('layouts.admin')

@section('title', 'Detail Komisariat')

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
                                Detail Komisariat
                            </h5>

                            <p class="m-b-0">
                                Informasi lengkap komisariat.
                            </p>

                        </div>

                    </div>

                    <div class="col-md-4 text-md-end mt-3 mt-md-0">

                        <a
                            href="{{ route('admin.komisariat.edit', $komisariat) }}"
                            class="btn btn-primary me-1"
                        >

                            <i class="ti ti-edit me-1"></i>

                            Edit

                        </a>

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


        <div class="row">

            {{-- PROFIL --}}
            <div class="col-lg-4">

                <div class="card">

                    <div class="card-body text-center">

                        @if($komisariat->logo)

                            <img
                                src="{{ asset('storage/' . $komisariat->logo) }}"
                                alt="{{ $komisariat->nama }}"
                                class="img-fluid rounded mb-4"
                                style="max-height: 220px;"
                            >

                        @else

                            <div
                                class="bg-light rounded d-flex align-items-center justify-content-center mx-auto mb-4"
                                style="width:180px;height:180px;"
                            >

                                <i
                                    class="ti ti-building-community text-muted"
                                    style="font-size:70px;"
                                ></i>

                            </div>

                        @endif


                        <h4 class="fw-bold mb-2">
                            {{ $komisariat->nama }}
                        </h4>


                        @if($komisariat->perguruan_tinggi)

                            <p class="text-muted mb-3">
                                {{ $komisariat->perguruan_tinggi }}
                            </p>

                        @endif


                        @if($komisariat->status)

                            <span class="badge bg-success">
                                Aktif
                            </span>

                        @else

                            <span class="badge bg-secondary">
                                Tidak Aktif
                            </span>

                        @endif

                    </div>

                </div>


                {{-- STATISTIK --}}
                <div class="card">

                    <div class="card-header">

                        <h5 class="mb-0">
                            Statistik
                        </h5>

                    </div>

                    <div class="card-body">

                        <div class="d-flex justify-content-between align-items-center mb-3">

                            <span class="text-muted">
                                Jumlah Anggota
                            </span>

                            <strong class="fs-5">
                                {{ number_format($komisariat->jumlah_anggota, 0, ',', '.') }}
                            </strong>

                        </div>


                        <div class="d-flex justify-content-between align-items-center">

                            <span class="text-muted">
                                Urutan Tampilan
                            </span>

                            <strong>
                                {{ $komisariat->urutan }}
                            </strong>

                        </div>

                    </div>

                </div>

            </div>


            {{-- INFORMASI --}}
            <div class="col-lg-8">

                <div class="card">

                    <div class="card-header">

                        <h5 class="mb-0">
                            Informasi Komisariat
                        </h5>

                    </div>

                    <div class="card-body">

                        <div class="row g-4">

                            <div class="col-md-6">

                                <small class="text-muted d-block">
                                    Nama Komisariat
                                </small>

                                <strong>
                                    {{ $komisariat->nama }}
                                </strong>

                            </div>


                            <div class="col-md-6">

                                <small class="text-muted d-block">
                                    Perguruan Tinggi
                                </small>

                                <strong>
                                    {{ $komisariat->perguruan_tinggi ?: '-' }}
                                </strong>

                            </div>


                            <div class="col-md-6">

                                <small class="text-muted d-block">
                                    Fakultas
                                </small>

                                <strong>
                                    {{ $komisariat->fakultas ?: '-' }}
                                </strong>

                            </div>


                            <div class="col-md-6">

                                <small class="text-muted d-block">
                                    Ketua Komisariat
                                </small>

                                <strong>
                                    {{ $komisariat->ketua ?: '-' }}
                                </strong>

                            </div>


                            <div class="col-md-6">

                                <small class="text-muted d-block">
                                    Periode
                                </small>

                                <strong>
                                    {{ $komisariat->periode ?: '-' }}
                                </strong>

                            </div>


                            <div class="col-md-6">

                                <small class="text-muted d-block">
                                    Telepon / WhatsApp
                                </small>

                                <strong>
                                    {{ $komisariat->telepon ?: '-' }}
                                </strong>

                            </div>


                            <div class="col-md-6">

                                <small class="text-muted d-block">
                                    Email
                                </small>

                                <strong>
                                    {{ $komisariat->email ?: '-' }}
                                </strong>

                            </div>


                            <div class="col-md-6">

                                <small class="text-muted d-block">
                                    Instagram
                                </small>

                                <strong>
                                    {{ $komisariat->instagram ?: '-' }}
                                </strong>

                            </div>


                            <div class="col-12">

                                <small class="text-muted d-block">
                                    Alamat / Sekretariat
                                </small>

                                <strong>
                                    {{ $komisariat->alamat ?: '-' }}
                                </strong>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- DESKRIPSI --}}
                <div class="card">

                    <div class="card-header">

                        <h5 class="mb-0">
                            Deskripsi
                        </h5>

                    </div>

                    <div class="card-body">

                        @if($komisariat->deskripsi)

                            <div style="line-height: 1.8;">
                                {!! nl2br(e($komisariat->deskripsi)) !!}
                            </div>

                        @else

                            <p class="text-muted mb-0">
                                Belum ada deskripsi komisariat.
                            </p>

                        @endif

                    </div>

                </div>


                {{-- TIMESTAMP --}}
                <div class="card">

                    <div class="card-body">

                        <div class="row">

                            <div class="col-md-6">

                                <small class="text-muted d-block">
                                    Dibuat
                                </small>

                                <strong>
                                    {{ $komisariat->created_at?->format('d F Y H:i') }}
                                </strong>

                            </div>

                            <div class="col-md-6">

                                <small class="text-muted d-block">
                                    Terakhir diperbarui
                                </small>

                                <strong>
                                    {{ $komisariat->updated_at?->format('d F Y H:i') }}
                                </strong>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
</div>

@endsection
