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

    /* NAVBAR ESTILOS */
    .custom-navbar {
        background: linear-gradient(90deg, #323335, #1a1b1b);
        padding: 10px 20px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .navbar-brand img {
        max-height: 60px;
    }

    .nav-link {
        color: #fff;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .nav-link:hover {
        color: #f8d210;
    }

    /* DROPDOWN */
    .dropdown-menu {
        border-radius: 8px;
        overflow: hidden;
        background: #fff;
        border: none;
    }

    .dropdown-item {
        color: #333;
        font-weight: 500;
        transition: background 0.3s ease;
    }

    .dropdown-item:hover {
        background: #2a5298;
        color: #fff;
    }

    /* ANIMACIÓN PARA EL DROPDOWN */
    .animate-dropdown {
        animation: fadeInDown 0.3s ease-in-out;
    }

    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* BOTÓN DE CIERRE DE SESIÓN */
    .logout-btn {
        background: none;
        border: none;
        color: #fff;
        font-size: 1rem;
        font-weight: 500;
        cursor: pointer;
        transition: color 0.3s ease;
    }

    .logout-btn:hover {
        color: #f8d210;
    }

    /* ÍCONO DEL CARRITO */
    .cart-icon {
        font-size: 1.5rem;
        color: #fff;
        position: relative;
    }

    .cart-icon .badge {
        position: absolute;
        top: -5px;
        right: -10px;
        font-size: 0.8rem;
        padding: 4px;
    }

    /* RESPONSIVE */
    @media (max-width: 992px) {
        .navbar-nav {
            text-align: center;
        }

        .cart-icon {
            font-size: 1.3rem;
        }

        .logout-btn {
            font-size: 0.9rem;
        }
    }

    .nav-item.dropdown:hover .dropdown-menu {
        display: block;
    }

    .dropdown-menu {
        transition: all 0.3s ease-in-out;
        min-width: 200px;
    }

    .dropdown-menu .dropdown-item {
        transition: background 0.3s ease;
    }

    .dropdown-menu .dropdown-item:hover {
        background-color: rgba(255, 255, 255, 0.2);
    }

    .navbar-nav .dropdown-toggle::after {
        display: none !important;
    }

    .navbar-nav .nav-item {
        margin-right: 20px;
        /* Ajusta el valor según lo necesites */
    }
</style>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark custom-navbar">
        <div class="container">
            <!-- Logo -->
            <a href="{{ url('/') }}" class="navbar-brand">
                <img src="/image/Instituto_IDEB_Logotipo_0.png" alt="Logo" width="150" height="80"
                    class="logo">
            </a>

            <!-- Botón para menú en móviles -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Contenido del menú -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <!-- Menú desplegable: Información de Cursos -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="courseInfoDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Información de Cursos
                        </a>
                        <!-- Globales -->
                        <ul class="dropdown-menu bg-dark border-0" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item text-light"
                                    href="{{ url('/informacion_cursos/flayAdds') }}">Flayers y anuncios</a></li>
                            <li><a class="dropdown-item text-light"
                                    href="{{ url('/informacion_cursos/promociones') }}">Promociones</a></li>
                            <li><a class="dropdown-item text-light"
                                    href="{{ url('/informacion_cursos/fechas') }}">Fechas de inscripción</a></li>
                        </ul>
                    </li>

                    <!-- Otras opciones del menú / deteccion de pagina -->
                    <li class="nav-item">
                        @if (Request::is('/'))
                            <a class="nav-link" href="#courses">Cursos en Línea</a>
                        @else
                            <a class="nav-link" href="{{ url('/cursos_online') }}">Cursos en Línea</a>
                        @endif
                    </li>
                    <li class="nav-item">
                        @auth('students')
                            <a class="nav-link" href="{{ url('/participantes') }}">Participantes</a>
                        @else
                            <a class="nav-link" href="{{ url('/login') }}">Participantes</a>
                        @endauth
                    </li>
                    <li class="nav-item">
                        @if (Request::is('/'))
                            <a class="nav-link" href="#colaboradores">Colaboradores</a>
                        @else
                            <a class="nav-link" href="{{ url('/colaboradores') }}">Colaboradores</a>
                        @endif
                    </li>
                </ul>

                <!-- Sección de usuario / carrito -->
                <ul class="navbar-nav ms-auto">
                    @auth('students')
                        <!-- Ícono del carrito -->
                        <li class="nav-item me-3">
                            <a href="{{ url('/carrito') }}" class="btn position-relative p-0 cart-icon">
                                <i class="bi bi-book"></i>
                                <span class="badge rounded-pill bg-danger">
                                    {{ $cartCount }}
                                </span>
                            </a>
                        </li>
                        <!-- Botón de cierre de sesión -->
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn logout-btn">
                                    <i class="bi bi-box-arrow-left"></i> Salir
                                </button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link login-btn" href="{{ route('login') }}">Iniciar Sesión</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>


    <main>
        @yield('content')
    </main>
    <!-- Pie de pagina  -->
    <footer class="footer bg-dark text-white py-4">
        <div class="container text-center text-md-start">
            <!-- Sección de Contacto -->
            <div class="row">
                <div class="col-12 mb-3">
                    <h2 class="text-center" style="font-size: 1.8rem;">Contacto</h2>
                </div>
            </div>

            <div class="row align-items-center d-flex justify-content-center">
                <!-- Información de Contacto -->
                <div class="col-md-4 text-md-start text-center mb-3">
                    <p style="font-size: 1.2rem;">
                        <strong>Dirección:</strong> {{ $contacto->direccion ?? 'No disponible' }}
                    </p>
                    <p style="font-size: 1.2rem;">
                        <strong>Email:</strong> {{ $contacto->email ?? 'No disponible' }}
                    </p>
                    <p style="font-size: 1.2rem;">
                        <strong>Teléfono:</strong> {{ $contacto->telefono ?? 'No disponible' }}
                    </p>
                </div>

                <!-- Botón Foro -->
                <div class="col-md-4 text-center mb-3">
                    @if (!Request::is('foro'))
                        <a href="/foro" class="btn btn-primary"
                            style="font-size: 1.5rem; padding: 12px 24px;">Foro</a>
                    @endif
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
                <script>document.write(new Date().getFullYear());</script>
            </small>
        </div>
    </footer>

</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
