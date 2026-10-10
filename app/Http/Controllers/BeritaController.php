<?php

namespace App\Http\Controllers;

use App\Models\Berita;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::query()
            ->where('status', 'published')
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->latest('published_at')
            ->paginate(9);

        return view('berita.index', compact('beritas'));
    }

    public function show(Berita $berita)
    {
        abort_unless(
            $berita->status === 'published' &&
            $berita->published_at &&
            $berita->published_at <= now(),
            404
        );

        return view('berita.show', compact('berita'));
    }
}
