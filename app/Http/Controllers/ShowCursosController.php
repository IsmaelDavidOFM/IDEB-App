<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Order;
use App\Mail\VerificacionCompra;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;



class ShowCursosController extends Controller
{
    public function index()
    {
        // Obtener todos los colaboradores de la base de datos
        $cursos = Curso::all();

        // Pasar los datos a la vista
        return view('cursos_online', compact('cursos'));
    }
    public function show($id)
    {
        // Buscar el curso en la base de datos usando el ID
        $curso = Curso::findOrFail($id);

        // Pasar el curso a la vista 'curso.blade.php'
        return view('curso', compact('curso'));
    }
    public function showusualFrom($id)
    {
        // Buscar el curso en la base de datos usando el ID
        $curso = Curso::findOrFail($id);

        // Pasar el curso a la vista 'curso.blade.php'
        return view('FormularioCompra', compact('curso'));
    }
    public function store(Request $request)
    {
        try {

            $user = new User();
            $user->name = $request->nombre;
            $user->apellido = $request->apellido;
            $user->email = $request->email;
            $user->password = bcrypt($request->password); // Encriptar la contraseña

            // Guardar el usuario en la base de datos
            $user->save();

            $order = new Order();
            $order->user_id =$user->id;
            $order->curso_id = $request->cursoId;
            $order->total_price = $request->precio;
            $order->status='pendiente';

            // Guardar el usuario en la base de datos
            $order->save();

            return response()->json([
                'success' => true,
                'message' => 'Datos recibidos correctamente',
                'user' => $user,
                'order' => $order,

            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
