<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Country;

class UserAddress extends Model
{
    use HasFactory;
    protected $table = 'tbl_users_address_info';

    public function country(){
    	return $this->belongsTo(Country::class, 'country_id');
    }
}
