<?php

namespace App\Http\Controllers\practitioner;

use App\Models\User;
use App\Models\Store;
use App\Models\Country;
use App\Models\UserAddress;
use App\Models\UserGeofence;
use Illuminate\Support\Arr;
use App\Models\PayoutDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\MarketplaceSetting;

class profileController extends Controller
{

    function index(){
        $data = array(
            'user_data' => User::with(['user_address','user_store','users_payout_details'])->where('id',auth()->user()->id)->first(),
            'country_data' => Country::latest()->get(),
            'gst' => MarketplaceSetting::latest()->first(),
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

    public function change_password (Request $request){
        $user = User::find($request->id);
        $hashedPassword = Hash::check($request->current_password, $user->password);

        if(!Hash::check($request->new_password, $user->password)){
            if ($hashedPassword) {
                $user->password = Hash::make($request->new_password);
                $user->save();
                return redirect()->back()->with('success','Password Update Successfully');
            }else{
                echo "old password doesnt matched";
                return redirect()->back()->with('error','old password doesnt matched');
            }
        }else{
            echo "new password can not be the old password!";
            return redirect()->back()->with('error','new password can not be the old password!');
        }
    }

    public function geofences()
    {
        $data = array(
            'title' => "Geofences",
            'geofences_data' => UserGeofence::where('user_id',auth()->user()->id)->first(),
        );
        return view('practitioner.profile.geofences')->with($data);
    }
    public function geofences_save(request $request)
    { 
        $geofences = UserGeofence::where('user_id',auth()->user()->id)->first(); 
        if ($geofences == null) {
            $geofences_data = new UserGeofence();
        }else{ $geofences_data = $geofences; }
        
        $geofences_data->user_id = auth()->user()->id;
        $geofences_data->lat = $request->lat;
        $geofences_data->lng = $request->long;
        $geofences_data->radious = $request->radious;
        $geofences_data->name = $request->name;
        $geofences_data->description = $request->description;
        $geofences_data->save();

        return redirect()->back()->with('success','Geofences Added Successfully');
    }
}
