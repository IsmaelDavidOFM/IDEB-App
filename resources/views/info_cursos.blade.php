@extends('templates.layout')

@section('title', 'Información de Cursos')

@section('content')
    <div class="variableseccion">
        <div class="title">
            <h2>Texto por defecto</h2>
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
            <a href="{{ url('/producto') }}">Ver mas</a>
        </div>
        <br><br><br>
@endsection
