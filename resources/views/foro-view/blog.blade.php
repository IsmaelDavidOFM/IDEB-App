@extends('templates.layout')

@section('title', 'blog')
<style>
    /*Estilos de presentacion de la pagina*/
    .half-screen-image {
        width: 100%;
        height: 80vh;
        background-image: url('https://img.freepik.com/vector-premium/concepto-fondo-hud-futurista-robotico-tecnologia-robotica-maquinaria-automatizacion_258787-1735.jpg');
        background-size: cover;
        background-position: center;
        position: relative;
        margin-bottom: 100px;
    }

    .logo-container {
        position: absolute;
        bottom: -40px;
        left: 50%;
        transform: translateX(-50%);
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        z-index: 1;
    }

    .logo-container img {
        border-radius: 60%;
        height: 80px;
    }

    .logo-container h2 {
        margin-left: 10px;
        color: white;
        background-color: rgba(0, 0, 0, 1);
        padding: 5px 10px;
        border-radius: 10px;
    }

    /*Estilos de seccion de para enviar comentario*/
    #fat {
        width: 50%;
        margin: auto;
        padding: 0px 20px;
    }

    #cal button {
        margin-left: 50px;
        margin-right: 60px;
    }

    #rating {
        text-align: center;
    }

    #comentarios .comentario {
        border-bottom: 1px solid #ddd;
        padding: 10px 0px;
    }

    .star {
        color: goldenrod;

    }

    /*Estilos de seccion de articulos*/

    .tab-content {
        display: none;
    }

    .tab-content.active {
        display: block;
    }
</style>
@section('content')
    <div class="half-screen-image">
        <div class="logo-container">
            <img src="https://w7.pngwing.com/pngs/178/595/png-transparent-user-profile-computer-icons-login-user-avatars-thumbnail.png"
                alt="Instituto IDEB">
            <h2>Instituto IDEB</h2>
        </div>
    </div>

    <!--Seccion de de articulos-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-tab="article1" onclick="showTab(event, 'article1')">Artículo 1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-tab="article2" onclick="showTab(event, 'article2')">Artículo 2</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-tab="article3" onclick="showTab(event, 'article3')">Artículo 3</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div id="article1" class="tab-content active">
            <h2>Título del Artículo 1</h2>
            <p><strong>Fecha de Publicación:</strong> 07 de Febrero, 2025</p>
            <img src="/path-to-article1.jpg" class="img-fluid" alt="Artículo 1">
            <p>Texto del artículo 1.</p>
            <p><strong>Autor:</strong> Juan Pérez</p>
        </div>
        <div id="article2" class="tab-content">
            <h2>Título del Artículo 2</h2>
            <p><strong>Fecha de Publicación:</strong> 08 de Febrero, 2025</p>
            <img src="/path-to-article2.jpg" class="img-fluid" alt="Artículo 2">
            <p>Texto del artículo 2.</p>
            <p><strong>Autor:</strong> María López</p>
        </div>
        <div id="article3" class="tab-content">
            <h2>Título del Artículo 3</h2>
            <p><strong>Fecha de Publicación:</strong> 09 de Febrero, 2025</p>
            <img src="/path-to-article3.jpg" class="img-fluid" alt="Artículo 3">
            <p>Texto del artículo 3.</p>
            <p><strong>Autor:</strong> Carlos García</p>
        </div>
    </div>
    <!--Seccion de comentarios de articulos-->
    <div class="text-center my-4">
        <h1>Comentarios 0</h1>
    </div>

    <div id="fat" class="row">
        <div class="col-md-4">
            <img src="https://w7.pngwing.com/pngs/178/595/png-transparent-user-profile-computer-icons-login-user-avatars-thumbnail.png"
                alt="Imagen del curso" class="img-fluid" width="100px">
        </div>
        <div id="OpArti" class="col-md-4">
            <label for="select-curso">Seleccione un curso:</label>
            <select id="select-curso" class="form-select">
                <option value="curso1">Curso 1</option>
                <option value="curso2">Curso 2</option>
            </select>
            <textarea id="mensaje" class="form-control my-3" placeholder="Escriba su comentario"></textarea>
        </div>
        <div id="cal" class="col-md-4">
            <div class="mb-3">
                <p style="text-align: center;">0%</p>
                <div id="rating" class="rating">
                    <i class="bi bi-star-fill star"></i>
                    <i class="bi bi-star-fill star"></i>
                    <i class="bi bi-star-fill star"></i>
                    <i class="bi bi-star-fill star"></i>
                    <i class="bi bi-star-fill star"></i>
                </div>
            </div>
            <button type="button" class="btn btn-primary">Comentar</button>
        </div>
    </div>

    <div id="comentarios" class="mt-4">
        <!-- Example Comments -->
        <div class="comentario">
            <p><strong>Juan Pérez:</strong> Excelente curso, lo recomiendo totalmente!</p>
        </div>
        <div class="comentario">
            <p><strong>María López:</strong> Muy interesante y fácil de entender.</p>
        </div>
        <div class="comentario">
            <p><strong>Carlos Martínez:</strong> Aprendí mucho, muy buen contenido.</p>
        </div>
    </div>
@endsection
<script>
    function showTab(event, tabId) {
        event.preventDefault();
        document.querySelectorAll('.tab-content').forEach(content => {
            content.classList.remove('active');
        });
        document.getElementById(tabId).classList.add('active');
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
