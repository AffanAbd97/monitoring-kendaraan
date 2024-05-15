<?php

namespace Database\Seeders;

use App\Models\Mine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;



use Faker\Factory as Faker;

class tambangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Mine::create([
            'nama_tambang' => 'Tambang 1',
        ]);
        Mine::create([
            'nama_tambang' => 'Tambang 2',
        ]);
        Mine::create([
            'nama_tambang' => 'Tambang 3',
        ]);
        Mine::create([
            'nama_tambang' => 'Tambang 4',
        ]);
        Mine::create([
            'nama_tambang' => 'Tambang 5',
        ]);
        Mine::create([
            'nama_tambang' => 'Tambang 6',
        ]);
    }
}
