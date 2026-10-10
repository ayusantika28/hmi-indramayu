<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Kegiatan;
use App\Models\KegiatanDokumentasi;
use App\Models\ProfileSetting;

class HomeController extends Controller
{
    /**
     * Menampilkan halaman utama website.
     */
    public function index()
    {
        // ==================================================
        // PENGATURAN PROFIL
        // ==================================================

        $profileSetting = ProfileSetting::first();


        // ==================================================
        // BERITA TERBARU
        // ==================================================

        $beritas = Berita::query()
            ->where('status', 'published')
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->latest('published_at')
            ->take(3)
            ->get();


        // ==================================================
        // KEGIATAN TERBARU
        // ==================================================

        $kegiatans = Kegiatan::query()
            ->where('status', 'published')
            ->with('dokumentasis')
            ->latest('tanggal')
            ->latest('id')
            ->take(3)
            ->get();


        // ==================================================
        // GALERI TERBARU
        // ==================================================

        $galeri = KegiatanDokumentasi::query()
            ->whereHas('kegiatan', function ($query) {

                $query->where('status', 'published');

            })
            ->with('kegiatan')
            ->latest('id')
            ->take(3)
            ->get();


        // ==================================================
        // RETURN HOME
        // ==================================================

        return view(
            'home',
            compact(
                'profileSetting',
                'beritas',
                'kegiatans',
                'galeri'
            )
        );
    }
}
