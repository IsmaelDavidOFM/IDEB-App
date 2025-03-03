<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Order;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserCourseController extends Controller
{
    public function show()
    {
        $userId = Auth::id(); // Obtener el ID del usuario autenticado

        // Obtener los cursos relacionados al usuario a través de la tabla orders
        $cursos = DB::table('orders')
            ->join('cursos', 'orders.curso_id', '=', 'cursos.id') // Relacionar orders con cursos
            ->where('orders.student_id', $userId) // Filtrar por el usuario autenticado
            ->where('cursos.status', true) // Solo cursos con status true
            ->select('cursos.*') // Seleccionar todos los datos de cursos
            ->get();

        // Retornar la vista con los cursos
        return view('students.cursos', compact('cursos'));
    }
}
