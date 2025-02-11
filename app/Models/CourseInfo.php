<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseInfo extends Model {
    use HasFactory;

    protected $table = 'course_info';

    protected $fillable = ['category', 'title', 'description', 'image'];
}
