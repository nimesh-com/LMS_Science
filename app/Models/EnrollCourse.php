<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EnrollCourse extends Model
{
    protected $table = 'enroll_courses';
    protected $fillable = [
        'course_id',
        'student_id',
    ];
}
