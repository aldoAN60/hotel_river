<?php

namespace Database\Seeders;

use App\Models\departamento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class departamentos extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            departamento::create([
                'user_id' => 1,
                'numero_empleados' => 7,
                'nombre' => 'RECEPCION',
            ]);

            departamento::create([
                'user_id' => 1,
                'numero_empleados' => 9,
                'nombre' => 'AMA DE LLAVES',
                
            ]);
            departamento::create([
                'user_id' => 1,
                'numero_empleados' => 4,
                'nombre' => 'MANTENIMIENTO',
                
            ]);
            departamento::create([
                'user_id' => 1,
                'numero_empleados' => 3,
                'nombre' => 'VENTAS',
                
            ]);
    }
}
