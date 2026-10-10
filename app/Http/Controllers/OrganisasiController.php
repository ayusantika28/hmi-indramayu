<?php

namespace App\Http\Controllers;

use App\Models\Organisasi;
use App\Models\Komisariat;

class OrganisasiController extends Controller
{
    public function index()
    {
        // Data organisasi
        $organisasis = Organisasi::query()
            ->where('status', true)
            ->orderBy('urutan')
            ->orderBy('id')
            ->get();

        // Data komisariat aktif
        $komisariats = Komisariat::query()
            ->where('status', true)
            ->orderBy('urutan')
            ->orderBy('nama')
            ->get();

        return view('organisasi.index', compact(
            'organisasis',
            'komisariats'
        ));
    }
}
