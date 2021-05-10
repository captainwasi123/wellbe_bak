<?php

namespace App\Models\orders;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\orders\orderDetail;
use App\Models\services\services;
use App\Models\orders\reviews;
use App\Models\User;
use App\Models\MarketplaceSetting;
use Auth;

class order extends Model
{
    use HasFactory;

    protected $table = 'tbl_order_info';

    public static function makeOrder(array $data){
        $start_time = $data['start_time'];
        $accounts = array('sub_total' => 0,'total_amount' => 0,'gst' => 0,'pract_earning' => 0);

        $o = new order;
        $o->pract_id = base64_decode($data['refid']);
        $o->booker_id = Auth::id();
        $o->start_at = date('Y-m-d', strtotime($data['booking_date']));
        $o->status = '9';
        $o->save(); 
        $id = $o->id;
        $c = count($data['service']);

        for ($i=0; $i < $c; $i++) { 

            $ser = services::find($data['service'][$i]);
            $end_time = date('H:i:s',strtotime('+'.$ser->duration.' minutes',strtotime($start_time)));
            $d = new orderDetail;
            $d->order_id = $id;
            $d->service_id = $data['service'][$i];
            $d->qty = $data['qty'][$i];
            $d->price = ($ser->price*$data['qty'][$i]);
            $d->serve_date = date('Y-m-d', strtotime($data['booking_date']));
            $d->start_time = $start_time;
            $d->end_time = $end_time;
            $d->save();

            //Calculating Subtotal
            $accounts['sub_total'] = $accounts['sub_total']+($ser->price*$data['qty'][$i]);
        }

        //Calculating GST/Commission
        $accounts['gst'] = MarketplaceSetting::getGST($accounts['sub_total']);
        $accounts['total_amount'] = $accounts['sub_total']+$accounts['gst'];
        $accounts['pract_earning'] = MarketplaceSetting::deductCommission($accounts['sub_total']);

        $o->sub_total = $accounts['sub_total'];
        $o->gst = $accounts['gst'];
        $o->total_amount = $accounts['total_amount'];
        $o->pract_earning = $accounts['pract_earning'];
        $o->save();

        return $id.'|'.$accounts['total_amount'];

    }


    public function details(){
    	return $this->hasMany(orderDetail::class, 'order_id', 'id');
    }
    public function practitioner(){
    	return $this->belongsTo(User::class, 'pract_id');
    }
    public function booker(){
    	return $this->belongsTo(User::class, 'booker_id');
    }
    public function reviews(){
        return $this->belongsTo(reviews::class, 'id', 'order_id');
    }
}
