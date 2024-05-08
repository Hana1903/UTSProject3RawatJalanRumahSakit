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
        Schema::create('kunjungans', function (Blueprint $table) {
            $table->increments('id_kunjungan');
            $table->unsignedInteger('id_pasien');
            $table->unsignedInteger('id_dokter');
            $table->foreign('id_pasien')->references('id_pasien')->on('pasiens');
            $table->foreign('id_dokter')->references('id_dokter')->on('dokters');
            $table->string('pemeriksaan', 30);
            $table->date('tanggal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kunjungans');
    }
};
