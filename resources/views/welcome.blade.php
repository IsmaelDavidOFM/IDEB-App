<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
            padding-top: 5%;
        }

        .footer-content {

            display: flex;
            justify-content: space-between;
            width: 100%;
            padding: 50px;
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
    <title>Documentacio Tecnica</title>
</head>
{{-- resources/views/cursos.blade.php --}}

<!DOCTYPE html>
<html>

<head>
    <title>Cursos</title>
    <style>
        .progress-bar {
            width: 10%;
            height: 100vh;
            background-color: yellow;
            position: fixed;
            left: 0;
            top: 0;
        }

        .content {
            margin-left: 10%;
            padding: 20px;
        }

        .accordion {
            margin-top: 20px;
        }

        .accordion-item {
            border: 1px solid #ccc;
            margin-bottom: 10px;
            padding: 10px;
            cursor: pointer;
        }

        .accordion-item-content {
            display: none;
            padding: 10px;
            border-top: 1px solid #ccc;
        }

        .accordion-item-content video {
            width: 50%;
            float: left;
        }

        .accordion-item-content .details {
            margin-left: 55%;
        }
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var items = document.querySelectorAll(".accordion-item");

            items.forEach(function(item) {
                item.addEventListener("click", function() {
                    var content = this.querySelector(".accordion-item-content");
                    content.style.display = content.style.display === "block" ? "none" : "block";
                });
            });
        });
    </script>

<body>
    <h2>Elementos para la estandarizacion de la pagina</h2>
    <!--Botones de la pagina --->

    <h4>Botones</h4>
    <button class="btn btn-primary btn-rounded">Botón Azul</button>

    <!--Boton color  --->

    <a class="btn btn-dark btn-rounded" href="#" role="button">boton</a>
    <br><br>

    <!-- Menu de navegacion-->
    <h4>Menu de navegacion </h4>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a href="{{ url('/login') }}">
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
                            <li><a class="dropdown-item" href="#">Flayers y anuncios </a></li>
                            <li><a class="dropdown-item" href="#">Promociones</a></li>
                            <li><a class="dropdown-item" href="#">Fechas de inscripcion</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Cursos en linea</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Participantes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Colaboradores</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <br><br><br>

    <!--Video-->
    <h4>Videos</h4>
    <video width="100%" autoplay loop muted>
        <source src="{{ asset('video/video.mp4') }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <!--Footer-->
    <!--V1-->

    <h4>Pie de pagina </h4>
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
                    <a class="btn btn-primary mt-2" href="#" role="button">Foro</a>
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
        </div>
    </footer>
    <br><br><br>

    <h4>progress</h4>
    <div class="progress-bar"></div>
    <div class="content">
        <h1 style="text-align: center;">Cursos</h1>
        <div class="accordion">
            <div class="accordion-item">
                <h3>Curso 1</h3>
                <div class="accordion-item-content">
                    <video src="video1.mp4" controls></video>
                    <div class="details">
                        <h4>Título: Curso 1</h4>
                        <p>Descripción: Descripción del curso 1</p>
                        <p>Duración: 10 minutos</p>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h3>Curso 2</h3>
                <div class="accordion-item-content">
                    <video src="video2.mp4" controls></video>
                    <div class="details">
                        <h4>Título: Curso 2</h4>
                        <p>Descripción: Descripción del curso 2</p>
                        <p>Duración: 20 minutos</p>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h3>Curso 3</h3>
                <div class="accordion-item-content">
                    <video src="video3.mp4" controls></video>
                    <div class="details">
                        <h4>Título: Curso 3</h4>
                        <p>Descripción: Descripción del curso 3</p>
                        <p>Duración: 30 minutos</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
