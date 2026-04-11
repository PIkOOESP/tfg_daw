<?php

namespace App\Repositories;

use App\Models\Aulas;

class AulasRepository
{
    public static function getAulas(){
        return Aulas::all();
    }
}
