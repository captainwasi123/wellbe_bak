<?php

namespace App\Http\Controllers\practitioner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\orders\order;
use App\Models\orders\cancel;
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

    //Cancel

    function bookingCancel(Request $request){
        $data = $request->all();
        $id = base64_decode(base64_decode($data['oid']));
        $des = $data['description'];

        cancel::cancellation($id, $des, '1');

        $order = Order::with(['details','practitioner','booker'])->where('id',$id)->first();
        $data['order'] = $order; 
        $data['mtp'] = MarketplaceSetting::latest()->first();
        \App\Helpers\CommonHelpers::send_email('BookingCancellationCustomer_other', $data, $order->booker->email, 'Booking Cancellation', $from_email = 'info@divsnpixel.com', $from_name = 'Wallbe');
        \App\Helpers\CommonHelpers::send_email('BookingCancellationPractitioner', $data, $order->practitioner->email, 'Booking Cancellation', $from_email = 'info@divsnpixel.com', $from_name = 'Wallbe');         
        
        return redirect()->back()->with('success', 'Order Cancelled.');
    }


    //Start Booking
    function bookingStart($id){
        $id = base64_decode(base64_decode($id));

        $o = order::find($id);
        $o->status = '2';
        $o->save();

        return redirect()->back()->with('success', 'Order Service Started.');

    }

    //Complete Booking
    function bookingComplete($id){
        $id = base64_decode(base64_decode($id));

        $o = order::find($id);
        $o->status = '3';
        $o->save();

        return redirect()->back()->with('success', 'Order Completed.');

    }
}
