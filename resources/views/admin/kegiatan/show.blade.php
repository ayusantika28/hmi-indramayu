@extends('layouts.admin')

@section('title', 'Detail Kegiatan')

@section('content')

<div class="container-fluid">


{{-- HEADER --}}

<div class="d-flex flex-wrap justify-content-between
            align-items-center gap-3 mb-4">

    <div>

        <h4 class="fw-bold mb-1">
            Detail Kegiatan
        </h4>

        <p class="text-muted mb-0">
            Informasi lengkap kegiatan HMI Cabang Indramayu.
        </p>

    </div>


    <div class="d-flex gap-2">

        <a href="{{ route('admin.kegiatan.edit', $kegiatan) }}"
           class="btn btn-success rounded-pill px-4">

            <i class="bi bi-pencil me-1"></i>

            Edit

        </a>


        <a href="{{ route('admin.kegiatan.index') }}"
           class="btn btn-outline-secondary rounded-pill px-4">

            <i class="bi bi-arrow-left me-1"></i>

            Kembali

        </a>

    </div>

</div>


{{-- CARD UTAMA --}}

<div class="card border-0 shadow-sm rounded-4 overflow-hidden">

    <div class="card-body p-4 p-lg-5">

        <div class="row g-4 g-lg-5">


            {{-- =========================================
                 GAMBAR
            ========================================== --}}

            <div class="col-lg-5">

                @if($kegiatan->gambar)

                    <img src="{{ asset('storage/' . $kegiatan->gambar) }}"
                         alt="{{ $kegiatan->judul }}"
                         class="img-fluid rounded-4 w-100 shadow-sm"
                         style="
                            max-height: 400px;
                            object-fit: cover;
                         ">

                @else

                    <div class="bg-light rounded-4
                                d-flex align-items-center
                                justify-content-center"
                         style="height:350px;">

                        <div class="text-center text-muted">

                            <i class="bi bi-image"
                               style="font-size:70px;">
                            </i>

                            <p class="mb-0 mt-2">
                                Tidak ada gambar
                            </p>

                        </div>

                    </div>

                @endif

            </div>


            {{-- =========================================
                 INFORMASI
            ========================================== --}}

            <div class="col-lg-7">


                {{-- KATEGORI + STATUS --}}

                <div class="d-flex flex-wrap gap-2 mb-3">

                    @if($kegiatan->kategori)

                        <span class="badge rounded-pill
                                     bg-success-subtle
                                     text-success px-3 py-2">

                            <i class="bi bi-tag me-1"></i>

                            {{ $kegiatan->kategori }}

                        </span>

                    @endif


                    @if($kegiatan->status === 'published')

                        <span class="badge rounded-pill
                                     bg-success px-3 py-2">

                            Published

                        </span>

                    @else

                        <span class="badge rounded-pill
                                     bg-secondary px-3 py-2">

                            Draft

                        </span>

                    @endif

                </div>


                {{-- JUDUL --}}

                <h2 class="fw-bold mb-3">

                    {{ $kegiatan->judul }}

                </h2>


                {{-- META --}}

                <div class="d-flex flex-column gap-2 text-muted mb-4">

                    <div>

                        <i class="bi bi-calendar3 me-2 text-success"></i>

                        {{ $kegiatan->tanggal?->format('d F Y') }}

                    </div>


                    @if($kegiatan->lokasi)

                        <div>

                            <i class="bi bi-geo-alt me-2 text-success"></i>

                            {{ $kegiatan->lokasi }}

                        </div>

                    @endif

                </div>


                {{-- RINGKASAN --}}

                @if($kegiatan->excerpt)

                    <div class="p-3 rounded-3 mb-4"
                         style="background:#f3f8f5;">

                        <div class="fw-semibold mb-1">
                            Ringkasan
                        </div>

                        <div class="text-muted">

                            {{ $kegiatan->excerpt }}

                        </div>

                    </div>

                @endif

@if($kegiatan->pendaftaran_aktif)

    <div class="card border-0 bg-success-subtle rounded-4 mt-4">

        <div class="card-body p-4">

            <h5 class="fw-bold mb-3">
                <i class="bi bi-person-plus me-2"></i>
                Pendaftaran Peserta
            </h5>

            <div class="row g-3">

                <div class="col-md-6">

                    <small class="text-muted d-block">
                        Status
                    </small>

                    <span class="badge bg-success">
                        Pendaftaran Aktif
                    </span>

                </div>

                <div class="col-md-6">

                    <small class="text-muted d-block">
                        Kuota
                    </small>

                    <strong>
                        {{ $kegiatan->kuota ?? 'Tidak terbatas' }}
                    </strong>

                </div>

                @if($kegiatan->tanggal_mulai_pendaftaran)

                    <div class="col-md-6">

                        <small class="text-muted d-block">
                            Mulai Pendaftaran
                        </small>

                        <strong>
                            {{ $kegiatan->tanggal_mulai_pendaftaran->format('d F Y, H:i') }}
                        </strong>

                    </div>

                @endif

                @if($kegiatan->tanggal_selesai_pendaftaran)

                    <div class="col-md-6">

                        <small class="text-muted d-block">
                            Batas Pendaftaran
                        </small>

                        <strong>
                            {{ $kegiatan->tanggal_selesai_pendaftaran->format('d F Y, H:i') }}
                        </strong>

                    </div>

                @endif

            </div>

            <div class="mt-4">

                <a href="{{ route(
                    'admin.kegiatan.pendaftaran.index',
                    $kegiatan
                ) }}"
                   class="btn btn-success rounded-pill px-4">

                    <i class="bi bi-people me-2"></i>

                    Kelola Pendaftar

                </a>

            </div>

        </div>

    </div>

@endif
                {{-- INFORMASI TAMBAHAN --}}

                <div class="border-top pt-3">

                    <small class="text-muted">

                        Dibuat:
                        {{ $kegiatan->created_at?->format('d F Y, H:i') }}

                    </small>

                    @if($kegiatan->updated_at &&
                        $kegiatan->updated_at->ne($kegiatan->created_at))

                        <br>

                        <small class="text-muted">

                            Terakhir diperbarui:
                            {{ $kegiatan->updated_at->format('d F Y, H:i') }}

                        </small>

                    @endif

                </div>

            </div>

        </div>


        {{-- =========================================
             ISI KEGIATAN
        ========================================== --}}

        <hr class="my-5">


        <div>

            <h5 class="fw-bold mb-3">

                Isi Kegiatan

            </h5>


            <div class="lh-lg">

                {!! nl2br(e($kegiatan->konten)) !!}

            </div>

        </div>

    </div>

</div>


</div>

@endsection
