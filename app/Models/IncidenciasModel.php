<?php

namespace App\Models;

use App\Enums\IncidenciaStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class IncidenciasModel extends Model
{
    /**
     * El nombre de la tabla asociada al modelo.
     * 
     * @var string
     */
    protected $table = "incidencias";

    /**
     * Los atributos que son asignables en masa.
     * 
     * @var list<string>
     */
    protected $fillable = ["fecha", "ordenador_id", "descripcion", "titulo", "resuelto"];

    /**
     * Los atributos que deben ocultarse para la serialización.
     * 
     * @var list<string>
     */
    protected $hidden = ["updated_at","created_at"];

    /**
     * Define la relación de pertenencia con el modelo Ordenador.
     * 
     * @return BelongsTo
     */
    function ordenadores(){
        return $this -> belongsTo(OrdenadoresModel::class);
    }

    /**
     * Los atributos que deben ser casts.
     * 
     * @return array<string, string>
     */
    protected function casts()
    {
        return[
            "status" => IncidenciaStatus::class
        ];
    }
}
