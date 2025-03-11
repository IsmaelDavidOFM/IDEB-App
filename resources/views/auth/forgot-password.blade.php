@extends('template.layout')

@section('title', 'Recuperar Contraseña')

@section('content')
<div class="login-container">
    <h1>Recuperar Contraseña</h1>
    @if (session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif
    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif
    <form action="{{ route('password.email') }}" method="POST">
        @csrf
        <div>
            <input type="email" name="email" placeholder="Correo electrónico" required>
        </div>
        <button type="submit">Enviar Enlace</button>
    </form>
</div>
@endsection
