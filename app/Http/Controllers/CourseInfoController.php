<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;

class CourseInfoController extends Controller
{
    public function show($opcion = null, $id = null)
    {
        if ($id) {
            // Si se proporciona un ID, mostrar la información detallada del curso
            $info = Curso::find($id);

            if (!$info) {
                return redirect()->back()->with('error', 'Curso no encontrado');
            }

            return view('curso_detalle', compact('info'));
        }

        if ($opcion === 'fechas') {
            // Mostrar solo los cursos con las fechas de inscripción
            $info = Curso::select('id', 'NombredelCurso', 'DescripciondeCurso', 'FechadeRegistro_STPS')->get();
        } elseif ($opcion === 'flayAdds' || $opcion === 'promociones') {
            // Mensaje cuando no hay contenido disponible
            $info = collect(); // Lista vacía
            $mensaje = "La sección de " . ($opcion === 'flayAdds' ? 'Flayers y Anuncios' : 'Promociones') . " no está disponible por el momento.";
            return view('Info_cursos', compact('opcion', 'info', 'mensaje'));
        } else {
            // Si no hay opción, mostrar todos los cursos
            $info = Curso::all();
        }

        return view('Info_cursos', compact('opcion', 'info'));
    }
}
