<?php

namespace Database\Factories;

use App\Models\Pasien;
use Illuminate\Database\Eloquent\Factories\Factory;

class PasienFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pasien::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_lengkap' => $this->faker->name,
            'jenis_kelamin' => $this->faker->randomElement(['L', 'P']),
            'tempat_lahir' => $this->faker->city,
            'tanggal_lahir' => $this->faker->date(),
            'nama_ibu_kandung' => $this->faker->name('female'),
            'agama' => $this->faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu']),
            'status' => $this->faker->randomElement(['Belum Menikah', 'Menikah', 'Cerai']),
            'pendidikan' => $this->faker->randomElement(['SD', 'SMP', 'SMA', 'D3', 'S1', 'S2', 'S3']),
            'pekerjaan' => $this->faker->jobTitle,
            'nomor_ktp' => $this->faker->numerify('####################'),
            'nomor_kk' => $this->faker->numerify('####################'),
            'nomor_bpjs' => $this->faker->numerify('####################'),
            'nomor_telepon' => $this->faker->phoneNumber,
            'provinsi' => $this->faker->state,
            'kabupatenkota' => $this->faker->city,
            'alamat' => $this->faker->address,
            'golongan_darah' => $this->faker->randomElement(['A', 'B', 'AB', 'O']),
            'email' => $this->faker->unique()->safeEmail,
        ];
    }
}
