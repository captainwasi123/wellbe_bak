<?php

namespace App\Models\schedule;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class holidays extends Model
{
    use HasFactory;

    protected $table = 'tbl_user_holidays_info';

    public static function addHoliday(array $data){
    	foreach ($data as $key => $value) {
    		$h = new holidays;
    		$h->user_id = Auth::id();
    		$h->closed_date = date('Y-m-d', strtotime($value));
    		$h->save();
    	}
    }
}
