<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Organisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OrganisasiController extends Controller
{
    /**
     * Menampilkan daftar pengurus.
     */
    public function index()
    {
        $organisasis = Organisasi::orderBy('urutan')
            ->orderBy('id')
            ->get();

        return view('admin.organisasi.index', compact('organisasis'));
    }

    /**
     * Form tambah pengurus.
     */
    public function create()
    {
        return view('admin.organisasi.create');
    }

    /**
     * Menyimpan pengurus baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'bidang' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'periode' => 'nullable|string|max:100',
            'urutan' => 'nullable|integer|min:0',
            'status' => 'nullable|boolean',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')
                ->store('organisasi', 'public');
        }

        $validated['urutan'] = $validated['urutan'] ?? 0;
        $validated['status'] = $request->boolean('status');

        Organisasi::create($validated);

        return redirect()
            ->route('admin.organisasi.index')
            ->with('success', 'Data pengurus berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail pengurus.
     */
    public function show(Organisasi $organisasi)
    {
        return view('admin.organisasi.show', compact('organisasi'));
    }

    /**
     * Form edit pengurus.
     */
    public function edit(Organisasi $organisasi)
    {
        return view('admin.organisasi.edit', compact('organisasi'));
    }

    /**
     * Memperbarui pengurus.
     */
    public function update(Request $request, Organisasi $organisasi)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'bidang' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'periode' => 'nullable|string|max:100',
            'urutan' => 'nullable|integer|min:0',
            'status' => 'nullable|boolean',
        ]);

        if ($request->hasFile('foto')) {

            if ($organisasi->foto) {
              Storage::disk('public')->delete($organisasi->foto);
            }

            $validated['foto'] = $request->file('foto')
                ->store('organisasi', 'public');
        }

        $validated['urutan'] = $validated['urutan'] ?? 0;
        $validated['status'] = $request->boolean('status');

        $organisasi->update($validated);

        return redirect()
            ->route('admin.organisasi.index')
            ->with('success', 'Data pengurus berhasil diperbarui.');
    }

    /**
     * Menghapus pengurus.
     */
    public function destroy(Organisasi $organisasi)
    {
        if ($organisasi->foto) {
            \Storage::disk('public')->delete($organisasi->foto);
        }

        $organisasi->delete();

        return redirect()
            ->route('admin.organisasi.index')
            ->with('success', 'Data pengurus berhasil dihapus.');
    }
}
