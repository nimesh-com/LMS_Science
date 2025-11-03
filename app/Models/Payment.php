<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';
    protected $fillable = [
        'student_id',
        'amount',
        'reference_number',
        'receipt',
    ];

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
}
