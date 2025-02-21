<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CertificadoController extends Controller
{
    // Método para mostrar el certificado
    public function mostrarCertificado()
    {
        return view('students.certificado');  // No es necesario verificar sesión o estado del curso.
    }
}
