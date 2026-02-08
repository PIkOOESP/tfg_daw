<?php

namespace Database\Seeders;

use App\Models\Profesor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class ProfesorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Profesor::create([
            'nombre' => 'Nombre del Profesor 1',
            'apellido' => 'Apellidos del Profesor 1',
            'email' => 'profesor1@example.com',
            'password' => Hash::make('password1'),
        ]);

        Profesor::create([
            'nombre' => 'Nombre del Profesor 2',
            'apellido' => 'Apellidos del Profesor 2',
            'email' => 'profesor2@example.com',
            'password' => Hash::make('password2'),
        ]);

        Profesor::create([
            'nombre' => 'Nombre del Profesor 3',
            'apellido' => 'Apellidos del Profesor 3',
            'email' => 'profesor3@example.com',
            'password' => Hash::make('password3'),
        ]);
    }
}
