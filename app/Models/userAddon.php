<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\services\addons;

class userAddon extends Model
{
    use HasFactory;
    protected $table = 'tbl_user_service_addons';
    public $timestamps = false;


    public static function updateAddon(array $data){
        $s = userAddon::find(base64_decode($data['addon_id']));
        $s->price = $data['price'];
        $s->save();
    }

    public function addons(){

        return $this->belongsTo(addons::class, 'addon_id');
    } 
}
