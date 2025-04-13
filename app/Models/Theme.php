<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    protected $fillable = [
        "title",
        'slug',
        'cover',
        "description",
        "created_by"
    ];
    public function author(){
        return $this->belongsTo(User::class,"created_by","id");
    }
    public function courses(){
        return $this->hasMany(Course::class,"theme_id","id");
    }
}
