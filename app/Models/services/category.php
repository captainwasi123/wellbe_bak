<?php

namespace App\Models\services;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\userCategory;
use Auth;

class category extends Model
{
    use HasFactory;

    protected $table = 'tbl_service_category';
}
