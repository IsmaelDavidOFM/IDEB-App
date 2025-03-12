@extends('template.layout')

@section('title', 'Recuperar Contraseña')
<style>
    /* Contenedor para centrar el contenido */
    .login-container-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background-color: #f0f0f0;
        /* Puedes cambiar el color de fondo si deseas */
    }

    /* Estilos generales para el contenedor de login */
    .login-container {
        width: 100%;
        max-width: 400px;
        padding: 30px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    .login-container h1 {
        margin-bottom: 20px;
        font-size: 24px;
        color: #333;
    }

    /* Estilos para los inputs */
    .login-container input {
        width: 100%;
        padding: 12px;
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
        color: #333;
        background-color: #fff;
    }

    .login-container input:focus {
        border-color: #007BFF;
        outline: none;
    }

    /* Estilos para los mensajes de error y éxito */
    p {
        font-size: 14px;
        margin-bottom: 10px;
    }

    p.error {
        color: red;
    }

    p.success {
        color: green;
    }

    /* Estilos para el botón de submit */
    button {
        width: 100%;
        padding: 12px;
        background-color: #007BFF;
        color: #fff;
        font-size: 16px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    button:hover {
        background-color: #0056b3;
    }
</style>
@section('content')
    <div class="login-container-wrapper">
        <div class="login-container">
            <h1>Recuperar Contraseña</h1>

            @if (session('error'))
                <p class="error">{{ session('error') }}</p>
            @endif

            @if (session('success'))
                <p class="success">{{ session('success') }}</p>
            @endif

            <form action="{{ route('password.email') }}" method="POST">
                @csrf
                <div>
                    <input type="email" name="email" placeholder="Correo electrónico" required>
                </div>
                <button type="submit">Enviar Enlace</button>
            </form>
        </div>
    </div>
@endsection
