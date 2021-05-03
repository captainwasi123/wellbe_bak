<?php

namespace App\Models\orders;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
use App\Models\orders\order;

class cancel extends Model
{
    use HasFactory;

    protected $table = 'tbl_order_cancellation_info';

    public static function cancellation($id, $des, $type){
    	$c = new cancel;
    	$c->order_id 	= $id;
    	$c->reason 		= $des;
    	if($type == '1'){
    		$c->user_id = Auth::id();
    	}else{
    		$c->is_admin = '1';
    	}
    	$c->save();

    	$o = order::find($id);
    	$o->status = '4';
    	$o->save();
    }
}
