<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colaborador extends Model
{
    use HasFactory;

    // Aquí puedes especificar el nombre de la tabla si es diferente a 'colaboradors'
    protected $table = 'colaboradores';

    // Los campos que son asignables de forma masiva
    protected $fillable = [
        'nombre',
        'ocupacion',// Asegúrate de que estos campos coincidan con los de tu tabla
        'picture',
        "description ",
        "position"
    ];
}
