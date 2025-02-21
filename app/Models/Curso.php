<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    // Si el nombre de la tabla en la base de datos es diferente al nombre del modelo (pluralizado)
    protected $table = 'cursos';

    // Los campos que se pueden asignar masivamente (Eloquent Mass Assignment)
    protected $fillable = [
        'nombre',
        'nivel',
        'duracion',
        'imagen',
        'costo',
    ];

    // Si necesitas definir si la columna 'id' es autoincremental, puedes hacerlo
    protected $primaryKey = 'id';

    // Si la tabla no tiene las columnas created_at y updated_at
    public $timestamps = true; // Puedes cambiar a false si no tienes esas columnas en tu tabla
}
