@extends('templates.layout')

@section('title', 'Instituto I-DEB')
<style>
    .container {
        text-align: center;
    }

    #libros-lista .libro {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        margin-bottom: 20px;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    #libros-lista .libro img {
        width: 100px;
        height: auto;
        margin-right: 20px;
    }

    #libros-lista .libro .descripcion {
        flex-grow: 1;
    }

    #libros-lista .libro .botones {
        display: flex;
        flex-direction: column;
    }
</style>
@section('content')
    <div class="container mt-5 text-center">
        <h1 class="mb-4">Libros Disponibles</h1>
        <div class="row justify-content-center mb-4">
            <div class="col-md-4">
                <input type="text" id="buscar" class="form-control" placeholder="Buscar...">
            </div>
            {{-- <div class="col-md-2">
            <button id="filtros-boton" class="btn btn-secondary">Filtros</button>
        </div> --}}
        </div>
        <div id="filtros" class="row justify-content-center mb-4" style="display: none;">
            <div class="col-md-4">
                <!-- Agrega tus filtros aquí -->
                <input type="text" id="filtro-autor" class="form-control mb-2" placeholder="Filtrar por autor...">
                <input type="text" id="filtro-ano" class="form-control" placeholder="Filtrar por año...">
            </div>
        </div>
        <div id="libros-lista">
            <!-- Aquí se mostrarán los libros -->
        </div>
    </div>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const buscar = document.getElementById('buscar');
        const librosLista = document.getElementById('libros-lista');

        // Simulación de libros disponibles
        const libros = [{
                imagen: 'ruta/a/imagen1.jpg',
                descripcion: 'Descripción del libro 1',
                previsualizar: '#',
                descargar: '#'
            },
            {
                imagen: 'ruta/a/imagen2.jpg',
                descripcion: 'Descripción del libro 2',
                previsualizar: '#',
                descargar: '#'
            },
            // Agrega más libros aquí
        ];

        function mostrarLibros(filtrados = libros) {
            librosLista.innerHTML = '';
            filtrados.forEach(libro => {
                const libroElem = document.createElement('div');
                libroElem.classList.add('libro');
                libroElem.innerHTML = `
                <img src="${libro.imagen}" alt="Imagen del libro">
                <div class="descripcion">${libro.descripcion}</div>
                <div class="botones">
                    <a href="${libro.previsualizar}" class="btn btn-primary mb-2">Previsualizar</a>
                    <a href="${libro.descargar}" class="btn btn-secondary">Descargar</a>
                </div>
            `;
                librosLista.appendChild(libroElem);
            });
        }

        buscar.addEventListener('keyup', function() {
            const query = buscar.value.toLowerCase();
            const filtrados = libros.filter(libro => libro.descripcion.toLowerCase().includes(query));
            mostrarLibros(filtrados);
        });

        mostrarLibros(); // Mostrar todos los libros al cargar la página
    });
    document.addEventListener('DOMContentLoaded', function() {
        const filtrosBoton = document.getElementById('filtros-boton');
        const filtros = document.getElementById('filtros');
        const buscar = document.getElementById('buscar');
        const filtroAutor = document.getElementById('filtro-autor');
        const filtroAno = document.getElementById('filtro-ano');
        const librosLista = document.getElementById('libros-lista');

        const libros = [{
                imagen: 'ruta/a/imagen1.jpg',
                descripcion: 'Descripción del libro 1',
                autor: 'Autor 1',
                ano: '2020',
                previsualizar: '#',
                descargar: '#'
            },
            {
                imagen: 'ruta/a/imagen2.jpg',
                descripcion: 'Descripción del libro 2',
                autor: 'Autor 2',
                ano: '2021',
                previsualizar: '#',
                descargar: '#'
            },
            // Agrega más libros aquí
        ];

        filtrosBoton.addEventListener('click', function() {
            filtros.style.display = filtros.style.display === 'none' ? 'block' : 'none';
        });

        function mostrarLibros(filtrados = libros) {
            librosLista.innerHTML = '';
            filtrados.forEach(libro => {
                const libroElem = document.createElement('div');
                libroElem.classList.add('libro');
                libroElem.innerHTML = `
                    <img src="${libro.imagen}" alt="Imagen del libro">
                    <div class="descripcion">${libro.descripcion}</div>
                    <div class="botones">
                        <a href="${libro.previsualizar}" class="btn btn-primary mb-2">Previsualizar</a>
                        <a href="${libro.descargar}" class="btn btn-secondary">Descargar</a>
                    </div>
                `;
                librosLista.appendChild(libroElem);
            });
        }

        function filtrarLibros() {
            const query = buscar.value.toLowerCase();
            const autor = filtroAutor.value.toLowerCase();
            const ano = filtroAno.value.toLowerCase();
            const filtrados = libros.filter(libro =>
                libro.descripcion.toLowerCase().includes(query) &&
                libro.autor.toLowerCase().includes(autor) &&
                libro.ano.includes(ano)
            );
            mostrarLibros(filtrados);
        }

        buscar.addEventListener('keyup', filtrarLibros);
        filtroAutor.addEventListener('keyup', filtrarLibros);
        filtroAno.addEventListener('keyup', filtrarLibros);

        mostrarLibros(); // Mostrar todos los libros al cargar la página
    });
</script>
