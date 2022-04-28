<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Facade\FlareClient\Http\Response;
use App\Models\User;
use DB;

class loginController extends Controller
{

    function index(){

        return view('login');
    }

    function loginAttempt(Request $request){
        $data = $request->all();

        if(Auth::attempt(['email' => $data['email'], 'password' => $data['password'], 'status' => '1'])){
            $cart = session()->get('cart');
            if(count($cart) > 0){
                return redirect(route('treatments.booking.step1'));
            }else{
                if(Auth::user()->user_type == '1'){
                    return redirect(route('practitioner.dashboard'));
                }else if(Auth::user()->user_type == '2'){
                    return redirect(route('booker.index'));
                }
            }

        }else{

            return redirect()->back()->with('error', 'Incorrect username or password.');
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


    public function ajaxloginAttempt2(Request $request)
    {
        $data = $request->all();

        if(Auth::attempt(['email' => $data['email'], 'password' => $data['password'], 'status' => '1'])){
            if(Auth::user()->user_type == '1'){
                $data = array(
                    'status' => 200,
                    'user_type' => 1,
                    'route' =>  redirect()->back(),
                );
                return $data;
                // return redirect(route('practitioner.dashboard'));
            }else if(Auth::user()->user_type == '2'){
                $data = array(
                    'status' => 200,
                    'user_type' => 2,
                    'route' => redirect()->back(),
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

    public function userRegister(Request $request){
        $data = $request->all();
        if($data['password'] == $data['confirmation_password']){
            $u = User::where('email', $data['email'])->count();
            if($u == '0'){
                $user = User::newUser($data);
                $email['user'] = $user;
                if($request->userType == 2 ){
                    $email_temp = 'CustomerActivation';
                    $msg = 'Thanks for joining the Wellbe Community. An activation email has been sent, please click the link in the email to activate your account.';
                }else{
                    $email_temp = 'PractitionerActivation';
                    $msg = 'Thanks for joining the Wellbe Community. An activation email has been sent, please click the link in the email to activate your account.';
                }
                $a = \App\Helpers\CommonHelpers::send_email($email_temp, $email, $request->email, 'Activate Your Wellbe Account', $from_email = 'info@wellbe.co.nz', $from_name = 'Wellbe');
                return redirect()->back()->with('success', $msg);
            }else{

                return redirect()->back()->with('error', 'Sorry, we already have an account registered with that email address. Please try resetting your password.');
            }
        }else{ 

            return redirect()->back()->with('error', 'Passwords do not match.');
        }

    }
    public function user_active(Request $request)
    {
        $id = base64_decode($request->id);
        $user = User::find($id);

        $email['user'] = $user;
        if($user->user_type == 2 ){
            $email_temp = 'WelcomeEmailCustomer';
            $user->status = '1';
            Auth::login($user);
            $url = redirect(route('booker.index'))->with('active', 'Your account has been verified.');
        }else{
            $email_temp = 'WelcomeEmailPractitioner';
            $user->email_verify = '1';
            $url = redirect(route('home'))->with('success', 'Your account has been verified');
        }
        $user->save();
        \App\Helpers\CommonHelpers::send_email($email_temp, $email, $user->email, 'Welcome to Wellbe, '.$user->first_name.'!', $from_email = 'info@wellbe.co.nz', $from_name = 'Wellbe');
        return $url;
    }
    function logout(){
        Auth::logout();

        return redirect('/');
    }
}
