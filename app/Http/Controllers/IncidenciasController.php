<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Requests\CreateIncidenceRequest;   

use App\Repositories\OrdenadoresRepository as repoOrdenadores;
use App\Repositories\CursosRepository as repoCursos;
use App\Repositories\AulasRepository as repoAulas;

class IncidenciasController extends Controller
{
    protected $incidenceService;

    public function __construct(){

    }

    public function home(Request $request){
        $value = $request -> all();

        
        $ordenador = $value['ordenador_id'] ? repoOrdenadores::getOrdenador($value['ordenador_id']) : null;
        
        return view('home_incidencias', compact('ordenador', 'value'));
    }

    public function create(CreateIncidenceRequest $request){
        $value = $request -> validated();

        $this->incidenceService->create($value);

        return redirect() -> route('asignaciones.filtrar', [
            "aula_id" => $value['aula_id'],
            "curso_id" => $value['curso_id']
        ]);
    }
}
