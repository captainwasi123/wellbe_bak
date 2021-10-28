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
            $cart = session()->get('cart');
            if(!empty($cart['location']['lat'])){
                return redirect(route('treatments.booking.step1'));
            }else{
                if(Auth::user()->user_type == '1'){
                    return redirect(route('practitioner.dashboard'));
                }else if(Auth::user()->user_type == '2'){
                    return redirect(route('booker.index'));
                }
            }

        }else{

            return redirect()->back()->with('error', 'Authentication Error.');
        }
    }


    function register(){

        return view('web.new.register');
    }
    function registerPro(){

        return view('web.new.registerPro');
    }

    function registerSubmit(Request $request){
        $data = $request->all();
        if($data['password'] == $data['confirmation_password']){
        $u = User::where('email', $data['email'])->first();
        if(empty($u->id)){

            $user = User::newUser($data); $email['user'] = $user;
            if($request->userType == 2 ){
                $email_temp = 'CustomerActivation';
                $msg = 'Thanks for joining the Wellbe Community. An activation email has been sent, please click the link in the email to activate your account.';
            }else{
                $email_temp = 'PractitionerActivation';
                $msg = 'Thanks for joining the Wellbe Community. An activation email has been sent, please click the link in the email to activate your account.';
            }
            $a = \App\Helpers\CommonHelpers::send_email($email_temp, $email, $request->email, 'Activate Your Wellbe Account', $from_email = 'info@divsnpixel.com', $from_name = 'Wallbe');
            return redirect()->back()->with('success', $msg);
        }else{

            return redirect()->back()->with('error', 'Sorry, an account already exists with that email address. Please try and login or reset your password.');
        }
    }else{

        return redirect()->back()->with('error', 'Password does not matched.');
    }

    }
}
