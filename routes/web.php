<?php

use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseInfoController;
use App\Http\Controllers\CertificadoController;
use App\Http\Controllers\ColaboradorController;
use App\Http\Controllers\ShowCursosController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserCourseController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;

//Ruta para index
Route::get('/', [ShowCursosController::class, 'homeview']);

//Informacion de cursos
Route::get('/informacion_cursos/{opcion}', [CourseInfoController::class, 'show']);

//Colaboradores
Route::get('/colaboradores', [ColaboradorController::class, 'index']);

//Cursos
Route::get('/cursos_online', [ShowCursosController::class, 'index']);
Route::get('/curso/{id}', [ShowCursosController::class, 'show'])->name('curso.show');

Route::get('/formulario_compra/{id}', [ShowCursosController::class, 'showusualFrom'])->name('form.show');

// Ruta para registrar al usuario
Route::post('/storeUserAfterPurchase', [ShowCursosController::class, 'storeUserAfterPurchase'])->name('user.store');

// Ruta para crear la orden
Route::post('/storeOrder', [ShowCursosController::class, 'storeOrder'])->name('order.store');

// Ruta para el éxito de la orden
Route::get('/order/success', [ShowCursosController::class, 'orderSuccess'])->name('order.success');
Route::post('/guardar-compra', [ShowCursosController::class, 'guardarCompra'])->name('guardar.compra');

//Rutas para el blog y articulos
Route::post('/enviar-correo', [SocialController::class, 'enviarCorreo'])->name('enviar.correo');
Route::get('/foro', [SocialController::class, 'showViews'])->name('show.foro');
Route::get('/blog', [SocialController::class, 'showblog'])->name('show.blog');

// Rutas para el inicio y cierre de sesión
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Una vez iniciada la sesión: Rutas protegidas
Route::middleware(['auth:students'])->group(function () {
    //Cursos del usuario
    Route::get('/cursosUser', [CursoController::class, 'index'])->name('cursos.index');
    Route::get('/cursoUser/{id}', [CursoController::class, 'show'])->name('curso.detalle');

    // Ruta para el certificado
    Route::get('/certificado', [CertificadoController::class, 'mostrarCertificado'])->name('certificado.mostrar');
    Route::get('/certificado/descargar', [CertificadoController::class, 'descargarCertificado'])->name('certificado.descargar');

    // Ruta para la vista del portal de participantes
    Route::get('/participantes', function () {
        return view('students.portal');
    })->name('participantes.portal');

    // Ruta para la vista de Material de Apoyo
    Route::get('/biblioteca', [MaterialController::class, 'index'])->name('materials.index');
    Route::get('/biblioteca/download/{id}', [MaterialController::class, 'download'])->name('materials.download');

    // Ruta para la vista de cursos
    Route::get('/cursos', [UserCourseController::class, 'show'])->name('cursos.show');

    // Rutas para el manejo del carrito
    Route::get('/carrito', [CartController::class, 'show'])->name('carrito.show');
    Route::post('/carrito/add/{id}', [CartController::class, 'add'])->name('carrito.add');
    Route::post('/carrito/remove/{id}', [CartController::class, 'remove'])->name('carrito.remove');
    Route::post('/carrito/vaciar', [CartController::class, 'vaciar'])->name('carrito.vaciar');
    Route::post('/compra', [CartController::class, 'store'])->name('compra.store');

    Route::get('/gracias', function () {
        return view('gracias');
    })->name('gracias');
});

//Rutas para froumario de pago
Route::get('/payment/store', [ShowCursosController::class, 'store'])->name('payment.store');
Route::get('/gracias', function () {
    return view('gracias');
})->name('gracias');

Route::post('/guardar-comentario', [SocialController::class, 'store'])->name('guardar.comentario');

Route::post('/student/register', [AuthController::class, 'register'])->name('student.register');

Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLink'])->name('password.email');
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'updatePassword'])->name('password.update');
