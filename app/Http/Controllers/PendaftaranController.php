<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Pendaftaran;
use App\Exports\PesertaKegiatanExport;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Maatwebsite\Excel\Facades\Excel;

class PendaftaranController extends Controller
{
    public function create(Kegiatan $kegiatan)
    {
        $this->pastikanPendaftaranDibuka($kegiatan);

        return view(
            'pendaftaran.create',
            compact('kegiatan')
        );
    }

    public function store(
        Request $request,
        Kegiatan $kegiatan
    ) {
        $this->pastikanPendaftaranDibuka($kegiatan);

        $validated = $request->validate([
            'nama' => [
                'required',
                'string',
                'max:255',
            ],
            'email' => [
                'required',
                'email',
                'max:255',
            ],
            'no_hp' => [
                'required',
                'string',
                'max:30',
            ],
            'instansi' => [
                'nullable',
                'string',
                'max:255',
            ],
            'keterangan' => [
                'nullable',
                'string',
                'max:2000',
            ],
        ]);

        $sudahTerdaftar = Pendaftaran::query()
            ->where('kegiatan_id', $kegiatan->id)
            ->where('email', $validated['email'])
            ->exists();

        if ($sudahTerdaftar) {
            throw ValidationException::withMessages([
                'email' =>
                    'Email tersebut sudah terdaftar pada kegiatan ini.',
            ]);
        }

        if (!is_null($kegiatan->kuota)) {
            $jumlahPendaftar = $kegiatan
                ->pendaftarans()
                ->count();

            if ($jumlahPendaftar >= $kegiatan->kuota) {
                throw ValidationException::withMessages([
                    'email' =>
                        'Maaf, kuota pendaftaran kegiatan ini sudah penuh.',
                ]);
            }
        }

        $validated['kegiatan_id'] = $kegiatan->id;
        $validated['status'] = 'terdaftar';

        $pendaftaran = Pendaftaran::create($validated);

        return redirect()
            ->route(
                'pendaftaran.success',
                [
                    'kegiatan' => $kegiatan,
                    'pendaftaran' => $pendaftaran,
                ]
            )
            ->with(
                'success',
                'Pendaftaran berhasil dilakukan.'
            );
    }

    public function success(
        Kegiatan $kegiatan,
        Pendaftaran $pendaftaran
    ) {
        abort_unless(
            $pendaftaran->kegiatan_id === $kegiatan->id,
            404
        );

        return view(
            'pendaftaran.success',
            compact(
                'kegiatan',
                'pendaftaran'
            )
        );
    }

    public function adminIndex(Kegiatan $kegiatan)
    {
        $pendaftarans = $kegiatan
            ->pendaftarans()
            ->latest()
            ->paginate(20);

        return view(
            'admin.pendaftaran.index',
            compact(
                'kegiatan',
                'pendaftarans'
            )
        );
    }

    public function adminExportExcel(Kegiatan $kegiatan)
{
    $namaFile = 'peserta-' . $kegiatan->slug . '.xlsx';

    return Excel::download(
        new PesertaKegiatanExport($kegiatan),
        $namaFile
    );
}
    public function adminShow(
        Kegiatan $kegiatan,
        Pendaftaran $pendaftaran
    ) {
        abort_unless(
            $pendaftaran->kegiatan_id === $kegiatan->id,
            404
        );

        return view(
            'admin.pendaftaran.show',
            compact(
                'kegiatan',
                'pendaftaran'
            )
        );
    }

    public function adminUpdateStatus(
        Request $request,
        Kegiatan $kegiatan,
        Pendaftaran $pendaftaran
    ) {
        abort_unless(
            $pendaftaran->kegiatan_id === $kegiatan->id,
            404
        );

        $validated = $request->validate([
            'status' => [
                'required',
                'in:terdaftar,hadir,batal',
            ],
        ]);

        $pendaftaran->update([
            'status' => $validated['status'],
        ]);

        return redirect()
            ->route(
                'admin.kegiatan.pendaftaran.index',
                $kegiatan
            )
            ->with(
                'success',
                'Status peserta berhasil diperbarui.'
            );
    }

    public function adminDestroy(
        Kegiatan $kegiatan,
        Pendaftaran $pendaftaran
    ) {
        abort_unless(
            $pendaftaran->kegiatan_id === $kegiatan->id,
            404
        );

        $pendaftaran->delete();

        return redirect()
            ->route(
                'admin.kegiatan.pendaftaran.index',
                $kegiatan
            )
            ->with(
                'success',
                'Peserta berhasil dihapus.'
            );
    }

    private function pastikanPendaftaranDibuka(
        Kegiatan $kegiatan
    ): void {
        if (!$kegiatan->pendaftaran_aktif) {
            abort(
                404,
                'Pendaftaran kegiatan ini tidak tersedia.'
            );
        }

        $sekarang = now();

        if (
            $kegiatan->tanggal_mulai_pendaftaran &&
            $sekarang->lt(
                $kegiatan->tanggal_mulai_pendaftaran
            )
        ) {
            abort(
                403,
                'Pendaftaran kegiatan ini belum dibuka.'
            );
        }

        if (
            $kegiatan->tanggal_selesai_pendaftaran &&
            $sekarang->gt(
                $kegiatan->tanggal_selesai_pendaftaran
            )
        ) {
            abort(
                403,
                'Pendaftaran kegiatan ini sudah ditutup.'
            );
        }

        if (!is_null($kegiatan->kuota)) {
            $jumlahPendaftar = $kegiatan
                ->pendaftarans()
                ->count();

            if (
                $jumlahPendaftar >=
                $kegiatan->kuota
            ) {
                abort(
                    403,
                    'Kuota pendaftaran kegiatan ini sudah penuh.'
                );
            }
        }
    }
}
