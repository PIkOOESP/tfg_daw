<?php

namespace App\Services;

use App\Repositories\IncidenciasRepository;

class IncidenciasService
{
    public function create($value){
        return  IncidenciasRepository::createIncidencia($value);
    }   
}
