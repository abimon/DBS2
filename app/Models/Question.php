<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
    protected $fillable = [
        'question',
        'quiz_id',
        'isOpen',
    ];
    public function quiz()
    {
        return $this->belongsTo(Quiz::class, 'quiz_id', 'id');
    }
    public function answers()
    {
        return $this->hasMany(Answer::class,'question_id','id');
    }

}
