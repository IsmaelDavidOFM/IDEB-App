<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Laravel\Socialite\Facades\Socialite;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/login/google', [AuthController::class, 'redirectToGoogle'])->name('login.google');
Route::get('/login/google/callback', [AuthController::class, 'handleGoogleCallback']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/', function () {
    return view('index');
});
Route::get('/informacion_cursos/{opcion}', function ($opcion) {
    return view('Info_cursos', ['opcion' => $opcion]);
});
Route::get('/cursos_online', function () {
    return view('cursos_online');
});
Route::get('/participantes', function () {
    return view('portal');
});
Route::get('/colaboradores', function () {
    return view('colaboradores');
});
Route::get('/producto', function () {
    return view('product_View');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/Material_Apoyo', function () {
    return view('mterial_Lib');
});
Route::get('/cursos', function () {
    return view('cursos');
});
Route::get('/foro', function () {
    return view('foro-view.foro');
});
Route::get('/blog', function () {
    return view('foro-view.blog');
});
