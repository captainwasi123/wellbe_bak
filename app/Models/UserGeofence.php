<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserGeofence extends Model
{
    use HasFactory;
    protected $table = 'tbl_users_geofences';
}