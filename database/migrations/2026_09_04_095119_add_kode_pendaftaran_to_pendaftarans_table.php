<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pendaftarans', function (Blueprint $table) {
            $table->string('kode_pendaftaran', 36)
                ->nullable()
                ->unique()
                ->after('id');
        });

        \App\Models\Pendaftaran::query()
            ->whereNull('kode_pendaftaran')
            ->each(function ($pendaftaran) {
                $pendaftaran->update([
                    'kode_pendaftaran' => (string) Str::uuid(),
                ]);
            });
    }

    public function down(): void
    {
        Schema::table('pendaftarans', function (Blueprint $table) {
            $table->dropUnique('pendaftarans_kode_pendaftaran_unique');
            $table->dropColumn('kode_pendaftaran');
        });
    }
};

