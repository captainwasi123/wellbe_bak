<?php

namespace App\Models\services;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\services\addonsDetail;
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

}
