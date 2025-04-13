<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $fillable = [
        'title', 
        'slug',
        'description',
        'module_id'
    ];
    public function questions()
    {
        return $this->hasMany(Question::class,'quiz_id','id');
    }
    public function module(){
        return $this->belongsTo(Module::class,'module_id','id');
    }
}
