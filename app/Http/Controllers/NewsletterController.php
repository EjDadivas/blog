<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
    //for single action we use __invoke
    public function __invoke(Newsletter $newsletter){
        request()->validate(['email' => 'required|email']);
        try{
            // $newsletter = new Newsletter();
            // $newsletter->subscribe(request('email'));

            // inline:
            // (new Newsletter())->subscribe(request('email'));

            // injected Newsletter $newletter:
            $newsletter->subscribe(request('email'));

        } catch(\Exception $e){

            dd($e);
           throw ValidationException::withMessages([
            'email' => 'This email could not be added to our newsletter '

           ]);

        }

       return redirect('/')
    ->with('success', 'You are now subscribed to our newletter');
    }
}
