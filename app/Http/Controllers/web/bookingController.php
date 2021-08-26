<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

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
        $services = array();
        $cart = session()->get('cart');

        foreach($cart['services'] as $val){
            array_push($services, base64_decode($val['id']));
        }
        $data['day'] = $day;
        $data['date'] = date('Y-m-d');
        $data['users'] = User::where('status', '1')
                        ->whereHas('services', function($q) use ($services){
                            return $q->whereIn('service_id', $services);
                        })
                        ->whereHas('availability', function($q) use ($day){
                            return $q->where('week_day', $day);
                        })
                        ->get();

        return view('web.new.booking.step1')->with($data);
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
            $cart = session()->get('cart');

            foreach($cart['services'] as $val){
                array_push($services, base64_decode($val['id']));
            }
            $data['day'] = $day;
            $data['date'] = date('Y-m-d', strtotime($request->date));
            $data['users'] = User::where('status', '1')
                            ->whereHas('services', function($q) use ($services){
                                return $q->whereIn('service_id', $services);
                            })
                            ->whereHas('availability', function($q) use ($day){
                                return $q->where('week_day', $day);
                            })
                            ->get();

            return view('web.new.booking.response.step1')->with($data);
        }
}
