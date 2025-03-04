@extends('template.layout')

@section('title', 'Cursos - Plataforma')

<style>
    .container {
        padding: 20px;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }

    .card {
        width: 300px;
        margin: 15px;
        background: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        overflow: hidden;
        transition: transform 0.3s;
    }

    .card:hover {
        transform: scale(1.05);
    }

    .card-header {
        background: #007bff;
        color: white;
        padding: 15px;
        font-size: 18px;
        font-weight: bold;
        text-align: center;
    }

    .card-content {
        padding: 15px;
        text-align: center;
    }

    .progress-container {
        background: #f3f3f3;
        height: 8px;
        border-radius: 4px;
        overflow: hidden;
        margin-top: 10px;
    }

    .progress-bar {
        height: 8px;
        background: #28a745;
        width: 0%;
        transition: width 0.5s;
    }

    .btn {
        display: inline-block;
        background: #007bff;
        color: white;
        padding: 8px 12px;
        margin-top: 10px;
        text-decoration: none;
        border-radius: 5px;
        font-size: 14px;
    }

    .btn:hover {
        background: #0056b3;
    }
</style>

@section('content')
    <div class="container">
        @if ($cursos->isEmpty())
            <p style="text-align: center; width: 100%;">No tienes cursos disponibles.</p>
        @else
            @foreach ($cursos as $curso)
                <div class="card">
                    <div class="card-header">{{ $curso->NombredelCurso }}</div>
                    <div class="card-content">
                        <p>{{ $curso->DescripciondeCurso }}</p>
                        <p><strong>Duración:</strong> {{ $curso->Duracioncurso }}</p>

                        <div class="progress-container">
                            <div class="progress-bar" id="progress-{{ $curso->id }}"></div>
                        </div>

                        <!-- Al hacer clic, redirige a la vista individual del curso -->
                        <a href="{{ route('curso.detalle', $curso->id) }}" class="btn">Ver Curso</a>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection

<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll(".progress-bar").forEach(bar => {
            let courseId = bar.id.split("-")[1];
            let progress = localStorage.getItem("progress-" + courseId) || 0;
            bar.style.width = progress + "%";
        });
    });
</script>
