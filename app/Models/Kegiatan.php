<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kegiatan extends Model
{
    use HasFactory;

    protected $table = 'kegiatans';

    protected $fillable = [
        'judul',
        'slug',
        'kategori',
        'excerpt',
        'konten',
        'gambar',
        'lokasi',
        'tanggal',
        'status',
        'pendaftaran_aktif',
        'tanggal_mulai_pendaftaran',
        'tanggal_selesai_pendaftaran',
        'kuota',
        'link_pendaftaran',
    ];

    protected $casts = [
        'tanggal' => 'date',
        'pendaftaran_aktif' => 'boolean',
        'tanggal_mulai_pendaftaran' => 'datetime',
        'tanggal_selesai_pendaftaran' => 'datetime',
        'kuota' => 'integer',
    ];

    /**
     * Relasi pendaftaran peserta.
     */
    public function pendaftarans()
    {
        return $this->hasMany(Pendaftaran::class);
    }

    /**
     * Relasi dokumentasi kegiatan.
     */
    public function dokumentasis()
    {
        return $this->hasMany(KegiatanDokumentasi::class)
            ->orderBy('urutan')
            ->orderBy('id');
    }
}
