<?php

namespace App\Http\Controllers\chat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\orders\order;
use App\Models\orders\chat;
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
    	$time = chat::newChat($data);
    	$data_re = array(
                'status' => 200,
                'message' => '<div class="outgoing_msg"><div class="sent_msg"><p>'.$data['message'].'</p><span class="time_date">'.$time.'</span></div></div>',
            );
    	return $data_re;
    }
}
