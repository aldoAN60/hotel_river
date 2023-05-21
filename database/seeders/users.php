<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class users extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'SISTEMA ADMINISTRATIVO RIVER',
            'puesto_id' => 1,
            'username' => 'SISTEMAS',
            'password' => bcrypt('sistemas01'), 
            ]);
    }
}
