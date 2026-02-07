<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $table = "alumno";
    protected $fillable = ["nombre","apellido","nre"];
    protected $hidden = ["updated_at","created_at"];
}
