<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function showView(){
        return view('foro-view.foro');
    }
    public function showblog(){
        return view('foro-view.blog');
    }
}
