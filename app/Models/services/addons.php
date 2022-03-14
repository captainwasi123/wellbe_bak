<?php

namespace App\Models\services;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\services\addonsDetail;
use App\Models\userAddon;
use Auth;

class addons extends Model
{
    use HasFactory;

    protected $table = 'tbl_user_services_addons';

    public static function addAddon(array $data){
    	$a = new addons;
    	$a->user_id = Auth::guard('admin')->id();
    	$a->service_id = base64_decode($data['service_id']);
    	$a->name = $data['addon_name'];
    	$a->save();
    	$id = $a->id;

    	$c = count($data['duration']);
    	for ($i=0; $i < $c; $i++) { 
    		
    		$ad = new addonsDetail;
    		$ad->addon_id = $id;
    		$ad->duration = $data['duration'][$i];
    		$ad->price = $data['price'][$i];
    		$ad->save();
    	}
    }



    public function addonsDetail(){
        return $this->hasMany(addonsDetail::class, 'addon_id', 'id');
    }

    public function lowestPrice(){
        return $this->belongsTo(userAddon::class, 'id', 'addon_id')
                    ->where('price', '!=', 0)
                    ->whereHas('user', function($q){
                        return $q->where('status', '1')
                                    ->where('store_status', '1');
                    })
                    ->orderBy('price');
    }

    public function userAdd(){
        return $this->belongsTo(userAddon::class, 'id', 'addon_id')->where('user_id', Auth::id());
    }

}
