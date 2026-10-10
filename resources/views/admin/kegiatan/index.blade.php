@extends('layouts.admin')

@section('title', 'Kegiatan')

@section('content')

<div class="container-fluid">
{{-- =========================================================
     HEADER
========================================================== --}}

<div class="d-flex flex-wrap justify-content-between
            align-items-center gap-3 mb-4">

    <div>

        <h4 class="fw-bold mb-1">
            Kegiatan
        </h4>

        <p class="text-muted mb-0">
            Kelola kegiatan HMI Cabang Indramayu.
        </p>

    </div>


    <a href="{{ route('admin.kegiatan.create') }}"
       class="btn btn-success rounded-pill px-4">

        <i class="bi bi-plus-lg me-1"></i>

        Tambah Kegiatan

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
     CARD TABLE
========================================================== --}}

<div class="card border-0 shadow-sm rounded-4">

    <div class="card-body p-0">

        <div class="table-responsive">

            <table class="table table-hover align-middle mb-0">

                {{-- =================================================
                     HEADER TABLE
                ================================================== --}}

                <thead class="table-light">

                    <tr>

                        <th class="ps-4"
                            style="width:70px;">
                            No
                        </th>

                        <th style="width:90px;">
                            Gambar
                        </th>

                        <th>
                            Judul Kegiatan
                        </th>

                        <th style="width:170px;">
                            Kategori
                        </th>

                        <th style="width:120px;">
                            Tanggal
                        </th>

                        <th style="width:170px;">
                            Pendaftaran
                        </th>

                        <th style="width:110px;">
                            Status
                        </th>

                        <th class="text-center pe-4"
                            style="width:150px;">
                            Aksi
                        </th>

                    </tr>

                </thead>


                {{-- =================================================
                     BODY
                ================================================== --}}

                <tbody>

                    @forelse($kegiatans as $kegiatan)

                        <tr>

                            {{-- NO --}}

                            <td class="ps-4">

                                {{ $loop->iteration +
                                    ($kegiatans->currentPage() - 1)
                                    * $kegiatans->perPage()
                                }}

                            </td>


                            {{-- GAMBAR --}}

                            <td>

                                @if($kegiatan->gambar)

                                    <img
                                        src="{{ asset('storage/' . $kegiatan->gambar) }}"
                                        alt="{{ $kegiatan->judul }}"
                                        class="admin-kegiatan-thumb">

                                @else

                                    <div class="admin-kegiatan-placeholder">

                                        <i class="bi bi-image"></i>

                                    </div>

                                @endif

                            </td>


                            {{-- JUDUL --}}

                            <td>

                                <div class="fw-semibold kegiatan-title">

                                    {{ $kegiatan->judul }}

                                </div>


                                @if($kegiatan->lokasi)

                                    <small class="text-muted d-block mt-1">

                                        <i class="bi bi-geo-alt me-1"></i>

                                        {{ $kegiatan->lokasi }}

                                    </small>

                                @endif

                            </td>


                            {{-- KATEGORI --}}

                            <td>

                                @if($kegiatan->kategori)

                                    <span class="badge rounded-pill
                                                 bg-success-subtle
                                                 text-success px-3 py-2">

                                        <i class="bi bi-tag me-1"></i>

                                        {{ $kegiatan->kategori }}

                                    </span>

                                @else

                                    <span class="text-muted">
                                        -
                                    </span>

                                @endif

                            </td>


                            {{-- TANGGAL --}}

                            <td>

                                @if($kegiatan->tanggal)

                                    <div class="fw-semibold">

                                        {{ $kegiatan->tanggal->format('d/m/Y') }}

                                    </div>

                                @else

                                    <span class="text-muted">
                                        -
                                    </span>

                                @endif

                            </td>


                            {{-- PENDAFTARAN --}}

                            <td>

                                @if($kegiatan->pendaftaran_aktif)

                                    {{-- STATUS PENDAFTARAN --}}

                                    <span class="badge bg-success mb-1">

                                        <i class="bi bi-person-check me-1"></i>

                                        Dibuka

                                    </span>


                                    {{-- KUOTA --}}

                                    @if($kegiatan->kuota)

                                        @php
                                            $jumlahPendaftar = $kegiatan->pendaftarans()->count();
                                        @endphp

                                        <small class="text-muted d-block">

                                            {{ $jumlahPendaftar }}
                                            /
                                            {{ $kegiatan->kuota }}
                                            peserta

                                        </small>

                                    @else

                                        <small class="text-muted d-block">

                                            {{ $kegiatan->pendaftarans()->count() }}
                                            peserta

                                        </small>

                                    @endif


                                @else

                                    <span class="badge bg-secondary">

                                        <i class="bi bi-person-x me-1"></i>

                                        Ditutup

                                    </span>

                                @endif

                            </td>


                            {{-- STATUS --}}

                            <td>

                                @if($kegiatan->status === 'published')

                                    <span class="badge bg-success">

                                        Published

                                    </span>

                                @else

                                    <span class="badge bg-secondary">

                                        Draft

                                    </span>

                                @endif

                            </td>


                            {{-- AKSI --}}

                            <td class="pe-4">

                                <div class="d-flex
                                            justify-content-center
                                            gap-1">


                                    {{-- DETAIL --}}

                                    <a href="{{ route(
                                            'admin.kegiatan.show',
                                            $kegiatan
                                        ) }}"
                                       class="btn btn-sm btn-outline-info"
                                       title="Detail">

                                        <i class="bi bi-eye"></i>

                                    </a>

                                    {{-- DOKUMENTASI --}}

                                    <a href="{{ route(
                                            'admin.kegiatan.dokumentasi.index',
                                            $kegiatan
                                        ) }}"
                                    class="btn btn-sm btn-outline-primary"
                                    title="Dokumentasi">

                                        <i class="bi bi-images"></i>

                                    </a>

                                    {{-- PENDAFTAR --}}

                                    @if($kegiatan->pendaftaran_aktif)

                                        <a href="{{ route(
                                                'admin.kegiatan.pendaftaran.index',
                                                $kegiatan
                                            ) }}"
                                           class="btn btn-sm btn-outline-success"
                                           title="Lihat Pendaftar">

                                            <i class="bi bi-people"></i>

                                        </a>

                                    @endif


                                    {{-- EDIT --}}

                                    <a href="{{ route(
                                            'admin.kegiatan.edit',
                                            $kegiatan
                                        ) }}"
                                       class="btn btn-sm btn-outline-warning"
                                       title="Edit">

                                        <i class="bi bi-pencil"></i>

                                    </a>


                                    {{-- HAPUS --}}

                                    <form
                                        action="{{ route(
                                            'admin.kegiatan.destroy',
                                            $kegiatan
                                        ) }}"
                                        method="POST"
                                        onsubmit="return confirm(
                                            'Yakin ingin menghapus kegiatan ini?'
                                        )">

                                        @csrf

                                        @method('DELETE')


                                        <button type="submit"
                                                class="btn btn-sm
                                                       btn-outline-danger"
                                                title="Hapus">

                                            <i class="bi bi-trash"></i>

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>


                    @empty

                        {{-- =================================================
                             EMPTY
                        ================================================== --}}

                        <tr>

                            <td colspan="8"
                                class="text-center py-5">

                                <i class="bi bi-calendar-event
                                          text-muted"
                                   style="font-size:50px;">
                                </i>


                                <h5 class="fw-bold mt-3">

                                    Belum ada kegiatan

                                </h5>


                                <p class="text-muted mb-3">

                                    Silakan tambahkan kegiatan pertama.

                                </p>


                                <a href="{{ route(
                                        'admin.kegiatan.create'
                                    ) }}"
                                   class="btn btn-success rounded-pill px-4">

                                    <i class="bi bi-plus-lg me-1"></i>

                                    Tambah Kegiatan

                                </a>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- =========================================================
             PAGINATION
        ========================================================== --}}

        @if($kegiatans->hasPages())

            <div class="p-4 border-top">

                {{ $kegiatans->links() }}

            </div>

        @endif

    </div>

