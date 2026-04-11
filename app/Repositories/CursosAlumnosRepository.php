<?php

namespace App\Repositories;

use App\Models\CursosAlumnosModel as CursosAlumnos;

class CursosAlumnosRepository
{
    public static function getAlumnos($value){
        $query = CursosAlumnos::select(
            "a.nombre as nombre_alumno",
            "a.apellido as apellido_alumno",
            "a.id as alumno_id"
        )
        ->join('alumnos as a', 'cursos_alumnos.alumno_id', '=', 'a.id')
        ->where('curso_id', $value)
        ->get()
        ->toArray();

        if(empty($query)){
            return null;
        }

        return $query;
    }
}
