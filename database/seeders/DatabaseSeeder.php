<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Car;
use App\Models\Driver;
use App\Models\Employee;
use App\Models\Transaction;

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Driver::factory(100)->create();
        Car::factory(100)->create();
        Employee::factory(100)->create();

        $this->call([
            accountSeeder::class,
            kantorSeeder::class,
            tambangSeeder::class,
        ]);

        Transaction::factory(200)->create();
    }
}
