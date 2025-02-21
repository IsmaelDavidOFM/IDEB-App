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
        <h1>Iniciar Sesión</h1>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div>
                <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Correo electronico"
                    required>
                @error('email')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <input type="password" name="password" id="password" placeholder="Clave" required>
                <span class="toggle-password" onclick="togglePasswordVisibility()">🔒</span>
                @error('password')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit">Iniciar Sesión</button>
        </form>
    </div>
@endsection
<script>
    function togglePasswordVisibility(){
        const passwordInput=document.getElementById('password');
        const val=document.getElementsByClassName('toggle-password').value;
        const type=passwordInput.getAttribute('type')==='password' ? 'text' : 'password';
        passwordInput.setAttribute('type',type);
        console.log(val);
    }
</script>
