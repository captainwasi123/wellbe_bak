<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\services\services;
use App\Models\services\addons;
use App\Models\userService;
use App\Models\userAddon;
use App\Models\schedule\holidays;
use App\Models\MarketplaceSetting;
use DB;
use Session;

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
        $addons = array();
        $unavailable = array();
        $cart = session()->get('cart');

        $advalidate = 0;
        foreach($cart['services'] as $val){
            foreach($val as $it){
                array_push($services, base64_decode($it['id']));
                foreach($it['addons'] as $vall){
                    array_push($addons, $vall['id']);
                    $advalidate = 1;
                }
            }
        }

        $hdate['date']=date('Y-m-d');
        $holidays=holidays::where('closed_date',$hdate['date'])->get();
        foreach($holidays as $val){
            array_push($unavailable, $val->user_id); 
        }
        $sort = Session::get('sorting');
        $data['day'] = $day;
        $data['date'] = date('Y-m-d');
        $data['users'] = User::where('status', '1')
                        ->where('store_status', '1')
                        ->whereHas('services', function($q) use ($services){
                            return $q->whereIn('service_id', $services);
                        })
                        ->when($advalidate != 0, function($qe) use ($addons){
                            return $qe->whereHas('addons', function($q) use ($addons){
                                return $q->whereIn('addon_id', $addons);
                            });
                        })
                        ->whereHas('availability', function($q) use ($day){
                            return $q->where('week_day', $day);
                        })
                        ->when(!empty($sort) && $sort == '1', function($q){
                            return $q->withAvg('reviews', 'rating')->orderBy('reviews_avg_rating', 'desc');
                        })
                        ->whereIn('id', $userArr)
                        ->whereNotIn('id', $unavailable)
                        ->get();
                        //dd($data['users']);
        $data['marketplace_data'] = MarketplaceSetting::latest()->first();

        return view('web.new.booking.step1')->with($data);
    }
    function step1Summary(Request $request){
        $data = $request->all();
        $cart = session()->get('cart');
        foreach($cart['services'] as $val){
            foreach($val as $mkey => $it){
                $ser = services::find(base64_decode($it['id']));
                $rate = userService::where(['user_id' => base64_decode($data['id']), 'service_id' => base64_decode($it['id'])])->first();
                $price = empty($rate->id) || $rate->price == 0 ? $ser->price : $rate->price;

                $cart['services'][base64_decode($it['id'])][$mkey]['price'] = $price;

                foreach($it['addons'] as $key => $adval){
                    $add = addons::find($adval['id']);
                    $uadd = userAddon::where('user_id', base64_decode($data['id']))->where('addon_id', $adval['id'])->first();

                    $aprice = empty($uadd->id) || $uadd->price == 0 ? $add->addonsDetail[0]->price : $uadd->price;

                    $cart['services'][base64_decode($it['id'])][$mkey]['addons'][$key]['price'] = $aprice;
                }
            }
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
        if(empty($cart['booking']['practitioner'])){
            return redirect('/');
        }else{
            $data['user'] = User::find(base64_decode($cart['booking']['practitioner']));

            $data['marketplace_data'] = MarketplaceSetting::latest()->first();
            return view('web.new.booking.step2')->with($data);
        }
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
            $addons = array();
            $unavailable = array();
            $cart = session()->get('cart');
            $lat = $cart['location']['lat'];
            $lng = $cart['location']['lng'];
            // get average  query
            $avg = DB::select('SELECT AVG(tbl_users_geofences.radious) as avg, tbl_users_geofences.*, ( 6371 * acos( cos( radians("'.$lat.'") ) * cos( radians(lat ) ) * cos( radians(lng ) - radians("'.$lng.'") ) + sin( radians("'.$lat.'") ) * sin( radians(lat ) ) ) ) AS distance FROM `tbl_users_geofences` WHERE ( 6371 * acos( cos( radians("'.$lat.'") ) * cos( radians(lat ) ) * cos( radians(lng ) - radians("'.$lng.'") ) + sin( radians("'.$lat.'") ) * sin( radians(lat ) ) ) ) < 50');

            // get user ids
            $users_ids = DB::select('SELECT tbl_users_geofences.*, ( 6371 * acos( cos( radians("'.$lat.'") ) * cos( radians(lat ) ) * cos( radians(lng ) - radians("'.$lng.'") ) + sin( radians("'.$lat.'") ) * sin( radians(lat ) ) ) ) AS distance FROM `tbl_users_geofences` WHERE ( 6371 * acos( cos( radians("'.$lat.'") ) * cos( radians(lat ) ) * cos( radians(lng ) - radians("'.$lng.'") ) + sin( radians("'.$lat.'") ) * sin( radians(lat ) ) ) ) <= "'.$avg[0]->avg.'"');

            $userArr = \Arr::pluck($users_ids,'user_id');

            $advalidate = 0;
            foreach($cart['services'] as $val){
                foreach($val as $it){
                    array_push($services, base64_decode($it['id']));
                    foreach($it['addons'] as $vall){
                        array_push($addons, $vall['id']);
                        $advalidate = 1;
                    }
                }
            }
            $sort = Session::get('sorting');
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
                            ->when($advalidate != 0, function($qe) use ($addons){
                                return $qe->whereHas('addons', function($q) use ($addons){
                                    return $q->whereIn('addon_id', $addons);
                                });
                            })
                            ->whereHas('availability', function($q) use ($day){
                                return $q->where('week_day', $day);
                            })
                            ->when(!empty($sort) && $sort == '1', function($q){
                                return $q->withAvg('reviews', 'rating')->orderBy('reviews_avg_rating', 'desc');
                            })
                            ->get();

            //return json_encode($userArr);

            return view('web.new.booking.response.step1')->with($data);
        }
}
