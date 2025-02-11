@extends('templates.layout')

@section('title', 'Instituto I-DEB')
<<<<<<< HEAD
=======

>>>>>>> 68957ce (cambios 02)
<style>
    .intro {
        margin-bottom: 5rem;
        margin-top: 5rem;
    }
<<<<<<< HEAD
</style>
@section('content')
    <section>
        <!-- Video de bienvenida -->
        <video width="100%" height="" autoplay loop muted>
=======

    /* Ajustes para mejorar responsividad */
    @media (max-width: 768px) {
        .intro {
            margin: 2rem 0;
            text-align: center;
        }

        .intro img {
            height: auto;
            max-width: 80%;
            margin: 0 auto;
        }
    }

    /* Ajuste para pantallas grandes */
    .courses,
    .employees {
        min-height: 80vh;
    }
</style>

@section('content')
    <section>
        <!-- Video de bienvenida -->
        <video class="w-100" autoplay loop muted>
>>>>>>> 68957ce (cambios 02)
            <source src="{{ asset('video/video.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>

        <!-- Descripción del instituto -->
        <div class="intro vh-100 d-flex align-items-center p-5 w-100">
<<<<<<< HEAD
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <h2>Intituto IDEB</h2>
=======
            <div class="container">
                <div class="row align-items-center text-center text-md-start">
                    <div class="col-md-6">
                        <h2>Instituto IDEB</h2>
>>>>>>> 68957ce (cambios 02)
                        <p>
                            Bienvenidos a INSTITUTO I-DEB, expertos en capacitación industrial.
                            En nuestra plataforma ofrecemos cursos diseñados para transformar a
                            profesionales del sector industrial, con una enseñanza práctica y aplicable.
                            ¡Comienza a aprender con nosotros hoy mismo!
                        </p>
                        <button type="button" class="btn btn-primary mt-3">Unirse Ahora</button>
                    </div>
<<<<<<< HEAD
                    <div class="col-md-6 text-end">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT1Yigg--mrdeXZN8MOBqp8zeiUIVibMhJllCdaoPwSAoITJXxjiVu6rey8SMlrtEzfFNY&usqp=CAU"
                            alt="logotipo" class="img-fluid"
                            style="max-width: 100%; height:400px; margin: 3rem; padding: 2rem;">
=======
                    <div class="col-md-6 text-center text-md-end">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT1Yigg--mrdeXZN8MOBqp8zeiUIVibMhJllCdaoPwSAoITJXxjiVu6rey8SMlrtEzfFNY&usqp=CAU"
                            alt="logotipo" class="img-fluid rounded" style="max-width: 100%; height: 400px;">
>>>>>>> 68957ce (cambios 02)
                    </div>
                </div>
            </div>
        </div>

<<<<<<< HEAD

        <!-- Tarjetas de cursos -->
        <div id="courses" class="courses bg-dark text-white p-5 w-100">
            <div class="row justify-content-center">
                <h3 style="text-align: center">Cursos destacados</h3><br><br>
                <div class="col-md-3 mb-4">
                    <div class="card text-center shadow-sm h-100 p-3 bg-dark text-white">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT1Yigg--mrdeXZN8MOBqp8zeiUIVibMhJllCdaoPwSAoITJXxjiVu6rey8SMlrtEzfFNY&usqp=CAU"
                        alt="logotipo" class="img-fluid">
                        <div class="card-body">
                            <h5 class="card-title">Curso de Programación</h5>
                            <p class="card-text">Aprende a programar desde cero con nuestros cursos interactivos.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card text-center shadow h-100 p-3 bg-dark text-white">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT1Yigg--mrdeXZN8MOBqp8zeiUIVibMhJllCdaoPwSAoITJXxjiVu6rey8SMlrtEzfFNY&usqp=CAU"
                        alt="logotipo" class="img-fluid">
                        <div class="card-body">
                            <h5 class="card-title">Curso de Diseño Gráfico</h5>
                            <p class="card-text">Domina las herramientas de diseño y crea impresionantes gráficos.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card text-center shadow-sm h-100 p-3 bg-dark text-white">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT1Yigg--mrdeXZN8MOBqp8zeiUIVibMhJllCdaoPwSAoITJXxjiVu6rey8SMlrtEzfFNY&usqp=CAU"
                        alt="logotipo" class="img-fluid">
                        <div class="card-body">
                            <h5 class="card-title">Curso de Marketing Digital</h5>
                            <p class="card-text">Conviértete en un experto en marketing digital y estrategias online.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-4">
                <a href="{{ url('/cursos_online') }}" class="btn btn-primary btn-">Cursos en Línea</a>
