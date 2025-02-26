<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForumCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function forums()
    {
        return $this->hasMany(Forum::class, 'category_id');
    }
}
