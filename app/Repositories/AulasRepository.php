<?php

namespace App\Repositories;

use App\Models\AulasModel as Aulas;

class AulasRepository
{
    public static function getAulas(){
        return Aulas::select()
        ->get()
        ->toArray();
    }
}
