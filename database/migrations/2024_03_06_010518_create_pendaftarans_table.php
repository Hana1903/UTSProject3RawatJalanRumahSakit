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
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->increments('id_pendaftaran');
            // $table->unsignedInteger('id_antrian');
            $table->unsignedInteger('id_pasien');
            $table->unsignedInteger('id_dokter');
            // $table->foreign('id_antrian')->references('id_antrian')->on('antrians');
            $table->foreign('id_pasien')->references('id_pasien')->on('pasiens');
            $table->foreign('id_dokter')->references('id_dokter')->on('dokters');
            $table->char('nomor_antrian', 10);
            $table->string('nama_pasien', 30);
            $table->date('tanggal');
            $table->string('status', 20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
    }
};
