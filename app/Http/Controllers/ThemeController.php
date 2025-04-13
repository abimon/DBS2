<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use League\CommonMark\Extension\DescriptionList\Node\Description;

class ThemeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $themes = Theme::all();
        return view('dashboard.theme.index',compact('themes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.theme.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        //
        $this->validate(request(), [
            "title"=>'required',
            "description"=>'required',
            'cover'=>'required|image',
        ]);
        if(request()->hasFile('cover')){
            $image = request()->file('cover');
            $extension = $image->getClientOriginalExtension();
            $filename = time(). '.'. $extension;
            $image->move('storage/uploads/themes',$filename);
        }
        Theme::create([
            'title'=> request('title'),
            'description'=> request('description'),
            'cover'=>'/storage/uploads/themes/'.$filename,
            'created_by'=> Auth::user()->id,
        ]);
        return redirect()->route('theme.index')->with('success','THeme created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $theme = Theme::findOrFail($id);
        return view('dashboard.course.index',compact('theme'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $theme = Theme::findOrFail($id);
        return view('dashboard.theme.edit',compact('theme'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id)
    {
        //
        $theme = Theme::findOrFail($id);
        if(request('title')!=null){
            $theme->title=request('title');
        }
        if(request('description')!=null){
            $theme->description=request('description');
        }
        if (request()->hasFile('cover')) {
            $image = request()->file('cover');
            $extension = $image->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $image->move('storage/uploads/themes', $filename);
            $theme->cover = '/storage/uploads/themes/'. $filename;
        }
        $theme->update();
        return redirect()->route('theme.index')->with('success','Theme updated successfully.');                                                                                                  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        Theme::destroy($id);
        return redirect()->route('theme.index')->with('success','Theme deleted successfully.');
    }
}