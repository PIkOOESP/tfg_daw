<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clase_Alumno_Curso extends Model
{
    protected $table = "clase_alumno_curso";
    protected $fillable = ["ordenador_id", "alumno_id", "curso_id", "clase_id"];
    protected $hidden = ["updated_at","created_at"];

    function ordenador(){
        return $this -> belongsTo(Ordenador::class);
    }

    function alumno(){
        return $this -> belongsTo(Alumno::class);
    }

    function curso(){
        return $this -> belongsTo(Curso::class);
    }

    function clase(){
        return $this -> belongsTo(Clase::class);
    }
}
