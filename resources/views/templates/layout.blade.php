<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Página Principal')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<<<<<<< HEAD
    <style>
        .dropdown-menu {
            /* Define el redondeo de los bordes */
            color: white;
            background-color: gray;
        }

        .btn-rounded {
            /* Define el redondeo de los bordes */
            border-radius: 5px;
        }

        footer {
            color: #fff;
            padding-bottom: 2%;
            padding-top: 2%;
        }

        .footer-content {

            display: flex;
            justify-content: space-between;
            width: 100%;
            padding: 20px;
            margin: auto;

        }

        .contac {
            text-align: left;

        }

        .social {

            display: flex;
            flex-direction: column;
            align-items: center;
            text-decoration: none;
        }

        .legal {
            background-color: #333;
            text-align: center;
            margin-top: 50px;
        }
    </style>
=======
        <style>
            .dropdown-menu {
                /* Define el redondeo de los bordes */
                color: white;
                background-color: gray;
            }

            .btn-rounded {
                /* Define el redondeo de los bordes */
                border-radius: 5px;
            }

            footer {
                color: #fff;
                padding-bottom: 2%;
                padding-top: 2%;
                background-color: #333;
                text-align: center;
                margin-top: auto; /* Asegura que el footer se empuje al fondo */
            }

            .footer-content {
                display: flex;
                justify-content: space-between;
                width: 100%;
                padding: 20px;
                margin: auto;
            }

            .contac {
                text-align: left;
            }

            .social {
                display: flex;
                flex-direction: column;
                align-items: center;
                text-decoration: none;
            }

            .legal {
                background-color: #333;
                text-align: center;
                margin-top: 50px;
                padding: 10px 0;
            }

            /* Asegura que el body y html ocupen toda la altura de la página */
            body, html {
                height: 100%;
                margin: 0;
                display: flex;
                flex-direction: column;
            }

            main {
                flex: 1;
            }

            /* Media Query para asegurar que en pantallas pequeñas el footer se vea bien */
            @media (max-width: 768px) {
                .footer .row div {
                    text-align: center !important;
                }
            }
        </style>


>>>>>>> 68957ce (cambios 02)
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a href="{{ url('/') }}">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT1Yigg--
                mrdeXZN8MOBqp8zeiUIVibMhJllCdaoPwSAoITJXxjiVu6rey8SMlrtEzfFNY&usqp=CAU"
                    alt="" width="50" height="50" class="d-inline-block align-text-top">
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
                        <ul class="dropdown-menu " aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="{{url('/informacion_cursos/flayAdds')}}">Flayers y anuncios </a></li>
                            <li><a class="dropdown-item" href="{{url('/informacion_cursos/promociones')}}">Promociones</a></li>
                            <li><a class="dropdown-item" href="{{url('/informacion_cursos/fechas')}}">Fechas de inscripcion</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
<<<<<<< HEAD
                        <a class="nav-link" href="#courses">Cursos en linea</a>
=======
                        <a class="nav-link" href="/cursos_online">Cursos en linea</a>
>>>>>>> 68957ce (cambios 02)
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/participantes">Participantes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/colaboradores">Colaboradores</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

<<<<<<< HEAD
    <footer class="footer footer-expand-lg footer-dark bg-dark ">
        <div class="container footer-container">
            <div class="footer-content row">
                <div class="col-md-4">
                    <h2>Contacto</h2>
                    <div class="contac">
                        <span class="direccion">Dirección</span><br>
                        <span class="email">Correodecontacto</span><br>
                        <span class="numero">232454356</span>
                    </div>
                    <a id="ocultar " class="btn btn-primary mt-2" href="/foro" role="button">Foro</a>
                </div>
                <div class="col-md-4">
                    <a href="https://www.facebook.com/?locale=es_LA" class="social mb-2">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b9/2023_Facebook_icon.svg/2048px-2023_Facebook_icon.svg.png"
                            alt="Facebook" width="50px">
                        <p>Facebook</p>
                    </a>
                    <a href="https://mx.linkedin.com/?src=go-pa&trk=sem-ga_campid.19001150288_asid.143806640876_crid.694479389938_kw.linkedin_d.c_tid.kwd-148086543_n.g_mt.e_geo.9140645&mcid=
                    7000592715335761922&cid=&gad_source=1&gclid=EAIaIQobChMIxaHYnNiqiwMVSi1ECB0NngLOEAAYASAAEgI_EPD_BwE&gclsrc=aw.ds"
                        class="social">
                        <img src="https://static.vecteezy.com/system/resources/previews/018/930/480/non_2x/linkedin-logo-linkedin-icon-transparent-free-png.png"
                            alt="LinkedIn" width="80px">
                        <p>LinkedIn</p>
                    </a>

                </div>
            </div>
        </div>
        <div class="legal">
            <span><small>Todos los derechos reservados ©2025</small></span>
=======
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
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b9/2023_Facebook_icon.svg/2048px-2023_Facebook_icon.svg.png" alt="Facebook" width="45px" height="45px">
                    </a>
                    <a href="https://www.linkedin.com">
                        <img src="https://static.vecteezy.com/system/resources/previews/018/930/480/non_2x/linkedin-logo-linkedin-icon-transparent-free-png.png" alt="LinkedIn" width="80px" height="80px">
                    </a>
                </div>
            </div>
        </div>

        <!-- Sección Legal -->
        <div class="legal text-center mt-3 bg-secondary py-2">
            <small style="font-size: 1.2rem;">Todos los derechos reservados &copy;<script>document.write(new Date().getFullYear());</script></small>
>>>>>>> 68957ce (cambios 02)
        </div>
    </footer>

</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
