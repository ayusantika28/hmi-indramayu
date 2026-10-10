<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Tambahkan pengaturan pendaftaran ke tabel kegiatans.
     */
    public function up(): void
    {
        Schema::table('kegiatans', function (Blueprint $table) {

            $table->boolean('pendaftaran_aktif')
                ->default(false)
                ->after('status');

            $table->date('pendaftaran_mulai')
                ->nullable()
                ->after('pendaftaran_aktif');

            $table->date('pendaftaran_selesai')
                ->nullable()
                ->after('pendaftaran_mulai');

            $table->unsignedInteger('kuota')
                ->nullable()
                ->after('pendaftaran_selesai');

        });
    }

    /**
     * Hapus pengaturan pendaftaran.
     */
    public function down(): void
    {
        Schema::table('kegiatans', function (Blueprint $table) {

            $table->dropColumn([
                'pendaftaran_aktif',
                'pendaftaran_mulai',
                'pendaftaran_selesai',
                'kuota',
            ]);

        });
    }
};

