<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    // Mostrar el formulario de inicio de sesión
    public function showLoginForm()
    {
        return view('students.login'); // Usamos la vista en la carpeta auth
    }
    public function login(Request $request)
    {
        // Validar los datos del formulario
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Intentar autenticar al usuario
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/participantes'); // Redirige si la autenticación es exitosa
        }

        if (Auth::guard('students')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/participantes'); // Redirige si es un estudiante
        }

        // Si la autenticación falla
        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ]);
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('login'); // Redirige al formulario de inicio de sesión
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'age' => 'required|integer|min:5',
            'email' => 'required|string|email|max:255|unique:students',
            'password' => 'required|string|min:6|confirmed',
            'contactPhone' => 'required|string|max:20',
        ]);

        $student = Student::create([
            'name' => $request->name,
            'lastName' => $request->lastName,
            'age' => $request->age,
            'email' => $request->email,
            'password' => $request->password, // Se encripta automáticamente en el modelo
            'contactPhone' => $request->contactPhone,
            'status' => 'activo',
        ]);

        Auth::login($student); // Iniciar sesión automáticamente después del registro

        return redirect()->route('login')->with('success', 'Registro exitoso. ¡Bienvenido!');
    }
}
