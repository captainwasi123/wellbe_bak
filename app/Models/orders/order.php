<?php

namespace App\Models\orders;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\orders\orderDetail;
use App\Models\services\services;
use App\Models\orders\reviews;
use App\Models\orders\cancel;
use App\Models\orders\chat;
use App\Models\User;
use App\Models\MarketplaceSetting;
use App\Models\userService;
use App\Models\orders\orderAddons;
use Auth;

class order extends Model
{
    use HasFactory;

    protected $table = 'tbl_order_info';

    public static function makeOrder(array $data){
        $start_time = $data['booking']['time'];
        $accounts = array('sub_total' => 0,'total_amount' => 0,'gst' => 0,'pract_earning' => 0);

        $o = new order;
        $o->pract_id = base64_decode($data['booking']['practitioner']);
        $o->booker_id = Auth::id();
        $o->start_at = date('Y-m-d', strtotime($data['booking']['date']));
        $o->status = '9';
        $o->address = $data['location']['place'];
        $o->instructions = empty($data['booking']['instruction']) ? '' : $data['booking']['instruction'];
        $o->created_at = date('Y-m-d H:i:s');
        $o->save();
        $id = $o->id;

        foreach ($data['services'] as $val) {
            foreach($val as $it){
                $ser = services::find(base64_decode($it['id']));
                $userv = userService::where('service_id', base64_decode($it['id']))->where('user_id', base64_decode($data['booking']['practitioner']))->first();

                $sprice = empty($userv->price) ? '0' : $userv->price;
                $sprice = $sprice == 0 ? $ser->price : $sprice;

                $aprice = 0;
                $aduration = 0;
                foreach($it['addons'] as $add){
                    $aprice = $aprice+$add['price'];
                    $aduration = $aduration+$add['duration'];
                }

                $end_time = date('H:i:s',strtotime('+'.(($ser->duration+$aduration)*$it['quantity']).' minutes',strtotime($start_time)));
                $d = new orderDetail;
                $d->order_id = $id;
                $d->service_id = base64_decode($it['id']);
                $d->qty = $it['quantity'];
                $d->price = ($sprice*$it['quantity']);
                $d->serve_date = date('Y-m-d', strtotime($data['booking']['date']));
                $d->start_time = $start_time;
                $d->end_time = $end_time;
                $d->save();

                foreach($it['addons'] as $add){
                    $ad = new orderAddons;
                    $ad->detail_id = $d->id;
                    $ad->addon_id = $add['id'];
                    $ad->price = $add['price'];
                    $ad->save();
                }

                $start_time = $end_time;

                //Calculating Subtotal
                $accounts['sub_total'] = $accounts['sub_total']+(($sprice + $aprice)*$it['quantity']);
            }
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
    public function cancel(){
        return $this->belongsTo(cancel::class, 'id', 'order_id');
    }

    public function unreadMessages(){
        return $this->hasMany(chat::class, 'order_id', 'id')->where('view', '0')->where('user_id', '!=', Auth::id());
    }
}
