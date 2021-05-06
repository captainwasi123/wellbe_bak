<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarketplaceSetting extends Model
{
    use HasFactory;
    protected $table = 'tbl_marketplace_settings_info';

    public static function getGST($amount){
    	$g = MarketplaceSetting::orderBy('id', 'desc')->first();
    	$gst = ($amount/100)*$g->gst;

    	return $gst;
    }

    public static function deductCommission($amount){
    	$g = MarketplaceSetting::orderBy('id', 'desc')->first();
    	$earning = ($amount/100)*$g->comission;
    	$earning - $amount-$earning;
    	return $earning;
    }
}