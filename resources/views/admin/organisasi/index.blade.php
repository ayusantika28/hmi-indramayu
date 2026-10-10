@extends('layouts.admin')

@section('title', 'Kelola Organisasi')

@section('content')

<div class="container py-5">

    {{-- HEADER --}}

    <div class="d-flex flex-wrap justify-content-between
                align-items-center gap-3 mb-4">

        <div>

            <h1 class="fw-bold mb-1">
                Kelola Organisasi
            </h1>

            <p class="text-muted mb-0">
                Kelola struktur dan pengurus HMI Cabang Indramayu.
            </p>

        </div>

        <a href="{{ route('admin.organisasi.create') }}"
           class="btn btn-success rounded-pill px-4">

            <i class="bi bi-plus-lg me-2"></i>

            Tambah Pengurus

        </a>

    </div>


    {{-- ALERT SUCCESS --}}

    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show"
             role="alert">

            <i class="bi bi-check-circle me-2"></i>

            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>

        </div>

    @endif


    {{-- TABLE --}}

    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">

        <div class="card-body p-0">

            @if($organisasis->count())

                <div class="table-responsive">

                    <table class="table table-hover align-middle mb-0">

                        <thead class="table-light">

                            <tr>

                                <th class="px-4">
                                    Foto
                                </th>

                                <th>
                                    Nama
                                </th>

                                <th>
                                    Jabatan
                                </th>

                                <th>
                                    Bidang
                                </th>

                                <th>
                                    Periode
                                </th>

                                <th>
                                    Status
                                </th>

                                <th class="text-end px-4">
                                    Aksi
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            @foreach($organisasis as $organisasi)

                                <tr>

                                    {{-- FOTO --}}

                                    <td class="px-4">

                                        @if($organisasi->foto)

                                            <img src="{{ asset('storage/' . $organisasi->foto) }}"
                                                 alt="{{ $organisasi->nama }}"
                                                 width="55"
                                                 height="55"
                                                 class="rounded-circle object-fit-cover">

                                        @else

                                            <div class="rounded-circle bg-light
                                                        d-flex align-items-center
                                                        justify-content-center"
                                                 style="width:55px;height:55px;">

                                                <i class="bi bi-person text-muted"
                                                   style="font-size:25px;">
                                                </i>

                                            </div>

                                        @endif

                                    </td>


                                    {{-- NAMA --}}

                                    <td>

                                        <strong>
                                            {{ $organisasi->nama }}
                                        </strong>

                                    </td>


                                    {{-- JABATAN --}}

                                    <td>

                                        {{ $organisasi->jabatan }}

                                    </td>


                                    {{-- BIDANG --}}

                                    <td>

                                        {{ $organisasi->bidang ?: '-' }}

                                    </td>


                                    {{-- PERIODE --}}

                                    <td>

                                        {{ $organisasi->periode ?: '-' }}

                                    </td>


                                    {{-- STATUS --}}

                                    <td>

                                        @if($organisasi->status)

                                            <span class="badge bg-success">
                                                Aktif
                                            </span>

                                        @else

                                            <span class="badge bg-secondary">
                                                Tidak Aktif
                                            </span>

                                        @endif

                                    </td>


                                    {{-- AKSI --}}

                                    <td class="text-end px-4">

                                        <div class="d-flex justify-content-end gap-2">

                                            <a href="{{ route(
                                                'admin.organisasi.show',
                                                ['organisasi' => $organisasi]
                                            ) }}"
                                            class="btn btn-sm btn-outline-secondary">

                                                <i class="bi bi-eye"></i>

                                            </a>


                                            <form action="{{ route(
                                                'admin.organisasi.destroy',
                                                ['organisasi' => $organisasi]
                                            ) }}"
                                                  method="POST"
                                                  onsubmit="return confirm(
                                                      'Yakin ingin menghapus pengurus ini?'
                                                  );">

                                                @csrf

                                                @method('DELETE')

                                                <button type="submit"
                                                        class="btn btn-sm btn-outline-danger">

                                                    <i class="bi bi-trash"></i>

                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            @else

                {{-- KOSONG --}}

                <div class="text-center py-5 px-4">

                    <div class="mb-3">

                        <i class="bi bi-people text-muted"
                           style="font-size:60px;">
                        </i>

                    </div>

                    <h4 class="fw-bold">
                        Belum ada pengurus
                    </h4>

                    <p class="text-muted mb-4">
                        Silakan tambahkan data pengurus
                        HMI Cabang Indramayu.
                    </p>

                    <a href="{{ route('admin.organisasi.create') }}"
                       class="btn btn-success rounded-pill px-4">

                        <i class="bi bi-plus-lg me-2"></i>

                        Tambah Pengurus

                    </a>

                </div>

            @endif

        </div>

    </div>

</div>

@endsection
