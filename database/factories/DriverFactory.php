<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Driver>
 */
class DriverFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => Str::uuid(),
            'nama_driver' => $this->faker->name(),
            'status_driver' => $this->faker->randomElement(['Assinged','Not Assigned']),
            'penempatan' => $this->faker->randomElement(['utama', 'cabang']),
        ];
    }
}
