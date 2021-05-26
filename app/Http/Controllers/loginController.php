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

    public function userRegister(Request $request){
        $data = $request->all();
        if($data['password'] == $data['confirmation_password']){
            $u = User::where('email', $data['email'])->count();
            if($u == '0'){
                $user = User::newUser($data); $email['user'] = $user;
                if($request->userType == 2 ){ $email_temp = 'CustomerActivation'; }else{$email_temp = 'PractitionerActivation'; } 
                $a = \App\Helpers\CommonHelpers::send_email($email_temp, $email, $request->email, 'email verification', $from_email = 'info@divsnpixel.com', $from_name = 'Wallbe');
                return redirect()->back()->with('success', 'You are successfully registered..');
            }else{

                return redirect()->back()->with('error', 'This email is already Registered.');
            }
        }else{
            
            return redirect()->back()->with('error', 'Password does not matched.');
        }

    }
    public function user_active(Request $request)
    {
        $id = base64_decode($request->id);
        $user = User::find($id);
        $user->status = '1';
        $user->save();
        $email['user'] = $user;
        if($user->user_type == 2 ){ $email_temp = 'WelcomeEmailCustomer'; }else{$email_temp = 'WelcomeEmailPractitioner'; } 
        \App\Helpers\CommonHelpers::send_email($email_temp, $email, $user->email, 'email verification', $from_email = 'info@divsnpixel.com', $from_name = 'Wallbe');
        // DB::table('tbl_users_info')
        //         ->where('id', base64_decode($request->id))
        //         ->update(['status' => 1]);
        return redirect(route('home'));        
    }
    function logout(){
        Auth::logout();

        return redirect('/');
    }
}
