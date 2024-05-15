<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $workCar = [
            'Excavator',
            'Bulldozer',
            'DumpTruck',
            'Forklift',
            'Trailer',
        ];

        $travelCar = [
            'Bus',
            'Van',
        ];

        $getKendaraan = $this->faker->randomElement([$workCar, $travelCar]);
        $namaKendaraan = $getKendaraan == $workCar ? $getKendaraan[array_rand($getKendaraan)] : $getKendaraan[array_rand($getKendaraan)];
        $jnsKendaraan = $getKendaraan == $workCar ? 'kendaraan tambang' : 'kendaraan penumpang';
        $no_pol = 'K ' . $this->faker->randomNumber(4) . ' ' . $this->faker->randomLetter() . $this->faker->randomLetter();

        $carStatus = $this->faker->randomElement([1, 0]);
        $tanggalPakai = $carStatus == 1 ? 'Kendaraan sedang dipginakan' : $this->faker->dateTimeBetween('-1 month', 'now');

        $lastSer = $this->faker->dateTimeBetween('-4 month', 'now');
        $nextSer = $this->faker->dateTimeBetween($lastSer, '+1 years');

        $konsumsiBbm = $getKendaraan == $workCar ? 1.5 : 7;
        $fullTank = $getKendaraan == $workCar ? 800 : 400;
        return [
            'id' =>Str::uuid(),
            'nama_kendaraan' => $namaKendaraan,
            'jenis_kendaraan' => $jnsKendaraan,
            'plat_nomor' => $no_pol,
            'jumlah_bbm' =>  $fullTank,
            'konsumsi_bbm' => $konsumsiBbm,
            'status_kendaraan' => $this->faker->randomElement([1, 2]),
            'status_pakai' => $carStatus,
            'service_terakhir' => $lastSer,
            'service_berikutnya' => $nextSer,
            'penempatan' => $this->faker->randomElement(['utama', 'cabang']),
            'tanggal_pakai' => $tanggalPakai,
        ];
    }
}
