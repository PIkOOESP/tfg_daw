<?php

namespace App\Repositories;

use App\Models\AlumnosModel;
use App\Models\AsignacionesOrdenadoresModel;

class AsignacionesOrdenadoresRepository
{
    public static function getAsignaciones($curso_id, $aula_id){
        $asignacion = AsignacionesOrdenadoresModel::from('asignaciones_ordenadores as aor')
        ->select(
            'a.nombre as nombre_alumno', 
            "a.apellidos as apellido_alumno",
            "a.id as alumno_id",
            "o.nombre as nombre_ordenador", 
            "o.id as ordenador_id", 
            "ao.aula_id as aula_id", 
            "ca.curso_id as curso_id",
            "aor.id as asignacion_id"
        )
        ->join('alumnos as a', 'aor.alumno_id', '=', 'a.id')
        ->join('cursos_alumnos as ca', 'a.id', '=', 'ca.alumno_id') 
        ->join('ordenadores as o',"aor.ordenador_id","=","o.id")
        ->join('aulas_ordenadores as ao', 'o.id', '=', 'ao.ordenador_id')
        ->where('ca.curso_id',"=", $curso_id) 
        ->where('ao.aula_id',"=", $aula_id)
        ->where('aor.is_enabled', "=", true) 
        ->orderBy("o.id","asc")
        ->get() 
        ->keyBy('o.id');
        
        if(empty($asignacion)){
            return null;
        }

        return $asignacion;
    }

    public static function miniBorrar($id){
        $asignacion = AsignacionesOrdenadoresModel::find($id);
        if ($asignacion) {
            $asignacion->is_enabled = false;
            $asignacion->save();
        }
    }

    public static function miniCrear($value){
        $asignacion = AsignacionesOrdenadoresModel::where('alumno_id', $value['alumno_id'])
        ->where('ordenador_id', $value['ordenador_id'])
        ->first();

        if ($asignacion) {
            $asignacion->is_enabled = true;
            $asignacion->save();
            return;
        }

        $asignacion = new AsignacionesOrdenadoresModel();
        $asignacion->alumno_id = $value['alumno_id'];
        $asignacion->ordenador_id = $value['ordenador_id'];
        $asignacion->is_enabled = true;
        $asignacion->save();
    }

    public static function getAlumnosSinOrdenador($curso_id, $aula_id){
        $asignacion = AsignacionesOrdenadoresModel::from('asignaciones_ordenadores as aor')
        ->select(
            'a.id'
        )
        ->join('alumnos as a', 'aor.alumno_id', '=', 'a.id')
        ->join('cursos_alumnos as ca', 'a.id', '=', 'ca.alumno_id') 
        ->join('ordenadores as o',"aor.ordenador_id","=","o.id")
        ->join('aulas_ordenadores as ao', 'o.id', '=', 'ao.ordenador_id')
        ->where('ca.curso_id', "=", $curso_id) 
        ->where('ao.aula_id', "=", $aula_id) 
        ->where('aor.is_enabled', "=", true)
        ->get()
        ->pluck('a.id');

        $alumnos = AlumnosModel::select("alumnos.id", "alumnos.nombre", "alumnos.apellidos")
        ->join('cursos_alumnos as ca', 'alumnos.id', '=', 'ca.alumno_id')
        ->where('ca.curso_id', $curso_id)
        ->whereNotIn('alumnos.id', $asignacion)
        ->get();

        return $alumnos;
    }
}
