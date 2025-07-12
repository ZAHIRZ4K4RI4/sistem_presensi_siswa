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
        Schema::create('absensis', function (Blueprint $table) {
            $table->id();
            $table->string('nisn');
            $table->string('nama_siswa');
            $table->string('kelas');
            $table->string('paralel');
            $table->string('kehadiran'); // Hadir, Sakit, Izin, Alpha
            $table->time('jam_masuk');
            $table->time('jam_pulang')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensis');
    }
};
