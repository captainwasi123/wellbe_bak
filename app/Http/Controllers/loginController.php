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
            if(Auth::user()->user_type == '1'){
                return redirect(route('practitioner.dashboard'));    
            }else if(Auth::user()->user_type == '2'){
                return redirect(route('booker.index'));
            }
    		
    	}else{

    		return redirect()->back()->with('error', 'Authentication Error.');
    	}
    }

    function logout(){
        Auth::logout();

        return redirect('/');
    }
}
