<?php

namespace App\Models\orders;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\orders\orderDetail;
use App\Models\User;

class order extends Model
{
    use HasFactory;

    protected $table = 'tbl_order_info';



    public function details(){
    	return $this->hasMany(orderDetail::class, 'order_id', 'id');
    }

    public function practitioner(){
    	return $this->belongsTo(User::class, 'pract_id');
    }
    public function booker(){
    	return $this->belongsTo(User::class, 'booker_id');
    }
}
