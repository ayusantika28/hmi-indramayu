<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KegiatanDokumentasi extends Model
{
    use HasFactory;

    protected $table = 'kegiatan_dokumentasis';

    protected $fillable = [
        'kegiatan_id',
        'gambar',
        'caption',
        'urutan',
    ];

    protected $casts = [
        'urutan' => 'integer',
    ];

    /**
     * Dokumentasi milik satu kegiatan.
     */
    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class);
    }
}
