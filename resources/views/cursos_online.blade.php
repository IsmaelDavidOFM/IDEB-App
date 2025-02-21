@extends('template.layout')

@section('title', 'Cursos en Línea')

<style>
    .curso-item {
        display: block;
    }

    .curso-card {
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s;
    }

    .curso-card:hover {
        transform: scale(1.05);
    }

    .curso-card img {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    .curso-info {
        padding: 15px;
    }

    .curso-info h5 {
        font-size: 1.2rem;
        margin-bottom: 10px;
    }

    .curso-info p {
        margin: 0;
    }

    .curso-info .precio {
        font-size: 1.1rem;
        font-weight: bold;
        margin-top: 5px;
        color: #007bff;
    }

    .curso-info .modalidad {
        font-size: 0.9rem;
        font-weight: 500;
        color: #6c757d;
    }

    .curso-info .btn-comprar {
        margin-top: 10px;
        width: 100%;
        background-color: #007bff;
        color: white;
        border: none;
        transition: background-color 0.2s;
    }

    .curso-info .btn-comprar:hover {
        background-color: #0056b3;
    }

    .filters {
        margin-bottom: 40px;
        text-align: center;
    }

    .filters .form-control {
        display: inline-block;
        width: 300px;
        margin: 0 auto;
        text-align: center;
    }

    .filters button {
        width: 150px;
    }

    .row {
        margin-top: 20px;
    }
</style>

@section('content')
    <div class="container mt-4">
        <h2 class="text-center">Cursos Disponibles</h2>

        <!-- Filtros -->
        <div class="filters my-4">
            <!-- Barra de búsqueda -->
            <input
                type="text"
                id="search"
                class="form-control"
                placeholder="Buscar"
                oninput="filtrarCursos()"
            >
        </div>

        <!-- Mostrar los cursos -->
        <div id="cursos" class="row">
            @foreach ($cursos as $curso)
                <div class="col-md-4 mb-4 curso-item"
                    data-nombre="{{ strtolower($curso->NombredelCurso) }}"
                    data-modalidad="{{ strtolower($curso->modalidad) }}">
                    <div class="curso-card">
                        <!-- Imagen del curso -->
                        <img src="{{ asset('images/' . $curso->imagen) }}" alt="{{ $curso->NombredelCurso }}">

                        <!-- Información del curso -->
                        <div class="curso-info">
                            <h5 class="card-title">{{ $curso->NombredelCurso }}</h5>
                            <p class="precio">Costo: ${{ number_format($curso->CostodelCurso, 2) }}</p>
                            <p class="modalidad">
                                Modalidad:
                                @if ($curso->Presencial) Presencial
                                @elseif ($curso->Virtual) Virtual
                                @elseif ($curso->Mixto) Mixto
                                @endif
                            </p>
                            <!-- Botón de compra -->
                            <a href="{{ route('curso.show', $curso->id) }}" class="btn btn-primary btn-comprar">
                                ver mas
                            </a>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

<script>
    function filtrarCursos() {
        const searchText = document.getElementById('search').value.toLowerCase();
        const cursos = document.querySelectorAll('.curso-item');

        cursos.forEach(curso => {
            const nombre = curso.getAttribute('data-nombre').toLowerCase();
            const isVisible = nombre.includes(searchText);

            // Mostrar u ocultar el curso basado en la búsqueda
            curso.style.display = isVisible ? 'block' : 'none';
        });
    }
</script>
