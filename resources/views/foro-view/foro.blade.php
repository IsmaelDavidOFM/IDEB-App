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

    textarea {
        resize: none;
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
    .rating {
        font-size: 30px;
        cursor: pointer;
        color: gray;
    }

    .star.checked {
        color: gold;
    }

    .comentario {
        background: #f1f1f1;
        padding: 10px;
        margin: 5px 0;
        border-radius: 5px;
    }
</style>
@section('content')
    <div class="container my-5">
        <!-- Blog Section -->
        <div class="row mb-5">
            <h4>Blog</h4><br><br>
            <div class="col-md-3">
                <div class="card_pre">
                    <a href="/blog">
                        <img src="https://cdn-icons-png.flaticon.com/512/12048/12048902.png" alt="Image default"
                            class="img-fluid">
                        <span>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ad possimus voluptas dolores vel
                            fuga ratione aspernatur.</span>
                    </a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card_pre">
                    <a href="/blog">
                        <img src="https://cdn-icons-png.flaticon.com/512/12048/12048902.png" alt="Image default"
                            class="img-fluid">
                        <span>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ad possimus voluptas dolores vel
                            fuga ratione aspernatur.</span>
                    </a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card_pre">
                    <a href="/blog">
                        <img src="https://cdn-icons-png.flaticon.com/512/12048/12048902.png" alt="Image default"
                            class="img-fluid">
                        <span>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ad possimus voluptas dolores vel
                            fuga ratione aspernatur.</span>
                    </a>
                </div>
            </div>
            <div class="col-md-3 " style="text-align: center; margin-top: 100px ;">
                <div class="card_pre" style="border:none">
                    <a href="/blog">
                        <img src="https://cdn-icons-png.flaticon.com/512/17/17340.png" alt="Image default" class="img-fluid"
                            width="100px">
                    </a>
                </div>
            </div>
        </div><br><br>

        <!-- Contact Form Section -->
        <div class="row contact-form mb-5">
            <div class="col-md-5 d-flex align-items-center justify-content-center">
                <img src="{{ asset('img/ContactForm.webp') }}" alt="Imagen de contacto" class="img-fluid contact-image">
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
            <h1 id="comentarios-count">Comentarios 0</h1>
        </div>

        <div class="row mb-4">
            <div class="col-md-4">
                <img src="ruta_de_la_imagen" alt="Imagen del curso" class="img-fluid">
            </div>
            <div class="col-md-4">
                <label for="select-curso">Seleccione un curso:</label>
                <select id="select-curso" class="form-select">
                    <option value="">Seleccione...</option>
                    <option value="Curso 1">Curso 1</option>
                    <option value="Curso 2">Curso 2</option>
                </select>
                <input type="text" id="mensaje" class="form-control my-3" placeholder="Escriba su comentario"></input>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <p id="rating-text">0 estrellas</p>
                    <div class="rating">
                        <i class="star" data-value="1">&#9733;</i>
                        <i class="star" data-value="2">&#9733;</i>
                        <i class="star" data-value="3">&#9733;</i>
                        <i class="star" data-value="4">&#9733;</i>
                        <i class="star" data-value="5">&#9733;</i>
                    </div>
                </div>
                <button id="btn-comentar" class="btn btn-primary">Comentar</button>
            </div>
        </div>

        <div id="comentarios" class="mt-4"></div>

    </div>
    <br><br><br><br><br>

@endsection
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        let ratingSeleccionado = 0;

        // Función para seleccionar estrellas
        document.querySelectorAll(".star").forEach(star => {
            star.addEventListener("click", function() {
                ratingSeleccionado = parseInt(this.getAttribute("data-value"));
                document.getElementById("rating-text").textContent =
                    `${ratingSeleccionado} estrellas`;

                document.querySelectorAll(".star").forEach(s => s.classList.remove("checked"));
                for (let i = 0; i < ratingSeleccionado; i++) {
                    document.querySelectorAll(".star")[i].classList.add("checked");
                }
            });
        });

        document.getElementById("btn-comentar").addEventListener("click", function() {
            let cursoSeleccionado = document.getElementById("select-curso").value;
            let comentarioTexto = document.getElementById("mensaje").value;

            if (!cursoSeleccionado) {
                alert("Por favor, selecciona un curso.");
                return;
            }

            if (!comentarioTexto) {
                alert("El comentario no puede estar vacío.");
                return;
            }

            if (ratingSeleccionado === 0) {
                alert("Por favor, selecciona una calificación.");
                return;
            }

            let nuevoComentario = document.createElement("div");
            nuevoComentario.classList.add("comentario");
            nuevoComentario.innerHTML = `
            <p><strong>Curso:</strong> ${cursoSeleccionado} </p>
            <p><strong>Comentario:</strong> ${comentarioTexto} </p>
            <p><strong>Calificación:</strong> ${ratingSeleccionado} estrellas</p>
        `;

            document.getElementById("comentarios").appendChild(nuevoComentario);

            // Actualizar el contador de comentarios
            let contadorComentarios = document.getElementById("comentarios").children.length;
            document.getElementById("comentarios-count").textContent =
                `Comentarios ${contadorComentarios}`;

            // Limpiar campos
            document.getElementById("mensaje").value = "";
            document.getElementById("select-curso").value = "";
            document.getElementById("rating-text").textContent = "0 estrellas";
            document.querySelectorAll(".star").forEach(s => s.classList.remove("checked"));
            ratingSeleccionado = 0;
        });
    });
</script>
