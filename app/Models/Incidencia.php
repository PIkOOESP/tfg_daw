<?php

namespace App\Models;

use App\Enum\IncidenciaStatus;
use Illuminate\Database\Eloquent\Model;

class Incidencia extends Model
{
    protected $fillable = ["fecha", "ordenador_id", "arreglado"];
    protected $hidden = ["updated_at","created_at"];

    protected function casts()
    {
        return[
            "status" => IncidenciaStatus::values()
        ];
    }
}
