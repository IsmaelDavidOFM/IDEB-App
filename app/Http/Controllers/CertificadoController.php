<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;

class CertificadoController extends Controller
{
    // Método para mostrar el certificado
    public function mostrarCertificado()
    {
        $curso = Curso::all();
        return view('students.certificado',compact('curso'));  // No es necesario verificar sesión o estado del curso.
    }
}
