<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrdenadoresModel extends Model
{
    /**
     * El nombre de la tabla asociada al modelo.
     * 
     * @var string
     */
    protected $table = "ordenadores";

    /**
     * Los atributos que son asignables en masa.
     * 
     * @var list<string>
     */
    protected $fillable = ["nombre", "estado"];

    /**
     * Los atributos que deben ocultarse para la serialización.
     * 
     * @var list<string>
     */
    protected $hidden = ["updated_at","created_at"];
}
