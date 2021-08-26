<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\services\services;

class userService extends Model
{
    use HasFactory;
    protected $table = 'tbl_user_services';
    public $timestamps = false;


    public function service(){

        return $this->belongsTo(services::class, 'service_id');
    }
}
