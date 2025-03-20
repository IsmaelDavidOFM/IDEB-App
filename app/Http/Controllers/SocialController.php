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
        $articles = Article::all();
        $cursos = Curso::all();
        $comments = Comment::all();
        return view('foro-view.blog', compact('articles', 'cursos', 'comments'));
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
        if (Auth::guard('students')->check()) {  // Asegúrate de usar el guard que has configurado para 'student'
            $student_id = Auth::guard('students')->id();  // Obtenemos el ID del estudiante autenticado
        } else {
            $student_id = null; // Si no está autenticado, asignamos null
        }


        $comment = new Comment();
        $comment->student_id = $student_id;  // Si el usuario no está autenticado, se asigna 0
        $comment->curso_id = $request->curso_id;
        $comment->email = Auth::check() ? Auth::user()->email : 'Sin email';
        $comment->content = $request->comentario;
        $comment->rating = $request->rating;
        $comment->save();

        return redirect('/foro');
    }
    public function getComments()
    {
        $comments = Comment::latest()->get();
        return response()->json($comments);
    }
}
