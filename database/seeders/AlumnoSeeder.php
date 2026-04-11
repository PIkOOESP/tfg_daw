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
            'apellido' => 'Pérez',
            "nre" => "168451"
        ]);

        AlumnosModel::create([
            'nombre' => 'María',
            'apellido' => 'Gómez',
            "nre" => "894512"
        ]);

        AlumnosModel::create([
            'nombre' => 'Carlos',
            'apellido' => 'López',
            "nre" => "6845165"
        ]);

        AlumnosModel::create([
            'nombre' => 'Ana',
            'apellido' => 'Martínez',
            "nre" => "165321"
        ]);
        AlumnosModel::create([
            'nombre' => 'Dani',
            'apellido' => 'Zamora',
            "nre" => "164234"
        ]);
        AlumnosModel::create([
            'nombre' => 'Estefania',
            'apellido' => 'Martínez',
            "nre" => "123431"
        ]);
    }
}
