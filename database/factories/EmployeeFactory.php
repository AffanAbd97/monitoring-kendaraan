<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $id_pegawai = 'E' . $this->faker->randomNumber(5, true);
        
        
        while (true) {
            $exist = Employee::where('id_pegawai', $id_pegawai)->first();
            if ($exist == null) {
                break;
            }
            $id_pegawai = 'E' . $this->faker->randomNumber(5, true);
        }

        return [
            'id' => Str::uuid(), 
            'id_pegawai' => $id_pegawai,
            'nama_pegawai' => $this->faker->name(),
            'penempatan' => $this->faker->randomElement([1,2]),
            'jabatan' => $this->faker->randomElement(['Manajer', 'Supervisor', 'Staff']),
        ];
    }
}
