<?php

namespace App\Providers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            if (Auth::guard('students')->check()) { // Verifica si el usuario está autenticado en el guard 'student'
                $cart = Cart::where('student_id', Auth::guard('students')->id())->first();
                $items = $cart ? json_decode($cart->items, true) : [];
                $cartCount = array_sum(array_column($items, 'quantity')); // Sumar todas las cantidades de productos
            } else {
                $cartCount = 0;
            }

            $view->with('cartCount', $cartCount); // Hacer disponible la variable en todas las vistas
        });
        View::composer('template.layout', function ($view) {
            $contacto = DB::table('contacto')->first();
            $view->with('contacto', $contacto);
        });
    }
}
