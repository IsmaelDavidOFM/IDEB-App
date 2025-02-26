<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'user_id', 'category_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(ForumCategory::class, 'category_id');
    }

    public function comments()
    {
        return $this->hasMany(ForumComment::class);
    }
}
