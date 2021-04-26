<?php

namespace App\Http\Controllers\practitioner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Models\Country;
use App\Models\User;
use App\Models\UserAddress;
use App\Models\Store;
use App\Models\PayoutDetail;

class profileController extends Controller
{

    function index(){
        $data = array(
            'user_data' => User::with(['user_address','user_store','users_payout_details'])->where('id',auth()->user()->id)->first(),
            'country_data' => Country::latest()->get(),
            // 'user_data' => auth()->user(),

        );
    	return view('practitioner.profile.general')->with($data);
    }
    public function profile_save(Request $request)
    {
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
        $check_address = UserAddress::where('user_id',$request->user_id)->first();

        if(!empty($check_address)){
            $address = $check_address;
        }else{
            $address = new UserAddress();
        }
        $address->user_id = $request->user_id;
        $address->street = $request->street;
        $address->suburb = $request->suburb;
        $address->city = $request->city;
        $address->postcode = $request->postcode;
        $address->state = $request->state;
        $address->country_id = $request->country;
        $address->save();

        $check_store = Store::where('user_id',$request->user_id)->first();
        if(!empty($check_store)){
            $store = $check_store;
        }else{
            $store = new Store();
        }
        $store->user_id = $request->user_id;
        $store->offer_services = $request->offer_services;
        $store->minimum_booking_amount = $request->minimum_booking_amount;
        $store->buffer_between_appointments = $request->buffer_between_appointments;
        $store->save();

        $check_PayoutDetail = PayoutDetail::where('user_id',$request->user_id)->first();
        if(!empty($check_PayoutDetail)){
            $PayoutDetail = $check_PayoutDetail;
        }else{
            $PayoutDetail = new PayoutDetail();
        }

        $PayoutDetail->user_id = $request->user_id;
        $PayoutDetail->bank_account_name = $request->bank_name;
        $PayoutDetail->bank_account_number = $request->account_number;
        $PayoutDetail->save();

        return redirect()->route('practitioner.profile')->with('success',"Profile Updated Successfully");
    }
}
