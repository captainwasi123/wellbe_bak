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
        //Time gap
        $timestamp1 = strtotime($data->start_at.' '.$data->details[0]->start_time);
        $timestamp2 = strtotime("now");
        $hours_gap = round(($timestamp1 - $timestamp2)/3600, 1);
        if($hours_gap <= 4){
    	   $type = Auth::user()->user_type == '2' ? 'booker' : 'practitioner';
    	   $conversation = chat::where('order_id', $id)->get();

    	   return view('includes.response.chat', ['data' => $data, 'conversation' => $conversation, 'type' => $type]);
        }else{
            return 'fail';
        }
    }

    function sendChat(Request $request){
    	$data = $request->all();
    	$order = order::with(['booker'])->find(base64_decode(base64_decode($data['chatRef'])));
    	$rec_id = Auth::user()->user_type == '1' ? base64_encode($order->booker_id) : base64_encode($order->pract_id);
    	$time = chat::newChat($data);
        $emai_data['order'] = $order;
        $emai_data['user'] = Auth::user();
        $emai_data['chat_msg'] = $data['message'];
        $emai_data['msg_time'] = $time;
        \App\Helpers\CommonHelpers::send_email('NewMessage', $emai_data, Auth::user()->email, 'New Message Received', $from_email = 'info@wellbe.co.nz', $from_name = 'Wellbe');
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
