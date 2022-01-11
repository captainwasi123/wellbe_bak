<?php

namespace App\Models\orders;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\services\addons;

class orderAddons extends Model
{
    use HasFactory;
    protected $table = 'tbl_order_detail_addon_info';
    public $timestamps = false;


    public function addon(){
        return $this->belongsTo(addons::class, 'addon_id');
    }
}
