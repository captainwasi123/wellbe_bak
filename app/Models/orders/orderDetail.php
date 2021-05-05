<?php

namespace App\Models\orders;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\orders\order;
use App\Models\services\services;

class orderDetail extends Model
{
    use HasFactory;

    protected $table = 'tbl_order_detail_info';

    public $timestamps = false;
    
    public static function addDetail(array $data){
    	$ser = services::find($data['service_id']);
    	$end_time = date('H:i:s',strtotime('+'.$ser->duration.' minutes',strtotime($data['start_time'])));
    	$d = new orderDetail;
    	$d->order_id = $data['order_id'];
    	$d->service_id = $data['service_id'];
    	$d->qty = $data['qty'];
    	$d->price = ($ser->price*$data['qty']);
    	$d->serve_date = date('Y-m-d', strtotime($data['serve_date']));
    	$d->start_time = $data['start_time'];
    	$d->end_time = $end_time;
    	$d->save();

    	return $end_time;
    }


    public function order(){
    	return $this->belongsTo(order::class, 'order_id');
    }
    public function service(){
    	return $this->belongsTo(services::class, 'service_id');
    }
}
