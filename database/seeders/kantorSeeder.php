<?php

namespace Database\Seeders;

use App\Models\Kantor;

use Illuminate\Database\Seeder;



class kantorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kantor::create([
            'nama_kantor' => 'Kantor Utama',
            'jenis_kantor' => 'utama',
        ]);
        Kantor::create([
            'nama_kantor' => 'Kantor Cabang',
            'jenis_kantor' => 'cabang',
        ]);
    }
}
