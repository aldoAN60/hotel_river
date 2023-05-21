<?php

namespace Database\Seeders;

use App\Models\puesto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class puestos extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        puesto::create([
                'nombre_puesto' => 'sistemas',
                'tipo_puesto' => 'ADMINISTRATIVO',
                'plantilla_maxima' => 2,
                'plantilla_actual' => 1,
                'nivel_acceso' => 3,
            ]);
        puesto::create([
            'nombre_puesto' => 'recepcionista',
            'tipo_puesto' => 'OPERATIVO',
            'plantilla_maxima' => 6,
            'plantilla_actual' => 4,
            'nivel_acceso' => 1,
        ]);
        puesto::create([
            'nombre_puesto' => 'jefe/a recepcion',
            'tipo_puesto' => 'ADMINISTRATIVO',
            'plantilla_maxima' => 1,
            'plantilla_actual' => 1,
            'nivel_acceso' => 2,
        ]);
        puesto::create([
            'nombre_puesto' => 'ama de llaves',
            'tipo_puesto' => 'ADMINISTRATIVO',
            'plantilla_maxima' => 1,
            'plantilla_actual' => 1,
            'nivel_acceso' => 2,
        ]);
        puesto::create([
            'nombre_puesto' => 'jefe/a de mantenimiento',
            'tipo_puesto' => 'ADMINISTRATIVO',
            'plantilla_maxima' => 1,
            'plantilla_actual' => 1,
            'nivel_acceso' => 2,
        ]);
    }
}
