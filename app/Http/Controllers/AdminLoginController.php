<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AdminLoginController extends Controller
{

    function index(){

        return view('admin_login');
    }

    function loginAttempt(Request $request){
        $data = $request->all();

        if (Auth::guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password']])) {
            return redirect(route('admin.dashboard'));
        }else{

            return redirect()->back()->with('error', 'Incorrect username or password.');
        }
    }

    function logout(){
        Auth::guard('admin')->logout();
        Auth::logout();

        return redirect('/');
    }
}
