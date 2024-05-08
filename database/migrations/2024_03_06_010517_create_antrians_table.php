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
        Schema::create('antrians', function (Blueprint $table) {
            $table->increments('id_antrian');
            $table->unsignedInteger('id_pasien');
            $table->foreign('id_pasien')->references('id_pasien')->on('pasiens');
            $table->char('nomor_antrian', 15)->references('nomor_antrian')->on('pendaftarans');
            $table->date('tanggal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('antrians');
    }
};
