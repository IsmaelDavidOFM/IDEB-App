@extends('template.layout')

@section('title', 'Portal')

<style>
    .cardOp {
        position: relative;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        text-align: center;
        transition: transform 0.2s;
        margin: 20px;
        border-radius: 10px;
        background-color: #f9f9f9;
        padding: 30px;
        width: 100%;
        height: 100%;
        margin-bottom: 30px;
    }

    .cardOp:hover {
        transform: scale(1.05);
    }

    .cardOp img {
        width: 50%;
        height: auto;
        margin: 0 auto;
        display: block;
    }

    .cardOp a {
        display: block;
        margin-top: 10px;
        color: #29323b;
        text-decoration: none;
        font-weight: bold;
    }

    h2 {
        text-align: center;
        margin-bottom: 30px;
    }

    /* Para centrar las tarjetas en la pantalla */
    .row {
        display: flex;
        justify-content: center; /* Centra las tarjetas en el eje horizontal */
        align-items: center; /* Centra las tarjetas en el eje vertical */
        flex-wrap: wrap; /* Permite que las tarjetas se ajusten a varias filas si es necesario */
    }

    /* Mejora la responsividad */


    /* Para pantallas pequeñas, las tarjetas se apilan verticalmente */
    @media (max-width: 576px) {
        .cardOp {
            width: 100%; /* Las tarjetas ocupan todo el ancho disponible en pantallas muy pequeñas */
        }
    }
</style>

@section('content')
    <div class="container">
        <h2>Portal</h2>
        <div class="row">
            <!-- Tarjeta Material de Apoyo -->
            <div class="col-md-4 col-sm-12">
                <div class="cardOp">
                    <img src="https://cdn-icons-png.flaticon.com/512/12048/12048902.png" alt="Material de apoyo">
                    <a href="/material_apoyo">Material de apoyo</a>
                </div>
            </div>

            <!-- Tarjeta Grabaciones de Cursos -->
            <div class="col-md-4 col-sm-12">
                <div class="cardOp">
                    <img src="https://cdn-icons-png.flaticon.com/512/12048/12048902.png" alt="Grabaciones de cursos">
                    <a href="/cursos">Grabaciones de cursos</a>
                </div>
            </div>

            <!-- Tarjeta Certificado -->
            <div class="col-md-4 col-sm-12">
                <div class="cardOp">
                    <img src="https://cdn-icons-png.flaticon.com/512/12048/12048902.png" alt="Certificado">
                    <a href="{{ route('certificado.mostrar') }}">Certificado</a>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="cardOp">
                    <img src="https://cdn-icons-png.flaticon.com/512/12048/12048902.png" alt="Certificado">
                    <a href="{{ route('certificado.mostrar') }}">Certificado</a>
                </div>
            </div>
        </div>
    </div>
@endsection

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.0/js/bootstrap.bundle.min.js"></script>
