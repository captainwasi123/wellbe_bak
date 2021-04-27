<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\orders\order;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'tbl_users_info';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function user_address()
    {
    	return $this->belongsTo('App\Models\UserAddress','id','user_id');
    }

    public function user_store()
    {
        return $this->belongsTo('App\Models\Store','id','user_id');
    }

    public function users_payout_details()
    {
        return $this->belongsTo('App\Models\PayoutDetail','id','user_id');
    }


    public function pract_orders()
    {
        return $this->hasMany(order::class,'pract_id','id');
    }
    public function booker_orders()
    {
        return $this->hasMany(order::class,'booker_id','id');
    }
}
