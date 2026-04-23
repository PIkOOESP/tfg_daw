<?php

namespace Database\Seeders;

use App\Models\AlumnosModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlumnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AlumnosModel::create([
            'nombre' => 'Juan',
            'apellidos' => 'Pérez',
            "nre" => "168451"
        ]);

        AlumnosModel::create([
            'nombre' => 'María',
            'apellidos' => 'Gómez',
            "nre" => "894512"
        ]);

        AlumnosModel::create([
            'nombre' => 'Carlos',
            'apellidos' => 'López',
            "nre" => "6845165"
        ]);

        AlumnosModel::create([
            'nombre' => 'Ana',
            'apellidos' => 'Martínez',
            "nre" => "165321"
        ]);
        AlumnosModel::create([
            'nombre' => 'Dani',
            'apellidos' => 'Zamora',
            "nre" => "164234"
        ]);
        AlumnosModel::create([
            'nombre' => 'Estefania',
            'apellidos' => 'Martínez',
            "nre" => "123431"
        ]);
    }
}