=======
        <!-- Tarjetas de cursos -->
        <div id="courses" class="courses bg-dark text-white p-5 w-100 d-flex align-items-center">
            <div class="container">
                <h3 class="text-center">Cursos destacados</h3>
                <div class="row justify-content-center">
                    @foreach ([['title' => 'Curso de Programación', 'desc' => 'Aprende a programar desde cero con nuestros cursos interactivos.'], ['title' => 'Curso de Diseño Gráfico', 'desc' => 'Domina las herramientas de diseño y crea impresionantes gráficos.'], ['title' => 'Curso de Marketing Digital', 'desc' => 'Conviértete en un experto en marketing digital y estrategias online.']] as $course)
                        <div class="col-lg-3 col-md-6 col-12 mb-4">
                            <div class="card text-center shadow-sm h-100 p-3 bg-dark text-white">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT1Yigg--mrdeXZN8MOBqp8zeiUIVibMhJllCdaoPwSAoITJXxjiVu6rey8SMlrtEzfFNY&usqp=CAU"
                                    alt="Curso" class="img-fluid">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $course['title'] }}</h5>
                                    <p class="card-text">{{ $course['desc'] }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="text-center mt-4">
                    <a href="{{ url('/cursos_online') }}" class="btn btn-primary">Cursos en Línea</a>
                </div>
>>>>>>> 68957ce (cambios 02)
            </div>
        </div>

        <!-- Sección de colaboradores -->
<<<<<<< HEAD
        <div id="employees" class="employees py-5 text-center w-100">
            <h2>Colaboradores</h2><br><br>
            <div class="row justify-content-center">
                <div class="col-md-3 mb-4">
                    <div class="card text-center shadow-sm h-100 p-3">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT1Yigg--mrdeXZN8MOBqp8zeiUIVibMhJllCdaoPwSAoITJXxjiVu6rey8SMlrtEzfFNY&usqp=CAU"
                        alt="Colaborador 1" class="card-img-top rounded-circle mx-auto" style="width: 100px; height: 100px;">
                        <div class="card-body">
                            <h5 class="card-title">Nombre del Colaborador 1</h5>
                            <p class="card-text">Ocupación del Colaborador 1</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card text-center shadow-sm h-100 p-3">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT1Yigg--mrdeXZN8MOBqp8zeiUIVibMhJllCdaoPwSAoITJXxjiVu6rey8SMlrtEzfFNY&usqp=CAU"
                        alt="Colaborador 1" class="card-img-top rounded-circle mx-auto" style="width: 100px; height: 100px;">
                        <div class="card-body">
                            <h5 class="card-title">Nombre del Colaborador 2</h5>
                            <p class="card-text">Ocupación del Colaborador 2</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card text-center shadow-sm h-100 p-3">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT1Yigg--mrdeXZN8MOBqp8zeiUIVibMhJllCdaoPwSAoITJXxjiVu6rey8SMlrtEzfFNY&usqp=CAU"
                        alt="Colaborador 1" class="card-img-top rounded-circle mx-auto" style="width: 100px; height: 100px;">
                        <div class="card-body">
                            <h5 class="card-title">Nombre del Colaborador 3</h5>
                            <p class="card-text">Ocupación del Colaborador 3</p>
                        </div>
                    </div>
                </div>
            </div>
            <a href="{{ url('/colaboradores') }}" class="btn btn-primary btn-">Ver mas</a>
        </div><br><br>

=======
        <div id="employees" class="employees py-5 text-center w-100 d-flex align-items-center">
            <div class="container">
                <h2>Colaboradores</h2>
                <div class="row justify-content-center">
                    @foreach (range(1, 3) as $i)
                        <div class="col-lg-3 col-md-6 col-12 mb-4">
                            <div class="card text-center shadow-sm h-100 p-3">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT1Yigg--mrdeXZN8MOBqp8zeiUIVibMhJllCdaoPwSAoITJXxjiVu6rey8SMlrtEzfFNY&usqp=CAU"
                                    alt="Colaborador {{ $i }}" class="card-img-top rounded-circle mx-auto"
                                    style="width: 100px; height: 100px;">
                                <div class="card-body">
                                    <h5 class="card-title">Nombre del Colaborador {{ $i }}</h5>
                                    <p class="card-text">Ocupación del Colaborador {{ $i }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <a href="{{ url('/colaboradores') }}" class="btn btn-primary">Ver más</a>
            </div>
        </div>
>>>>>>> 68957ce (cambios 02)
    </section>
@endsection
