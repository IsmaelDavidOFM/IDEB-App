@extends('template.layout')

@section('title', 'Certificado')

@section('content')
    <div class="container mt-4">
        <h2 class="text-center">Tu Certificado</h2>

        <!-- Certificado Visual -->
        <div class="text-center">
            <img src="https://via.placeholder.com/300x150.png" alt="Certificado de curso" class="mb-3">

            <p>Este es un certificado demostrativo que te muestra cómo se verá tu certificado final.</p>

            <div class="mt-4">
                <h3>Certificado de Curso</h3>
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Certificado de [Tu Nombre]</h5>
                        <p class="card-text">
                            Este es un certificado demostrativo de que has completado el curso.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Botón de descarga deshabilitado -->
            <p class="mt-3">No puedes descargar el certificado hasta que completes el curso.</p>
            <button class="btn btn-success" disabled>Descargar Certificado</button> <!-- Botón deshabilitado -->
        </div>
    </div>
@endsection
