<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use App\Models\KegiatanDokumentasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KegiatanDokumentasiController extends Controller
{
    /**
     * Menampilkan dokumentasi kegiatan.
     */
    public function index(Kegiatan $kegiatan)
    {
        $dokumentasis = $kegiatan
            ->dokumentasis()
            ->get();

        return view(
            'admin.kegiatan.dokumentasi.index',
            compact(
                'kegiatan',
                'dokumentasis'
            )
        );
    }


    /**
     * Menyimpan dokumentasi baru.
     */
    public function store(
        Request $request,
        Kegiatan $kegiatan
    ) {
        $validated = $request->validate([
            'gambar' => [
                'required',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],

            'caption' => [
                'nullable',
                'string',
                'max:255',
            ],

            'urutan' => [
                'nullable',
                'integer',
                'min:0',
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | Upload gambar
        |--------------------------------------------------------------------------
        */

        $validated['gambar'] = $request
            ->file('gambar')
            ->store('kegiatan/dokumentasi', 'public');


        /*
        |--------------------------------------------------------------------------
        | Hubungkan dengan kegiatan
        |--------------------------------------------------------------------------
        */

        $validated['kegiatan_id'] = $kegiatan->id;

        $validated['urutan'] = $validated['urutan'] ?? 0;


        /*
        |--------------------------------------------------------------------------
        | Simpan dokumentasi
        |--------------------------------------------------------------------------
        */

        KegiatanDokumentasi::create($validated);


        return redirect()
            ->route(
                'admin.kegiatan.dokumentasi.index',
                $kegiatan
            )
            ->with(
                'success',
                'Dokumentasi berhasil ditambahkan.'
            );
    }


    /**
     * Memperbarui caption dan urutan dokumentasi.
     */
    public function update(
        Request $request,
        Kegiatan $kegiatan,
        KegiatanDokumentasi $dokumentasi
    ) {
        /*
        |--------------------------------------------------------------------------
        | Pastikan dokumentasi milik kegiatan
        |--------------------------------------------------------------------------
        */

        abort_unless(
            $dokumentasi->kegiatan_id === $kegiatan->id,
            404
        );


        $validated = $request->validate([
            'caption' => [
                'nullable',
                'string',
                'max:255',
            ],

            'urutan' => [
                'required',
                'integer',
                'min:0',
            ],
        ]);


        $dokumentasi->update($validated);


        return redirect()
            ->route(
                'admin.kegiatan.dokumentasi.index',
                $kegiatan
            )
            ->with(
                'success',
                'Dokumentasi berhasil diperbarui.'
            );
    }


    /**
     * Menghapus dokumentasi.
     */
    public function destroy(
        Kegiatan $kegiatan,
        KegiatanDokumentasi $dokumentasi
    ) {
        /*
        |--------------------------------------------------------------------------
        | Pastikan dokumentasi milik kegiatan
        |--------------------------------------------------------------------------
        */

        abort_unless(
            $dokumentasi->kegiatan_id === $kegiatan->id,
            404
        );


        /*
        |--------------------------------------------------------------------------
        | Hapus file gambar
        |--------------------------------------------------------------------------
        */

        if ($dokumentasi->gambar) {

            Storage::disk('public')
                ->delete($dokumentasi->gambar);
        }


        /*
        |--------------------------------------------------------------------------
        | Hapus data
        |--------------------------------------------------------------------------
        */

        $dokumentasi->delete();


        return redirect()
            ->route(
                'admin.kegiatan.dokumentasi.index',
                $kegiatan
            )
            ->with(
                'success',
                'Dokumentasi berhasil dihapus.'
            );
    }
}

