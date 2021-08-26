<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userCategory extends Model
{
    use HasFactory;
    protected $table = 'tbl_user_categories';
    public $timestamps = false;
}
