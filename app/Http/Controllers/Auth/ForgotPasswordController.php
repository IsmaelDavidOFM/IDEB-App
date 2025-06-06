<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Password;


class ForgotPasswordController extends Controller
{
    public function showLinkRequestForm()
    {
        return view('auth.forgot-password');
    }

    public function sendResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $student = Student::where('email', $request->email)->first();

        if (!$student) {
            return back()->with('error', 'El correo electrónico no existe.');
        }

        // Generar un token seguro
        $token = Str::random(60);

        // Eliminar cualquier token anterior para este email
        DB::table('password_resets')->where('email', $request->email)->delete();

        // Insertar el nuevo token
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => Hash::make($token), // Guardamos el token hasheado
            'created_at' => Carbon::now(),
        ]);

        // Enviar el correo con el enlace de recuperación
        Mail::send('emails.reset-password', ['token' => $token, 'email' => $request->email], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Recuperación de contraseña');
        });

        return back()->with('success', 'Se ha enviado un correo con el enlace de recuperación.');
    }

}
