<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;

class webController extends Controller
{
    //
    function index(){

        return view('web.new.index');
    }



    function workWithUs(){

        return view('web.new.work_with_us');
    }

    function ourStory(){

        
        return view('web.new.our_story');
    }

    function countactUs(){

        return view('web.new.countact_us');
    }

    function countactUsmail(Request $request){

        
            $this->validate($request, [
             'name'     =>  'required',
             'email'  =>  'required|email',
             'messages' =>  'required'
            ]);
       
               $data = array(
                   'name'      =>  $request->name,
                   'messages'   =>   $request->messages,
                   'email'      =>  $request->email
               );
               
       
             
               Mail::send('emails.query', $data, function($message)  {
                $message->to('captain.wasi@gmail.com')
                ->subject("Query From Wellbe.co.nz");
                $message->from("noreply@wellbe.co.nz", 'Wellbe');
                });
            return redirect()->back()->with('success', 'Your query  has been sent successfully');
       
           

        
    }

    function FAQ(){

        
        return view('web.new.faq');
    }

    function TermCondition(){

        
        return view('web.new.TermCondition');
    }

    function PractitionerAgree(){

        
        return view('web.new.PractitionerAgree');
    }

    function  PrivacyPolicy(){

        
        return view('web.new.PrivacyPolicy');
    }

    function  CookiePolicy(){

        
        return view('web.new.CookiePolicy');
    }
    
   

}
