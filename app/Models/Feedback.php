<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    //
    protected $fillable = [
        "user_id",
        "course_id",
        "feedback_id"
    ];
}
