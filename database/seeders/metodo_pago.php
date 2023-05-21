<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class metodo_pago extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('metodo_pago')->insert([[
            'metodo' => 'EFECTIVO'
        ],
        [
            'metodo' => 'TARJETA DE DEBIDO'
        ],
        [
            'metodo' => 'TARJETA DE CREDITO'
        ]
    ]);
    }
}
