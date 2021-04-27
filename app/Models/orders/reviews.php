<?php

namespace App\Models\orders;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\orders\order;
use App\Models\User;

class reviews extends Model
{
    use HasFactory;

    protected $table = 'tbl_review_info';


    public function order(){
    	return $this->belongsTo(order::class, 'order_id');
    }
    public function booker(){
    	return $this->belongsTo(User::class, 'review_by');
    }
}
