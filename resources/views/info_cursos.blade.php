@extends('templates.layout')

@section('title', 'Información de Cursos')
<style>
    /* public/css/custom.css */
    .variableseccion {
        margin: 20px;
    }

    .variableseccion .title {
        font-size: 24px;
        color: #333;
    }

    .variableseccion .search input {
        width: 100%;
        padding: 10px;
        margin-top: 10px;
    }

    .variableseccion .visualizador {
        display: flex;
        align-items: center;
        margin-top: 20px;
    }

    .variableseccion .visualizador img {
        max-width: 200px;
        margin-right: 20px;
    }

    .variableseccion .descripcion {
        flex-grow: 1;
    }

    .variableseccion .descripcion p {
        margin: 0;
        padding: 10px;
        background-color: #f8f9fa;
        border-radius: 5px;
    }
</style>
@section('content')
<<<<<<< HEAD
    <div class="variableseccion">
        <div class="title">
            <h2>
                {{$opcion}}
            </h2>
        </div>
        <div class="search">
            <input type="text" name="search" id="" placeholder="Buscar">
        </div><br>
        <div class="visualizador">
            <img src="" alt="defaoult">
            <div class="descripcion">
                <p>
                    Lorem ipsum dolor sit amet consectetur,
                    adipisicing elit. Ipsum animi asperiores
                    voluptas accusamus odio ab impedit sint labore
                    dolores. Iure tenetur, nam laudantium temporibus
                    illum suscipit non eum vero molestias.
                </p>
            </div>
            <a href="{{ url('/producto') }}">Ver más</a>
        </div>
        <br><br><br>
=======
    <div class="container mt-4">
        <h2 class="text-center">{{ $opcion }}</h2>

        <div class="search my-3">
            <input type="text" class="form-control" placeholder="Buscar">
        </div>

        @foreach ($info as $item)
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ $item->image ?? 'https://via.placeholder.com/150' }}" class="img-fluid rounded-start"
                            alt="{{ $item->title }}">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->title }}</h5>
                            <p class="card-text">{{ $item->description }}</p>
                            <a href="{{ url('/producto') }}" class="btn btn-primary">Ver más</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
>>>>>>> 68957ce (cambios 02)
    </div>
@endsection
