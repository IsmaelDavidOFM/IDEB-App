<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $fillable=['title', 'author', 'year', 'file_path', 'image_path'];
}
