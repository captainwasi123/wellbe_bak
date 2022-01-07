<?php

namespace App\Models\services;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\services\addons;
use App\Models\userService;
use App\Models\Categories;
use Auth;

class services extends Model
{
    use HasFactory;

    protected $table = 'tbl_services_info';

    public static function addService(array $data){
    	$s = new services;
    	$s->user_id 	= Auth::guard('admin')->id();
    	$s->category_id = base64_decode($data['cat_id']);
    	$s->name 		= $data['service_name'];
    	$s->duration 	= $data['duration'];
    	$s->price 		= $data['price'];
    	$s->final_price	= empty($data['final_price']) ? '0' : $data['final_price'];
    	$s->description = $data['description'];
    	$s->long_description	= $data['long_description'];
    	$s->status 		= '2';
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

    public function practitioner(){
        return $this->belongsTo('App\Models\User','user_id');
    }


    public function userSer(){
        return $this->belongsTo(userService::class, 'id', 'service_id')->where('user_id', Auth::id());
    }
    public function lowestPrice(){
        return $this->belongsTo(userService::class, 'id', 'service_id')->where('price', '!=', 0)->orderBy('price');
    }
    public function cat(){
        return $this->belongsTo(Categories::class, 'category_id');
    }
}
