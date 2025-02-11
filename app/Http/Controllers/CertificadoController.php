<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CertificadoController extends Controller
{
    // Método para mostrar el certificado
    public function mostrarCertificado()
    {
        return view('certificado');  // No es necesario verificar sesión o estado del curso.
    }
}
