<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\orders\order;
use App\Models\orders\reviews;
use App\Models\services\services;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'tbl_users_info';

    public static function newUser(array $data){
        $u = new User;
        $u->first_name = $data['first_name'];
        $u->last_name = $data['last_name'];
        $u->email = $data['email'];
        $u->phone = $data['phone'];
        $u->user_type = $data['userType'];
        $u->password = bcrypt($data['password']);
        $u->status = '1';
        $u->save();
    }


    public static function getBuffer($id){
        $u = User::find($id);

        return empty($u->user_store) ? '30' : $u->user_store->buffer_between_appointments;
    }
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

    //Services
    
    public function services()
    {
        return $this->hasMany(services::class,'user_id','id');
    }    


    //orders
    public function pract_orders()
    {
        return $this->hasMany(order::class,'pract_id','id');
    }
    public function booker_orders()
    {
        return $this->hasMany(order::class,'booker_id','id');
    }

    //Rating
    public function reviews()
    {
        return $this->hasMany(reviews::class,'review_to','id');
    }
    public function rating()
    {
        return $this->reviews()->avg('rating');
    }


    //Booker Orders
    public function b_upcoming(){
        return $this->hasMany(order::class, 'booker_id', 'id')->where('status', '1');
    }
    public function b_completed(){
        return $this->hasMany(order::class, 'booker_id', 'id')->where('status', '3');
    }
    public function b_cancelled(){
        return $this->hasMany(order::class, 'booker_id', 'id')->where('status', '4');
    }
    public function b_revenue(){
        return $this->hasMany(order::class, 'booker_id', 'id')
                    ->where('status', '3')
                    ->selectRaw('SUM(total_amount) as totalRevenue');
    }


    //Practitioner Orders
    public function p_upcoming(){
        return $this->hasMany(order::class, 'pract_id', 'id')->where('status', '1');
    }
    public function p_completed(){
        return $this->hasMany(order::class, 'pract_id', 'id')->where('status', '3');
    }
    public function p_cancelled(){
        return $this->hasMany(order::class, 'pract_id', 'id')->where('status', '4');
    }
    public function p_revenue(){
        return $this->hasMany(order::class, 'pract_id', 'id')
                    ->where('status', '3')
                    ->selectRaw('SUM(total_amount) as totalRevenue');
    }
}
