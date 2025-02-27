@extends('template.layout')

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

    .tab-content {
        display: none;
    }

    .tab-content.active {
        display: block;
    }
</style>
<style>
    .star {
        font-size: 2rem;
        cursor: pointer;
        color: gray;
    }

    .star.checked {
        color: gold;
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

    <!-- Sección de artículos -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    @foreach ($articles as $index => $article)
                        <li class="nav-item">
                            <a class="nav-link {{ $index == 0 ? 'active' : '' }}" href="#"
                                onclick="showTab(event, {{ $index }})">
                                {{ Str::limit($article->title)}}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @foreach ($articles as $index => $article)
            <div id="article{{ $index }}" class="tab-content" style="display: {{ $index == 0 ? 'block' : 'none' }};">
                <h2>{{ $article->title }}</h2>
                <p><strong>Fecha de Publicación:</strong> {{ $article->published_at ?? 'Sin fecha' }}</p>
                <img src="{{ $article->image_url ?? 'https://cdn-icons-png.flaticon.com/512/12048/12048902.png' }}"
                    class="img-fluid" alt="{{ $article->title }}">
                <p>{{ $article->content }}</p>
                <p><strong>Autor:</strong> {{ $article->author ?? 'Desconocido' }}</p>
            </div>
        @endforeach
    </div>
    <!-- Comments Section -->
    <div class="text-center my-4">
        <h1 id="comentarios-count">Comentarios {{ count($comments) }}</h1>
    </div>

    <form id="form-comentario" action="{{ route('guardar.comentario') }}" method="POST">
        @csrf

        <div class="row mb-4">
            <div class="col-md-4">
                <img src="#" alt="Imagen del curso" class="img-fluid">
            </div>

            <div class="col-md-4">
                <label for="select-curso">Seleccione un curso:</label>
                <select id="select-curso" name="curso_id" class="form-select" required>
                    <option value="">Seleccione...</option>
                    @foreach ($cursos as $curso)
                        <option value="{{ $curso->id }}">{{ $curso->NombredelCurso }}</option>
                    @endforeach
                </select>

                <label class="mt-3">Calificación:</label>
                <div id="rating">
                    <span class="star" data-value="1">&#9733;</span>
                    <span class="star" data-value="2">&#9733;</span>
                    <span class="star" data-value="3">&#9733;</span>
                    <span class="star" data-value="4">&#9733;</span>
                    <span class="star" data-value="5">&#9733;</span>
                </div>
                <input type="hidden" id="rating-value" name="rating" value="0" required>

                <textarea id="comentario" name="comentario" class="form-control my-3" rows="3" placeholder="Escriba su comentario"
                    required></textarea>
            </div>

            <div class="col-md-4">
                <button type="submit" class="btn btn-primary">Comentar</button>
            </div>
        </div>
    </form>
    <div id="comentarios" class="mt-4">
        @foreach ($comments as $comment)
            <div class="comment-box p-3 mb-3 border rounded">
                <strong>{{ $comment->name }}</strong> - <small>{{ $comment->created_at->format('d/m/Y H:i') }}</small>
                <p>{{ $comment->content }}</p>
            </div>
        @endforeach
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
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let ratingValue = 0;

        document.querySelectorAll(".star").forEach(star => {
            star.addEventListener("click", function() {
                ratingValue = this.getAttribute("data-value");
                document.getElementById("rating-value").value = ratingValue;

                // Cambiar el color de las estrellas seleccionadas
                document.querySelectorAll(".star").forEach(s => s.style.color = "#ccc");
                for (let i = 0; i < ratingValue; i++) {
                    document.querySelectorAll(".star")[i].style.color = "gold";
                }
            });
        });
    });
</script>
<script>
    function showTab(event, index) {
        event.preventDefault(); // Evitar que la página se recargue

        // Ocultar todos los artículos
        document.querySelectorAll('.tab-content').forEach(tab => {
            tab.style.display = 'none';
        });

        // Mostrar solo el artículo seleccionado
        document.getElementById(`article${index}`).style.display = 'block';

        // Quitar la clase 'active' de todos los enlaces
        document.querySelectorAll('.nav-link').forEach(link => {
            link.classList.remove('active');
        });

        // Agregar la clase 'active' al enlace seleccionado
        event.target.classList.add('active');
    }
</script>
