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
        Schema::create('pasiens', function (Blueprint $table) {
            $table->increments('id_pasien');
            $table->string('nama_lengkap', 30);
            $table->char('jenis_kelamin', 1);
            $table->string('tempat_lahir', 30);
            $table->date('tanggal_lahir');
            $table->string('nama_ibu_kandung', 30);
            $table->string('agama', 10);
            $table->string('status', 20);
            $table->string('pendidikan', 15);
            $table->string('pekerjaan', 30);
            $table->char('nomor_ktp', 20);
            $table->char('nomor_kk', 20);
            $table->char('nomor_bpjs', 20);
            $table->char('nomor_telepon', 20);
            $table->string('provinsi', 30);
            $table->string('kabupatenkota', 30);
            $table->string('alamat', 50);
            $table->char('golongan_darah', 3);
            $table->string('email', 30);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pasiens');
    }
};
