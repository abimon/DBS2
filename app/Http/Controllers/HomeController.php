<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function index()
    {
        return view('home');
    }
    public function courses(){
        $courses = Course::all();
        return view('front.courses',compact('courses'));
    }
}
