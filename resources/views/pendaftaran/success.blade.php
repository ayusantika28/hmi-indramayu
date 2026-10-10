@extends('layouts.app')

@section('title', 'Pendaftaran Berhasil')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-7">

            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-body p-4 p-md-5 text-center">

                    {{-- ICON BERHASIL --}}
                    <div class="mx-auto mb-4 rounded-circle
                                bg-success-subtle text-success
                                d-flex align-items-center justify-content-center"
                         style="width:80px;height:80px;">

                        <i class="bi bi-check-lg"
                           style="font-size:42px;"></i>

                    </div>


                    {{-- JUDUL --}}
                    <h2 class="fw-bold mb-2">
                        Pendaftaran Berhasil!
                    </h2>


                    <p class="text-muted mb-4">
                        Terima kasih telah mendaftar pada kegiatan:
                    </p>


                    {{-- NAMA KEGIATAN --}}
                    <h4 class="fw-bold mb-4">
                        {{ $kegiatan->judul }}
                    </h4>


                    {{-- KODE PENDAFTARAN --}}
                    <div class="bg-success-subtle rounded-4 p-4 mb-4">

                        <small class="text-success fw-semibold d-block mb-2">
                            Kode Pendaftaran
                        </small>

                        <div class="fw-bold text-success fs-5"
                             style="word-break: break-all;">

                            {{ $pendaftaran->kode_pendaftaran }}

                        </div>

                        <small class="text-muted d-block mt-2">
                            Simpan kode ini sebagai bukti pendaftaran Anda.
                        </small>

                    </div>


                    {{-- DATA PESERTA --}}
                    <div class="bg-light rounded-4 p-4 text-start mb-4">

                        <h6 class="fw-bold mb-4">
                            <i class="bi bi-person me-2"></i>
                            Data Peserta
                        </h6>


                        {{-- NAMA --}}
                        <div class="mb-3">

                            <small class="text-muted d-block">
                                Nama
                            </small>

                            <strong>
                                {{ $pendaftaran->nama }}
                            </strong>

                        </div>


                        {{-- EMAIL --}}
                        <div class="mb-3">

                            <small class="text-muted d-block">
                                Email
                            </small>

                            <strong>
                                {{ $pendaftaran->email }}
                            </strong>

                        </div>


                        {{-- NOMOR WHATSAPP --}}
                        <div class="mb-3">

                            <small class="text-muted d-block">
                                Nomor WhatsApp
                            </small>

                            <strong>
                                {{ $pendaftaran->no_hp }}
                            </strong>

                        </div>


                        {{-- INSTANSI --}}
                        @if($pendaftaran->instansi)

                            <div>

                                <small class="text-muted d-block">
                                    Instansi / Organisasi
                                </small>

                                <strong>
                                    {{ $pendaftaran->instansi }}
                                </strong>

                            </div>

                        @endif

                    </div>


                    {{-- INFORMASI --}}
                    <div class="alert alert-success text-start rounded-3">

                        <i class="bi bi-info-circle me-2"></i>

                        Data pendaftaran Anda telah berhasil
                        dicatat oleh sistem.

                    </div>


                    {{-- TOMBOL --}}
                    <div class="d-flex flex-column flex-sm-row
                                justify-content-center gap-2">

                        <a href="{{ route('kegiatan.show', $kegiatan) }}"
                           class="btn btn-outline-success rounded-pill px-4">

                            <i class="bi bi-arrow-left me-2"></i>

                            Kembali ke Kegiatan

                        </a>


                        <a href="{{ route('home') }}"
                           class="btn btn-success rounded-pill px-4">

                            <i class="bi bi-house me-2"></i>

                            Kembali ke Beranda

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
