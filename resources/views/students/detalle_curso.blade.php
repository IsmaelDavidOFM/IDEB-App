@extends('template.layout')

@section('title', 'Curso - Detalle')

<style>
    .circle-bg {
        stroke: #ddd;
    }
    .circle-fill {
        stroke: #28a745;
        stroke-dasharray: 282.74;
        stroke-dashoffset: 282.74;
        transition: stroke-dashoffset 0.5s ease-out;
    }
    .circle-text {
        font-size: 18px;
        fill: #333;
    }
</style>
@section('content')
<div class="container my-4">
    <div class="row">
        <!-- Columna izquierda: Indicador Circular de Progreso -->
        <div class="col-md-3 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white text-center">
                    Progreso
                </div>
                <div class="card-body text-center">
                    <svg class="circle-progress" width="100" height="100">
                        <circle class="circle-bg" cx="50" cy="50" r="45" stroke-width="8" fill="none" />
                        <circle class="circle-fill" cx="50" cy="50" r="45" stroke-width="8" fill="none" stroke-dasharray="282.74" stroke-dashoffset="282.74" />
                        <text x="50%" y="50%" text-anchor="middle" dy=".3em" class="circle-text">0%</text>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Columna derecha: Información del curso, Reproductor y Lecciones -->
        <div class="col-md-9">
            <!-- Información del curso: Nombre y Duración -->
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h3>{{ $curso->NombredelCurso }}</h3>
                    <p><strong>Duración:</strong> {{ $curso->duracion ?? 'Duración no especificada' }}</p>
                </div>
            </div>

            <!-- Reproductor de video -->
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-secondary text-white">
                    Video de presentacion
                </div>
                <div class="card-body">
                    <video id="curso-video" controls width="100%" style="max-height: 350px;">
                        <source src="{{ asset('videos/default.mp4') }}" type="video/mp4">
                        Tu navegador no soporta la reproducción de videos.
                    </video>
                </div>
            </div>

            <!-- Acordeón de Lecciones -->
            <div class="card shadow-sm">
                <div class="card-header bg-info text-white">
                    Lecciones
                </div>
                <div class="card-body">
                    @php
                        // Verificar si existen grabaciones en la base de datos
                        $videos = isset($curso->videos) && is_array($curso->videos) ? $curso->videos : null;
                    @endphp

                    @if ($videos && count($videos) > 0)
                        <!-- Si hay grabaciones, mostrar el acordeón de lecciones -->
                        <div class="accordion" id="lessonsAccordion">
                            @foreach ($videos as $index => $video)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading{{ $index }}">
                                        <button class="accordion-button {{ $index > 0 ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}" aria-expanded="{{ $index == 0 ? 'true' : 'false' }}" aria-controls="collapse{{ $index }}">
                                            {{ $video->titulo ?? 'Lección sin título' }}
                                        </button>
                                    </h2>
                                    <div id="collapse{{ $index }}" class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}" aria-labelledby="heading{{ $index }}" data-bs-parent="#lessonsAccordion">
                                        <div class="accordion-body">
                                            <video class="lesson-video" controls width="100%" style="max-height: 300px;" data-lesson="{{ $index }}">
                                                <source src="{{ asset('videos/' . $video->url) }}" type="video/mp4">
                                                Tu navegador no soporta la reproducción de videos.
                                            </video>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <!-- Si no hay grabaciones, mostrar mensaje -->
                        <p class="text-center text-danger">Grabaciones no encontradas.</p>
                    @endif
                </div>
            </div>
        </div> <!-- Fin columna derecha -->
    </div> <!-- Fin fila -->
</div>
@endsection
<script>
document.addEventListener("DOMContentLoaded", function() {
    const lessonVideos = document.querySelectorAll(".lesson-video");
    const circleFill = document.querySelector(".circle-fill");
    const circleText = document.querySelector(".circle-text");
    const circumference = 2 * Math.PI * 45; // Circunferencia del círculo con r=45
    const totalLessons = lessonVideos.length;
    let watchedLessons = 0;

    function updateCircleProgress() {
        let progressPercent = Math.floor((watchedLessons / totalLessons) * 100);
        const offset = circumference * (1 - progressPercent / 100);
        circleFill.style.strokeDashoffset = offset;
        circleText.textContent = progressPercent + "%";
    }

    lessonVideos.forEach(video => {
        video.addEventListener("ended", function() {
            if (!this.classList.contains("watched")) {
                this.classList.add("watched");
                watchedLessons++;
                updateCircleProgress();
            }
        });
    });

    updateCircleProgress();
});
</script>

