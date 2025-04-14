<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $questions = Question::all();
        $quiz=Quiz::findOrFail(request("quiz_id"));
        return view("dashboard.question.index", compact("questions","quiz"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $q_id = request('quiz_id');
        return view("dashboard.question.create", compact("q_id"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        Question::create([
            'quiz_id'=>request('quiz_id'),
            'question'=>request('description'),
            'isOpen'=>request('isOpen')?true:false
        ]);
        return redirect()->route('question.index',['quiz_id'=> request('quiz_id')])->with('success','Question created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        //
    }
}
