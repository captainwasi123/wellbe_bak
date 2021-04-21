<?php

namespace App\Http\Controllers\practitioner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Models\User;
use App\Models\UserAddress;

class profileController extends Controller
{
    
    function index(){
        $data = array(
            'user_data' => User::with(['user_address'])->where('id',auth()->user()->id)->first(), 
            'user_data' => auth()->user(),

        );
    	return view('practitioner.profile.general')->with($data);
    }
    public function profile_save(Request $request)
    { 
        // if($request->hasFile('profile_img')){
        //  echo   $user_img =  \App\Helpers\CommonHelpers::uploadSingleFile($request->profile_img, 'public/upload/user_images/', 'png,gif,jpeg,jpg');
        // //    $user->profile_img = $user_img;
        // } die();
        $user = User::where('id',$request->user_id)->first();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->gender = $request->gender;
        $user->bio_description = $request->bio;
        if($request->hasFile('profile_img')){
            $user_img =  \App\Helpers\CommonHelpers::uploadSingleFile($request->profile_img, 'public/upload/user_images/', 'png,gif,jpeg,jpg');
            $user->profile_img = $user_img;
        }
        $user->save();

        $address = UserAddress::where('user_id',$request->user_id)->first();
        $address->street = $request->street;
        $address->suburb = $request->suburb;
        $address->city = $request->city;
        $address->postcode = $request->postcode;
        $address->state = $request->state;
        $address->country_id = $request->country_id;
        $address->save();

        return redirect()->route('practitioner.profile')->with('success',"Profile Updated Successfully");
    }
}
