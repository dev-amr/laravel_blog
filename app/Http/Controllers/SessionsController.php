<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'destroy']);
    }
    public function create()
    {
        return view('sessions.create');
    }


    public function store()
    {
        //attempt method will signin user automatically if it is in database so we use if not
        if (! auth()->attempt(request(['email', 'password']))){
            
            return back()->withErrors([
                'message' => 'Please Check Your credentials and try again!'
            ]);
        }

        session()->flash('message', 'Welcome back, '.auth()->user()->name);
        //if it passes (signed in) then redirect to home page
        return redirect()->home();

    }

    
    public function destroy()
    {
        auth()->logout();
        session()->flash('message', 'You have been signed out!');
        return redirect()->home();
    }
}
