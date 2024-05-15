<?php

namespace Database\Factories;

use App\Models\Car;
use App\Models\Driver;
use App\Models\Employee;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $getPegawai = Employee::all()->pluck('id_pegawai')->toArray();
        $getDriver = Driver::all()->pluck('id')->toArray();
        $getKendaraan = Car::all()->pluck('id')->toArray();
        $tujuan_tambang = ['1', '2', '3', '4', '5', '6'];


        $approve_1_at = $this->faker->dateTimeBetween('-1 years', 'now');
        $approve_2_at = $this->faker->dateTimeBetween($approve_1_at, 'now');


        return [
            'id' => Str::uuid(),
            'id_pegawai' => $this->faker->randomElement($getPegawai),
            'id_driver' => $this->faker->randomElement($getDriver),
            'id_kendaraan' => $this->faker->randomElement($getKendaraan),
            'tujuan_tambang' => $this->faker->randomElement($tujuan_tambang),
            'tahap' => $this->faker->randomElement(['firstACC', 'secondACC', 'firstReject', 'secondReject', 'waiting']),
            'date_approve_1' => $approve_1_at,
            'date_approve_2' => $approve_2_at,

        ];
    }
}
