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
        Schema::create('rekam_mediss', function (Blueprint $table) {
            $table->increments('id_tindakan');
            $table->unsignedInteger('id_pasien');
            $table->unsignedInteger('id_dokter');
            $table->foreign('id_pasien')->references('id_pasien')->on('pasiens');
            $table->foreign('id_dokter')->references('id_dokter')->on('dokters');
            $table->string('nama_penyakit', 30);
            $table->string('keluhan',35);
            $table->date('tanggal');
            $table->string('tindakan', 35);
            $table->string('deskripsi', 40);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekam_mediss');
    }
};
