<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('profile_settings', function (Blueprint $table) {
            $table->id();

            $table->string('nama_organisasi')
                ->default('HMI Cabang Indramayu');

            $table->string('periode')
                ->nullable();

            $table->string('logo')
                ->nullable();

            $table->text('visi')
                ->nullable();

            $table->longText('misi')
                ->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profile_settings');
    }
};
