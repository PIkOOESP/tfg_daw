<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    protected $fillable = ["nombre"];
    protected $hidden = ["updated_at","created_at"];
}
