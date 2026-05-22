<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Clases y Cursos</title>
    <link rel="stylesheet" href="{{ asset('app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.bootstrap5.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<header>
    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm py-3" style="background-color: #0b63a9;">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('asignaciones.vista') }}">Panel de Control</a>
            
            <div class="d-flex align-items-center text-white gap-3">
                <div class="text-end d-none d-md-block">
                    <div class="fw-bold">{{ auth()->user()->nombre }}</div>
                    <small class="badge bg-light text-primary text-uppercase">{{ auth()->user()->rol }}</small>
                </div>

                <form action="{{ route('logout') }}" method="POST" class="m-0">
                    @csrf
                    <button type="submit" class="btn btn-outline-light btn-sm">
                        <i class="bi bi-box-arrow-right"></i> Salir
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <div class="navbar navbar-expand-lg navbar-light bg-white border-bottom py-2">
        <div class="container-fluid">
            <form action="{{ route('asignaciones.filtrar') }}" method="GET" class="d-flex flex-wrap w-100 gap-3 align-items-center justify-content-center">
                <div class="d-flex align-items-center gap-2">
                    <label class="mb-0 fw-bold">Curso:</label>
                    <div style="min-width: 150px;">
                        <select name="curso_id" class="form-select form-select-sm searchable-select" required>
                            <option value="">Seleccionar...</option>
                            @foreach($cursos as $curso)
                                <option value="{{ $curso['id'] }}" {{ (isset($value) && $value['curso_id'] == $curso['id']) ? 'selected' : '' }}>
                                    {{ $curso['nivel'] }}º {{ $curso['letra'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="d-flex align-items-center gap-2">
                    <label class="mb-0 fw-bold">Aula:</label>
                    <div style="min-width: 150px;">
                        <select name="aula_id" class="form-select form-select-sm searchable-select" required>
                            <option value="">Seleccionar...</option>
                            @foreach($aulas as $aula)
                                <option value="{{ $aula['id'] }}" {{ (isset($value) && $value['aula_id'] == $aula['id']) ? 'selected' : '' }}>
                                    {{ $aula['nombre'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <button class="btn btn-primary btn-sm px-4" type="submit">Filtrar</button>
            </form>
        </div>
    </div>
</header>

<main class="container mt-4">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if(isset($ordenadores))
        <div class="d-flex justify-content-center p-2">
            <form action="{{ route('asignaciones.historial') }}" method="POST">
                @csrf
                <input type="hidden" name="curso_id" value="{{ $value['curso_id'] }}">
                <input type="hidden" name="aula_id" value="{{ $value['aula_id'] }}">
                <button type="submit" class="btn btn-info text-white btn-lg mb-3 px-4 shadow-sm">
                    <i class="bi bi-clock-history"></i> Historial
                </button>
            </form>
        </div>
        
        <div class="row">
            @foreach ($ordenadores as $item)
                <div class="col-md-3 mb-4">
                    <div class="card text-center border-dark h-100 shadow-sm">
                        <div class="card-header text-white" style="background-color: #0b63a9;">
                            <strong>Ordenador Nº {{ $item['nombre'] }}</strong>
                        </div>

                        @php $asignacion = collect($asignaciones)->firstWhere('ordenador_id', $item['id']); @endphp

                        <div class="card-body d-flex flex-column justify-content-center">
                            @if($asignacion)
                                <h5 class="card-title text-primary">{{ $asignacion['nombre_alumno'] }} {{ $asignacion['apellido_alumno'] }}</h5>
                                <form action="{{ route('asignaciones.borrar') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="asignacion_id" value="{{ $asignacion['asignacion_id'] }}">
                                    <input type="hidden" name="curso_id" value="{{ $value['curso_id'] }}">
                                    <input type="hidden" name="aula_id" value="{{ $value['aula_id'] }}">
                                    <button type="submit" class="btn btn-outline-primary btn-sm w-100 mb-2">
                                        <i class="bi bi-person-x"></i> Liberar PC
                                    </button>
                                </form>
                            @else
                                @if(!empty($alumnos))
                                    <form action="{{ route('asignaciones.miniCrear') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="ordenador_id" value="{{ $item['id'] }}">
                                        <input type="hidden" name="curso_id" value="{{ $value['curso_id'] }}">
                                        <input type="hidden" name="aula_id" value="{{ $value['aula_id'] }}">
                                        <select name="alumno_id" class="form-select form-select-sm mb-2 searchable-select" required>
                                            <option value="">Asignar alumno...</option>
                                            @foreach($alumnos as $alumno)
                                                <option value="{{ $alumno['id'] }}">{{ $alumno['nombre'] }} {{ $alumno['apellidos'] }}</option>
                                            @endforeach
                                        </select>
                                        <button type="submit" class="btn btn-outline-success btn-sm w-100 mb-2">
                                            <i class="bi bi-person-plus"></i> Asignar PC
                                        </button>
                                    </form>
                                @endif
                            @endif
                            <a href="{{ route('incidencias.home', ['ordenador_id' => $item['id'], 'curso_id' => $value['curso_id'], 'aula_id' => $value['aula_id']]) }}" class="btn btn-outline-danger btn-sm w-100 mb-2">
                                <i class="bi bi-pc-display"></i> Incidencia
                            </a>
                        </div>
                        <div class="card-footer py-1 bg-light">
                            @if($item['disponible'] == false) <small class="text-danger">● Averiado</small>
                            @elseif($asignacion) <small class="text-danger">● Ocupado</small>
                            @else <small class="text-success">● Disponible</small> @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-info text-center mt-5">
            <i class="bi bi-info-circle"></i> Selecciona un curso y un aula para gestionar los ordenadores.
        </div>
    @endif
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.searchable-select').forEach(function(el) {
            new TomSelect(el, { create: false });
        });
    });
</script>
</body>
</html>