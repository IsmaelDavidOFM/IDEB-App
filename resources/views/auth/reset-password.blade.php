@extends('template.layout')

@section('title', 'Restablecer Contraseña')
<style>
    /* Estilos generales para el contenedor de login */
    .login-container {
        width: 100%;
        max-width: 400px;
        margin: 0 auto;
        padding: 30px;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .login-container h1 {
        text-align: center;
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

    /* Estilos para los mensajes de error */
    p {
        color: red;
        font-size: 14px;
        text-align: center;
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
    <div class="login-container">
        <h1>Restablecer Contraseña</h1>

        @if (session('error'))
            <p>{{ session('error') }}</p>
        @endif

        <form action="{{ route('password.update') }}" method="POST">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div>
                <input type="email" name="email" placeholder="Correo electrónico" value="{{ old('email') }}" required>
            </div>

            <div>
                <input type="password" name="password" placeholder="Nueva contraseña" required>
            </div>

            <div>
                <input type="password" name="password_confirmation" placeholder="Confirmar nueva contraseña" required>
            </div>

            <button type="submit">Actualizar Contraseña</button>
        </form>
    </div>
@endsection
