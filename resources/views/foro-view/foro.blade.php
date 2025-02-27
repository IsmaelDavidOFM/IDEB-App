@extends('template.layout')

@section('title', 'Foro')
<style>
    .card_pre {
        border: 1px solid #ddd;
        padding: 10px;
        margin-bottom: 20px;
        transition: trasform 0.3s;
    }

    .card_pre:hover {
        transform: scale(1.05);
    }

    .card_pre a {
        text-decoration: none;
        color: black;
    }

    .contact-from img {
        object-fit: cover;
    }

    .contact-image {
        width: 50%;
        height: auto;
        transition: transform 0.3s ease-in-out;
    }

    .contact-image:hover {
        transform: scale(1.1);
    }

    .contact-form {
        background: #edeef0;
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 50px;
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
    <div class="container my-5">
        <!-- Blog Section -->
        <div class="row mb-5">
            <h4>Blog</h4><br><br>
            @foreach ($articles as $article)
                <div class="col-md-3">
                    <div class="card_pre">
                        <a href="{{ url('/blog') }}">
                            <img src="{{ $article->image_url ?? 'https://cdn-icons-png.flaticon.com/512/12048/12048902.png' }}"
                                alt="Image default" class="img-fluid">
                            <span>{{ Str::limit($article->title, 100) }}</span>
                        </a>
                    </div>
                </div>
            @endforeach
            <div class="col-md-3" style="text-align: center; margin-top: 100px;">
                <div class="card_pre" style="border:none">
                    <a href="{{ url('/blog') }}">
                        <img src="https://cdn-icons-png.flaticon.com/512/17/17340.png" alt="Image default" class="img-fluid"
                            width="100px">
                    </a>
                </div>
            </div>
        </div><br><br>


        <!-- Contact Form Section -->
        <div class="row contact-form mb-5">
            <div class="col-md-5 d-flex align-items-center justify-content-center">
                <img src="{{ asset('image/ContactForm.webp') }}" alt="Imagen de contacto" class="img-fluid contact-image">
            </div>
            <div class="col-md-7 p-4">
                <h4 class="mb-3">Formulario de contacto</h4>
                <p class="text-muted">¿Tienes alguna duda? Nosotros la resolveremos. Envíanos tu mensaje y te responderemos
                    lo antes posible.</p>
                <form action="{{ route('enviar.correo') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre"
                            value="{{ old('nombre') }}" required>
                        @error('nombre')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido"
                            value="{{ old('apellido') }}" required>
                        @error('apellido')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control" id="correo" name="correo" placeholder="Correo"
                            value="{{ old('correo') }}" required>
                        @error('correo')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control" id="mensaje" name="mensaje" rows="4" placeholder="Mensaje del usuario" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>

        <!-- Comments Section -->
        <div class="text-center my-4">
            <h1 id="comentarios-count">Comentarios {{ count($comments) }}</h1>
        </div>

        <div class="row mb-4">
            <div class="col-md-4">
                <img src="#" alt="Imagen del curso" class="img-fluid">
            </div>

            <div class="col-md-4">
                <label for="select-curso">Seleccione un curso:</label>
                <select id="select-curso" class="form-select">
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

                <textarea id="comentario" class="form-control my-3" rows="3" placeholder="Escriba su comentario"></textarea>
            </div>

            <div class="col-md-4">
                <button id="btn-comentar" type="button" class="btn btn-primary">Comentar</button>
            </div>
        </div>

        <div id="comentarios" class="mt-4">
            @foreach ($comments as $comment)
                <div class="comment-box p-3 mb-3 border rounded">
                    <strong>{{ $comment->name }}</strong> - <small>{{ $comment->created_at->format('d/m/Y H:i') }}</small>
                    <p>{{ $comment->content }}</p>
                </div>
            @endforeach
        </div>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                let rating = 0;

                // Sistema de estrellas
                document.querySelectorAll(".star").forEach(star => {
                    star.addEventListener("click", function () {
                        rating = this.getAttribute("data-value"); // Obtiene el valor de la estrella seleccionada
                        document.querySelectorAll(".star").forEach(s => s.classList.remove("checked"));
                        this.classList.add("checked");
                        this.previousElementSibling?.classList.add("checked");
                        this.previousElementSibling?.previousElementSibling?.classList.add("checked");
                        this.previousElementSibling?.previousElementSibling?.previousElementSibling?.classList.add("checked");
                        this.previousElementSibling?.previousElementSibling?.previousElementSibling?.previousElementSibling?.classList.add("checked");
                    });
                });

                document.getElementById("btn-comentar").addEventListener("click", function () {
                    let selectCurso = document.getElementById("select-curso");
                    let cursoSeleccionado = selectCurso.options[selectCurso.selectedIndex].text;
                    let mensaje = document.getElementById("comentario").value;
                    let usuarioId = {{ auth()->check() ? auth()->user()->id : 0 }};
                    let usuarioEmail = "{{ auth()->check() ? auth()->user()->email : 'Sin email' }}";

                    if (selectCurso.value.trim() === "") {
                        console.log("No has seleccionado un curso.");
                    } else {
                        console.log("Curso seleccionado: " + cursoSeleccionado);
                    }

                    if (mensaje.trim() === "") {
                        console.log("No hay mensaje.");
                    } else {
                        console.log("Mensaje: " + mensaje);
                    }

                    console.log("ID del usuario: " + usuarioId);
                    console.log("Email del usuario: " + usuarioEmail);
                    console.log("Calificación: " + (rating > 0 ? rating : "No seleccionada"));
                });
            });
        </script>
    </div>
    <br><br><br><br><br>
@endsection
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
