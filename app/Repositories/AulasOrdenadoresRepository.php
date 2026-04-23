<?php

namespace App\Repositories;

use App\Models\AulasOrdenadoresModel as AulasOrdenadores;

class AulasOrdenadoresRepository
{
    public static function getOrdenadores($value){
        $query = AulasOrdenadores::select(
            'o.nombre as nombre', 
            'o.id as id',
            )
        ->join('ordenadores as o', 'aulas_ordenadores.ordenador_id', '=', 'o.id')
        ->where('aulas_ordenadores.aula_id',"=", $value) 
        ->get()
        ->toArray();

        if(empty($query)){
            return null;
        }

        return $query;
    }
}