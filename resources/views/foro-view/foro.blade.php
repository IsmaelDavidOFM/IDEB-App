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

    .rating span {
        font-size: 1.5rem;
        cursor: pointer;
    }

    #comentarios .comentario {
        border-bottom: 1px solid #ddd;
        padding: 10px 0;
    }

    .star{
        color : goldenrod;

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
            <div class="col-md-6 d-flex align-items-center">
                <img src="https://cdn-icons-png.flaticon.com/512/12048/12048902.png" alt="Image default"
                    class="img-fluid w-100 h-100">
            </div>
            <div class="col-md-6" style="margin-top: 10%">
                <h4>Forumulario de contacto</h4>
                <form action="{{ route('enviar.correo') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre"
                            value="{{ old('nombre') }}" required>
                        @error('nombre')
                            <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido"
                            value="{{ old('apellido') }}" required>
                        @error('apellido')
                            <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control" id="correo" name="correo" placeholder="correo"
                            value="{{ old('correo') }}" required>
                        @error('correo')
                            <small>{{ $message }}</small>
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
            <h1>Comentarios 0</h1>
        </div>

        <div class="row mb-4">
            <div class="col-md-4">
                <img src="ruta_de_la_imagen" alt="Imagen del curso" class="img-fluid">
            </div>
            <div class="col-md-4">
                <label for="select-curso">Seleccione un curso:</label>
                <select id="select-curso" class="form-select">
                    <option value="curso1">Curso 1</option>
                    <option value="curso2">Curso 2</option>
                </select>
                <textarea id="mensaje" class="form-control my-3" placeholder="Escriba su comentario"></textarea>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <p >0%</p>
                    <div class="rating">
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
    </div>
    <br><br><br><br><br>
@endsection
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
</script>
