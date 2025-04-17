<?php

namespace App\Http\Controllers;

use App\Models\Enroll;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnrollController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $enrolls = Enroll::all();
        return view("dashboard.enroll.index", compact("enrolls"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        if (Enroll::where([['student_id', Auth::user()->id], ['course_id', request('course_id')]])->first()) {
            return response()->json(['message' => 'Already Enrolled for this course'], 400);
        } else {
            Enroll::create([
                'student_id' => Auth::user()->id,
                'course_id' => request('course_id'),
            ]);
            return response()->json(['message' => 'Enrolled for this course Successfully'], 200);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Enroll $enroll)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Enroll $enroll)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id)
    {
        $enroll = Enroll::findOrFail($id);
        if(request('status')) {
            $enroll->status = request('status');
        }
        if(request('comment')) {
            $enroll->comment = request('comment');
        }
        $enroll->update();
        return back()->with('message','Enrolled Course Updated Successfully');  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Enroll::destroy($id);
        return back()->with('success', 'Enrolled Course Deleted Successfully');  
    }
}
