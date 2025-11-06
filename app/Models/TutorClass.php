<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TutorClass extends Model
{
    protected $table = 'tutor_classes';
    protected $fillable = [
        'title',
        'slug',
        'description',
        'thumbnail',
        'scheduled_at',
        'scheduled_date',
        'status',
    ];
}
