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
    public function courses_view($slug){
        $course = Course::where('slug',$slug)->first();
        return view('front.course',compact('course'));
    }
    public function about(){
        return view('front.about');
    }
    public function contact(){
        return view('front.contact');
    }
}
