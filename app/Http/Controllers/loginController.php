<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Facade\FlareClient\Http\Response;

class loginController extends Controller
{

    function index(){

        return view('login');
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

    public function ajaxloginAttempt(Request $request)
    {
        $data = $request->all();

        if(Auth::attempt(['email' => $data['email'], 'password' => $data['password'], 'status' => '1'])){
            if(Auth::user()->user_type == '1'){
                $data = array(
                    'status' => 200,
                    'user_type' => 1,
                    'route' => route('practitioner.dashboard'),
                );
                return $data;
                // return redirect(route('practitioner.dashboard'));
            }else if(Auth::user()->user_type == '2'){
                $data = array(
                    'status' => 200,
                    'user_type' => 2,
                    'route' => route('booker.index'),
                );
                return $data;
                //return redirect(route('booker.index'));
            }

        }else{
            $data = array(
                'status' => 500
            );
            return $data;
            //return redirect()->back()->with('error', 'Authentication Error.');
        }
    }

    function logout(){
        Auth::logout();

        return redirect('/');
    }
}
