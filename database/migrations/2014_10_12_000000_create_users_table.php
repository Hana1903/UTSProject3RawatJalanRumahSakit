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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id_user');
            $table->string('username',20);
            $table->string('email', 35)->unique();
            $table->string('nama_lengkap', 30);
            $table->date('tanggal_registrasi');
            $table->char('nomor_telepon', 16);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('role');
            // $table->string('hak_akses', 10);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
