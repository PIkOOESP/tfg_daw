<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ordenador_Clase extends Model
{
    protected $fillable = ["ordenador_id", "clase_id"];
    protected $hidden = ["updated_at","created_at"];

    function ordenador(){
        return $this -> belongsTo(Ordenador::class);
    }

    function clase(){
        return $this -> belongsTo(Clase::class);
    }
}
