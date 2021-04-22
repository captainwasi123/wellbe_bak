<?php

namespace App\Models\services;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addonsDetail extends Model
{
    use HasFactory;

    protected $table = 'tbl_user_service_addons_detail';

    public $timestamps = false;
}
