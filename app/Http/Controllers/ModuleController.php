<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $modules = Module::all();
        $course = Course::findOrFail(request('course_id'));
        return view('dashboard.modules.index', compact('modules','course'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.modules.create',['id'=>request('course_id')]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        $this->validate(request(), [
            "title"=>'required',
            "content"=>'required',
        ]);
         Module::create([
            "title"=>request('title'),
            'slug'=>str()->slug(request('title')),
            "content"=>request('content'),
            "course_id"=>request('course_id'),
            "created_by"=>Auth::user()->id,
        ]);
        return redirect()->route("module.index",['course_id'=>request('course_id')])->with("success","Module created successfully.");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $module = Module::findOrFail($id);
        return view('dashboard.quiz.index', compact('module'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $module = Module::findOrFail($id);
        return view('dashboard.modules.edit', compact('module'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id)
    {
        //
        // dd(request());
        $module=Module::findOrFail($id);
        if(request('title')!=null){
            $module->title=request('title');
            $module->slug=str()->slug(request('title'));
        }
        if(request('content')!=null){
            $module->content=request('content');
        }
        if(request('course_id')!=null){
            $module->course_id=request('course_id');
        }
        if(request('created_by')!=null){
            $module->created_by=request('created_by');
        }
        $module->update();
        return redirect()->route('module.index',['course_id'=>$module->course_id])->with('success','');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $module = Module::findOrFail($id);
        $id=$module->course_id;
        Module::destroy($id);
        return redirect()->route('module.index',['course_id'=>$id])->with('success','Module deleted successfully');
    }
}
