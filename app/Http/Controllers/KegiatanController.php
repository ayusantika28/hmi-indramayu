<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Support\Carbon;

class KegiatanController extends Controller
{
    /**
     * Daftar kegiatan publik.
     */
    public function index()
    {
        $kegiatans = Kegiatan::query()
            ->where('status', 'published')
            ->latest('tanggal')
            ->latest('id')
            ->paginate(9);

        return view(
            'kegiatan.index',
            compact('kegiatans')
        );
    }


    /**
     * Detail kegiatan publik.
     */
    public function show(Kegiatan $kegiatan)
    {
        /*
        |--------------------------------------------------------------------------
        | Hanya kegiatan published yang boleh dilihat publik
        |--------------------------------------------------------------------------
        */

        abort_unless(
            $kegiatan->status === 'published',
            404
        );


        /*
        |--------------------------------------------------------------------------
        | Hitung jumlah peserta
        |--------------------------------------------------------------------------
        */

        $jumlahPendaftar = $kegiatan
            ->pendaftarans()
            ->count();


        /*
        |--------------------------------------------------------------------------
        | Informasi status pendaftaran
        |--------------------------------------------------------------------------
        */

        $pendaftaranDibuka = false;
        $pendaftaranBelumDibuka = false;
        $pendaftaranSudahDitutup = false;
        $kuotaPenuh = false;


        /*
        |--------------------------------------------------------------------------
        | Cek status pendaftaran
        |--------------------------------------------------------------------------
        */

        if ($kegiatan->pendaftaran_aktif) {

            $sekarang = Carbon::now();


            /*
            |--------------------------------------------------------------------------
            | Pendaftaran belum dibuka
            |--------------------------------------------------------------------------
            */

            if (
                $kegiatan->tanggal_mulai_pendaftaran &&
                $sekarang->lt(
                    Carbon::parse(
                        $kegiatan->tanggal_mulai_pendaftaran
                    )
                )
            ) {

                $pendaftaranBelumDibuka = true;
            }


            /*
            |--------------------------------------------------------------------------
            | Pendaftaran sudah ditutup
            |--------------------------------------------------------------------------
            */

            elseif (
                $kegiatan->tanggal_selesai_pendaftaran &&
                $sekarang->gt(
                    Carbon::parse(
                        $kegiatan->tanggal_selesai_pendaftaran
                    )
                )
            ) {

                $pendaftaranSudahDitutup = true;
            }


            /*
            |--------------------------------------------------------------------------
            | Kuota penuh
            |--------------------------------------------------------------------------
            */

            elseif (
                !is_null($kegiatan->kuota) &&
                $jumlahPendaftar >= $kegiatan->kuota
            ) {

                $kuotaPenuh = true;
            }


            /*
            |--------------------------------------------------------------------------
            | Pendaftaran sedang dibuka
            |--------------------------------------------------------------------------
            */

            else {

                $pendaftaranDibuka = true;
            }
        }


        /*
        |--------------------------------------------------------------------------
        | Tampilkan halaman detail
        |--------------------------------------------------------------------------
        */

        return view(
            'kegiatan.show',
            compact(
                'kegiatan',
                'jumlahPendaftar',
                'pendaftaranDibuka',
                'pendaftaranBelumDibuka',
                'pendaftaranSudahDitutup',
                'kuotaPenuh'
            )
        );
    }
}
