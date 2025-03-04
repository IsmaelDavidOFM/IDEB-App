@extends('template.layout')

@section('title', 'Certificado')

@section('content')
<div class="container mt-4">
    <h2 class="text-center mb-4">Tu Certificado</h2>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Vista previa del certificado en PDF -->
            <div class="card mb-4">
                <div class="card-header text-center bg-secondary text-white">
                    Vista Previa del Certificado
                </div>
                <div class="card-body p-0">
                    <!-- Se usa <object> para embeber el PDF. Reemplaza 'sample_certificate.pdf' por la ruta real -->
                    <object data="{{ asset('certificates/sample_certificate.pdf') }}" type="application/pdf" width="100%" height="500">
                        <p class="text-center p-3">
                            Tu navegador no soporta la vista previa de PDF.
                            <a href="{{ asset('certificates/sample_certificate.pdf') }}">Descarga el certificado</a> para verlo.
                        </p>
                    </object>
                </div>
            </div>

            <!-- Detalles del certificado -->
            <div class="card mb-4">
                <div class="card-header text-center bg-info text-white">
                    Detalles del Certificado
                </div>
                <div class="card-body text-center">
                    <h5 class="card-title">Certificado de {{ $user->name ?? 'Tu Nombre' }}</h5>
                    <p class="card-text">
                        Este certificado demuestra que has completado el curso:
                    </p>
                    <p class="card-text">
                        <strong>Duración del Curso:</strong>

                    </p>
                </div>
            </div>

            <!-- Botón de descarga condicionado -->

        </div>
    </div>
</div>
@endsection
