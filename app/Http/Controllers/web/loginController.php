<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class loginController extends Controller
{
    //
    function login(){

        return view('web.new.login');
    }

    function loginAttempt(Request $request){
        $data = $request->all();

        if(Auth::attempt(['email' => $data['email'], 'password' => $data['password'], 'status' => '1'])){
            if(Auth::user()->user_type == '1'){
                return redirect(route('practitioner.dashboard'));
            }else if(Auth::user()->user_type == '2'){
                return redirect(route('booker.index'));
            }

        }else{

            return redirect()->back()->with('error', 'Authentication Error.');
        }
    }


    function register(){

        return view('web.new.register');
    }
}
