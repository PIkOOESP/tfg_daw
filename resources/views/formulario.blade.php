<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Incidencia</title>
    <link rel="stylesheet" href="{{ asset('app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body class="bg-light">

<header>
    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm py-3" style="background-color: #0b63a9;">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('asignaciones.vista') }}">Gestor de ordenadores</a>
            
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
</header>

<main class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-sm">
                <div class="card-header text-white" style="background-color: #dc3545;">
                    <h4 class="mb-0"><i class="bi bi-exclamation-triangle-fill me-2"></i> Registrar Nueva Incidencia</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('incidencias.create') }}" method="POST">
                        @csrf
                        @if(request()->has('ordenador_id')) <input type="hidden" name="ordenador_id" value="{{ request('ordenador_id') }}"> @endif
                        @if(request()->has('aula_id')) <input type="hidden" name="aula_id" value="{{ request('aula_id') }}"> @endif
                        @if(request()->has('curso_id')) <input type="hidden" name="curso_id" value="{{ request('curso_id') }}"> @endif

                        <div class="mb-3">
                            <label for="titulo" class="form-label"><i class="bi bi-fonts me-2"></i>Título de la Incidencia</label>
                            <input type="text" class="form-control @error('titulo') is-invalid @enderror" id="titulo" name="titulo" value="{{ old('titulo') }}" placeholder="Ej: No enciende el monitor..." required>
                            @error('titulo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="descripcion" class="form-label"><i class="bi bi-chat-left-text me-2"></i>Descripción de la Incidencia</label>
                            <textarea class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion" rows="5" placeholder="Describe brevemente el problema..." required>{{ old('descripcion') }}</textarea>
                            @error('descripcion') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label d-block"><i class="bi bi-ui-radios me-2"></i>¿El equipo está operativo?</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="disponibilidad" id="disponibilidad_si" value="0" {{ old('disponibilidad') == '0' ? 'checked' : '' }} required>
                                <label class="form-check-label" for="disponibilidad_si">Sí, funciona</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="disponibilidad" id="disponibilidad_no" value="1" {{ old('disponibilidad') == '1' ? 'checked' : '' }} required>
                                <label class="form-check-label" for="disponibilidad_no">No, está averiado</label>
                            </div>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            @if(request()->has('curso_id') && request()->has('aula_id'))
                                <a href="{{ route('asignaciones.filtrar', ['curso_id' => request('curso_id'), 'aula_id' => request('aula_id')]) }}" class="btn btn-secondary"><i class="bi bi-x-lg me-2"></i>Cancelar</a>
                            @else
                                <a href="{{ route('asignaciones.vista') }}" class="btn btn-secondary"><i class="bi bi-x-lg me-2"></i>Cancelar</a>
                            @endif
                            <button type="submit" class="btn btn-danger"><i class="bi bi-send-fill me-2"></i>Registrar Incidencia</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>