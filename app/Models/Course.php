<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';
    protected $fillable = [
        'title',
        'grade_id',
        'teacher_id',
        'description',
        'price',
        'thumbnail',
    ];
}