</div>
```

</div>

{{-- =============================================================
STYLE
============================================================= --}}

<style>

    /*
    |--------------------------------------------------------------
    | Thumbnail kegiatan
    |--------------------------------------------------------------
    */

    .admin-kegiatan-thumb {

        width: 65px;
        height: 50px;

        object-fit: cover;

        border-radius: 8px;

        display: block;

    }


    /*
    |--------------------------------------------------------------
    | Placeholder gambar
    |--------------------------------------------------------------
    */

    .admin-kegiatan-placeholder {

        width: 65px;
        height: 50px;

        border-radius: 8px;

        background: #f1f3f5;

        display: flex;

        align-items: center;

        justify-content: center;

        color: #adb5bd;

        font-size: 20px;

    }


    /*
    |--------------------------------------------------------------
    | Judul
    |--------------------------------------------------------------
    */

    .kegiatan-title {

        max-width: 320px;

        white-space: normal;

        line-height: 1.4;

    }


    /*
    |--------------------------------------------------------------
    | Mobile
    |--------------------------------------------------------------
    */

    @media (max-width: 768px) {

        .admin-kegiatan-thumb,
        .admin-kegiatan-placeholder {

            width: 55px;
            height: 45px;

        }

        .kegiatan-title {

            min-width: 220px;

        }

    }

</style>

@endsection
