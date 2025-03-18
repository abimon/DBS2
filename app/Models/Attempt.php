<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attempt extends Model
{
    //
    protected $fillable=[
        "question_id",
        "answer_id",
        "student_id"
    ];
}
