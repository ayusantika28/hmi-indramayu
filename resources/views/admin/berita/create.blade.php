@extends('layouts.admin')

@section('title', 'Tambah Berita')

@section('content')

<div class="container py-5">

    {{-- Header --}}
    <div class="d-flex flex-column flex-md-row
                justify-content-between
                align-items-md-center
                gap-3 mb-4">

        <div>
            <h2 class="fw-bold mb-1">
                Tambah Berita
            </h2>

            <p class="text-muted mb-0">
                Tambahkan berita baru HMI Cabang Indramayu.
            </p>
        </div>

        <a href="{{ route('admin.berita.index') }}"
           class="btn btn-outline-secondary rounded-pill px-4">

            <i class="bi bi-arrow-left me-1"></i>

            Kembali

        </a>

    </div>


    {{-- Validation Error --}}
    @if($errors->any())

        <div class="alert alert-danger rounded-4">

            <div class="fw-bold mb-2">
                <i class="bi bi-exclamation-triangle me-2"></i>
                Terdapat kesalahan:
            </div>

            <ul class="mb-0">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    <form action="{{ route('admin.berita.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <div class="row g-4">

            {{-- LEFT --}}
            <div class="col-lg-8">

                <div class="card border-0 shadow-sm rounded-4">

                    <div class="card-body p-4">

                        <h5 class="fw-bold mb-4">
                            Informasi Berita
                        </h5>


                        {{-- Judul --}}
                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                Judul Berita
                                <span class="text-danger">*</span>
                            </label>

                            <input type="text"
                                   name="judul"
                                   class="form-control form-control-lg
                                          @error('judul') is-invalid @enderror"
                                   value="{{ old('judul') }}"
                                   placeholder="Masukkan judul berita..."
                                   required>

                            @error('judul')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        {{-- Excerpt --}}
                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                Ringkasan
                            </label>

                            <textarea name="excerpt"
                                      rows="3"
                                      class="form-control
                                             @error('excerpt') is-invalid @enderror"
                                      placeholder="Ringkasan singkat berita...">{{ old('excerpt') }}</textarea>

                            <div class="form-text">
                                Maksimal 500 karakter.
                            </div>

                            @error('excerpt')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        {{-- Konten --}}
                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                Isi Berita
                                <span class="text-danger">*</span>
                            </label>

                            <textarea name="konten"
                                      rows="15"
                                      class="form-control
                                             @error('konten') is-invalid @enderror"
                                      placeholder="Tulis isi berita di sini..."
                                      required>{{ old('konten') }}</textarea>

                            @error('konten')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>

                    </div>

                </div>

            </div>


            {{-- RIGHT --}}
            <div class="col-lg-4">

                {{-- Gambar --}}
                <div class="card border-0 shadow-sm rounded-4 mb-4">

                    <div class="card-body p-4">

                        <h5 class="fw-bold mb-3">
                            Gambar Berita
                        </h5>

                        <label class="form-label fw-semibold">
                            Upload Gambar
                        </label>

                        <input type="file"
                               name="gambar"
                               id="gambar"
                               class="form-control
                                      @error('gambar') is-invalid @enderror"
                               accept="image/jpeg,image/png,image/webp">

                        <div class="form-text">
                            JPG, PNG, atau WEBP. Maksimal 5 MB.
                        </div>

                        @error('gambar')

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                        @enderror


                        {{-- Preview --}}
                        <div id="imagePreview"
                             class="mt-3 d-none">

                            <img id="preview"
                                 src=""
                                 alt="Preview"
                                 class="img-fluid rounded-3">

                        </div>

                    </div>

                </div>


                {{-- Status --}}
                <div class="card border-0 shadow-sm rounded-4 mb-4">

                    <div class="card-body p-4">

                        <h5 class="fw-bold mb-3">
                            Publikasi
                        </h5>


                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                Status
                            </label>

                            <select name="status"
                                    class="form-select">

                                <option value="draft"
                                    @selected(old('status', 'draft') === 'draft')>

                                    Draft

                                </option>

                                <option value="published"
                                    @selected(old('status') === 'published')>

                                    Published

                                </option>

                            </select>

                        </div>


                        <div>

                            <label class="form-label fw-semibold">
                                Tanggal Publikasi
                            </label>

                            <input type="datetime-local"
                                   name="published_at"
                                   class="form-control"
                                   value="{{ old('published_at') }}">

                            <div class="form-text">
                                Kosongkan jika belum menentukan tanggal.
                            </div>

                        </div>

                    </div>

                </div>


                {{-- Submit --}}
                <div class="card border-0 shadow-sm rounded-4">

                    <div class="card-body p-4">

                        <button type="submit"
                                class="btn btn-success w-100 rounded-pill py-2">

                            <i class="bi bi-check-lg me-1"></i>

                            Simpan Berita

                        </button>

                    </div>

                </div>

            </div>

        </div>

    </form>

</div>


{{-- Preview Image --}}
@push('scripts')

<script>

document.getElementById('gambar').addEventListener('change', function (event) {

    const file = event.target.files[0];

    const previewContainer = document.getElementById('imagePreview');

    const preview = document.getElementById('preview');

    if (file) {

        preview.src = URL.createObjectURL(file);

        previewContainer.classList.remove('d-none');

    } else {

        preview.src = '';

        previewContainer.classList.add('d-none');

    }

});

</script>

@endpush

@endsection
