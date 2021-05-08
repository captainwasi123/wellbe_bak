<?php

namespace App\Models\orders;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Auth;

class chat extends Model
{
    use HasFactory;

    protected $table = 'tbl_order_chat_conversation';

    public static function newChat(array $data){
    	$c = new chat;
    	$c->order_id = base64_decode(base64_decode($data['chatRef']));
    	$c->user_id = Auth::id();
    	$c->message = $data['message'];
    	$c->save();

    	return date('h:i A | d-M-Y', strtotime($c->created_at));
    }

    public function user(){
    	return $this->belongsTo(User::class, 'user_id');
    }
}
