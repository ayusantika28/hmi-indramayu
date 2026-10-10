<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Komisariat extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'slug',
        'perguruan_tinggi',
        'fakultas',
        'alamat',
        'ketua',
        'periode',
        'jumlah_anggota',
        'telepon',
        'email',
        'instagram',
        'logo',
        'deskripsi',
        'status',
        'urutan',
    ];

    protected $casts = [
        'jumlah_anggota' => 'integer',
        'status' => 'boolean',
        'urutan' => 'integer',
    ];

    /**
     * Membuat slug otomatis berdasarkan nama.
     */
    protected static function booted(): void
    {
        static::creating(function ($komisariat) {
            if (empty($komisariat->slug)) {
                $komisariat->slug = Str::slug($komisariat->nama);
            }
        });

        static::updating(function ($komisariat) {
            if ($komisariat->isDirty('nama') && empty($komisariat->slug)) {
                $komisariat->slug = Str::slug($komisariat->nama);
            }
        });
    }
}
