<?php

namespace Database\Seeders;

use App\Models\User;

use Illuminate\Database\Seeder;



use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class accountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
           
            'name' => 'Developer',
            'email' => 'dev@dev.com',
            'password' =>Hash::make('12345678'),
            'role' => 'Super Admin',
        ]);

        User::create([
           
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => "Admin",
        ]);

        User::create([
           
            'name' => 'Kepala',
            'email' => 'kepalaKantor@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => "Kepala Kantor",
        ]);

        User::create([
           
            'name' => 'Pool',
            'email' => 'pool@gmail.com',
            'password' => Hash::make('12345678'),
            'role' =>'Pool',
        ]);

      
    }
}
