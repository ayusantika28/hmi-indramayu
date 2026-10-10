<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class KegiatanController extends Controller
{
    /**
     * Daftar kategori kegiatan HMI
     */
    private function kategoriKegiatan(): array
    {
        return [
            'Perkaderan',
            'Kajian & Diskusi',
            'Keorganisasian',
            'Keumatan & Sosial',
            'Advokasi',
            'Keilmuan',
            'Seminar & Pelatihan',
            'Aksi & Gerakan',
            'Kegiatan Komisariat',
            'Lainnya',
        ];
    }


    /**
     * Menampilkan daftar kegiatan
     */
    public function index()
    {
        $kegiatans = Kegiatan::latest('tanggal')
            ->latest('id')
            ->paginate(10);

        return view(
            'admin.kegiatan.index',
            compact('kegiatans')
        );
    }


    /**
     * Form tambah kegiatan
     */
    public function create()
    {
        $kategoriKegiatan = $this->kategoriKegiatan();

        return view(
            'admin.kegiatan.create',
            compact('kategoriKegiatan')
        );
    }


    /**
     * Menyimpan kegiatan baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([

            // Informasi kegiatan
            'judul' => [
                'required',
                'string',
                'max:255',
            ],

            'kategori' => [
                'required',
                'string',
                'in:' . implode(',', $this->kategoriKegiatan()),
            ],

            'excerpt' => [
                'nullable',
                'string',
            ],

            'konten' => [
                'required',
                'string',
            ],

            // Detail
            'lokasi' => [
                'nullable',
                'string',
                'max:255',
            ],

            'tanggal' => [
                'required',
                'date',
            ],

            'status' => [
                'required',
                'in:draft,published',
            ],

            // Gambar
            'gambar' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],

            // Pendaftaran
            'pendaftaran_aktif' => [
                'nullable',
                'boolean',
            ],

            'tanggal_mulai_pendaftaran' => [
                'nullable',
                'date',
            ],

            'tanggal_selesai_pendaftaran' => [
                'nullable',
                'date',
                'after_or_equal:tanggal_mulai_pendaftaran',
            ],

            'kuota' => [
                'nullable',
                'integer',
                'min:1',
            ],

            'link_pendaftaran' => [
                'nullable',
                'url',
                'max:2048',
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | Pendaftaran
        |--------------------------------------------------------------------------
        |
        | Checkbox menggunakan hidden input 0 dan checkbox 1.
        | Kita pastikan nilainya selalu 0 atau 1.
        |
        */

        $validated['pendaftaran_aktif'] =
            $request->boolean('pendaftaran_aktif');


        /*
        |--------------------------------------------------------------------------
        | Jika pendaftaran tidak aktif
        |--------------------------------------------------------------------------
        |
        | Data pengaturan pendaftaran tidak perlu disimpan
        | apabila pendaftaran dimatikan.
        |
        */

        if (!$validated['pendaftaran_aktif']) {

            $validated['tanggal_mulai_pendaftaran'] = null;

            $validated['tanggal_selesai_pendaftaran'] = null;

            $validated['kuota'] = null;

            $validated['link_pendaftaran'] = null;
        }


        /*
        |--------------------------------------------------------------------------
        | Upload gambar
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('gambar')) {

            $validated['gambar'] = $request
                ->file('gambar')
                ->store('kegiatan', 'public');
        }


        /*
        |--------------------------------------------------------------------------
        | Slug
        |--------------------------------------------------------------------------
        */

        $validated['slug'] = Str::slug(
            $validated['judul']
        );


        /*
        |--------------------------------------------------------------------------
        | Pastikan slug unik
        |--------------------------------------------------------------------------
        */

        $slug = $validated['slug'];

        $counter = 1;

        while (
            Kegiatan::where('slug', $validated['slug'])->exists()
        ) {

            $validated['slug'] = $slug . '-' . $counter;

            $counter++;
        }


        /*
        |--------------------------------------------------------------------------
        | Simpan kegiatan
        |--------------------------------------------------------------------------
        */

        Kegiatan::create($validated);


        return redirect()
            ->route('admin.kegiatan.index')
            ->with(
                'success',
                'Kegiatan berhasil ditambahkan.'
            );
    }


    /**
     * Detail kegiatan
     */
    public function show(Kegiatan $kegiatan)
    {
        return view(
            'admin.kegiatan.show',
            compact('kegiatan')
        );
    }


    /**
     * Form edit kegiatan
     */
    public function edit(Kegiatan $kegiatan)
    {
        $kategoriKegiatan = $this->kategoriKegiatan();

        return view(
            'admin.kegiatan.edit',
            compact(
                'kegiatan',
                'kategoriKegiatan'
            )
        );
    }


    /**
     * Update kegiatan
     */
    public function update(
        Request $request,
        Kegiatan $kegiatan
    ) {

        $validated = $request->validate([

            // Informasi kegiatan
            'judul' => [
                'required',
                'string',
                'max:255',
            ],

            'kategori' => [
                'required',
                'string',
                'in:' . implode(',', $this->kategoriKegiatan()),
            ],

            'excerpt' => [
                'nullable',
                'string',
            ],

            'konten' => [
                'required',
                'string',
            ],

            // Detail
            'lokasi' => [
                'nullable',
                'string',
                'max:255',
            ],

            'tanggal' => [
                'required',
                'date',
            ],

            'status' => [
                'required',
                'in:draft,published',
            ],

            // Gambar
            'gambar' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],

            // Pendaftaran
            'pendaftaran_aktif' => [
                'nullable',
                'boolean',
            ],

            'tanggal_mulai_pendaftaran' => [
                'nullable',
                'date',
            ],

            'tanggal_selesai_pendaftaran' => [
                'nullable',
                'date',
                'after_or_equal:tanggal_mulai_pendaftaran',
            ],

            'kuota' => [
                'nullable',
                'integer',
                'min:1',
            ],

            'link_pendaftaran' => [
                'nullable',
                'url',
                'max:2048',
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | Pendaftaran
        |--------------------------------------------------------------------------
        */

        $validated['pendaftaran_aktif'] =
            $request->boolean('pendaftaran_aktif');


        /*
        |--------------------------------------------------------------------------
        | Jika pendaftaran dimatikan
        |--------------------------------------------------------------------------
        */

        if (!$validated['pendaftaran_aktif']) {

            $validated['tanggal_mulai_pendaftaran'] = null;

            $validated['tanggal_selesai_pendaftaran'] = null;

            $validated['kuota'] = null;

            $validated['link_pendaftaran'] = null;
        }


        /*
        |--------------------------------------------------------------------------
        | Upload gambar baru
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('gambar')) {

            // Hapus gambar lama
            if ($kegiatan->gambar) {

                Storage::disk('public')
                    ->delete($kegiatan->gambar);
            }


            // Simpan gambar baru
            $validated['gambar'] = $request
                ->file('gambar')
                ->store('kegiatan', 'public');
        }


        /*
        |--------------------------------------------------------------------------
        | Slug
        |--------------------------------------------------------------------------
        */

        $validated['slug'] = Str::slug(
            $validated['judul']
        );


        /*
        |--------------------------------------------------------------------------
        | Pastikan slug unik
        |--------------------------------------------------------------------------
        */

        $slug = $validated['slug'];

        $counter = 1;

        while (
            Kegiatan::where('slug', $validated['slug'])
                ->where('id', '!=', $kegiatan->id)
                ->exists()
        ) {

            $validated['slug'] = $slug . '-' . $counter;

            $counter++;
        }


        /*
        |--------------------------------------------------------------------------
        | Update kegiatan
        |--------------------------------------------------------------------------
        */

        $kegiatan->update($validated);


        return redirect()
            ->route('admin.kegiatan.index')
            ->with(
                'success',
                'Kegiatan berhasil diperbarui.'
            );
    }


    /**
     * Hapus kegiatan
     */
    public function destroy(Kegiatan $kegiatan)
    {
        /*
        |--------------------------------------------------------------------------
        | Hapus gambar
        |--------------------------------------------------------------------------
        */

        if ($kegiatan->gambar) {

            Storage::disk('public')
                ->delete($kegiatan->gambar);
        }


        /*
        |--------------------------------------------------------------------------
        | Hapus data kegiatan
        |--------------------------------------------------------------------------
        */

        $kegiatan->delete();


        return redirect()
            ->route('admin.kegiatan.index')
            ->with(
                'success',
                'Kegiatan berhasil dihapus.'
            );
    }
}
