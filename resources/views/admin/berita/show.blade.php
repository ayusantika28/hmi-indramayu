@extends('layouts.admin')

@section('title', 'Detail Berita')

@section('content')

<div class="container py-5">

    {{-- Header --}}
    <div class="d-flex flex-column flex-md-row
                justify-content-between
                align-items-md-center
                gap-3 mb-4">

        <div>

            <h2 class="fw-bold mb-1">
                Detail Berita
            </h2>

            <p class="text-muted mb-0">
                Pratinjau berita HMI Cabang Indramayu.
            </p>

        </div>

        <div class="d-flex gap-2">

            <a href="{{ route('admin.berita.edit', ['berita' => $berita->id]) }}"
               class="btn btn-success rounded-pill px-4">

                <i class="bi bi-pencil me-1"></i>

                Edit

            </a>

            <a href="{{ route('admin.berita.index') }}"
               class="btn btn-outline-secondary rounded-pill px-4">

                <i class="bi bi-arrow-left me-1"></i>

                Kembali

            </a>

        </div>

    </div>


    <div class="row g-4">

        {{-- Konten --}}
        <div class="col-lg-8">

            <article class="card border-0 shadow-sm rounded-4">

                {{-- Gambar --}}
                @if($berita->gambar)

                    <img src="{{ asset('storage/' . $berita->gambar) }}"
                         alt="{{ $berita->judul }}"
                         class="card-img-top rounded-top-4"
                         style="max-height: 450px; object-fit: cover;">

                @endif


                <div class="card-body p-4 p-lg-5">

                    {{-- Status --}}
                    <div class="mb-3">

                        @if($berita->status === 'published')

                            <span class="badge bg-success rounded-pill px-3 py-2">

                                Published

                            </span>

                        @else

                            <span class="badge bg-warning text-dark rounded-pill px-3 py-2">

                                Draft

                            </span>

                        @endif

                    </div>


                    {{-- Judul --}}
                    <h1 class="fw-bold mb-3">

                        {{ $berita->judul }}

                    </h1>


                    {{-- Meta --}}
                    <div class="text-muted mb-4">

                        <i class="bi bi-calendar3 me-1"></i>

                        {{ $berita->created_at->format('d F Y') }}

                        <span class="mx-2">•</span>

                        <i class="bi bi-clock me-1"></i>

                        {{ $berita->created_at->format('H:i') }}

                    </div>


                    {{-- Excerpt --}}
                    @if($berita->excerpt)

                        <div class="p-3 bg-light rounded-3 mb-4">

                            <strong>
                                {{ $berita->excerpt }}
                            </strong>

                        </div>

                    @endif


                    {{-- Konten --}}
                    <div class="berita-content">

                        {!! nl2br(e($berita->konten)) !!}

                    </div>

                </div>

            </article>

        </div>


        {{-- Sidebar --}}
        <div class="col-lg-4">

            {{-- Informasi --}}
            <div class="card border-0 shadow-sm rounded-4 mb-4">

                <div class="card-body p-4">

                    <h5 class="fw-bold mb-4">
                        Informasi Berita
                    </h5>


                    <div class="mb-3">

                        <small class="text-muted d-block">
                            ID Berita
                        </small>

                        <strong>
                            #{{ $berita->id }}
                        </strong>

                    </div>


                    <div class="mb-3">

                        <small class="text-muted d-block">
                            Slug
                        </small>

                        <strong>
                            {{ $berita->slug }}
                        </strong>

                    </div>


                    <div class="mb-3">

                        <small class="text-muted d-block">
                            Status
                        </small>

                        @if($berita->status === 'published')

                            <span class="badge bg-success">
                                Published
                            </span>

                        @else

                            <span class="badge bg-warning text-dark">
                                Draft
                            </span>

                        @endif

                    </div>


                    <div>

                        <small class="text-muted d-block">
                            Dipublikasikan
                        </small>

                        <strong>

                            @if($berita->published_at)

                                {{ $berita->published_at->format('d F Y H:i') }}

                            @else

                                Belum dipublikasikan

                            @endif

                        </strong>

                    </div>

                </div>

            </div>


            {{-- Actions --}}
            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-body p-4">

                    <h5 class="fw-bold mb-3">
                        Aksi
                    </h5>


                    <a href="{{ route('admin.berita.edit', ['berita' => $berita->id]) }}"
                       class="btn btn-success w-100 rounded-pill mb-2">

                        <i class="bi bi-pencil me-1"></i>

                        Edit Berita

                    </a>


                    <form action="{{ route('admin.berita.destroy', ['berita' => $berita->id]) }}"
                          method="POST"
                          onsubmit="return confirm('Yakin ingin menghapus berita ini?')">

                        @csrf

                        @method('DELETE')

                        <button type="submit"
                                class="btn btn-outline-danger w-100 rounded-pill">

                            <i class="bi bi-trash me-1"></i>

                            Hapus Berita

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
