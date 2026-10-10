<?php

namespace App\Exports;

use App\Models\Kegiatan;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PesertaKegiatanExport implements
    FromCollection,
    WithHeadings,
    WithMapping,
    WithStyles,
    ShouldAutoSize
{
    protected Kegiatan $kegiatan;

    public function __construct(Kegiatan $kegiatan)
    {
        $this->kegiatan = $kegiatan;
    }

    /**
     * Ambil seluruh peserta dari kegiatan.
     */
    public function collection(): Collection
    {
        return $this->kegiatan
            ->pendaftarans()
            ->orderBy('created_at')
            ->get();
    }

    /**
     * Header kolom Excel.
     */
    public function headings(): array
    {
        return [
            'No',
            'Kode Pendaftaran',
            'Nama',
            'Email',
            'No. WhatsApp',
            'Asal Komisariat / Organisasi',
            'Status',
            'Tanggal Daftar',
        ];
    }

    /**
     * Isi setiap baris Excel.
     */
    public function map($pendaftaran): array
    {
        static $no = 0;

        $no++;

        return [
            $no,
            $pendaftaran->kode_pendaftaran,
            $pendaftaran->nama,
            $pendaftaran->email,
            $pendaftaran->no_hp,
            $pendaftaran->instansi ?: '-',

            match ($pendaftaran->status) {
                'terdaftar' => 'Terdaftar',
                'hadir' => 'Hadir',
                'batal' => 'Batal',
                default => ucfirst($pendaftaran->status),
            },

            $pendaftaran->created_at
                ? $pendaftaran->created_at->format('d-m-Y H:i')
                : '-',
        ];
    }

    /**
     * Styling header Excel.
     */
    public function styles(Worksheet $sheet): ?array
    {
        return [
            1 => [
                'font' => [
                    'bold' => true,
                ],
            ],
        ];
    }
}
