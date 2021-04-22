<?php

namespace App\Models\services;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\services\addons;
use Auth;

class services extends Model
{
    use HasFactory;

    protected $table = 'tbl_user_services_info';

    public static function addService(array $data){
    	$s = new services;
    	$s->user_id 	= Auth::id();
    	$s->category_id = base64_decode($data['cat_id']);
    	$s->name 		= $data['service_name'];
    	$s->duration 	= $data['duration'];
    	$s->price 		= $data['price'];
    	$s->final_price	= empty($data['final_price']) ? '0' : $data['final_price'];
    	$s->description = $data['description'];
    	$s->long_description	= $data['long_description'];
    	$s->status 		= '1';
    	$s->save();
    }

    public static function updateService(array $data){
        $s = services::find(base64_decode($data['service_id']));
        $s->name        = $data['service_name'];
        $s->duration    = $data['duration'];
        $s->price       = $data['price'];
        $s->final_price = empty($data['final_price']) ? '0' : $data['final_price'];
        $s->description = $data['description'];
        $s->long_description    = $data['long_description'];
        $s->save();
    }


    public function addons_list(){
        return $this->hasMany(addons::class, 'service_id', 'id');
    }
}
