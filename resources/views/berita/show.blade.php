@extends('layouts.app')

@section('content')

<main class="py-5">

    <div class="container">

        <a href="{{ route('berita.index') }}"
           class="btn btn-outline-dark mb-4">

            ← Kembali ke Berita

        </a>

        <article>

            <h1 class="fw-bold">

                {{ $berita->judul }}

            </h1>

            <div class="text-muted mb-4">

                {{ $berita->published_at->format('d F Y H:i') }}

            </div>

            @if($berita->gambar)

                <img src="{{ asset('storage/' . $berita->gambar) }}"
                     alt="{{ $berita->judul }}"
                     class="img-fluid rounded-4 mb-4">

            @endif

            @if($berita->excerpt)

                <p class="lead">

                    {{ $berita->excerpt }}

                </p>

            @endif

            <div>

                {!! nl2br(e($berita->konten)) !!}

            </div>

        </article>

    </div>

</main>

@endsection
