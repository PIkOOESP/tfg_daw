<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Alumno_Curso extends Model
{
    /**
     * El nombre de la tabla asociada al modelo.
     * 
     * @var string
     */
    protected $table = "alumno_curso";

    /**
     * Los atributos que son asignables en masa.
     * 
     * @var list<string>
     */
    protected $fillable = ["alumno_id", "curso_id"];

    /**
     * Los atributos que deben ocultarse para la serialización.
     * 
     * @var list<string>
     */
    protected $hidden = ["created_at","updated_at"];

    /**
     * Define la relación de pertenencia con el modelo Alumno.
     * 
     * @return BelongsTo
     */
    function alumno(){
        return $this -> BelongsTo(Alumno::class);
    }

    /**
     * Define la relación de pertenencia con el modelo Curso.
     * 
     * @return BelongsTo
     */
    function curso(){
        return $this -> belongsTo(Curso::class);
    }

    public function ordenadores() 
{
    // belongsToMany(Modelo_Destino, tabla_pivote, fk_este_modelo, fk_modelo_destino)
    return $this->belongsToMany(
        Ordenador_Clase::class, 
        'clase_alumno_curso', 
        'alumno_curso_id', 
        'ordenador_clase_id'
    );
}
}
