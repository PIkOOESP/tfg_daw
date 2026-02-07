<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Alumno_Curso extends Model
{
    protected $table = "alumno_curso";
    protected $fillable = ["alumno_id", "curso_id"];
    protected $hidden = ["created_at","updated_at"];

    function alumno(){
        return $this -> BelongsTo(Alumno::class);
    }

    function curso(){
        return $this -> belongsTo(Curso::class);
    }
}
