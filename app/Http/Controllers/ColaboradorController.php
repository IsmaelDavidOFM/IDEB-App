<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ColaboradorController extends Controller
{
    public function index()
    {
        // Obtener todos los colaboradores de la base de datos
        $users = User::all();

        // Pasar los datos a la vista
        return view('colaboradores', compact('users'));
    }
}
