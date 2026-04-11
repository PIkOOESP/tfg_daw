<?php

namespace Database\Seeders;

use App\Models\AsignacionesOrdenadoresModel;
use Illuminate\Database\Seeder;

class ClaseAlumnoCursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AsignacionesOrdenadoresModel::create([
            'ordenador_id' => 1,
            'alumno_id' => 1
        ]);

        AsignacionesOrdenadoresModel::create([
            'ordenador_id' => 2,
            'alumno_id' => 2
        ]);

        AsignacionesOrdenadoresModel::create([
            'ordenador_id' => 3,
            'alumno_id' => 3
        ]);

        AsignacionesOrdenadoresModel::create([
            'ordenador_id' => 4,
            'alumno_id' => 4
        ]);
    }
}
