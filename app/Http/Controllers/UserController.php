<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id)
    {
        $user=User::findOrFail($id);
        if(request('f_name')!=null){
            $user->f_name=request('f_name');
        }
        if(request('m_name')!=null){
            $user->m_name=request('m_name');
        }
        if(request('l_name')!=null){
            $user->l_name=request('l_name');
        }
        if(request('username')!=null){
            $user->username=request('username');
        }
        if(request('email')!=null){
            $user->email=request('email');
        }
        if(request('contact')!=null){
            $user->contact=request('contact');
        }
        if(request('cover_photo')!=null){
            $user->cover_photo=request('cover_photo');
        }
        if(request('avatar')!=null){
            $user->avatar=request('avatar');
        }
        if(request('country')!=null){
            $user->country=request('country');
        }
        if(request('yob')!=null){
            $user->yob=request('yob');
        }
        if(request('biography')!=null){
            $user->biography=request('biography');
        }
        if(request('role')!=null){
            $user->role=request('role');
        }
        if(request('password')!=null){
            $user->password=request('password');
        }
        $user->update();
        return back()->with('success','Details updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        User::destroy($id);
        return back()->with('error','User deleted successfully.');
    }
}
