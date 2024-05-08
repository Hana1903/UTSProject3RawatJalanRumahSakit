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
        Schema::create('dokters', function (Blueprint $table) {
            $table->increments('id_dokter');
            $table->string('nama_dokter',30);
            $table->string('spesialisasi',30);
            $table->string('sub_spesialisasi',30)->nullable();
            $table->string('jadwal_praktek',30);
            $table->char('nomor_telepon',16);
            $table->timestamps();            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokters');
    }
};
