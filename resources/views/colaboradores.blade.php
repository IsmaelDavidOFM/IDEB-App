@extends('template.layout')

@section('title', 'Colaboradores')
<style>
    /* Aseguramos que el contenedor de los colaboradores tenga un margen adecuado */
    .employees {
        padding:0;
    }

    /* Aseguramos que las imágenes sean redondas y se ajusten bien */
    .card-img-top {
        max-width: 90%;
        height: auto;
    }
    .colb {
        width: 100%;
        position: relative;
        margin: 0 auto; /* Centrado horizontal */
        padding: 20px;
        border-radius: 8px; /* Opcional, para bordes redondeados */
    }
</style>
@section('content')
    <div id="employees" class="employees py-5 text-center w-100">
        <h2>Colaboradores</h2><br><br>

        @php
            // Agrupar a los colaboradores por su posición
            $colaboradoresPorPosicion = $colaboradores->groupBy('position');
        @endphp

        @foreach ($colaboradoresPorPosicion as $position => $colaboradoresDePosicion)
            <h3>{{ strtoupper($position) }}</h3> <!-- Mostrar el nombre de la posición -->
            <div class="colb row justify-content-center mb-5">
                @foreach ($colaboradoresDePosicion as $colaborador)
                    <div class="col-9 col-sm-3 col-md-2 col-lg-3 mb-2">
                        <!-- Ajustamos las columnas según el tamaño de la pantalla -->
                        <div class="card text-center shadow-sm h-100 p-3">
                            <!-- Rutas modificadas para las imágenes -->
                            <img src="{{ $colaborador->picture }}" alt="Colaborador {{ $loop->iteration }}"
                                class="card-img-top rounded-circle mx-auto" style="width: 100px; height: 100px;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $colaborador->nombre }}</h5>
                                <p class="card-text">{{ $colaborador->position }}</p> <!-- Muestra la posición -->
                                <p class="card-text">{{ $colaborador->description }}</p> <!-- Descripción -->
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div><br><br>

@endsection
