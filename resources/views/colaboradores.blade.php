@extends('template.layout')

@section('title', 'Colaboradores')
<style>
    /* Aseguramos que el contenedor de los colaboradores tenga un margen adecuado */
    .employees {
        padding: 0;
    }

    /* Aseguramos que las imágenes sean redondas y se ajusten bien */
    .card-img-top {
        max-width: 90%;
        height: auto;
    }

    .colb {
        width: 100%;
        position: relative;
        margin: 0 auto;
        /* Centrado horizontal */
        padding: 20px;
        border-radius: 8px;
        /* Opcional, para bordes redondeados */
    }
</style>
@section('content')
    <div id="employees" class="employees py-5 text-center w-100">
        <h2>Equipo de trabajo</h2><br><br>

        @php
            // Agrupar a los colaboradores por su posición
            $usersPorPosicion = $users->groupBy('puesto');
        @endphp

        @foreach ($usersPorPosicion as $puesto => $usersDePosicion)
            <h3>{{ strtoupper($puesto) }}</h3> <!-- Mostrar el nombre de la posición -->
            <div class="colb row justify-content-center mb-5">
                @foreach ($usersDePosicion as $user)
                    <div class="col-9 col-sm-3 col-md-2 col-lg-3 mb-2">
                        <div class="card text-center shadow-sm h-100 p-3">
                            <!-- Verifica si el usuario tiene una imagen, de lo contrario usa una imagen por defecto -->
                            <img src="{{ $user->picture ?: '/image/images.jpeg' }}"
                                alt="Colaborador {{ $loop->iteration }}" class="card-img-top rounded-circle mx-auto"
                                style="width: 100px; height: 100px;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $user->name }}</h5>
                                <p class="card-text">{{ $user->puesto }}</p> <!-- Muestra la posición -->
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div><br><br>

@endsection
