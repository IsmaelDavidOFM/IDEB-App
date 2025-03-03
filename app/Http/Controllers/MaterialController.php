<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Material;
use Illuminate\Support\Facades\Storage;

class MaterialController extends Controller
{
    public function index()
    {
        $materials = Material::all();
        return view('students.material_Lib', compact('materials'));
    }

    public function download($id)
    {
        $material = Material::findOrFail($id);
        return Storage::download($material->file_path);
    }
}
