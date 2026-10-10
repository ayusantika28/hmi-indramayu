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
        // Pengaturan profil
        $profileSetting = ProfileSetting::first();

        // Berita terbaru
        $beritas = Berita::query()
            ->where('status', 'published')
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->latest('published_at')
            ->take(3)
            ->get();

        // Kegiatan terbaru
        $kegiatans = Kegiatan::query()
            ->where('status', 'published')
            ->latest('tanggal')
            ->latest('id')
            ->take(3)
            ->get();

        // Galeri terbaru
        $galeri = KegiatanDokumentasi::query()
            ->whereHas('kegiatan', function ($query) {
                $query->where('status', 'published');
            })
            ->with('kegiatan')
            ->latest('id')
            ->take(3)
            ->get();

        return view('home', compact(
            'profileSetting',
            'beritas',
            'kegiatans',
            'galeri'
        ));
    }
}
