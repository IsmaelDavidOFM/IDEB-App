<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['students_id', 'curso_id', 'email', 'content', 'rating'];
    // Comment.php
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
