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
    	$o = order::find($id);
    	$o->status = '4';
    	$o->save();

    	$c = new cancel;
    	$c->order_id 	= $id;
    	$c->reason 		= $des;
    	if($type == '1'){
    		$c->user_id = Auth::id();
    	}else{
    		$c->is_admin = '1';
    	}
    	$c->save();

        $pract_percentage = 0;
        $cust_percentage = 0;

          if($o->pract_id == Auth::id()){
             $pract_percentage = 0;
             $cust_percentage = 100;
          }else{
             $timestamp1 = strtotime($o->start_at.' '.$o->details[0]->start_time);
             $timestamp2 = strtotime($c->created_at);
             $hours_gap = abs($timestamp2 - $timestamp1)/(60*60);
             if(date('Y-m-d H:i:s', strtotime($o->start_at.' '.$o->details[0]->start_time)) <= date('Y-m-d H:i:s', strtotime($c->created_at))){
                $pract_percentage = 75;
                $cust_percentage = 0;
             }else{
                if($hours_gap > 24){
                   $pract_percentage = 0;
                   $cust_percentage = 100;
                }elseif($hours_gap > 2 && $hours_gap <= 24){
                   $pract_percentage = 0;
                   $cust_percentage = 75;
                }elseif($hours_gap < 2){
                   $pract_percentage = 75;
                   $cust_percentage = 0;
                }
             }
          }

        $c->pract_per = $pract_percentage;
        $c->cust_per = $cust_percentage;
        $c->save();
    }
}
