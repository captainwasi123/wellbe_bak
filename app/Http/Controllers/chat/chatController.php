<?php

namespace App\Http\Controllers\chat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\orders\order;
use App\Models\orders\chat;
use App\Events\sendChat;
use Pusher\Pusher;
use Auth;

class chatController extends Controller
{
    //

    function conversation($order){
    	$id = base64_decode(base64_decode($order));
    	$data = order::find($id);
    	$type = Auth::user()->user_type == '2' ? 'booker' : 'practitioner';
    	$conversation = chat::where('order_id', $id)->get();

    	return view('includes.response.chat', ['data' => $data, 'conversation' => $conversation, 'type' => $type]);
    }

    function sendChat(Request $request){
    	$data = $request->all();
    	$order = order::find(base64_decode(base64_decode($data['chatRef'])));
    	$rec_id = Auth::user()->user_type == '1' ? base64_encode($order->booker_id) : base64_encode($order->pract_id);
    	$time = chat::newChat($data);
    	$data_re = array(
                'status' => 200,
                'message' => '<div class="outgoing_msg"><div class="sent_msg"><p>'.$data['message'].'</p><span class="time_date">'.$time->diffForHumans().'</span></div></div>',
            );

    	$pusher = new Pusher(
                    env('PUSHER_APP_KEY'), 
                    env('PUSHER_APP_SECRET'), 
                    env('PUSHER_APP_ID'), 
                    array(
                        'cluster' => env('PUSHER_APP_CLUSTER')
                    )
                );
        
        $img = empty(Auth::user()->profile_img) ? '/public/assets/images/user-placeholder.png' : Auth::user()->profile_img;
        $pusher->trigger('send-chatChannel.'.$rec_id, 'sendChat', 
                    array(
                    	'order_id'	=> $order->id,
                        'message'   => $data['message'], 
                        'image'     => $img,
                        'timestamp' => $time->diffForHumans()
                    )
                );
    	
    	return $data_re;
    }
}
