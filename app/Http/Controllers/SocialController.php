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

        $articles = Article::latest()->take(3)->get();
        $cursos = Curso::all();
        $comments = Comment::latest()->get(); // Obtener los comentarios más recientes

        return view('foro-view.foro', compact('articles', 'cursos', 'comments'));
    }
    public function showblog()
    {
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
    public function storeComment(Request $request)
    {
        $comment = new Comment();
        $comment->user_id = Auth::id(); // Obtiene el usuario autenticado
        $comment->curso_id = $request->curso_id;
        $comment->name = Auth::user()->name; // Nombre del usuario autenticado
        $comment->email = Auth::user()->email; // Email del usuario autenticado
        $comment->content = $request->content;
        $comment->save();

        return response()->json([
            'success' => true,
            'message' => 'Comentario guardado exitosamente',
            'comment' => $comment
        ]);
    }
    public function getComments()
    {
        $comments = Comment::latest()->get();
        return response()->json($comments);
    }
}
