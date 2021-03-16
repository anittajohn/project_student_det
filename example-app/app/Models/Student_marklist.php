<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student_marklist extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_name',
        'term',
        'maths',
        'science',
        'history',
        'created_at',
        'updated_at',
    ];
}
