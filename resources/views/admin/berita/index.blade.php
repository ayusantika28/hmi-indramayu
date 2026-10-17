@extends('layouts.admin')

@section('title', 'Kelola Berita')

@section('content')

<div class="container py-5">

    {{-- Header --}}
    <div class="d-flex flex-column flex-md-row
                justify-content-between
                align-items-md-center
                gap-3 mb-4">

        <div>
            <h2 class="fw-bold mb-1">
                Kelola Berita
            </h2>

            <p class="text-muted mb-0">
                Kelola berita HMI Cabang Indramayu.
            </p>
        </div>

        <a href="{{ route('admin.berita.create') }}"
           class="btn btn-success rounded-pill px-4">

            <i class="bi bi-plus-lg me-1"></i>

            Tambah Berita

        </a>

    </div>



    {{-- Search & Filter --}}
    <div class="card border-0 shadow-sm rounded-4 mb-4">

        <div class="card-body p-4">

            <form method="GET"
                  action="{{ route('admin.berita.index') }}">

                <div class="row g-3 align-items-end">

                    {{-- Search --}}
                    <div class="col-lg-6">

                        <label class="form-label fw-semibold">
                            Cari Berita
                        </label>

                        <div class="input-group">

                            <span class="input-group-text bg-white">
                                <i class="bi bi-search"></i>
                            </span>

                            <input type="text"
                                   name="search"
                                   class="form-control"
                                   placeholder="Cari berdasarkan judul..."
                                   value="{{ request('search') }}">

                        </div>

                    </div>


                    {{-- Status --}}
                    <div class="col-lg-3">

                        <label class="form-label fw-semibold">
                            Status
                        </label>

                        <select name="status"
                                class="form-select">

                            <option value="">
                                Semua Status
                            </option>

                            <option value="published"
                                @selected(request('status') === 'published')>

                                Published

                            </option>

                            <option value="draft"
                                @selected(request('status') === 'draft')>

                                Draft

                            </option>

                        </select>

                    </div>


                    {{-- Button --}}
                    <div class="col-lg-3 d-flex gap-2">

                        <button type="submit"
                                class="btn btn-success flex-grow-1">

                            <i class="bi bi-funnel me-1"></i>

                            Filter

                        </button>

                        <a href="{{ route('admin.berita.index') }}"
                           class="btn btn-outline-secondary">

                            <i class="bi bi-arrow-counterclockwise"></i>

                        </a>

                    </div>

                </div>

            </form>

        </div>

    </div>


    {{-- Table --}}
    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">

                        <tr>

                            <th class="px-4 py-3">
                                #
                            </th>

                            <th>
                                Berita
                            </th>

                            <th>
                                Status
                            </th>

                            <th>
                                Tanggal
                            </th>

                            <th class="text-end px-4">
                                Aksi
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($beritas as $index => $berita)

                            <tr>

                                {{-- Number --}}
                                <td class="px-4">

                                    {{ $beritas->firstItem() + $index }}

                                </td>


                                {{-- Berita --}}
                                <td>

                                    <div class="d-flex align-items-center gap-3">

                                        @if($berita->gambar)

                                            <img src="{{ asset('storage/' . $berita->gambar) }}"
                                                 alt="{{ $berita->judul }}"
                                                 class="rounded-3"
                                                 width="75"
                                                 height="55"
                                                 style="object-fit: cover;">

                                        @else

                                            <div class="bg-light rounded-3
                                                        d-flex align-items-center
                                                        justify-content-center"
                                                 style="width:75px;height:55px;">

                                                <i class="bi bi-image text-muted"></i>

                                            </div>

                                        @endif


                                        <div>

                                            <div class="fw-semibold">

                                                {{ $berita->judul }}

                                            </div>

                                            <small class="text-muted">

                                                {{ Str::limit($berita->excerpt ?? '', 70) }}

                                            </small>

                                        </div>

                                    </div>

                                </td>


                                {{-- Status --}}
                                <td>

                                    @if($berita->status === 'published')

                                        <span class="badge rounded-pill
                                                     bg-success-subtle
                                                     text-success px-3 py-2">

                                            Published

                                        </span>

                                    @else

                                        <span class="badge rounded-pill
                                                     bg-warning-subtle
                                                     text-warning-emphasis px-3 py-2">

                                            Draft

                                        </span>

                                    @endif

                                </td>


                                {{-- Date --}}
                                <td>

                                    <div>
                                        {{ $berita->created_at->format('d M Y') }}
                                    </div>

                                    <small class="text-muted">

                                        {{ $berita->created_at->format('H:i') }}

                                    </small>

                                </td>



{{-- Actions --}}
<td class="text-end px-4">

    <div class="d-flex justify-content-end gap-2">

        {{-- Tombol Lihat --}}
        <a href="{{ route('admin.berita.show', ['berita' => $berita]) }}"
           class="btn btn-sm btn-outline-secondary"
           title="Lihat berita">

            <i class="bi bi-eye"></i>

        </a>

        {{-- Tombol Hapus --}}
        <form action="{{ route('admin.berita.destroy', ['berita' => $berita]) }}"
              method="POST"
              onsubmit="return confirm('Yakin ingin menghapus berita ini?');">

            @csrf

            @method('DELETE')

            <button type="submit"
                    class="btn btn-sm btn-outline-danger"
                    title="Hapus berita">

                <i class="bi bi-trash"></i>

            </button>

        </form>

    </div>

</td>


                            </tr>

                        @empty

                            <tr>

                                <td colspan="5"
                                    class="text-center py-5">

                                    <div class="mb-3">

                                        <i class="bi bi-newspaper"
                                           style="font-size: 50px; color: #9ca3af;">
                                        </i>

                                    </div>

                                    <h6 class="fw-bold">
                                        Belum ada berita
                                    </h6>

                                    <p class="text-muted mb-3">
                                        Mulai tambahkan berita pertama.
                                    </p>

                                    <a href="{{ route('admin.berita.create') }}"
                                       class="btn btn-success rounded-pill px-4">

                        <i class="bi bi-plus-lg me-2"></i>

                                        Tambah Berita

                                    </a>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>


    {{-- Pagination --}}
    @if($beritas->hasPages())

        <div class="mt-4">

            {{ $beritas->links() }}

        </div>

    @endif

</div>

@endsection
