<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    //
    protected $fillable = [
        'title',
        'slug',
        'content',
        'course_id',
    ];
    public function course(){
        return $this->belongsTo(Course::class,'course_id','id');
    }
    public function quizes(){
        return $this->hasMany(Quiz::class,'module_id','id');
    }
    public function getNextAttribute()
    {
        return static::where('id', '>', $this->id)->orderBy('id', 'asc')->first();
    }

    public function getPreviousAttribute()
    {
        return static::where('id', '<', $this->id)->orderBy('id', 'desc')->first();
    }
}
