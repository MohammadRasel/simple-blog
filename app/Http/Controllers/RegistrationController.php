<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;


class RegistrationController extends Controller
{
    public function create(){


    	return view('registration/create');
    }

    public function store(Request $request){
    	// Validate the form

    	$this->validate($request,[
    		'name' => 'required',
    		'email' => 'required|email',
    		'password' => 'required|confirmed'
    	]);

    	// Create and save the user
    	$user =new User();
        $user->name =$request['name'];
        $user->email =$request['email'];
        $user->password =bcrypt($request['password']);
        $user->save();
    	// Sign them in 
    	auth()->login($user);

    	// Redirect to the home page

    	return redirect('/');

    }
}
