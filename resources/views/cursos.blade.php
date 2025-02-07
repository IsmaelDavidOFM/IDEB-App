@extends('templates.layout')

@section('title', 'Materiañ-Cursos')
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
    <h1 style="text-align: center;">Cursos</h1>
    <div class="accordion">
        <div class="accordion-item">
            <h3>Curso 1</h3>
            <div class="accordion-item-content">
                <video src="video1.mp4" controls></video>
                <div class="details">
                    <h4>Título: Curso 1</h4>
                    <p>Descripción: Descripción del curso 1</p>
                    <p>Duración: 10 minutos</p>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h3>Curso 2</h3>
            <div class="accordion-item-content">
                <video src="video2.mp4" controls></video>
                <div class="details">
                    <h4>Título: Curso 2</h4>
                    <p>Descripción: Descripción del curso 2</p>
                    <p>Duración: 20 minutos</p>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h3>Curso 3</h3>
            <div class="accordion-item-content">
                <video src="video3.mp4" controls></video>
                <div class="details">
                    <h4>Título: Curso 3</h4>
                    <p>Descripción: Descripción del curso 3</p>
                    <p>Duración: 30 minutos</p>
                </div>
            </div>
        </div>
    </div>
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
