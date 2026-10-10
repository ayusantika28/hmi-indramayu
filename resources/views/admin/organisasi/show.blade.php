@extends('layouts.app')

@section('title', 'Detail Pengurus')

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
            Detail Pengurus
        </h1>

        <p class="text-muted mb-0">
            Informasi lengkap pengurus HMI Cabang Indramayu.
        </p>
    </div>


    {{-- CARD --}}
    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4 p-md-5">
            <div class="row align-items-center g-5">

                {{-- FOTO --}}
                <div class="col-md-4 text-center">
                    @if($organisasi->foto)
                        <img src="{{ asset('storage/' . $organisasi->foto) }}"
                             alt="{{ $organisasi->nama }}"
                             class="img-fluid rounded-4 shadow-sm"
                             style="
                                width: 250px;
                                height: 250px;
                                object-fit: cover;
                             ">
                    @else
                        <div class="mx-auto rounded-4 bg-light
                                    d-flex align-items-center
                                    justify-content-center"
                             style="
                                width:250px;
                                height:250px;
                             ">
                            <i class="bi bi-person text-muted"
                               style="font-size:90px;">
                            </i>
                        </div>
                    @endif
                </div>


                {{-- DATA --}}
                <div class="col-md-8">
                    <span class="text-success fw-semibold text-uppercase small">
                        Pengurus HMI
                    </span>
                    <h2 class="fw-bold mt-2 mb-4">
                        {{ $organisasi->nama }}
                    </h2>
                    <div class="mb-3">
                        <div class="text-muted small">
                            Jabatan
                        </div>
                        <div class="fw-semibold fs-5">
                            {{ $organisasi->jabatan }}
                        </div>
                    </div>


                    <div class="mb-3">
                        <div class="text-muted small">
                            Bidang
                        </div>
                        <div class="fw-semibold">
                            {{ $organisasi->bidang ?: '-' }}
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="text-muted small">
                            Periode
                        </div>
                        <div class="fw-semibold">
                            {{ $organisasi->periode ?: '-' }}
                        </div>
                    </div>


                    <div class="mb-4">
                        <div class="text-muted small">
                            Status
                        </div>

                        @if($organisasi->status)
                            <span class="badge bg-success">
                                Aktif
                            </span>
                        @else
                            <span class="badge bg-secondary">
                                Tidak Aktif
                            </span>
                        @endif
                    </div>

                    {{-- ACTION --}}
                    <div class="d-flex flex-wrap gap-2">

                        <a href="{{ route(
                            'admin.organisasi.edit',
                            ['organisasi' => $organisasi]
                        ) }}"
                           class="btn btn-primary rounded-pill px-4">
                            <i class="bi bi-pencil me-2"></i>
                            Edit
                        </a>

                        <a href="{{ route('admin.organisasi.index') }}"
                           class="btn btn-outline-secondary rounded-pill px-4">
                            Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
