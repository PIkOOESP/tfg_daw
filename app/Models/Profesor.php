<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    protected $fillable = ["nombre", "apellido", "email", "password"];
    protected $hidden = ["updated_at","created_at"];

    protected function casts():array{
        return [
            "password" => "hashed"
        ];
    }
}
