<?php

namespace App\Models\schedule;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
use App\Models\schedule\availabeSlots;

class availability extends Model
{
    use HasFactory;

    protected $table = 'tbl_user_availability_info';

    public $timestamps = false;

    public static function addAvailability(array $data){
    	foreach ($data['is_active'] as $key => $value) {
    		# code...
	    	$a = new availability;
	    	$a->user_id = Auth::id();
	    	$a->week_day = $value;
	    	$a->availability_status = '1';
	    	$a->save();

	    	$id = $a->id;

    		availabeSlots::addSlot($data['days'][$value], $id);
	    	

    	}
    }

    public function slots(){
    	return $this->hasMany(availabeSlots::class, 'day_id', 'id');
    }
}
