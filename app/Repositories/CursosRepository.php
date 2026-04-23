<?php

namespace App\Repositories;

use App\Models\CursosModel as Cursos;

class CursosRepository
{
    public static function getCursos(){
        return Cursos::select()
        ->get()
        ->toArray();
    }
}
