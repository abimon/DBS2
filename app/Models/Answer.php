<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [
        "answer",
        "isCorrect",
        "question_id"
    ];
}
