<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('komisariats', function (Blueprint $table) {
            $table->id();

            // Identitas komisariat
            $table->string('nama');
            $table->string('slug')->unique();

            // Institusi
            $table->string('perguruan_tinggi')->nullable();
            $table->string('fakultas')->nullable();

            // Informasi organisasi
            $table->string('alamat')->nullable();
            $table->string('ketua')->nullable();
            $table->string('periode')->nullable();
            $table->unsignedInteger('jumlah_anggota')->default(0);

            // Kontak
            $table->string('telepon')->nullable();
            $table->string('email')->nullable();
            $table->string('instagram')->nullable();

            // Konten
            $table->string('logo')->nullable();
            $table->text('deskripsi')->nullable();

            // Pengaturan
            $table->boolean('status')->default(true);
            $table->unsignedInteger('urutan')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('komisariats');
    }
};
