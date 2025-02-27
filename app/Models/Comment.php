<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'curso_id', 'name', 'email', 'content'];

    // Relación con User (opcional)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
