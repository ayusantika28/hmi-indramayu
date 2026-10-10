<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Komisariat;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KomisariatController extends Controller
{
    /**
     * Menampilkan daftar komisariat.
     */
    public function index()
    {
        $komisariats = Komisariat::query()
            ->orderBy('urutan')
            ->orderBy('nama')
            ->paginate(10);

        return view('admin.organisasi.komisariat.index', compact('komisariats'));
    }

    /**
     * Menampilkan form tambah komisariat.
     */
    public function create()
    {
        return view('admin.organiisasi.komisariat.create');
    }

    /**
     * Menyimpan komisariat baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:komisariats,slug'],
            'perguruan_tinggi' => ['nullable', 'string', 'max:255'],
            'fakultas' => ['nullable', 'string', 'max:255'],
            'alamat' => ['nullable', 'string', 'max:255'],
            'ketua' => ['nullable', 'string', 'max:255'],
            'periode' => ['nullable', 'string', 'max:100'],
            'jumlah_anggota' => ['required', 'integer', 'min:0'],
            'telepon' => ['nullable', 'string', 'max:30'],
            'email' => ['nullable', 'email', 'max:255'],
            'instagram' => ['nullable', 'string', 'max:255'],
            'logo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'deskripsi' => ['nullable', 'string'],
            'status' => ['nullable', 'boolean'],
            'urutan' => ['required', 'integer', 'min:0'],
        ]);

        /*
        |--------------------------------------------------------------------------
        | Slug
        |--------------------------------------------------------------------------
        */

        $validated['slug'] = $validated['slug']
            ?? Str::slug($validated['nama']);

        /*
        |--------------------------------------------------------------------------
        | Logo
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('logo')) {
            $validated['logo'] = $request
                ->file('logo')
                ->store('komisariat', 'public');
        }

        /*
        |--------------------------------------------------------------------------
        | Status
        |--------------------------------------------------------------------------
        */

        $validated['status'] = $request->boolean('status');

        Komisariat::create($validated);

        return redirect()
            ->route('admin.organisasi.komisariat.index')
            ->with('success', 'Komisariat berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail komisariat.
     */
    public function show(Komisariat $komisariat)
    {
        return view('admin.organisasi.komisariat.show', compact('komisariat'));
    }

    /**
     * Menampilkan form edit komisariat.
     */
    public function edit(Komisariat $komisariat)
    {
        return view('admin.organisasi.komisariat.edit', compact('komisariat'));
    }

    /**
     * Memperbarui komisariat.
     */
    public function update(Request $request, Komisariat $komisariat)
    {
        $validated = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'slug' => [
                'nullable',
                'string',
                'max:255',
                'unique:komisariats,slug,' . $komisariat->id,
            ],
            'perguruan_tinggi' => ['nullable', 'string', 'max:255'],
            'fakultas' => ['nullable', 'string', 'max:255'],
            'alamat' => ['nullable', 'string', 'max:255'],
            'ketua' => ['nullable', 'string', 'max:255'],
            'periode' => ['nullable', 'string', 'max:100'],
            'jumlah_anggota' => ['required', 'integer', 'min:0'],
            'telepon' => ['nullable', 'string', 'max:30'],
            'email' => ['nullable', 'email', 'max:255'],
            'instagram' => ['nullable', 'string', 'max:255'],
            'logo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'deskripsi' => ['nullable', 'string'],
            'status' => ['nullable', 'boolean'],
            'urutan' => ['required', 'integer', 'min:0'],
        ]);

        /*
        |--------------------------------------------------------------------------
        | Slug
        |--------------------------------------------------------------------------
        */

        $validated['slug'] = $validated['slug']
            ?? Str::slug($validated['nama']);

        /*
        |--------------------------------------------------------------------------
        | Logo Baru
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('logo')) {

            // Hapus logo lama jika ada
            if (
                $komisariat->logo &&
                \Storage::disk('public')->exists($komisariat->logo)
            ) {
                \Storage::disk('public')->delete($komisariat->logo);
            }

            $validated['logo'] = $request
                ->file('logo')
                ->store('komisariat', 'public');
        }

        /*
        |--------------------------------------------------------------------------
        | Status
        |--------------------------------------------------------------------------
        */

        $validated['status'] = $request->boolean('status');

        $komisariat->update($validated);

        return redirect()
            ->route('admin.komisariat.index')
            ->with('success', 'Komisariat berhasil diperbarui.');
    }

    /**
     * Menghapus komisariat.
     */
    public function destroy(Komisariat $komisariat)
    {
        if (
            $komisariat->logo &&
            \Storage::disk('public')->exists($komisariat->logo)
        ) {
            \Storage::disk('public')->delete($komisariat->logo);
        }

        $komisariat->delete();

        return redirect()
            ->route('admin.organisasi.komisariat.index')
            ->with('success', 'Komisariat berhasil dihapus.');
    }
}
