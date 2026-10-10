@extends('layouts.admin')

@section('title', 'Dashboard Admin')
@section('page-title', 'Dashboard')

@section('content')

<div class="mb-4">

    <h2 class="fw-bold mb-1">
        Selamat Datang, {{ auth()->user()->name }}
    </h2>

    <p class="text-muted mb-0">
        Kelola website HMI Cabang Indramayu melalui panel administrasi.
    </p>

</div>


<div class="row g-4">

    {{-- BERITA --}}

    <div class="col-md-6 col-xl-4">

        <div class="card border-0 shadow-sm rounded-4 h-100">

            <div class="card-body p-4">

                <div class="d-flex justify-content-between align-items-start">

                    <div>

                        <p class="text-muted mb-2">
                            Total Berita
                        </p>

                        <h2 class="fw-bold mb-0">
                            {{ \App\Models\Berita::count() }}
                        </h2>

                    </div>

                    <div class="bg-success-subtle text-success rounded-4
                                d-flex align-items-center justify-content-center"
                         style="width:55px;height:55px;">

                        <i class="bi bi-newspaper fs-4"></i>

                    </div>

                </div>

                <a href="{{ route('admin.berita.index') }}"
                   class="btn btn-sm btn-outline-success rounded-pill mt-4 px-3">

                    Kelola Berita

                </a>

            </div>

        </div>

    </div>


    {{-- ORGANISASI --}}

    <div class="col-md-6 col-xl-4">

        <div class="card border-0 shadow-sm rounded-4 h-100">

            <div class="card-body p-4">

                <div class="d-flex justify-content-between align-items-start">

                    <div>

                        <p class="text-muted mb-2">
                            Total Pengurus
                        </p>

                        <h2 class="fw-bold mb-0">
                            {{ \App\Models\Organisasi::count() }}
                        </h2>

                    </div>

                    <div class="bg-primary-subtle text-primary rounded-4
                                d-flex align-items-center justify-content-center"
                         style="width:55px;height:55px;">

                        <i class="bi bi-people-fill fs-4"></i>

                    </div>

                </div>

                <a href="{{ route('admin.organisasi.index') }}"
                   class="btn btn-sm btn-outline-primary rounded-pill mt-4 px-3">

                    Kelola Organisasi

                </a>

            </div>

        </div>

    </div>


    {{-- STATUS --}}

    <div class="col-md-6 col-xl-4">

        <div class="card border-0 shadow-sm rounded-4 h-100">

            <div class="card-body p-4">

                <div class="d-flex justify-content-between align-items-start">

                    <div>

                        <p class="text-muted mb-2">
                            Status Website
                        </p>

                        <h2 class="fw-bold mb-0">
                            Aktif
                        </h2>

                    </div>

                    <div class="bg-warning-subtle text-warning rounded-4
                                d-flex align-items-center justify-content-center"
                         style="width:55px;height:55px;">

                        <i class="bi bi-check-circle-fill fs-4"></i>

                    </div>

                </div>

                <a href="{{ route('home') }}"
                   target="_blank"
                   class="btn btn-sm btn-outline-secondary rounded-pill mt-4 px-3">

                    Lihat Website

                </a>

            </div>

        </div>

    </div>

</div>


{{-- AKSES CEPAT --}}

<div class="card border-0 shadow-sm rounded-4 mt-4">

    <div class="card-body p-4">

        <h5 class="fw-bold mb-4">
            Akses Cepat
        </h5>

        <div class="row g-3">

            <div class="col-md-6">

                <a href="{{ route('admin.berita.create') }}"
                   class="btn btn-light border rounded-3 w-100 text-start p-3">

                    <i class="bi bi-plus-circle text-success me-2"></i>

                    Tambah Berita

                </a>

            </div>

            <div class="col-md-6">

                <a href="{{ route('admin.organisasi.create') }}"
                   class="btn btn-light border rounded-3 w-100 text-start p-3">

                    <i class="bi bi-person-plus text-primary me-2"></i>

                    Tambah Pengurus

                </a>

            </div>

        </div>

    </div>

</div>

@endsection
