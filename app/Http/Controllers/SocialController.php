<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Curso;
use Illuminate\Support\Facades\Auth;
class SocialController extends Controller
{
    public function showViews()
    {
        // Obtener los últimos 3 artículos
        $articles = Article::latest()->take(3)->get();
        $cursos = Curso::all();

        return view('foro-view.foro', compact('articles','cursos'));
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
    public function store(Request $request)
    {
        $request->validate([
            'curso' => 'required|string',
            'mensaje' => 'required|string|max:500',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $comment = new Comment();
        $comment->curso = $request->curso;
        $comment->mensaje = $request->mensaje;
        $comment->rating = $request->rating;
        $comment->user_id = Auth::check() ? Auth::id() : null; // Manejar usuario autenticado
        $comment->nombre_usuario = Auth::check() ? Auth::user()->name : 'Anónimo';

        $comment->save(); // Guardar manualmente

        return response()->json(['message' => 'Comentario agregado con éxito']);
    }
}
