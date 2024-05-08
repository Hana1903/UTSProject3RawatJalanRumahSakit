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
        Schema::create('obats', function (Blueprint $table) {
            $table->increments('id_obat');
            $table->unsignedInteger('id_pasien');
            $table->foreign('id_pasien')->references('id_pasien')->on('pasiens');
            $table->string('nama_obat', 30);
            $table->string('resep_obat', 30);
            $table->string('deskripsi', 30);
            $table->decimal('harga', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obats');
    }
};
