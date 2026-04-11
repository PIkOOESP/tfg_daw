<?php

namespace Database\Seeders;

use App\Models\CursosAlumnosModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlumnoCursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CursosAlumnosModel::create([
            'alumnos_id' => 1,
            'cursos_id' => 1,
        ]);

        CursosAlumnosModel::create([
            'alumnos_id' => 2,
            'cursos_id' => 1,
        ]);

        CursosAlumnosModel::create([
            'alumnos_id' => 3,
            'cursos_id' => 2,
        ]);
        CursosAlumnosModel::create([
            'alumnos_id' => 4,
            'cursos_id' => 2,
        ]);
        CursosAlumnosModel::create([
            'alumnos_id' => 5,
            'cursos_id' => 3,
        ]);
        CursosAlumnosModel::create([
            'alumnos_id' => 6,
            'cursos_id' => 3,
        ]);
    }
}
