@extends('template.layout')

@section('title', 'Información de Cursos')
<!-- Estilos para la vista -->
<style>
    /* Contenedor de cursos */
    #cursos-container {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    /* Estilos para los cursos en vista de lista */
    .curso-card {
        background: #fff;
        padding: 15px;
        border-radius: 10px;
        box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .curso-card:hover {
        transform: scale(1.02);
    }

    .curso-title {
        font-size: 1.2rem;
        font-weight: bold;
        color: #2c3e50;
    }

    .curso-text {
        color: #555;
        font-size: 0.95rem;
    }

    .curso-fecha {
        font-size: 0.9rem;
        color: #007bff;
    }

    /* Vista cuadricular */
    .grid-view {
        display: grid !important;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    }

    /* Ocultar elementos cuando cambia la vista */
    .hidden {
        display: none !important;
    }
</style>

@section('content')
    <div class="container">
        @php
            $title = 'Información de Cursos';
            if (isset($opcion)) {
                if ($opcion === 'fechas') {
                    $title = 'Fechas de Inscripción de Cursos';
                } elseif ($opcion === 'flayAdds') {
                    $title = 'Flayers y Anuncios';
                } elseif ($opcion === 'promociones') {
                    $title = 'Promociones';
                }
            }
            $fechasDisponibles = $info->pluck('FechadeRegistro_STPS')->unique()->sort()->values();
        @endphp

        <h2 class="text-center my-4">{{ $title }}</h2>

        @if (isset($mensaje))
            <div class="alert alert-warning text-center">{{ $mensaje }}</div>
        @else
            <!-- Filtro por Fechas -->
            <div class="mb-4 text-center">
                <label for="fechaFiltro" class="fw-bold">Filtrar por Fecha de Inscripción:</label>
                <select id="fechaFiltro" class="form-control d-inline-block w-auto" onchange="filtrarPorFecha()">
                    <option value="">-- Seleccione una fecha --</option>
                    @foreach($fechasDisponibles as $fecha)
                        <option value="{{ $fecha }}">{{ $fecha }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Botones para cambiar vista -->
            <div class="text-center mb-4">
                <button class="btn btn-outline-primary" onclick="mostrarCuadricula()">Vista Cuadrícula</button>
                <button class="btn btn-outline-secondary" onclick="mostrarLista()">Vista Lista</button>
                <button class="btn btn-outline-dark" onclick="mostrarCarrusel()">Vista Carrusel</button>
            </div>

            <!-- Vista en Cuadrícula (Mostrada por defecto) -->
            <div id="vistaCuadricula" class="row g-4">
                @foreach ($info as $curso)
                    <div class="col-md-4 curso-item" data-fecha="{{ $curso->FechadeRegistro_STPS }}">
                        <div class="card h-100 shadow-sm border-0 text-center" style="width: 100%; height: 350px;">
                            <div class="card-body d-flex flex-column justify-content-between">
                                <h5 class="card-title fw-bold">{{ $curso->NombredelCurso }}</h5>
                                <p class="card-text flex-grow-1">{{ $curso->DescripciondeCurso }}</p>
                                <p class="text-muted">Fecha de Inscripción: {{ $curso->FechadeRegistro_STPS }}</p>
                                <a href="{{ route('curso.show', ['opcion' => 'fechas', 'id' => $curso->id]) }}"
                                    class="btn btn-primary btn-comprar">
                                    Ver más
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Vista en Lista (Oculta por defecto) -->
            <div id="vistaLista" class="d-none mb-5">
                <ul class="list-group">
                    @foreach ($info as $curso)
                        <li class="list-group-item d-flex justify-content-between align-items-center curso-item"
                            data-fecha="{{ $curso->FechadeRegistro_STPS }}">
                            <div class="w-75">
                                <h5 class="fw-bold">{{ $curso->NombredelCurso }}</h5>
                                <p>{{ $curso->DescripciondeCurso }}</p>
                                <p class="text-muted">Fecha de Inscripción: {{ $curso->FechadeRegistro_STPS }}</p>
                            </div>
                            <a href="{{ route('curso.show', ['opcion' => 'fechas', 'id' => $curso->id]) }}"
                                class="btn btn-primary btn-comprar">
                                Ver más
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Vista en Carrusel (Oculta por defecto) -->
            <div id="vistaCarrusel" class="d-none text-center">
                <div id="cursoCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner" style="max-width: 1000px; margin: auto;">
                        @foreach ($info as $index => $curso)
                            <div class="carousel-item curso-item {{ $index === 0 ? 'active' : '' }}"
                                data-fecha="{{ $curso->FechadeRegistro_STPS }}">
                                <div class="card text-center p-4 border-0 shadow-sm" style="width: 100%; height: 500px;">
                                    <h5 class="fw-bold">{{ $curso->NombredelCurso }}</h5>
                                    <p class="card-text flex-grow-1">{{ $curso->DescripciondeCurso }}</p>
                                    <p class="text-muted">Fecha de Inscripción: {{ $curso->FechadeRegistro_STPS }}</p>
                                    <a href="{{ route('curso.show', ['opcion' => 'fechas', 'id' => $curso->id]) }}"
                                        class="btn btn-primary btn-comprar">
                                        Ver más
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#cursoCarousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#cursoCarousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </button>
                </div>
            </div>
        @endif
    </div>
@endsection

<!-- Script para cambiar la vista -->
<script>
    function mostrarCuadricula() {
        document.getElementById('vistaCuadricula').classList.remove('d-none');
        document.getElementById('vistaLista').classList.add('d-none');
        document.getElementById('vistaCarrusel').classList.add('d-none');
    }

    function mostrarLista() {
        document.getElementById('vistaCuadricula').classList.add('d-none');
        document.getElementById('vistaLista').classList.remove('d-none');
        document.getElementById('vistaCarrusel').classList.add('d-none');
    }

    function mostrarCarrusel() {
        document.getElementById('vistaCuadricula').classList.add('d-none');
        document.getElementById('vistaLista').classList.add('d-none');
        document.getElementById('vistaCarrusel').classList.remove('d-none');
    }

    function filtrarPorFecha() {
        let fechaSeleccionada = document.getElementById('fechaFiltro').value;
        document.querySelectorAll('.curso-item').forEach(item => {
            let fechaCurso = item.getAttribute('data-fecha');
            let coincide = !fechaSeleccionada || new Date(fechaCurso).toISOString().split('T')[0] ===
                fechaSeleccionada;
            item.style.display = coincide ? 'block' : 'none';
        });
    }
</script>
