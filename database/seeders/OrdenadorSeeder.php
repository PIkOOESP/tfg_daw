<?php

namespace Database\Seeders;

use App\Models\OrdenadoresModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrdenadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OrdenadoresModel::create([
            'nombre' => '1',
            'estado' => true,
        ]);

        OrdenadoresModel::create([
            'nombre' => '2',
            'estado' => false,
        ]);

        OrdenadoresModel::create([
            'nombre' => '3',
            'estado' => true,
        ]);

        OrdenadoresModel::create([
            'nombre' => '4',
            'estado' => false,
        ]);
        OrdenadoresModel::create([
            'nombre' => '5',
            'estado' => false,
        ]);
        OrdenadoresModel::create([
            'nombre' => '6',
            'estado' => false,
        ]);
        OrdenadoresModel::create([
            'nombre' => '7',
            'estado' => false,
        ]);
        OrdenadoresModel::create([
            'nombre' => '8',
            'estado' => false,
        ]);
    }
}
