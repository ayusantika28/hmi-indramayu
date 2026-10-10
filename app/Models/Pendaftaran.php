<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Pendaftaran extends Model
{
    protected $fillable = [
        'kegiatan_id',
        'kode_pendaftaran',
        'nama',
        'email',
        'no_hp',
        'instansi',
        'keterangan',
        'status',
    ];

    protected static function booted(): void
    {
        static::creating(function (Pendaftaran $pendaftaran) {
            if (!$pendaftaran->kode_pendaftaran) {
                do {
                    $kode = 'HMI-' . strtoupper(
                        Str::random(6)
                    );
                } while (
                    static::where(
                        'kode_pendaftaran',
                        $kode
                    )->exists()
                );

                $pendaftaran->kode_pendaftaran = $kode;
            }
        });
    }

    /**
     * Pendaftaran dimiliki oleh satu kegiatan.
     */
    public function kegiatan()
    {
        return $this->belongsTo(
            Kegiatan::class,
            'kegiatan_id'
        );
    }
}
