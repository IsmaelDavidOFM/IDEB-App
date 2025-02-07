@extends('templates.layout')

@section('title', 'cursos en linea')

@section('content')
    <div>
        <div>
            <h2>Cursos</h2>
            <div class="search">
                <input type="text" name="search" id="search" placeholder="nombre del curso">
                <input type="button" value="Buscar">
            </div>
        </div>
        <br><br>
        <div>
            <div class="card">
                <img src="" alt="defoult">
                <p class="description">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Quas doloribus natus dolore, accusantium, dicta exercitationem
                    cumque deserunt recusandae provident vero ratione quod quam
                    perferendis quo, delectus atque ducimus quasi? Omnis!
                </p>
                <a href="{{ url('/producto') }}">Ver mas</a>
            </div>
        </div>
    </div><br><br>
@endsection
