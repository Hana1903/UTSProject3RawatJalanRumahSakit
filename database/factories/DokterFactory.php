<?php

namespace Database\Factories;

use App\Models\Dokter;
use Illuminate\Database\Eloquent\Factories\Factory;

class DokterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Dokter::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_dokter' => $this->faker->name,
            'spesialisasi' => $this->faker->jobTitle,
            'sub_spesialisasi' => $this->faker->optional()->word,
            'jadwal_praktek' => $this->faker->randomElement(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu']),
            'nomor_telepon' => $this->faker->phoneNumber,
        ];
    }
}
