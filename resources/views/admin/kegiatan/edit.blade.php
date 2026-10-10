@extends('layouts.admin')

@section('title', 'Edit Kegiatan')

@section('content')

<div class="container-fluid">

{{-- HEADER --}}

<div class="mb-4">

    <a href="{{ route('admin.kegiatan.index') }}"
       class="text-decoration-none text-muted">

        <i class="bi bi-arrow-left me-1"></i>

        Kembali ke Kegiatan

    </a>

    <h4 class="fw-bold mt-3 mb-1">
        Edit Kegiatan
    </h4>

    <p class="text-muted mb-0">
        Perbarui informasi kegiatan HMI Cabang Indramayu.
    </p>

</div>


{{-- ERROR VALIDATION --}}

@if($errors->any())

    <div class="alert alert-danger">

        <strong>
            Data belum dapat diperbarui.
        </strong>

        <ul class="mb-0 mt-2">

            @foreach($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif


{{-- FORM --}}

<div class="card border-0 shadow-sm rounded-4">

    <div class="card-body p-4">

        <form action="{{ route('admin.kegiatan.update', $kegiatan) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')


            <div class="row g-4">

                {{-- =========================================
                     BAGIAN KIRI
                ========================================== --}}

                <div class="col-lg-8">

                    {{-- JUDUL --}}

                    <div class="mb-4">

                        <label for="judul"
                               class="form-label fw-semibold">

                            Judul Kegiatan
                            <span class="text-danger">*</span>

                        </label>

                        <input type="text"
                               id="judul"
                               name="judul"
                               value="{{ old('judul', $kegiatan->judul) }}"
                               class="form-control form-control-lg"
                               placeholder="Masukkan judul kegiatan"
                               required>

                    </div>


                    {{-- RINGKASAN --}}

                    <div class="mb-4">

                        <label for="excerpt"
                               class="form-label fw-semibold">

                            Ringkasan Kegiatan

                        </label>

                        <textarea id="excerpt"
                                  name="excerpt"
                                  rows="3"
                                  class="form-control"
                                  placeholder="Tuliskan ringkasan singkat kegiatan...">{{ old('excerpt', $kegiatan->excerpt) }}</textarea>

                    </div>


                    {{-- KONTEN --}}

                    <div class="mb-4">

                        <label for="konten"
                               class="form-label fw-semibold">

                            Isi Kegiatan
                            <span class="text-danger">*</span>

                        </label>

                        <textarea id="konten"
                                  name="konten"
                                  rows="10"
                                  class="form-control"
                                  placeholder="Tuliskan informasi lengkap mengenai kegiatan..."
                                  required>{{ old('konten', $kegiatan->konten) }}</textarea>

                    </div>

                </div>


                {{-- =========================================
                     BAGIAN KANAN
                ========================================== --}}

                <div class="col-lg-4">

                    {{-- KATEGORI --}}

                    <div class="mb-4">

                        <label for="kategori"
                               class="form-label fw-semibold">

                            Kategori Kegiatan
                            <span class="text-danger">*</span>

                        </label>

                        <select id="kategori"
                                name="kategori"
                                class="form-select form-select-lg"
                                required>

                            <option value="">
                                -- Pilih Kategori --
                            </option>

                            @foreach($kategoriKegiatan as $kategori)

                                <option value="{{ $kategori }}"
                                    @selected(
                                        old(
                                            'kategori',
                                            $kegiatan->kategori
                                        ) === $kategori
                                    )>

                                    {{ $kategori }}

                                </option>

                            @endforeach

                        </select>

                    </div>


                    {{-- TANGGAL --}}

                    <div class="mb-4">

                        <label for="tanggal"
                               class="form-label fw-semibold">

                            Tanggal Kegiatan
                            <span class="text-danger">*</span>

                        </label>

                        <input type="date"
                               id="tanggal"
                               name="tanggal"
                               value="{{ old('tanggal', $kegiatan->tanggal?->format('Y-m-d')) }}"
                               class="form-control form-control-lg"
                               required>

                    </div>


                    {{-- LOKASI --}}

                    <div class="mb-4">

                        <label for="lokasi"
                               class="form-label fw-semibold">

                            Lokasi Kegiatan

                        </label>

                        <input type="text"
                               id="lokasi"
                               name="lokasi"
                               value="{{ old('lokasi', $kegiatan->lokasi) }}"
                               class="form-control form-control-lg"
                               placeholder="Contoh: Sekretariat HMI Cabang Indramayu">

                    </div>


                    {{-- STATUS --}}

                    <div class="mb-4">

                        <label for="status"
                               class="form-label fw-semibold">

                            Status Kegiatan
                            <span class="text-danger">*</span>

                        </label>

                        <select id="status"
                                name="status"
                                class="form-select form-select-lg">

                            <option value="published"
                                @selected(
                                    old(
                                        'status',
                                        $kegiatan->status
                                    ) === 'published'
                                )>

                                Published

                            </option>

                            <option value="draft"
                                @selected(
                                    old(
                                        'status',
                                        $kegiatan->status
                                    ) === 'draft'
                                )>

                                Draft

                            </option>

                        </select>

                    </div>


                    {{-- GAMBAR SAAT INI --}}

                    @if($kegiatan->gambar)

                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                Gambar Saat Ini
                            </label>

                            <div>

                                <img src="{{ asset('storage/' . $kegiatan->gambar) }}"
                                     alt="{{ $kegiatan->judul }}"
                                     class="img-fluid rounded-3"
                                     style="max-height:220px; width:100%; object-fit:cover;">

                            </div>

                        </div>

                    @endif


                    {{-- GANTI GAMBAR --}}

                    <div class="mb-4">

                        <label for="gambar"
                               class="form-label fw-semibold">

                            Ganti Gambar

                        </label>

                        <input type="file"
                               id="gambar"
                               name="gambar"
                               class="form-control"
                               accept=".jpg,.jpeg,.png,.webp">

                        <div class="form-text">

                            Kosongkan jika tidak ingin mengganti gambar.
                            Maksimal 5 MB.

                        </div>

                    </div>

                </div>

            </div>


            {{-- BUTTON --}}

            <hr class="my-4">

            <div class="d-flex flex-wrap justify-content-end gap-2">

                <a href="{{ route('admin.kegiatan.index') }}"
                   class="btn btn-outline-secondary rounded-pill px-4">

                    Batal

                </a>

                <button type="submit"
                        class="btn btn-success rounded-pill px-4">

                    <i class="bi bi-save me-2"></i>

                    Simpan Perubahan

                </button>

            </div>


        </form>

    </div>

</div>


</div>

@endsection
