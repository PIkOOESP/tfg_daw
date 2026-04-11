<?php

namespace Database\Seeders;

use App\Models\AulasOrdenadoresModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrdenadorClaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AulasOrdenadoresModel::create([
            'ordenador_id' => 1,
            'aula_id' => 1
        ]);

        AulasOrdenadoresModel::create([
            'ordenador_id' => 2,
            'aula_id' => 1
        ]);
        AulasOrdenadoresModel::create([
            'ordenador_id' => 3,
            'aula_id' => 1
        ]);
        AulasOrdenadoresModel::create([
            'ordenador_id' => 4,
            'aula_id' => 1
        ]);

        AulasOrdenadoresModel::create([
            'ordenador_id' => 5,
            'aula_id' => 2
        ]);

        AulasOrdenadoresModel::create([
            'ordenador_id' => 6,
            'aula_id' => 2
        ]);
        AulasOrdenadoresModel::create([
            'ordenador_id' => 7,
            'aula_id' => 3
        ]);

        AulasOrdenadoresModel::create([
            'ordenador_id' => 8,
            'aula_id' => 3
        ]);
    }
}
