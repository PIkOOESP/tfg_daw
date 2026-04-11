<?php

namespace App\Services;

use App\Exceptions\NotFoundAlumnoCursoException;
use App\Exceptions\NotFoundClaseAlumnoCursoException;
use App\Exceptions\NotFoundClaseException;
use App\Exceptions\NotFoundCursoException;
use App\Exceptions\NotFoundOrdenadorClaseException;
use App\Repositories\CursosAlumnosRepository;
use App\Repositories\AsignacionesOrdenadoresRepository;
use App\Repositories\AulasOrdenadoresRepository;
use Illuminate\Http\Response;

class AsignacionesService
{
    public function filtrar($value){
        $asignaciones = AsignacionesOrdenadoresRepository::getAsignaciones($value['curso_id'], $value['aula_id']);
        
        return $asignaciones;
    }

    public function mostrarOrdenador($id){
        $ordenadores = AulasOrdenadoresRepository::getOrdenadores($id);

        return $ordenadores;
    }

    public function mostrarAlumno($id){
        $alumno = CursosAlumnosRepository::getAlumnos($id);
        return $alumno;
    }
    
/* Funcion en cuarentena de momento.

    public function mostrarEditar($value){
        $claseAlumno = new Clase_Alumno_Curso();
        $query = $claseAlumno ->from("clase_alumno_curso as cac")
        ->leftJoin('alumno_curso as ac', 'cac.alumno_curso_id', '=', 'ac.id') 
        ->leftJoin('alumno as a', 'ac.alumno_id', '=', 'a.id')
        ->leftJoin('ordenador_clase as oc', 'cac.ordenador_clase_id', '=', 'oc.id')
        ->leftJoin('ordenador as o',"oc.ordenador_id","=","o.id")
        ->where('ac.curso_id',"=", $value["curso_id"]) 
        ->where('oc.clase_id',"=", $value["clase_id"]) 
        ->select('a.nombre as nombre_alumno', "a.apellido as apellido_alumno", "o.id", "cac.id")
        ->orderBy("o.id","asc")
        ->get();

        if(empty($query)){
            return null;
        }
        return $query;
    }     

    public function editarClase($value){
        foreach($value as $valor){
            $this -> existAlumnoCurso($valor['alumno_curso_id']);
            $this -> existClaseAlumnoCurso($valor['clase_alumno_curso_id']);

            $editar = Clase_Alumno_Curso::find($valor['clase_alumno_curso_id']);
            $editar -> alumno_curso_id = $valor['alumno_curso_id'];
            $editar -> save();
        }
    }
*/

    public function miniBorrarAsignacionOrdenador($asignacion_id){
        AsignacionesOrdenadoresRepository::miniBorrar($asignacion_id);
    }

    public function miniCrearAsignacionOrdenador($value){
        AsignacionesOrdenadoresRepository::miniCrear($value);
    }

    public function alumnosSinOrdenador($curso_id, $aula_id){
        return AsignacionesOrdenadoresRepository::getAlumnosSinOrdenador($curso_id, $aula_id);

    }
}
