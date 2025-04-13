<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::all();
        $theme = Theme::findOrFail(request('theme_id'));
        return view("dashboard.course.index", compact("courses", 'theme'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $theme = request('theme_id');
        return view("dashboard.course.create", compact('theme'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        $this->validate(request(), [
            "title" => 'required',
            "description" => 'required',
            "duration" => 'required',
            "theme_id" => 'required',
            'cover' => 'required|image|mimes:jpeg,png,jpg|max:2048`'
        ]);
        if (request()->hasFile('cover')) {
            $file = request()->file('cover');
            $filename = time() . $file->getClientOriginalExtension();
            $file->move('storage/uploads/course/', $filename);
        } else {
            return back()->with('error', 'Please select a cover image')->withInput();
        }
        Course::create([
            'title' => request('title'),
            'slug' => Str::slug(request('title'),'_'),
            'description' => request('description'),
            'estimate_duration' => request('duration'),
            'cover' => '/storage/uploads/course/' . $filename,
            'theme_id' => request('theme_id'),
            'curriculum' => request('curriculum') != null ? request('curriculum') : 'Not available yet',
            'created_by' => Auth::user()->id,
        ]);
        return redirect()->route('course.index', ['theme_id' => request('theme_id')])->with('success', 'Course created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $course = Course::findOrFail($id);
        return view("dashboard.modules.index", compact("course"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $course = Course::findOrFail($id);
        return view("dashboard.course.edit", compact("course"));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id)
    {
        //
        // dd(request());
        $course = Course::findOrFail($id);
        if (request('title') != null) {
            $course->title = request('title');
            $course->slug = Str::slug(request('title'),'_');
        }
        if (request('description') != null) {
            $course->description = request('description');
        }
        if (request('estimate_duration') != null) {
            $course->estimate_duration = request('estimate_duration');
        }
        if (request('curriculum') != null) {
            $course->curriculum = request('curriculum');
        }
        if (request()->hasFile('cover')) {
            $file = request()->file('cover');
            // if(r){}
            $filename = time() . $file->getClientOriginalExtension();
            $file->move('storage/uploads/course/', $filename);
            $course->cover = '/storage/uploads/course/' . $filename;
        }

        $course->update();
        return redirect()->route('course.index', ['theme_id' => $course->theme_id])->with('success', 'Course updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        Course::destroy($id);
        return redirect()->route('course.index', ['theme_id' => $course->theme_id])->with('success', 'Course deleted successfully');
    }
}
