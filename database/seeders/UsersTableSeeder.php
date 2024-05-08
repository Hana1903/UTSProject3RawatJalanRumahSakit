<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Buat data pengguna
        DB::table('users')->insert([
            'username' => 'Admin',
            'email' => 'admin@gmail.com',
            'nama_lengkap' => 'adminnn',
            'tanggal_registrasi' => '2024-05-01',
            'nomor_telepon' => '083212345677',
            'password' => Hash::make('password'), // Hash kata sandi dengan Bcrypt
            'role' => 'admin', // Atur peran pengguna
        ]);

        DB::table('users')->insert([
            'username' => 'Doctor',
            'email' => 'doctor@gamil.com',
            'nama_lengkap' => 'doctor',
            'tanggal_registrasi' => '2024-05-01',
            'nomor_telepon' => '083212345677',
            'password' => Hash::make('password'),
            'role' => 'doctor',
        ]);

        DB::table('users')->insert([
            'username' => 'Patient',
            'email' => 'patient@gmail.com',
            'nama_lengkap' => 'patient',
            'tanggal_registrasi' => '2024-05-01',
            'nomor_telepon' => '083212345677',
            'password' => Hash::make('password'),
            'role' => 'patient',
        ]);

        // Buat lebih banyak data pengguna jika diperlukan
    }
}
