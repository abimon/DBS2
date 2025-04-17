<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enroll;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function courses_study($slug)
    {
        $course = Course::where('slug', $slug)->first();
        $enroll = Enroll::where([['student_id', Auth::user()->id], ['course_id', $course->id]])->first();
        return view('front.study', compact('enroll'));
    }
    public function mycourses(){
        $enrolls = Enroll::where([['student_id',Auth::user()->id],['status','Enrolled']])->get();
        return view('dashboard.course.mycourses',compact('enrolls'));
    }
    public function about(){
        return view('front.about');
    }
    public function contact(){
        return view('front.contact');
    }
}
