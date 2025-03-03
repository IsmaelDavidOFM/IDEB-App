<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Definir la tabla si no sigue la convención de Laravel
    protected $table = 'orders';

    // Definir los campos que pueden ser llenados masivamente
    protected $fillable = [
        'student_id', 'curso_id', 'total_price', 'status'
    ];


    // Si el campo 'created_at' o 'updated_at' no existe en la base de datos, puedes desactivarlos
    public $timestamps = true;

    // Relación con el modelo Customer
    public function customer()
    {
        return $this->belongsTo(User::class);
    }

    // Relación con el modelo Category
    public function category()
    {
        return $this->belongsTo(User::class);
    }
}
