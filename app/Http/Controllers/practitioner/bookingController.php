<?php

namespace App\Http\Controllers\practitioner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\orders\order;
use App\Models\MarketplaceSetting;

class bookingController extends Controller
{


    function upcomming_booking(){
        $curr = date('Y-m-d H:i:s');
        $data = order::where('pract_id', Auth::id())
                        ->where('start_at', '>=', $curr)
                        ->where('status', '1')
                        ->orderBy('start_at')
                        ->get();

    	return view('practitioner.bookings.upcomming', ['data' => $data]);
    }

    function inprogress_booking(){

        $data = order::where('pract_id', Auth::id())
                        ->where('status', '2')
                        ->orderBy('start_at')
                        ->get();

    	return view('practitioner.bookings.inprogress', ['data' => $data]);
    }

    function completed_booking(){

        $data = order::where('pract_id', Auth::id())
                        ->where('status', '3')
                        ->orderBy('start_at', 'desc')
                        ->get();

    	return view('practitioner.bookings.completed', ['data' => $data]);
    }

    function cancelled_booking(){

        $data = order::where('pract_id', Auth::id())
                        ->where('status', '4')
                        ->orderBy('start_at', 'desc')
                        ->get();

    	return view('practitioner.bookings.cancelled', ['data' => $data]);
    }



    //Response

    function bookingView1($id){
        $id = base64_decode($id);
        $data = order::find($id);

        $gst = MarketplaceSetting::latest()->first();

        return view('practitioner.bookings.response.view1', ['data' => $data, 'gst' => $gst->gst]);
    }
}
