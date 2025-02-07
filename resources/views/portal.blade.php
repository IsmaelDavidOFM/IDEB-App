@extends('templates.layout')

@section('title', 'Portal')
<style>
    .cardOp {
        position: relative;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        text-align: center;
        transition: transform 0.2s;
        margin: 50px auto;
        /* Centrar la tarjeta horizontalmente */
        border-radius: 10px;
        background-color: #f9f9f9;
        padding: 50px;
        width: 50%;
        /* Hacer que la tarjeta abarque solo el 30% de la página */
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
    }
    h2 {
        text-align: center;
        margin-bottom: 20px;
    }
</style>
@section('content')
    <div class="container" >
        <h2>Portal</h2>
        <div class="row">
            <div class="col-md-12">
                <div class="cardOp">
                    <img src="https://cdn-icons-png.flaticon.com/512/12048/12048902.png" alt="Image default">
                    <a  href="/Material_Apoyo">Material de apoyo</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="cardOp">
                    <img src="https://cdn-icons-png.flaticon.com/512/12048/12048902.png" alt="Image default">
                    <a href="/cursos">Grabaciones de cursos</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="cardOp">
                    <img src="https://cdn-icons-png.flaticon.com/512/12048/12048902.png" alt="Image default">
                    <a href="#">Certificado</a>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.0/js/bootstrap.bundle.min.js"></script>
