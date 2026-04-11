<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilterAsignacionesOrdenadoresRequest;
use App\Http\Requests\MiniCrearRequest;
use App\Http\Requests\MiniDeleteRequest;
use App\Repositories\CursosRepository as repoCursos;
use App\Repositories\AulasRepository as repoAulas;
use App\Services\AsignacionesService  as servAsignaciones;

class AsignacionesOrdenadorController extends Controller
{
    protected $asignacionesService;

    public function __construct(servAsignaciones $asignacionesService) {
        $this->asignacionesService = $asignacionesService;
    }

    public function filtrar(FilterAsignacionesOrdenadoresRequest $request){
        $value = $request->validated();

        $asignaciones = $this->asignacionesService->filtrar($value);
        $ordenadores = $this->asignacionesService->mostrarOrdenador($value['aula_id']);
        $alumnos = $this->asignacionesService->alumnosSinOrdenador($value['curso_id'], $value['aula_id']);
        $aulas = repoAulas::getAulas();
        $cursos = repoCursos::getCursos();

        return view('clase',compact('asignaciones', "aulas", "cursos", 'ordenadores', 'value', 'alumnos'));
    }

    public function vista(){
        $aulas = repoAulas::getAulas();
        $cursos = repoCursos::getCursos();
        return view('clase', compact("aulas", "cursos"));
    }

    public function miniBorrar(MiniDeleteRequest $request){
        $data = $request->validated();
        $this->asignacionesService->miniBorrarAsignacionOrdenador($data['asignacion_id']);
        return redirect()->back();
    }

    public function miniCrear(MiniCrearRequest $request){
        $data = $request->validated();
        $this->asignacionesService->miniCrearAsignacionOrdenador($data);
        return redirect()->back();
    }
}