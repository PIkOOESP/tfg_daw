<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $hidden = ["created_at","updated_at"];
    protected $fillable = ["nombre","apellido","nre"];
}
