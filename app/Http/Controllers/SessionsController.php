<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function create(){
        return view('sessions.create');
    }
    public function destroy(){
        // ddd('log the user out');
        auth()->logout();

        return redirect('/')->with('success', 'Goodbye!');
    }

    public function store(){
        // validate request
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // attempt and autheniticate user
        if(!auth()->attempt($attributes)){
            // if validation fails
            // return back()
            //     ->withInput()
            //     ->withError(['email'=> 'Your provided credentails could not be verified.']);


            throw ValidationException::withMessages(
                ['email'=> 'Your provided credentails could not be verified.',
                'password' => 'Your password is incorrect'
            ]);


        }



        // prevent session fixation
        session()->regenerate();
         // redirect with flush
        return redirect('/')->with('success', 'Welcome back');

        }
}
