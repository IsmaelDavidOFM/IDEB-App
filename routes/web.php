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
use App\Http\Controllers\ContactoController;

Route::get('/', function () {
    return view('index');
});

Route::get('/informacion_cursos/{opcion}', [CourseInfoController::class, 'show']);
Route::get('/colaboradores', [ColaboradorController::class, 'index']);
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
Route::get('/producto', function () {
    return view('product_View');
});

//Rutas para el blog y articulos
Route::get('/foro', function () {
    return view('foro-view.foro');
});
Route::get('/blog', function () {
    return view('foro-view.blog');
});
Route::post('/enviar-correo', [ContactoController::class, 'enviarCorreo'])->name('enviar.correo');

// Rutas para el inicio y cierre de sesión
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Una vez iniciada la sesión: Rutas protegidas
Route::middleware(['auth'])->group(function () {
    // Ruta para el certificado
    Route::get('/certificado', [CertificadoController::class, 'mostrarCertificado'])->name('certificado.mostrar');
    Route::get('/certificado/descargar', [CertificadoController::class, 'descargarCertificado'])->name('certificado.descargar');

    // Ruta para la vista del portal de participantes
    Route::get('/participantes', function () {
        return view('students.portal');
    })->name('participantes.portal');

    // Ruta para la vista de Material de Apoyo
    Route::get('/material_apoyo', function () {
        return view('students.material_Lib');
    })->name('students.material_Lib');

    // Ruta para la vista de cursos
    Route::get('/cursos', [UserCourseController::class, 'show'])->name('cursos.show');

    // Rutas para el manejo del carrito
    Route::get('/carrito', [CartController::class, 'show'])->name('carrito.show');
    Route::post('/carrito/add/{id}', [CartController::class, 'add'])->name('carrito.add');
    Route::post('/carrito/remove/{id}', [CartController::class, 'remove'])->name('carrito.remove');
    Route::post('/orden/crear', [CartController::class, 'crearOrden'])->name('orden.crear');

    Route::post('/payment/store', [CartController::class, 'store'])->name('orders.store');

    Route::get('/gracias', function () {
        return view('gracias');
    })->name('gracias');
});

//Rutas para froumario de pago
Route::post('/payment/store', [ShowCursosController::class, 'store'])->name('payment.store');
Route::get('/gracias', function () {
    return view('gracias');
})->name('gracias');
