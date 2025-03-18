<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quizzes = Quiz::where('module_id',request('module_id'))->get();
        return view('dashboard.quiz.index', compact('quizzes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('dashboard.quiz.create',['module_id'=> request('module_id')]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        $this->validate(request(),[
            "title"=>'required',
            "description"=>'required',
            "module_id"=>'required',
        ]);
        Quiz::create([
            "title"=>request('title'),
            "description"=>request('description'),
            "created_by"=>Auth::user()->id,
            "module_id"=>request('module_id'),
        ]);
        return redirect()->route('dashboard.quiz.index', ['module_id' => request('module_id')])->with('success','Quiz created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $quiz = Quiz::find($id);
        return view('dashboard.question.index', compact('quiz'));
    }

    public function edit($id)
    {
        //
        $quiz = Quiz::findOrFail($id);
        return view('dashboard.quiz.edit', compact('quiz'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update($id)
    {
        $this->validate(request(),[
            "title"=>'required',
            "description"=>'required',
        ]);
        $quiz = Quiz::findOrFail($id);
        $quiz->update([
            "title"=>request('title'),
            "description"=>request('description'),
        ]);
        return redirect()->route('dashboard.quiz.index', ['module_id' => $quiz->module_id])->with('success','Quiz updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $quiz = Quiz::findOrFail($id);
        $module=$quiz->module_id;
        Quiz::destroy($id);
        return redirect()->route('dashboard.quiz.index', ['module_id' => $module])->with('success','Quiz deleted successfully');
    }
}
