<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Página Principal')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<style>
    html,
    body {
        height: 100%;
        margin: 0;
        display: flex;
        flex-direction: column;
    }

    main {
        flex: 1;
        /* Hace que el contenido principal ocupe el espacio disponible */
    }

    .footer {
        margin-top: auto;
        /* Mantiene el footer siempre abajo */
    }
</style>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a href="{{ url('/') }}">
                <img src="/img/Instituto_IDEB_Logotipo_0.png" alt="" width="150" height="80"
                    class="d-inline-block align-text-top">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" id="navbarDropdownMenuLink" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Informacion de cursos
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="{{ url('/informacion_cursos/flayAdds') }}">Flayers y
                                    anuncios </a></li>
                            <li><a class="dropdown-item"
                                    href="{{ url('/informacion_cursos/promociones') }}">Promociones</a></li>
                            <li><a class="dropdown-item" href="{{ url('/informacion_cursos/fechas') }}">Fechas de
                                    inscripcion</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/cursos_online">Cursos en linea</a>
                    </li>
                    <li class="nav-item">
                        @auth
                            <a class="nav-link" href="{{ url('/participantes') }}">Participantes</a>
                        @else
                            <a class="nav-link" href="{{ url('/login') }}">Participantes</a>
                        @endauth
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/colaboradores">Colaboradores</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    @if (Auth::guard('web')->check() || Auth::guard('students')->check())
                        <li class="nav-item me-3">
                            <a href="{{ url('/carrito') }}" class="btn position-relative p-0"
                                style="border: none; background: transparent;">
                                <i class="bi bi-book" style="font-size: 2rem; color: #fff;"></i>
                                <span
                                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                                    style="font-size: .8rem; width: 1.3rem; height: 1.3rem; display: flex; align-items: center; justify-content: center;">
                                    {{ session()->has('cart') ? count(session()->get('cart')) : 0 }}
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn p-0"
                                    style="background-color: transparent; border: none;">
                                    <i class="bi bi-box-arrow-left" style="font-size: 1.5rem; color: #fff;">
                                        salir
                                    </i>
                                </button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Iniciar Sesión</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>


    <main>
        @yield('content')
    </main>

    <footer class="footer bg-dark text-white py-4">
        <div class="container text-center text-md-start">
            <!-- Sección de Contacto -->
            <div class="row">
                <div class="col-12 mb-3">
                    <h2 class="text-center" style="font-size: 1.8rem;">Contacto</h2>
                </div>
            </div>

            <div class="row align-items-center">
                <!-- Información de Contacto -->
                <div class="col-md-4 text-md-start text-center mb-3">
                    <p style="font-size: 1.2rem;"><strong>Dirección:</strong> Calle 123, Ciudad</p>
                    <p style="font-size: 1.2rem;"><strong>Email:</strong> contacto@example.com</p>
                    <p style="font-size: 1.2rem;"><strong>Teléfono:</strong> 232454356</p>
                </div>

                <!-- Botón Foro -->
                <div class="col-md-4 text-center mb-3">
                    <a href="/foro" class="btn btn-primary" style="font-size: 1.5rem; padding: 12px 24px;">Foro</a>
                </div>

                <!-- Redes Sociales -->
                <div class="col-md-4 text-md-end text-center">
                    <a href="https://www.facebook.com" class="me-2">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b9/2023_Facebook_icon.svg/2048px-2023_Facebook_icon.svg.png"
                            alt="Facebook" width="45px" height="45px">
                    </a>
                    <a href="https://www.linkedin.com">
                        <img src="https://static.vecteezy.com/system/resources/previews/018/930/480/non_2x/linkedin-logo-linkedin-icon-transparent-free-png.png"
                            alt="LinkedIn" width="80px" height="80px">
                    </a>
                </div>
            </div>
        </div>

        <!-- Sección Legal -->
        <div class="legal text-center mt-3 bg-secondary py-2">
            <small style="font-size: 1.2rem;">Todos los derechos reservados &copy;
                <script>
                    document.write(new Date().getFullYear());
                </script>
            </small>
        </div>
    </footer>

</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
