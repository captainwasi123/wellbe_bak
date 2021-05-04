<?php

namespace App\Models\orders;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\orders\order;
use App\Models\User;
use Auth;

class reviews extends Model
{
    use HasFactory;

    protected $table = 'tbl_review_info';

    public static function addReview($prac, array $data){
    	$r = new reviews;
    	$r->order_id = base64_decode($data['ref_id']);
    	$r->review_by = Auth::id();
    	$r->review_to = $prac;
    	$r->rating = $data['rating'];
    	$r->review = $data['description'];
    	$r->save();
    }

    public function order(){
    	return $this->belongsTo(order::class, 'order_id');
    }
    public function booker(){
    	return $this->belongsTo(User::class, 'review_by');
    }
}
