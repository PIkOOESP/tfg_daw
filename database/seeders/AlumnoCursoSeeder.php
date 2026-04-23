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
            'alumno_id' => 1,
            'curso_id' => 1,
        ]);

        CursosAlumnosModel::create([
            'alumno_id' => 2,
            'curso_id' => 1,
        ]);

        CursosAlumnosModel::create([
            'alumno_id' => 3,
            'curso_id' => 2,
        ]);
        CursosAlumnosModel::create([
            'alumno_id' => 4,
            'curso_id' => 2,
        ]);
        CursosAlumnosModel::create([
            'alumno_id' => 5,
            'curso_id' => 3,
        ]);
        CursosAlumnosModel::create([
            'alumno_id' => 6,
            'curso_id' => 3,
        ]);
    }
}
