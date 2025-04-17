<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enroll extends Model
{
    //
    protected $fillable = [
        'student_id',
        'course_id',
        'status',
        'comment'
    ];
    public function student()
    {
        return $this->belongsTo(User::class, 'student_id','id');
    }
    public function course(){
        return $this->belongsTo(Course::class,'course_id','id');
    }
}
