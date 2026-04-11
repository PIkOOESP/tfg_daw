<?php

namespace Database\Seeders;

use App\Models\AulasModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AulasModel::create([
            'nombre' => 'Aula 22',
        ]);

        AulasModel::create([
            'nombre' => 'Aula 23',
        ]);

        AulasModel::create([
            'nombre' => 'Aula 24',
        ]);
    }
}
