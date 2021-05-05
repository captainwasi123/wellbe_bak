<?php

namespace App\Models\orders;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\orders\orderDetail;
use App\Models\orders\reviews;
use App\Models\User;
use Auth;

class order extends Model
{
    use HasFactory;

    protected $table = 'tbl_order_info';

    public static function makeOrder(array $data){
        $start_time = $data['start_time'];
        $o = new order;
        $o->pract_id = base64_decode($data['refid']);
        $o->booker_id = Auth::id();
        $o->start_at = date('Y-m-d', strtotime($data['booking_date']));
        $o->status = '1';
        $o->save(); 
        $id = $o->id;
        $c = count($data['service']);
        for ($i=0; $i < $c; $i++) { 
            # code...
            $detail_data = array(
                'order_id' => $id,
                'service_id' => $data['service'][$i],
                'qty' => $data['qty'][0],
                'serve_date' => date('Y-m-d', strtotime($data['booking_date'])),
                'start_time' => $start_time
            );
            $start_time = orderDetail::addDetail($detail_data);
        }


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
