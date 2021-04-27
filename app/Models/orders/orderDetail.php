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




    public function order(){
    	return $this->belongsTo(order::class, 'order_id');
    }
    public function service(){
    	return $this->belongsTo(services::class, 'service_id');
    }
}
