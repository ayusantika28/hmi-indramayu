<?php

use Illuminate\Support\Facades\Route;
use App\Models\Berita;
use App\Models\Komisariat;
use App\Models\KegiatanDokumentasi;
use App\Models\ProfileSetting;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\OrganisasiController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\Admin\BeritaController as AdminBeritaController;
use App\Http\Controllers\Admin\OrganisasiController as AdminOrganisasiController;
use App\Http\Controllers\Admin\KegiatanController as AdminKegiatanController;
use App\Http\Controllers\Admin\KegiatanDokumentasiController;

use App\Http\Controllers\Admin\KomisariatController;
use App\Http\Controllers\Admin\ProfileSettingController;

// ======================================================
// PUBLIC
// ======================================================

Route::get('/', [HomeController::class, 'index'])
    ->name('home');


// ======================================================
// TENTANG HMI
// ======================================================

Route::get('/profil', function () {
    $profileSetting = ProfileSetting::first();

    return view('profil', compact('profileSetting'));
})->name('profil');

Route::view('/sejarah', 'sejarah')
    ->name('sejarah');

Route::view('/tujuan', 'tujuan')
    ->name('tujuan');

Route::view('/nilai-dasar-perjuangan', 'nilai-dasar-perjuangan')
    ->name('nilai-dasar-perjuangan');

Route::view('/kaderisasi', 'kaderisasi')
    ->name('kaderisasi');

// ======================================================
// GALERI PUBLIC
// ======================================================

Route::get('/galeri', function () {
    $kegiatans = \App\Models\Kegiatan::query()
        ->where('status', 'published')
        ->with([
            'dokumentasis' => function ($query) {
                $query->orderBy('urutan')
                    ->orderBy('id');
            }
        ])
        ->whereHas('dokumentasis')
        ->latest('tanggal')
        ->latest('id')
        ->paginate(9);

    return view('galeri', compact('kegiatans'));
})->name('galeri.index');
Route::view('/kontak', 'kontak')
    ->name('kontak');

// ======================================================
// ORGANISASI
// ======================================================

// ORGANISASI
Route::get('/organisasi', [OrganisasiController::class, 'index'])
    ->name('organisasi.index');

Route::get('/organisasi/komisariat/{komisariat:slug}', function (Komisariat $komisariat) {
    abort_unless($komisariat->status, 404);

    return view('organisasi.show', compact('komisariat'));
})->name('organisasi.komisariat.show');

// ======================================================
// BERITA PUBLIC
// ======================================================

Route::get('/berita', [BeritaController::class, 'index'])
    ->name('berita.index');

Route::get('/berita/{berita:slug}', [BeritaController::class, 'show'])
    ->name('berita.show');


// ======================================================
// KEGIATAN PUBLIC
// ======================================================

Route::get('/kegiatan', [KegiatanController::class, 'index'])
    ->name('kegiatan.index');

Route::get('/kegiatan/{kegiatan:slug}', [KegiatanController::class, 'show'])
    ->name('kegiatan.show');


// ======================================================
// PENDAFTARAN PUBLIC
// ======================================================

Route::get(
    '/kegiatan/{kegiatan:slug}/daftar',
    [PendaftaranController::class, 'create']
)->name('pendaftaran.create');

Route::post(
    '/kegiatan/{kegiatan:slug}/daftar',
    [PendaftaranController::class, 'store']
)->name('pendaftaran.store');

Route::get(
    '/kegiatan/{kegiatan:slug}/daftar/berhasil/{pendaftaran:kode_pendaftaran}',
    [PendaftaranController::class, 'success']
)->name('pendaftaran.success');


// ======================================================
// AUTH
// ======================================================

require __DIR__.'/auth.php';


// ======================================================
// ADMIN
// ======================================================

Route::middleware(['auth'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // --------------------------------------------------
        // DASHBOARD
        // --------------------------------------------------

        Route::get('/', function () {
            return view('admin.dashboard');
        })->name('dashboard');


        // --------------------------------------------------
        // BERITA
        // --------------------------------------------------

        Route::resource(
            'berita',
            AdminBeritaController::class
        )->parameters([
            'berita' => 'berita',
        ]);


        // --------------------------------------------------
        // ORGANISASI
        // --------------------------------------------------

        Route::resource(
            'organisasi',
            AdminOrganisasiController::class
        )->parameters([
            'organisasi' => 'organisasi',
        ]);


        // --------------------------------------------------
        // KEGIATAN
        // --------------------------------------------------

        Route::resource(
            'kegiatan',
            AdminKegiatanController::class
        );


        // --------------------------------------------------
        // DOKUMENTASI KEGIATAN
        // --------------------------------------------------

        Route::get(
            'kegiatan/{kegiatan}/dokumentasi',
            [KegiatanDokumentasiController::class, 'index']
        )->name('kegiatan.dokumentasi.index');


        Route::post(
            'kegiatan/{kegiatan}/dokumentasi',
            [KegiatanDokumentasiController::class, 'store']
        )->name('kegiatan.dokumentasi.store');


        Route::put(
            'kegiatan/{kegiatan}/dokumentasi/{dokumentasi}',
            [KegiatanDokumentasiController::class, 'update']
        )->name('kegiatan.dokumentasi.update');


        Route::delete(
            'kegiatan/{kegiatan}/dokumentasi/{dokumentasi}',
            [KegiatanDokumentasiController::class, 'destroy']
        )->name('kegiatan.dokumentasi.destroy');


        // --------------------------------------------------
        // PENDAFTARAN
        // --------------------------------------------------

        Route::get(
            'kegiatan/{kegiatan}/pendaftaran',
            [PendaftaranController::class, 'adminIndex']
        )->name('kegiatan.pendaftaran.index');


        Route::get(
            'kegiatan/{kegiatan}/pendaftaran/{pendaftaran}',
            [PendaftaranController::class, 'adminShow']
        )->name('kegiatan.pendaftaran.show');


        Route::put(
            'kegiatan/{kegiatan}/pendaftaran/{pendaftaran}/status',
            [PendaftaranController::class, 'adminUpdateStatus']
        )->name('kegiatan.pendaftaran.status');


        Route::delete(
            'kegiatan/{kegiatan}/pendaftaran/{pendaftaran}',
            [PendaftaranController::class, 'adminDestroy']
        )->name('kegiatan.pendaftaran.destroy');


        Route::get(
        'kegiatan/{kegiatan}/pendaftaran/export/excel',
        [PendaftaranController::class, 'adminExportExcel']
        )->name('kegiatan.pendaftaran.export.excel');

        Route::resource('komisariat', KomisariatController::class);

        Route::get(
            '/pengaturan/profil',
            [ProfileSettingController::class, 'edit']
        )->name('profile-setting.edit');

        Route::put(
            '/pengaturan/profil',
            [ProfileSettingController::class, 'update']
        )->name('profile-setting.update');
   });
