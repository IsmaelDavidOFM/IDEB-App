<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SocialController extends Controller
{
    public function showView(){
        return view('foro-view.foro');
    }
    public function showblog(){
        return view('foro-view.blog');
    }
    public function enviarCorreo(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre'   => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'correo'   => 'required|email',
            'mensaje'  => 'required|string',
        ]);

        // Datos del correo
        $data = [
            'nombre'   => $request->nombre,
            'apellido' => $request->apellido,
            'correo'   => $request->correo,
            'mensaje'  => $request->mensaje,
        ];

        // Enviar correo a soporte
        Mail::send('emails.soporte', $data, function ($message) {
            $message->to('Idespinoza2021@gmail.com')
                    ->subject('Nuevo Mensaje de Contacto');
        });

        // Enviar confirmación al usuario
        Mail::send('emails.confirmacion', $data, function ($message) use ($request) {
            $message->to($request->correo)
                    ->subject('Confirmación de Contacto');
        });

        return back()->with('success', 'Tu mensaje ha sido enviado correctamente.');
    }
}
