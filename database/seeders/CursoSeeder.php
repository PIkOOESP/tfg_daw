<?php

namespace Database\Seeders;

use App\Enums\Etapas;
use App\Models\CursosModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CursosModel::create([
            'nivel' => '1',
            'letra' => 'DAW',
            'etapas' => Etapas::FP
        ]);

        CursosModel::create([
            'nivel' => '2',
            'letra' => 'DAW',
            'etapas' => Etapas::FP
        ]);

        CursosModel::create([
            'nivel' => '1',
            'letra' => 'ASIR',
            'etapas' => Etapas::FP
        ]);
    }
}
