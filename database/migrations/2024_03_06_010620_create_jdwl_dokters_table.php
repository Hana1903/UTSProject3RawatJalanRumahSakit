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
        Schema::create('jdwl_dokters', function (Blueprint $table) {
            $table->increments('id_jadwal');
            $table->unsignedInteger('id_dokter');
            $table->foreign('id_dokter')->references('id_dokter')->on('dokters');
            $table->string('hari', 25);
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jdwl_dokters');
    }
};
