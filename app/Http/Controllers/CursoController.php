<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso; // Asegúrate de tener el modelo Curso


class CursoController extends Controller
{
    public function index()
    {
        $cursos = Curso::all();
        return view('students.cursos', compact('cursos'));
    }
    public function show($id)
    {
        $curso = Curso::findOrFail($id);
        return view('students.detalle_curso', compact('curso'));
    }
}
