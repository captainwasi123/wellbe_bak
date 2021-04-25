<?php

namespace App\Models\plan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
    protected $table = 'tbl_package_plan';

    public function billig_type()
    {
        return $this->belongsTo('App\Models\plan\PlanBillingType','billing_type_id','id');
    }
    public function plan_detail()
    {
        return $this->hasMany('App\Models\plan\PlanDetails','plan_id');
    }
}