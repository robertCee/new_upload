<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'id', 'student_number', 'name', 'college', 'program', 'course_code', 'course_name', 'date_enroll',
    ];
}
