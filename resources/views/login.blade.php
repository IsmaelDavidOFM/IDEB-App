@extends('templates.layout')

@section('title', 'login')

<style>
    body {
        background-color: #f0f2f5;
        font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
    }

    .card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
    }

    .card-header {
        background-color: #40E0D0;
        color: #ffffff;
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
    }

    .btn-primary {
        background-color: #000000;
        border-color: #000000;
        color: #40E0D0;
        transition: background-color 0.3s, color 0.3s;
    }

    .btn-primary:hover {
        background-color: #40E0D0;
        color: #000000;
    }

    .btn-secondary {
        background-color: #40E0D0;
        border-color: #40E0D0;
        color: #000000;
        transition: background-color 0.3s, color 0.3s;
    }

    .btn-secondary:hover {
        background-color: #000000;
        color: #40E0D0;
    }

    .form-control:focus {
        border-color: #40E0D0;
        box-shadow: 0 0 0 0.2rem rgba(64, 224, 208, 0.25);
    }
</style>


@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card shadow-lg">
                    <div class="card-header bg-turquoise text-white text-center">
                        <h3 style="color: #1eac9d">Inicio de sesión</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="mail" class="form-label">Correo de usuario</label>
                                <input type="email" class="form-control" name="mail" id="mail"
                                    placeholder="Correo de usuario" value="{{ old('mail') }}">
                                @error('mail')
                                    <spam class="text-danger">Usuario incorrecto</spam>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="key" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" name="key" id="key"
                                    placeholder="Contraseña" value="{{ old('key') }}">
                                @error('key')
                                    <span class="text-danger">Contraseña incorrecta</span>
                                @enderror
                            </div>
                            <div class="d-flex justify-content-between">
                                <button type="submit" class="btn btn-primary">Iniciar sesión</button>
                                <form action="/login/google" method="get">
                                    <button type="submit" class="btn btn-secondary">Iniciar sesión con Google</button>
                                </form>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="{{ url('/participantes') }}">Participantes</a>

@endsection
