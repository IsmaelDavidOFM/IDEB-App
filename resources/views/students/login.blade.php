@extends('template.layout')

@section('title', 'login')
<style>
    .login-container {
        max-width: 400px;
        margin: 10% auto;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        background-color: #f9f9f9;
        font-family: Arial, sans-serif;
    }

    .login-container h1 {
        text-align: center;
        font-size: 1.8rem;
        margin-bottom: 20px;
        color: #333;
    }

    .login-container form div {
        margin-bottom: 15px;
        position: relative;
    }

    .login-container input {
        width: 100%;
        padding: 10px;
        font-size: 1rem;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    .login-container input:focus {
        border-color: #007bff;
        outline: none;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }

    .login-container .error {
        color: red;
        font-size: 0.85rem;
        margin-top: 5px;
        display: block;
    }

    .login-container button {
        width: 100%;
        padding: 10px;
        font-size: 1rem;
        color: #fff;
        background-color: #007bff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .login-container button:hover {
        background-color: #0056b3;
    }

    .toggle-password {
        position: absolute;
        top: 50%;
        right: 10px;
        transform: translateY(-50%);
        cursor: pointer;
        font-size: 1.5rem;
        color: #007bff;
    }

    .toggle-password:hover {
        color: #0056b3;
    }
</style>
@section('content')
    <div class="login-container">
        <h1 id="form-title">Iniciar Sesión</h1>
        <form id="login-form" action="{{ route('login') }}" method="POST">
            @csrf
            <div>
                <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Correo electrónico"
                    required>
                @error('email')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <input type="password" name="password" id="password" placeholder="Clave" required>
                <span class="toggle-password" onclick="togglePasswordVisibility('password')">🔒</span>
                @error('password')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit">Iniciar Sesión</button>
            <p>¿No tienes cuenta? <a href="#" onclick="toggleForm()">Regístrate</a></p>
            <p><a href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a></p>

        </form>

        <form id="register-form" action="{{ route('student.register') }}" method="POST" style="display: none;">
            @csrf
            <div>
                <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Nombre"
                    required>
                @error('name')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <input type="text" name="lastName" id="lastName" value="{{ old('lastName') }}" placeholder="Apellido"
                    required>
                @error('lastName')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <input type="number" name="age" id="age" value="{{ old('age') }}" placeholder="Edad" required>
                @error('age')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <input type="email" name="email" id="email" value="{{ old('email') }}"
                    placeholder="Correo electrónico" required>
                @error('email')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div style="position: relative;">
                <input type="password" name="password" id="password" placeholder="Clave" required>
                <span class="toggle-password" onclick="togglePasswordVisibility('password')">🔒</span>
                @error('password')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirmar Clave"
                    required>
            </div>
            <div>
                <input type="text" name="contactPhone" id="contactPhone" value="{{ old('contactPhone') }}"
                    placeholder="Teléfono de contacto" required>
                @error('contactPhone')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit">Registrarse</button>
            <p>¿Ya tienes cuenta? <a href="#" onclick="toggleForm()">Inicia Sesión</a></p>
        </form>
    </div>
@endsection
<script>
    function togglePasswordVisibility() {
        const passwordInput = document.getElementById('password');
        const val = document.getElementsByClassName('toggle-password').value;
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        console.log(val);
    }

    function toggleForm() {
        let loginForm = document.getElementById('login-form');
        let registerForm = document.getElementById('register-form');
        let title = document.getElementById('form-title');

        if (loginForm.style.display === 'none') {
            loginForm.style.display = 'block';
            registerForm.style.display = 'none';
            title.innerText = 'Iniciar Sesión';
        } else {
            loginForm.style.display = 'none';
            registerForm.style.display = 'block';
            title.innerText = 'Registrarse';
        }
    }
</script>
