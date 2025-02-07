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
    </div>
@endsection
