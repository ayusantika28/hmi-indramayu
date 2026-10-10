@extends('layouts.admin')

@section('title', 'Komisariat')

@section('content')

<div class="pc-container">
    <div class="pc-content">

        {{-- HEADER --}}
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">

                    <div class="col-md-8">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Komisariat</h5>
                            <p class="m-b-0">
                                Kelola data komisariat HMI Cabang Indramayu.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-4 text-md-end mt-3 mt-md-0">
                        <a href="{{ route('admin.komisariat.create') }}"
                           class="btn btn-primary">
                            <i class="ti ti-plus me-1"></i>
                            Tambah Komisariat
                        </a>
                    </div>

                </div>
            </div>
        </div>

        {{-- ALERT --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="ti ti-check me-2"></i>
                {{ session('success') }}

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="alert">
                </button>
            </div>
        @endif

        {{-- CARD --}}
        <div class="card">

            <div class="card-header">
                <h5 class="mb-0">Daftar Komisariat</h5>
            </div>

            <div class="card-body">

                @if($komisariats->count())

                    <div class="table-responsive">

                        <table class="table table-hover align-middle">

                            <thead>
                                <tr>
                                    <th width="60">No</th>
                                    <th>Komisariat</th>
                                    <th>Perguruan Tinggi</th>
                                    <th>Ketua</th>
                                    <th class="text-center">Anggota</th>
                                    <th>Periode</th>
                                    <th class="text-center">Status</th>
                                    <th width="180" class="text-center">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach($komisariats as $komisariat)

                                    <tr>

                                        <td>
                                            {{ $komisariats->firstItem() + $loop->index }}
                                        </td>

                                        {{-- KOMISARIAT --}}
                                        <td>

                                            <div class="d-flex align-items-center gap-3">

                                                @if($komisariat->logo)

                                                    <img
                                                        src="{{ asset('storage/' . $komisariat->logo) }}"
                                                        alt="{{ $komisariat->nama }}"
                                                        width="45"
                                                        height="45"
                                                        class="rounded"
                                                        style="object-fit: cover;"
                                                    >

                                                @else

                                                    <div
                                                        class="bg-light rounded d-flex align-items-center justify-content-center"
                                                        style="width:45px;height:45px;"
                                                    >
                                                        <i class="ti ti-building-community fs-4 text-muted"></i>
                                                    </div>

                                                @endif

                                                <div>

                                                    <div class="fw-semibold">
                                                        {{ $komisariat->nama }}
                                                    </div>

                                                    @if($komisariat->fakultas)
                                                        <small class="text-muted">
                                                            {{ $komisariat->fakultas }}
                                                        </small>
                                                    @endif

                                                </div>

                                            </div>

                                        </td>

                                        {{-- KAMPUS --}}
                                        <td>
                                            {{ $komisariat->perguruan_tinggi ?: '-' }}
                                        </td>

                                        {{-- KETUA --}}
                                        <td>
                                            {{ $komisariat->ketua ?: '-' }}
                                        </td>

                                        {{-- ANGGOTA --}}
                                        <td class="text-center">
                                            {{ number_format($komisariat->jumlah_anggota, 0, ',', '.') }}
                                        </td>

                                        {{-- PERIODE --}}
                                        <td>
                                            {{ $komisariat->periode ?: '-' }}
                                        </td>

                                        {{-- STATUS --}}
                                        <td class="text-center">

                                            @if($komisariat->status)

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
                                        <td>

                                            <div class="d-flex justify-content-center gap-1">

                                                {{-- DETAIL --}}
                                                <a href="{{ route('admin.komisariat.show', $komisariat) }}"
                                                   class="btn btn-sm btn-light"
                                                   title="Detail">
                                                    <i class="ti ti-eye"></i>
                                                </a>

                                                {{-- EDIT --}}
                                                <a href="{{ route('admin.komisariat.edit', $komisariat) }}"
                                                   class="btn btn-sm btn-light"
                                                   title="Edit">
                                                    <i class="ti ti-edit"></i>
                                                </a>

                                                {{-- HAPUS --}}
                                                <form
                                                    action="{{ route('admin.komisariat.destroy', $komisariat) }}"
                                                    method="POST"
                                                    class="d-inline"
                                                    onsubmit="return confirm('Yakin ingin menghapus komisariat ini?')"
                                                >

                                                    @csrf
                                                    @method('DELETE')

                                                    <button
                                                        type="submit"
                                                        class="btn btn-sm btn-light text-danger"
                                                        title="Hapus"
                                                    >
                                                        <i class="ti ti-trash"></i>
                                                    </button>

                                                </form>

                                            </div>

                                        </td>

                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>

                    {{-- PAGINATION --}}
                    <div class="mt-4">
                        {{ $komisariats->links() }}
                    </div>

                @else

                    <div class="text-center py-5">

                        <div class="mb-3">
                            <i class="ti ti-building-community"
                               style="font-size: 50px;">
                            </i>
                        </div>

                        <h5>Belum Ada Komisariat</h5>

                        <p class="text-muted mb-4">
                            Belum ada data komisariat yang ditambahkan.
                        </p>

                        <a href="{{ route('admin.komisariat.create') }}"
                           class="btn btn-primary">
                            <i class="ti ti-plus me-1"></i>
                            Tambah Komisariat
                        </a>

                    </div>

                @endif

            </div>

        </div>

    </div>
</div>

@endsection
