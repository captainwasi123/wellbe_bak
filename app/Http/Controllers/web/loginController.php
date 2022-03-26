<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Hash;
use Mail;
use Session;

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

        }
        elseif (Auth::attempt(['email' => $data['email'], 'password' => $data['password'], 'status' => '0'])) {
            
            session()->put('email', $data['email']);
            $msg = '';
            if(Auth::user()->user_type == '1'){
                $msg = 'Your practitioner account is currently being verified and one of our onboarding specialists will be in touch with you shortly.';
                
                Auth::logout();
                return redirect()->back()->with('error', $msg);
            }else{
                $msg = 'Your account has not been activated. Please click on the link in your account activation email before logging in.';

                Auth::logout();
                return redirect()->back()->with('error_act', $msg);
            }
        }
        elseif (Auth::attempt(['email' => $data['email'], 'password' => $data['password'], 'status' => '2'])) {
            
            session()->put('email', $data['email']);
            Auth::logout();
            return redirect()->back()->with('error', 'Your practitioner account is currently being verified and one of our onboarding specialists will be in touch with you shortly.');
        }
        else{
            session()->put('email', $data['email']);
            
            return redirect()->back()->with('error', 'Incorrect email or password.');
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
                $a = \App\Helpers\CommonHelpers::send_email($email_temp, $email, $request->email, 'Activate Your Wellbe Account', $from_email = 'info@wellbe.co.nz', $from_name = 'Wellbe');
                if($email_temp == 'PractitionerActivation'){
                    return redirect(route('thanks'));
                }else{
                    return redirect()->back()->with('success', $msg);
                }
            }else{

                return redirect()->back()->with('error', 'Sorry, an account already exists with that email address. Please try and login or reset your password.');
            }
        }else{

            return redirect()->back()->with('error', 'Passwords do not match.');
        }
    }

    function showForgetPasswordForm(){

        return view('web.new.forgetpassword');
    }

    function submitForgetPasswordForm(Request $request){

        $data = User::where('email', $request->email)->get();

        foreach ($data as $val) {

                $to_name = $val->first_name;

                $request->validate([
                    'email' => 'required|email|exists:tbl_users_info',
                ]);

                $token = Str::random(64);

                DB::table('password_resets')->insert([
                    'email' => $request->email,
                    'token' => $token,
                    'first_name' => $to_name,
                    'created_at' => Carbon::now()
                ]);

                Mail::send('emails.forgetPassword', ['token' => $token,'first_name' => $to_name] , function($message) use($request,$to_name){
                    $message->to($request->email);
                    $message->cc('info@wellbe.co.nz');
                    $message->subject('Reset Password');
                });

        }

        return back()->with('message', 'A password reset link has been sent to the email address below.');

    }

    public function showResetPasswordForm($token) {

        return view('web.new.forgetPasswordLink', ['token' => $token]);
     }


     public function submitResetPasswordForm(Request $request)
    {
          $request->validate([

              'password' => '|required_with:confirmation_password|same:confirmation_password',
              'confirmation_password' => 'required'
          ]);
          $updatePassword = DB::table('password_resets')
                              ->where([ 'token' => $request->token])->first();

          if(!$updatePassword){
              return back()->withInput()->with('error', 'Invalid token!');
          }
          $user = User::where('email', $updatePassword->email)->update(['password' => Hash::make($request->password)]);
                  DB::table('password_resets')->where(['email'=> $updatePassword->email])->delete();

          return redirect('login')->with('message', 'Password reset successfully. Please login using your new credentials');

      }
    function thanks(){

        return view('web.new.thanks');
    }

    function resendMail(){
        $uemail = session()->get('email');
        $u = User::where('email', $uemail)->first();
        if(!empty($u->id)){

            $email['user'] = $u;
            $email_temp = 'CustomerActivation';
            
            $a = \App\Helpers\CommonHelpers::send_email($email_temp, $email, $uemail, 'Activate Your Wellbe Account', $from_email = 'info@wellbe.co.nz', $from_name = 'Wellbe');
            
            return redirect()->back()->with('message', 'Activation Email sent successfully.');
            
        }else{

            return redirect()->back()->with('error', 'User Not Found.');
        }
    }
}
