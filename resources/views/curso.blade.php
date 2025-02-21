@extends('templates.layout')

@section('title', 'Detalles del Curso')

<style>
    .curso-detail {
        margin-top: 30px;
    }

    .curso-image {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
    }

    .curso-info {
        margin-top: 20px;
    }

    .curso-info h3 {
        font-size: 2rem;
        margin-bottom: 15px;
    }

    .curso-info p {
        font-size: 1.1rem;
        margin-bottom: 10px;
    }

    .curso-info .precio {
        font-size: 1.2rem;
        font-weight: bold;
        color: #007bff;
    }

    .curso-info .modalidad {
        font-size: 1rem;
        color: #6c757d;
    }

    .btn-comprar {
        margin-top: 20px;
        width: 100%;
        background-color: #007bff;
        color: white;
        border: none;
        font-size: 1.1rem;
        padding: 10px;
        transition: background-color 0.3s;
    }

    .btn-comprar:hover {
        background-color: #0056b3;
    }

    .btn-ver-otro-curso {
        margin-top: 15px;
        width: 100%;
        background-color: #28a745;
        color: white;
        border: none;
        font-size: 1.1rem;
        padding: 10px;
        transition: background-color 0.3s;
    }

    .btn-ver-otro-curso:hover {
        background-color: #218838;
    }
</style>

@section('content')
    <div class="container curso-detail">
        <div class="row">
            <!-- Imagen del curso -->
            <div class="col-md-6">
                <img src="{{ asset('images/' . $curso->imagen) }}" alt="{{ $curso->NombredelCurso }}" class="curso-image">
            </div>
            <!-- Detalles del curso -->
            <div class="col-md-6 curso-info">
                <h3>{{ $curso->NombredelCurso }}</h3>
                <p><strong>Descripción:</strong> {{ $curso->descripcion }}</p>
                <p><strong>Modalidad:</strong>
                    @if ($curso->Presencial)
                        Presencial
                    @elseif ($curso->Virtual)
                        Virtual
                    @elseif ($curso->Mixto)
                        Mixto
                    @endif
                </p>
                <p class="precio">Costo: ${{ number_format($curso->CostodelCurso, 2) }}</p>
                @auth
                    <form action="{{ route('carrito.add', $curso->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary w-100">Agregar al carrito</button>
                    </form>
                    @else
                    <a href="{{ route('form.show', $curso->id) }}" class="btn btn-primary btn-comprar">
                        Comprar
                    </a>
                @endauth

                <!-- Botón para ver otro curso -->
                <a href="{{ url('/cursos_online') }}" class="btn btn-ver-otro-curso">
                    Ver otro curso
                </a>
            </div>
        </div>
    </div>
@endsection
<script>
    function agregarAlCarrito(id, nombre, precio) {
        // Enviar solicitud POST al backend
        fetch('{{ url('/agregar-al-carrito') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    curso_id: id,
                    nombre: nombre,
                    precio: precio
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Actualizar el contador del carrito
                    const contador = document.querySelector('.badge.bg-danger');
                    contador.textContent = data.contador || 0;
                    alert(`El curso "${nombre}" se ha agregado al carrito.`);
                } else {
                    alert('No se pudo agregar el curso al carrito. Inténtalo nuevamente.');
                }
            })
            .catch(error => console.error('Error:', error));
    }
</script>
