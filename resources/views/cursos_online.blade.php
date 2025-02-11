@extends('templates.layout')

<<<<<<< HEAD
@section('title', 'cursos en linea')

@section('content')
    <div>
        <div>
            <h2>Cursos</h2>
            <div class="search">
                <input type="text" name="search" id="search" placeholder="nombre del curso">
                <input type="button" value="Buscar">
            </div>
        </div>
        <br><br>
        <div>
            <div class="card">
                <img src="" alt="defoult">
                <p class="description">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Quas doloribus natus dolore, accusantium, dicta exercitationem
                    cumque deserunt recusandae provident vero ratione quod quam
                    perferendis quo, delectus atque ducimus quasi? Omnis!
                </p>
                <a href="{{ url('/producto') }}">Ver mas</a>
            </div>
        </div>
    </div><br><br>
@endsection
=======
@section('title', 'Cursos en Línea')

<style>
    /* Aseguramos que los filtros ocupen el espacio adecuado */
    .filters {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
        justify-content: space-between;
        align-items: center;
    }

    .search input,
    .level-filter select {
        width: 100%;
        max-width: 250px;
        /* Limita el ancho para que no se estire demasiado */
    }

    /* Mejoramos el tamaño de los botones */
    .filters button {
        min-width: 120px;
    }

    @media (max-width: 768px) {
        .filters {
            flex-direction: column;
            gap: 10px;
        }

        .search input,
        .level-filter select {
            width: 100%;
        }
    }
</style>

@section('content')
    <div class="container mt-4">
        <h2 class="text-center">Cursos Disponibles</h2>

        <!-- Filtros -->
        <div class="filters my-3 d-flex justify-content-between align-items-center gap-3">
            <!-- Filtro por nombre -->
            <div class="search flex-grow-1">
                <input type="text" id="search" class="form-control" placeholder="Nombre del curso">
            </div>

            <!-- Filtro por nivel -->
            <div class="level-filter">
                <select id="level" class="form-control">
                    <option value="">Seleccionar Nivel</option>
                    <option value="principiante">Principiante</option>
                    <option value="intermedio">Intermedio</option>
                    <option value="avanzado">Avanzado</option>
                </select>
            </div>

            <!-- Botón de búsqueda -->
            <button class="btn btn-primary" onclick="aplicarFiltros()">Filtrar</button>

            <!-- Botón para borrar filtros -->
            <button class="btn btn-danger" onclick="borrarFiltros()">Borrar Filtros</button>
        </div>

        <!-- Mostrar los cursos -->
        <div id="cursos" class="row"></div>
    </div>
@endsection

<script>
    // Lista de cursos disponibles con niveles
    const cursos = [{
            title: "Curso de HTML",
            description: "Aprende HTML desde cero",
            image: "https://via.placeholder.com/300",
            level: "principiante"
        },
        {
            title: "Curso de CSS",
            description: "Domina CSS y crea sitios increíbles",
            image: "https://via.placeholder.com/300",
            level: "intermedio"
        },
        {
            title: "Curso de JavaScript",
            description: "Conviértete en un experto en JavaScript",
            image: "https://via.placeholder.com/300",
            level: "avanzado"
        },
        {
            title: "Curso de Bootstrap",
            description: "Aprende a usar Bootstrap 5",
            image: "https://via.placeholder.com/300",
            level: "intermedio"
        }
    ];

    // Función para mostrar los cursos en el contenedor
    function mostrarCursos(lista) {
        const contenedor = document.getElementById("cursos");
        contenedor.innerHTML = ""; // Limpiamos el contenedor antes de agregar los cursos

        // Recorremos la lista de cursos y los añadimos al HTML
        lista.forEach(curso => {
            contenedor.innerHTML += `
                <div class="col-md-6 mb-3">
                    <div class="card">
                        <img src="${curso.image}" class="card-img-top" alt="${curso.title}">
                        <div class="card-body">
                            <h5 class="card-title">${curso.title}</h5>
                            <p class="card-text">${curso.description}</p>
                            <a href="#" class="btn btn-primary">Ver más</a>
                        </div>
                    </div>
                </div>
            `;
        });
    }

    // Función para aplicar los filtros (por nombre y nivel)
    function aplicarFiltros() {
        const termino = document.getElementById("search").value.toLowerCase();
        const nivel = document.getElementById("level").value.toLowerCase();

        const filtrados = cursos.filter(curso => {
            const coincideNombre = curso.title.toLowerCase().includes(termino);
            const coincideNivel = nivel ? curso.level.toLowerCase() === nivel : true;
            return coincideNombre && coincideNivel;
        });

        mostrarCursos(filtrados);
    }

    // Función para borrar los filtros
    function borrarFiltros() {
        document.getElementById("search").value = ""; // Borrar el filtro de nombre
        document.getElementById("level").value = ""; // Borrar el filtro de nivel

        // Mostrar todos los cursos nuevamente
        mostrarCursos(cursos);
    }

    // Llamamos a la función para mostrar todos los cursos cuando se cargue la página
    document.addEventListener('DOMContentLoaded', function() {
        mostrarCursos(cursos);
    });
</script>
>>>>>>> 68957ce (cambios 02)
