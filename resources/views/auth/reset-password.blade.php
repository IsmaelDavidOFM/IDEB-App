@extends('template.layout')

@section('title', 'Restablecer Contraseña')

@section('content')
<div class="login-container">
    <h1>Restablecer Contraseña</h1>
    @if (session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif
    <form action="{{ route('password.update') }}" method="POST">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <div>
            <input type="email" name="email" placeholder="Correo electrónico" required>
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
