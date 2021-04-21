<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class loginController extends Controller
{
    
    function index(){

    	return view('login');
    }

    function loginAttempt(Request $request){
    	$data = $request->all();

    	if(Auth::attempt(['email' => $data['email'], 'password' => $data['password']])){

    		return redirect(route('practitioner.dashboard'));
    	}else{

    		return redirect()->back()->with('error', 'Authentication Error.');
    	}
    }
}
