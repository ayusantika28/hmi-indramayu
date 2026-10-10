<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Ubah struktur kolom pendaftaran agar sesuai
     * dengan form dan controller Kegiatan.
     */
    public function up(): void
    {
        Schema::table('kegiatans', function (Blueprint $table) {

            // Ubah pendaftaran_mulai menjadi datetime
            $table->renameColumn(
                'pendaftaran_mulai',
                'tanggal_mulai_pendaftaran'
            );

            // Ubah pendaftaran_selesai menjadi datetime
            $table->renameColumn(
                'pendaftaran_selesai',
                'tanggal_selesai_pendaftaran'
            );

            // Link pendaftaran eksternal
            $table->string('link_pendaftaran')
                ->nullable()
                ->after('kuota');
        });

        // Setelah rename, ubah tipe kolom menjadi datetime.
        Schema::table('kegiatans', function (Blueprint $table) {
            $table->dateTime('tanggal_mulai_pendaftaran')
                ->nullable()
                ->change();

            $table->dateTime('tanggal_selesai_pendaftaran')
                ->nullable()
                ->change();
        });
    }

    /**
     * Kembalikan perubahan.
     */
    public function down(): void
    {
        Schema::table('kegiatans', function (Blueprint $table) {

            $table->dropColumn('link_pendaftaran');

            $table->renameColumn(
                'tanggal_mulai_pendaftaran',
                'pendaftaran_mulai'
            );

            $table->renameColumn(
                'tanggal_selesai_pendaftaran',
                'pendaftaran_selesai'
            );
        });

        Schema::table('kegiatans', function (Blueprint $table) {

            $table->date('pendaftaran_mulai')
                ->nullable()
                ->change();

            $table->date('pendaftaran_selesai')
                ->nullable()
                ->change();
        });
    }
};
