@extends('template.layout')


@section('title', 'Biblioteca - Instituto I-DEB')

<style>
    .container {
        text-align: center;
    }

    #libros-lista {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .libro {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: space-between;
        width: 80%;
        max-width: 800px;
        margin-bottom: 20px;
        padding: 15px;
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        background: #fff;
    }

    .libro img {
        width: 80px;
        height: auto;
        margin-right: 15px;
    }

    .descripcion {
        flex-grow: 1;
        text-align: left;
    }

    .botones {
        display: flex;
        flex-direction: column;
        gap: 5px;
    }

    .modal {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.9);
        /* Fondo más oscuro */
        justify-content: center;
        align-items: center;
    }

    .modal-content {
        background-color: #fff;
        width: 90%;
        height: 90%;
        max-width: 1200px;
        /* Mayor tamaño */
        max-height: 90%;
        border-radius: 10px;
        display: flex;
        flex-direction: column;
        position: relative;
        padding: 15px;
    }

    .close {
        position: absolute;
        top: 10px;
        right: 20px;
        font-size: 35px;
        cursor: pointer;
        color: #333;
        font-weight: bold;
    }

    iframe {
        flex-grow: 1;
        /* El iframe ocupa todo el espacio disponible */
        width: 100%;
        height: 100%;
        border: none;
    }

    .close {
        position: absolute;
        right: 15px;
        top: 15px;
        font-size: 24px;
        cursor: pointer;
    }
</style>

@section('content')

    <link rel="stylesheet" href="{{ asset('css/library.css') }}">

    <div class="container mt-5 text-center">
        <h1 class="mb-4">Biblioteca</h1>

        <!-- Buscador -->
        <div class="row justify-content-center mb-4">
            <div class="col-md-4">
                <input type="text" id="buscar" class="form-control" placeholder="Buscar por título o autor...">
            </div>
        </div>

        <!-- Lista de libros -->
        <div id="libros-lista">
            @foreach ($materials as $material)
                <div class="libro">
                    <img src="{{ asset($material->image_path) }}" alt="Portada">
                    <div class="descripcion">
                        <h5>{{ $material->title }}</h5>
                        <p>{{ $material->author ?? 'Autor desconocido' }} ({{ $material->year ?? 'Año no disponible' }})</p>
                    </div>
                    <div class="botones">
                        <a href="#" class="btn btn-info preview-btn"
                            data-file="{{ asset('storage/' . $material->file_path) }}">
                            Previsualizar
                        </a>
                        <a href="{{ asset('storage/' . $material->file_path) }}" download
                            class="btn btn-secondary">Descargar</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Modal para previsualización -->
    <div id="preview-modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <iframe id="preview-frame" src="" frameborder="0"></iframe>
            <p id="error-message" class="text-danger" style="display: none;">Documento no encontrado</p>
        </div>
    </div>

    <script src="{{ asset('js/library.js') }}"></script>

@endsection
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Buscador en tiempo real
        const buscar = document.getElementById('buscar');
        const libros = document.querySelectorAll('.libro');

        buscar.addEventListener('keyup', function() {
            const query = buscar.value.toLowerCase().trim();

            libros.forEach(libro => {
                const titulo = libro.querySelector('.descripcion h5').innerText.toLowerCase();
                const autor = libro.querySelector('.descripcion p').innerText.toLowerCase();

                if (titulo.includes(query) || autor.includes(query)) {
                    libro.style.display = 'flex';
                } else {
                    libro.style.display = 'none';
                }
            });
        });

        // Previsualización de documentos
        const modal = document.getElementById("preview-modal");
        const frame = document.getElementById("preview-frame");
        const errorMessage = document.getElementById("error-message");
        const closeBtn = document.querySelector(".close");

        document.querySelectorAll(".preview-btn").forEach(btn => {
            btn.addEventListener("click", function(event) {
                event.preventDefault();
                const fileUrl = this.getAttribute("data-file");

                if (fileUrl) {
                    frame.src = fileUrl;
                    frame.style.display = "block";
                    errorMessage.style.display = "none";
                } else {
                    frame.style.display = "none";
                    errorMessage.style.display = "block";
                }

                modal.style.display = "flex"; // Ahora usa flexbox para centrar
            });
        });

        closeBtn.addEventListener("click", function() {
            modal.style.display = "none";
            frame.src = ""; // Limpia el iframe al cerrar
        });

        window.addEventListener("click", function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
                frame.src = "";
            }
        });
    });
</script>
