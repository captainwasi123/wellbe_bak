<?php

namespace App\Models\orders;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\orders\order;
use App\Models\services\services;
use App\Models\orders\orderAddons;

class orderDetail extends Model
{
    use HasFactory;

    protected $table = 'tbl_order_detail_info';

    public $timestamps = false;
    
    public function order(){
    	return $this->belongsTo(order::class, 'order_id');
    }
    public function service(){
    	return $this->belongsTo(services::class, 'service_id');
    }

    public function addons(){
        return $this->hasMany(orderAddons::class, 'detail_id', 'id');
    }
}
