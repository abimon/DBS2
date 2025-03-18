<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
    protected $fillable = [
        "title",
        "description",
        "estimate_duration",
        "curriculum",
        "cover",
        "theme_id",
        "created_by"
    ];
    public function theme(){
        return $this->belongsTo(Theme::class,'theme_id','id');
    }
    public function modules(){
        return $this->hasMany(Module::class,'course_id','id');
    }
    public function instructor(){
        return $this->belongsTo(User::class,'created_by','id');
    }
}
