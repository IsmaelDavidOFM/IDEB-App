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
        display: flex;
        gap: 5px;
        cursor: pointer;
    }

    .star {
        font-size: 24px;
        color: #ccc;
        transition: color 0.3s ease-in-out;
    }

    .star.active {
        color: gold;
    }

    .comentario {
        padding: 10px;
        border-bottom: 1px solid #ddd;
        margin-top: 5px;
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
            <h1 id="comentarios-contador">Comentarios 0</h1>
        </div>

        <div class="row mb-4">
            <div class="col-md-4">
                <img src="ruta_de_la_imagen" alt="Imagen del curso" class="img-fluid">
            </div>
            <div class="col-md-4">
                <label for="select-curso">Seleccione un curso:</label>
                <select id="select-curso" class="form-select">
                    <option selected disabled>Seleccione un curso</option>
                    <option>Curso 1</option>
                    <option>Curso 2</option>
                </select>
                <input id="mensaje" class="form-control my-3" placeholder="Escriba su comentario">
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <p id="rating-text">0%</p>
                    <div class="rating">
                        <i class="bi bi-star-fill star" data-value="1"></i>
                        <i class="bi bi-star-fill star" data-value="2"></i>
                        <i class="bi bi-star-fill star" data-value="3"></i>
                        <i class="bi bi-star-fill star" data-value="4"></i>
                        <i class="bi bi-star-fill star" data-value="5"></i>
                    </div>
                </div>
                <button type="button" class="btn btn-primary" id="btn-comentar">Comentar</button>
            </div>
        </div>

        <div id="comentarios" class="mt-4">
            <!-- Comentarios dinámicos -->
        </div>
    </div>
    <br><br><br><br><br>

@endsection
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        let estrellas = document.querySelectorAll(".star");
        let comentarioInput = document.getElementById("mensaje").value;
        let cursoSelect = document.getElementById("select-curso");
        let btnComentar = document.getElementById("btn-comentar");
        let comentariosDiv = document.getElementById("comentarios");
        let contadorComentarios = document.getElementById("comentarios-contador");
        let ratingText = document.getElementById("rating-text");
        let rating = 0;
        let comentarios = 0;

        // Marcar estrellas
        estrellas.forEach(star => {
            star.addEventListener("click", function () {
                rating = parseInt(this.dataset.value);
                estrellas.forEach(s => s.classList.remove("active"));
                for (let i = 0; i < rating; i++) {
                    estrellas[i].classList.add("active");
                }
                ratingText.textContent = `${rating * 20}%`;
            });
        });

        // Agregar comentario
        btnComentar.addEventListener("click", function () {
            let comentarioTexto = comentarioInput.value.trim();
            let cursoSeleccionado = cursoSelect.options[cursoSelect.selectedIndex].text;

            // Verificar si se seleccionó un curso
            if (cursoSelect.selectedIndex === 0) {
                alert("Por favor, seleccione un curso.");
                return;
            }

            // Verificar si el comentario está vacío
            if (comentarioTexto.length === 0) {
                alert("El comentario no puede estar vacío.");
                return;
            }

            // Verificar si se seleccionó una calificación
            if (rating === 0) {
                alert("Por favor, seleccione una calificación.");
                return;
            }

            let nuevoComentario = document.createElement("div");
            nuevoComentario.classList.add("comentario");
            nuevoComentario.innerHTML = `<p><strong>Usuario:</strong> ${comentarioTexto} (Curso: ${cursoSeleccionado} - Calificación: ${rating} ⭐)</p>`;

            comentariosDiv.prepend(nuevoComentario);

            // Limpiar campos
            comentarioInput.value = "";
            estrellas.forEach(s => s.classList.remove("active"));
            rating = 0;
            ratingText.textContent = "0%";
            cursoSelect.selectedIndex = 0;

            // Actualizar contador de comentarios
            comentarios++;
            contadorComentarios.textContent = `Comentarios ${comentarios}`;
        });
    });
</script>
