<?php

namespace App\Repositories;

use App\Models\Cursos;

class CursosRepository
{
    public static function getCursos(){
        return Cursos::all();
    }
}
