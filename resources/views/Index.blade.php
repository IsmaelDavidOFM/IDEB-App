@extends('template.layout')

@section('title', 'Instituto I-DEB')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <section>
        <!-- Video de bienvenida -->
        <video class="w-100" autoplay loop muted>
            <source src="{{ asset('video/video.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>

        <!-- Descripción del instituto -->
        <div class="intro vh-100 d-flex align-items-center p-5 w-100">
            <div class="container">
                <div class="row align-items-center text-center text-md-start">
                    <div class="col-md-6">
                        <h2>Instituto IDEB</h2>
                        <p style="font-size:2vh">
                            Bienvenidos a INSTITUTO I-DEB, expertos en capacitación industrial.
                            En nuestra plataforma ofrecemos cursos diseñados para transformar a
                            profesionales del sector industrial, con una enseñanza práctica y aplicable.
                            ¡Comienza a aprender con nosotros hoy mismo!
                        </p>
                        <button type="button" class="btn btn-primary mt-3">Unirse Ahora</button>
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT1Yigg--mrdeXZN8MOBqp8zeiUIVibMhJllCdaoPwSAoITJXxjiVu6rey8SMlrtEzfFNY&usqp=CAU"
                            alt="logotipo" class="img-fluid rounded" style="max-width: 100%; height: 400px;">
                    </div>
                </div>
            </div>
        </div>

        <!-- Tarjetas de cursos -->
        <div id="courses" class="courses bg-dark text-white py-5 w-100 d-flex align-items-center">
            <div class="container">
                <h3 class="text-center mb-5">Cursos destacados</h3>
                <div class="row justify-content-center">
                    @foreach ($cursos->take(3) as $key => $course)
                        <div class="col-lg-4 col-md-6 col-12 mb-4">
                            <div class="card text-center shadow-lg h-100 p-4 bg-dark text-white border-light card-course
                                {{ $key == 1 ? 'middle-course' : '' }}" style="border-radius: 15px;">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT1Yigg--mrdeXZN8MOBqp8zeiUIVibMhJllCdaoPwSAoITJXxjiVu6rey8SMlrtEzfFNY&usqp=CAU"
                                    alt="Curso" class="img-fluid mb-3" style="border-radius: 10px;">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $course->NombredelCurso }}</h5>
                                    <p class="card-text">{{ $course->DescripciondeCurso}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div><br>
                <div class="text-center mt-4">
                    <a href="{{ url('/cursos_online') }}" class="btn btn-lg btn-primary px-5 py-3">Cursos en Línea</a>
                </div>
            </div>
        </div>

        <!-- Sección de colaboradores -->
        <div id="employees" class="employees py-5 text-center w-100 d-flex align-items-center">
            <div class="container">
                <h2>Nuestro equipo</h2>

                <div id="employeeCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($users->chunk(3) as $index => $group)
                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                <div class="row justify-content-center align-items-center">
                                    @foreach ($group as $key => $user)
                                        <div class="col-lg-3 col-md-6 col-12 mb-4">
                                            <div class="card text-center shadow-sm p-3
                                                {{ $key == 1 ? 'middle-card' : '' }}">
                                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT1Yigg--mrdeXZN8MOBqp8zeiUIVibMhJllCdaoPwSAoITJXxjiVu6rey8SMlrtEzfFNY&usqp=CAU"
                                                    alt="{{ $user->name }}" class="card-img-top rounded-circle mx-auto">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $user->name }}</h5>
                                                    <p class="card-text">{{ $user->puesto }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <a href="{{ url('/colaboradores') }}" class="btn btn-primary custom-btn">Ver más</a>
            </div>
        </div>



    </section>
@endsection

<script>
    // Hace que el carrusel avance automáticamente
    document.addEventListener("DOMContentLoaded", function () {
        const myCarousel = new bootstrap.Carousel(document.getElementById('employeeCarousel'), {
            interval: 2000, // Cambia cada 3 segundos
            ride: "carousel"
        });
    });
</script>
