<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\services\services;
use App\Models\User;

class userService extends Model
{
    use HasFactory;
    protected $table = 'tbl_user_services';
    public $timestamps = false;

    public static function updateService(array $data){
        $s = userService::find(base64_decode($data['service_id']));
        $s->price = $data['price'];
        $s->save();
    }

    public function service(){

        return $this->belongsTo(services::class, 'service_id');
    }

    public function user(){

        return $this->belongsTo(User::class, 'user_id');
    }
}
