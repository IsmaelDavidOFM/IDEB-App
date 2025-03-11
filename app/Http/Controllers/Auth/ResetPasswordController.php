<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class ResetPasswordController extends Controller
{
    public function showResetForm($token)
    {
        return view('auth.reset-password', compact('token'));
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        $reset = DB::table('password_resets')->where('email', $request->email)->first();

        if (!$reset || !Hash::check($request->token, $reset->token)) {
            return back()->with('error', 'Token inválido o expirado.');
        }

        $student = Student::where('email', $request->email)->first();

        if (!$student) {
            return back()->with('error', 'El correo no existe.');
        }

        // Cambiar la contraseña
        $student->password = Hash::make($request->password);
        $student->save();

        // Eliminar el token usado
        DB::table('password_resets')->where('email', $request->email)->delete();

        // Enviar notificación a soporte
        Mail::raw("El usuario con correo {$request->email} ha cambiado su contraseña el " . Carbon::now(), function ($message) {
            $message->to(env('MAIL_FROM_ADDRESS'))->subject('Cambio de contraseña');
        });

        return redirect()->route('login')->with('success', 'Contraseña actualizada correctamente.');
    }
}
