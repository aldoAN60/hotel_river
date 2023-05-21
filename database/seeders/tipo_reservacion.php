<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class tipo_reservacion extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipo_reservacion')->insert([
            [
                'nombre' => 'RESERVACION'
            ],
            [
                'nombre' => 'WALKIN'
            ],
            [
                'nombre' => 'BOOKING'
            ],
            [
                'nombre' => 'EXPEDIA'
            ],
        ]);
    }
}
