<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\services\services;
use App\Models\userService;
use App\Models\schedule\holidays;
use App\Models\MarketplaceSetting;
use DB;

class bookingController extends Controller
{
    //
    function step1Session(Request $request){
        $data = $request->all();
        $cart = session()->get('cart');
        $cart['location'] = [
                "lat"    => $data['lat'],
                "lng"    => $data['lng'],
                "place"    => $data['place'],
        ];
        session()->put('cart', $cart);

        return redirect(route('treatments.booking.step1'));
    }
    function step1(){
        $day = date('l');
        $cart = session()->get('cart');
        $lat = $cart['location']['lat'];
        $lng = $cart['location']['lng'];
        // get average  query
        $avg = DB::select('SELECT AVG(tbl_users_geofences.radious) as avg, tbl_users_geofences.*, ( 6371 * acos( cos( radians("'.$lat.'") ) * cos( radians(lat ) ) * cos( radians(lng ) - radians("'.$lng.'") ) + sin( radians("'.$lat.'") ) * sin( radians(lat ) ) ) ) AS distance FROM `tbl_users_geofences` WHERE ( 6371 * acos( cos( radians("'.$lat.'") ) * cos( radians(lat ) ) * cos( radians(lng ) - radians("'.$lng.'") ) + sin( radians("'.$lat.'") ) * sin( radians(lat ) ) ) ) < 50');

        // get user ids
        $users_ids = DB::select('SELECT tbl_users_geofences.*, ( 6371 * acos( cos( radians("'.$lat.'") ) * cos( radians(lat ) ) * cos( radians(lng ) - radians("'.$lng.'") ) + sin( radians("'.$lat.'") ) * sin( radians(lat ) ) ) ) AS distance FROM `tbl_users_geofences` WHERE ( 6371 * acos( cos( radians("'.$lat.'") ) * cos( radians(lat ) ) * cos( radians(lng ) - radians("'.$lng.'") ) + sin( radians("'.$lat.'") ) * sin( radians(lat ) ) ) ) <= "'.$avg[0]->avg.'"');

        $userArr = \Arr::pluck($users_ids,'user_id');
        
        $services = array();
        $unavailable = array();
        $cart = session()->get('cart');

        foreach($cart['services'] as $val){
            array_push($services, base64_decode($val['id']));
        }

        $hdate['date']=date('Y-m-d');
        $holidays=holidays::where('closed_date',$hdate['date'])->get();
        foreach($holidays as $val){
            array_push($unavailable, $val->user_id); 
        }
        $data['day'] = $day;
        $data['date'] = date('Y-m-d');
        $data['users'] = User::where('status', '1')
                        ->where('store_status', '1')
                        ->whereHas('services', function($q) use ($services){
                            return $q->whereIn('service_id', $services);
                        })
                        ->whereHas('availability', function($q) use ($day){
                            return $q->where('week_day', $day);
                        })
                        ->whereIn('id', $userArr)
                        ->whereNotIn('id', $unavailable)
                        ->get();

        $data['marketplace_data'] = MarketplaceSetting::latest()->first();

        return view('web.new.booking.step1')->with($data);
    }
    function step1Summary(Request $request){
        $data = $request->all();
        $cart = session()->get('cart');
        foreach($cart['services'] as $val){
            $ser = services::find(base64_decode($val['id']));
            $rate = userService::where(['user_id' => base64_decode($data['id']), 'service_id' => base64_decode($val['id'])])->first();
            $price = empty($rate->id) ? $ser->price : $rate->price;

            $cart['services'][base64_decode($val['id'])]['price'] = $price;
        }

        session()->put('cart', $cart);

        $data['marketplace_data'] = MarketplaceSetting::latest()->first();
        
        return view('web.new.booking.response.summary')->with($data);
    }


    function step2Session(Request $request){
        $data = $request->all();
        $cart = session()->get('cart');
        $cart['booking'] = [
                "date"    => $data['booking_date'],
                "time"    => $data['booking_time'],
                "practitioner"    => $data['booking_prac'],
        ];
        session()->put('cart', $cart);

        return redirect(route('treatments.booking.step2'));
    }
    function step2(){
        $cart = session()->get('cart');

        $data['user'] = User::find(base64_decode($cart['booking']['practitioner']));

        $data['marketplace_data'] = MarketplaceSetting::latest()->first();
        return view('web.new.booking.step2')->with($data);
    }

    function instructions(Request $request){
        $cart = session()->get('cart');
        $cart['booking']["instruction"] = $request->instructions;
        session()->put('cart', $cart);

        return redirect()->back();
    }

    //Professional Profile
        function viewProfile($id){
            $id = base64_decode($id);

            $data = User::find($id);

            return view('web.new.booking.response.profile', ['data' => $data]);
        }

        function getProfessionals(Request $request){
            $day = date('l', strtotime($request->date));
            $services = array();
            $unavailable = array();
            $cart = session()->get('cart');
            $lat = $cart['location']['lat'];
            $lng = $cart['location']['lng'];
            // get average  query
            $avg = DB::select('SELECT AVG(tbl_users_geofences.radious) as avg, tbl_users_geofences.*, ( 6371 * acos( cos( radians("'.$lat.'") ) * cos( radians(lat ) ) * cos( radians(lng ) - radians("'.$lng.'") ) + sin( radians("'.$lat.'") ) * sin( radians(lat ) ) ) ) AS distance FROM `tbl_users_geofences` WHERE ( 6371 * acos( cos( radians("'.$lat.'") ) * cos( radians(lat ) ) * cos( radians(lng ) - radians("'.$lng.'") ) + sin( radians("'.$lat.'") ) * sin( radians(lat ) ) ) ) < 50');

            // get user ids
            $users_ids = DB::select('SELECT tbl_users_geofences.*, ( 6371 * acos( cos( radians("'.$lat.'") ) * cos( radians(lat ) ) * cos( radians(lng ) - radians("'.$lng.'") ) + sin( radians("'.$lat.'") ) * sin( radians(lat ) ) ) ) AS distance FROM `tbl_users_geofences` WHERE ( 6371 * acos( cos( radians("'.$lat.'") ) * cos( radians(lat ) ) * cos( radians(lng ) - radians("'.$lng.'") ) + sin( radians("'.$lat.'") ) * sin( radians(lat ) ) ) ) <= "'.$avg[0]->avg.'"');

            $userArr = \Arr::pluck($users_ids,'user_id');

            foreach($cart['services'] as $val){
                array_push($services, base64_decode($val['id']));
            }
            $data['day'] = $day;
            $data['date'] = date('Y-m-d', strtotime($request->date));
            $holidays=holidays::where('closed_date',$data['date'])->get();
            foreach($holidays as $val){
                array_push($unavailable, $val->user_id); 
            }
            $data['users'] = User::where('status', '1')
                            ->where('store_status', '1')
                            ->whereIn('id', $userArr)
                            ->whereNotIn('id', $unavailable)
                            ->whereHas('services', function($q) use ($services){
                                return $q->whereIn('service_id', $services);
                            })
                            ->whereHas('availability', function($q) use ($day){
                                return $q->where('week_day', $day);
                            })
                            ->get();

            //return json_encode($userArr);

            return view('web.new.booking.response.step1')->with($data);
        }
}
