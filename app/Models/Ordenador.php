<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ordenador extends Model
{
    protected $fillable = ["nombre", "estado"];
    protected $hidden = ["updated_at","created_at"];
}
