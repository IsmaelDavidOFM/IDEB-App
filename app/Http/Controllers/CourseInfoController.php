<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourseInfo;

class CourseInfoController extends Controller {
    public function show($opcion) {
        $info = CourseInfo::where('category', $opcion)->get();
        return view('Info_cursos', compact('opcion', 'info'));
    }
}
