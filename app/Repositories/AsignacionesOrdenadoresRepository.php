<?php

namespace App\Repositories;

use App\Models\AlumnosModel;
use App\Models\AsignacionesOrdenadoresModel;

class AsignacionesOrdenadoresRepository
{
    public static function getAsignaciones($curso_id, $aula_id){
        $asignacion = AsignacionesOrdenadoresModel::select(
            'a.nombre as nombre_alumno', 
            "a.apellido as apellido_alumno",
            "a.id as alumno_id",
            "o.nombre as nombre_ordenador", 
            "o.id as ordenador_id", 
            "ao.aula_id as aula_id", 
            "ca.curso_id as curso_id",
            "asignaciones_ordenadores.id as asignacion_id"
        )
        ->join('alumnos as a', 'asignaciones_ordenadores.alumnos_id', '=', 'a.id')
        ->join('cursos_alumnos as ca', 'a.id', '=', 'ca.alumno_id') 
        ->join('ordenadores as o',"asignaciones_ordenadores.ordenador_id","=","o.id")
        ->join('aulas_ordenadores as ao', 'o.id', '=', 'ao.ordenador_id')
        ->where('ca.curso_id',"=", $curso_id) 
        ->where('ao.aula_id',"=", $aula_id) 
        ->orderBy("o.id","asc") 
        ->get()
        ->toArray();
        
        if(empty($asignacion)){
            return null;
        }

        return $asignacion;
    }

    public static function miniBorrar($id){
        $asignacion = AsignacionesOrdenadoresModel::find($id);
        if ($asignacion) $asignacion->delete();
    }

    public static function miniCrear($value){
        $asignacion = new AsignacionesOrdenadoresModel();
        $asignacion->alumno_id = $value['alumno_id'];
        $asignacion->ordenador_id = $value['ordenador_id'];
        $asignacion->save();
    }

    public static function getAlumnosSinOrdenador($curso_id, $aula_id){
        $asignacion = AsignacionesOrdenadoresModel::select(
            'a.id'
        )
        ->join('alumnos as a', 'asignaciones_ordenadores.alumnos_id', '=', 'a.id')
        ->join('cursos_alumnos as ca', 'a.id', '=', 'ca.alumno_id') 
        ->join('ordenadores as o',"asignaciones_ordenadores.ordenador_id","=","o.id")
        ->join('aulas_ordenadores as ao', 'o.id', '=', 'ao.ordenador_id')
        ->where('ca.curso_id', "=", $curso_id) 
        ->where('ao.aula_id', "=", $aula_id) 
        ->get()
        ->pluck('a.id');

        $alumnos = AlumnosModel::select("alumnos.id", "alumnos.nombre", "alumnos.apellido")
        ->join('cursos_alumnos as ca', 'alumnos.id', '=', 'ca.alumno_id')
        ->where('ca.curso_id', $curso_id)
        ->whereNotIn('id', $asignacion)
        ->get()
        ->toArray();

        return $alumnos;
    }
}
