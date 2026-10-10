@extends('layouts.admin')

@section('title', 'Daftar Peserta')

@section('content')

<div class="container-fluid">

{{-- HEADER --}}
<div class="d-flex flex-wrap
            justify-content-between
            align-items-center
            gap-3 mb-4">

    {{-- JUDUL --}}
    <div>

        <a href="{{ route('admin.kegiatan.show', $kegiatan) }}"
           class="text-decoration-none text-muted">

            <i class="bi bi-arrow-left me-1"></i>

            Kembali ke Kegiatan

        </a>

        <h4 class="fw-bold mt-3 mb-1">
            Daftar Peserta
        </h4>

        <p class="text-muted mb-0">
            {{ $kegiatan->judul }}
        </p>

    </div>

    {{-- AKSI --}}
    <div class="d-flex align-items-center gap-2">

        <a href="{{ route(
            'admin.kegiatan.pendaftaran.export.excel',
            $kegiatan
        ) }}"
           class="btn btn-success rounded-pill px-4">

            <i class="bi bi-file-earmark-excel me-2"></i>
            Export Excel

        </a>

    </div>

</div>



    {{-- STATISTIC --}}
    <div class="row g-3 mb-4">

        {{-- TOTAL --}}
        <div class="col-md-3">

            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-body p-4">

                    <div class="d-flex
                                justify-content-between
                                align-items-center">

                        <div>

                            <small class="text-muted">
                                Total Peserta
                            </small>

                            <h3 class="fw-bold mb-0">
                                {{ $kegiatan->pendaftarans()->count() }}
                            </h3>

                        </div>

                        <div class="rounded-circle
                                    bg-success-subtle
                                    text-success
                                    d-flex align-items-center
                                    justify-content-center"
                             style="width:50px;height:50px;">

                            <i class="bi bi-people fs-4"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- KUOTA --}}
        @if(!is_null($kegiatan->kuota))

            <div class="col-md-3">

                <div class="card border-0 shadow-sm rounded-4">

                    <div class="card-body p-4">

                        <small class="text-muted">
                            Kuota
                        </small>

                        <h3 class="fw-bold mb-0">
                            {{ $kegiatan->kuota }}
                        </h3>

                    </div>

                </div>

            </div>

        @endif


        {{-- HADIR --}}
        <div class="col-md-3">

            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-body p-4">

                    <small class="text-muted">
                        Hadir
                    </small>

                    <h3 class="fw-bold mb-0 text-primary">

                        {{ $kegiatan->pendaftarans()
                            ->where('status', 'hadir')
                            ->count() }}

                    </h3>

                </div>

            </div>

        </div>


        {{-- BATAL --}}
        <div class="col-md-3">

            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-body p-4">

                    <small class="text-muted">
                        Batal
                    </small>

                    <h3 class="fw-bold mb-0 text-danger">

                        {{ $kegiatan->pendaftarans()
                            ->where('status', 'batal')
                            ->count() }}

                    </h3>

                </div>

            </div>

        </div>

    </div>


    {{-- TABLE --}}
    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover
                             align-middle mb-0">

                    <thead class="table-light">

                        <tr>

                            <th class="px-4">
                                #
                            </th>

                            <th>
                                Kode Pendaftaran
                            </th>

                            <th>
                                Nama
                            </th>

                            <th>
                                Email
                            </th>

                            <th>
                                No. WhatsApp
                            </th>

                            <th>Asal Komisariat / Instansi</th>

                            <th>
                                Status
                            </th>

                            <th>
                                Tanggal Daftar
                            </th>

                            <th class="text-end px-4">
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($pendaftarans as $index => $pendaftaran)

                            <tr>

                                {{-- NOMOR --}}
                                <td class="px-4">

                                    {{ $pendaftarans->firstItem() + $index }}

                                </td>


                                {{-- KODE --}}
                                <td>

                                    <span class="badge
                                                 bg-success-subtle
                                                 text-success
                                                 px-3 py-2">

                                        {{ $pendaftaran->kode_pendaftaran }}

                                    </span>

                                </td>


                                {{-- NAMA --}}
                                <td>

                                    <strong>
                                        {{ $pendaftaran->nama }}
                                    </strong>

                                </td>


                                {{-- EMAIL --}}
                                <td>
                                    {{ $pendaftaran->email }}
                                </td>


                                {{-- NO WHATSAPP --}}
                                <td>
                                    {{ $pendaftaran->no_hp }}
                                </td>


                                {{-- INSTANSI --}}
                                <td>

                                    {{ $pendaftaran->instansi ?: '-' }}

                                </td>


                                {{-- STATUS --}}
                                <td>

                                    @if($pendaftaran->status === 'terdaftar')

                                        <span class="badge rounded-pill
                                                     bg-success-subtle
                                                     text-success px-3 py-2">

                                            Terdaftar

                                        </span>

                                    @elseif($pendaftaran->status === 'hadir')

                                        <span class="badge rounded-pill
                                                     bg-primary-subtle
                                                     text-primary px-3 py-2">

                                            Hadir

                                        </span>

                                    @else

                                        <span class="badge rounded-pill
                                                     bg-danger-subtle
                                                     text-danger px-3 py-2">

                                            Batal

                                        </span>

                                    @endif

                                </td>


                                {{-- TANGGAL --}}
                                <td>

                                    <div>

                                        {{ $pendaftaran->created_at
                                            ->translatedFormat('d M Y') }}

                                    </div>

                                    <small class="text-muted">

                                        {{ $pendaftaran->created_at
                                            ->format('H:i') }}

                                    </small>

                                </td>


                                {{-- AKSI --}}
                                <td class="text-end px-4">

                                    <a href="{{ route(
                                        'admin.kegiatan.pendaftaran.show',
                                        [
                                            'kegiatan' => $kegiatan,
                                            'pendaftaran' => $pendaftaran
                                        ]
                                    ) }}"
                                       class="btn btn-sm
                                              btn-outline-secondary"
                                       title="Lihat Detail">

                                        <i class="bi bi-eye"></i>

                                    </a>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="9"
                                    class="text-center py-5">

                                    <i class="bi bi-people text-muted"
                                       style="font-size:50px;"></i>

                                    <h6 class="fw-bold mt-3">

                                        Belum ada peserta

                                    </h6>

                                    <p class="text-muted mb-0">

                                        Belum ada pengguna yang
                                        mendaftar pada kegiatan ini.

                                    </p>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>


    {{-- PAGINATION --}}
    @if($pendaftarans->hasPages())

        <div class="mt-4">

            {{ $pendaftarans->links() }}

        </div>

    @endif

</div>

@endsection
