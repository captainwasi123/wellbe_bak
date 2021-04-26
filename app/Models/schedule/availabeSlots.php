<?php

namespace App\Models\schedule;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
use App\Models\schedule\availability;

class availabeSlots extends Model
{
    use HasFactory;

    protected $table = 'tbl_user_availability_slots_info';

    public static function addSlot(array $data, $id){
    	foreach ($data as $key => $value) {
    		# code...
	    	$s = new availabeSlots;
	    	$s->user_id = Auth::id();
	    	$s->day_id = $id;
	    	$s->start_booking = date('H:i:s', strtotime($value['first_booking']));
	    	$s->end_booking = date('H:i:s', strtotime($value['last_booking']));
	    	$s->save();
    	}
    }

    public function day(){
    	return $this->belongsTo(availability::class, 'day_id');
    }
}
