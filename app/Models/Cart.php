<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'items'];

    protected $casts = [
        'items' => 'array', // Convierte automáticamente el JSON en un array
    ];

    /**
     * Obtiene el carrito del usuario autenticado o lo crea si no existe.
     */
    public static function getCart()
    {
        return self::firstOrCreate(
            ['user_id' => Auth::id()],
            ['items' => []] // Si el carrito no existe, inicia vacío
        );
    }
}
