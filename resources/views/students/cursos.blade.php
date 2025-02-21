@extends('templates.layout')

@section('title', 'MateriaL-Cursos')
<style>
    .content {
        padding: 20px;
    }

    .accordion {
        margin-top: 20px;
    }

    .accordion-item {
        border: 1px solid #ccc;
        margin-bottom: 10px;
        padding: 10px;
        cursor: pointer;
    }

    .accordion-item-content {
        display: none;
        padding: 10px;
        border-top: 1px solid #ccc;
        overflow: hidden;
    }

    .accordion-item-content video {
        width: 100%;
        max-width: 600px;
        margin-bottom: 10px;
    }

    .details {
        margin-top: 10px;
    }

    @media (min-width: 768px) {
        .accordion-item-content {
            display: flex;
            flex-wrap: wrap;
        }

        .accordion-item-content video {
            width: 50%;
        }

        .details {
            width: 50%;
            margin-top: 0;
            padding-left: 20px;
        }
    }
</style>
@section('content')
    <div class="content">
        <h1 style="text-align: center;">Cursos Disponibles</h1>

        @if ($cursos->isEmpty())
            <p style="text-align: center;">No tienes cursos disponibles.</p>
        @else
            <div class="accordion">
                @foreach ($cursos as $curso)
                    <div class="accordion-item">
                        <h3>{{ $curso->NombredelCurso }}</h3>
                        <div class="accordion-item-content">
                            <video src="{{ $curso->DriveTemario }}" controls></video>
                            <div class="details">
                                <h4>Título: {{ $curso->NombredelCurso }}</h4>
                                <p>Descripción: {{ $curso->DescripciondeCurso }}</p>
                                <p>Duración: {{ $curso->Duracioncurso }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var items = document.querySelectorAll(".accordion-item");
        var progressBar = document.querySelector(".progress-bar");

        items.forEach(function(item, index) {
            var content = item.querySelector(".accordion-item-content");
            item.addEventListener("click", function() {
                content.style.display = content.style.display === "block" ? "none" : "block";
                updateProgressBar();
            });
        });

        function updateProgressBar() {
            var viewedItems = document.querySelectorAll(".accordion-item-content[style*='display: block']")
                .length;
            var totalItems = items.length;
            var progress = (viewedItems / totalItems) * 100;
            progressBar.style.height = progress + "vh";
        }
    });
</script>
