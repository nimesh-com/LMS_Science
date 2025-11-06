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

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class,'student_id','student_id');
    }
}
