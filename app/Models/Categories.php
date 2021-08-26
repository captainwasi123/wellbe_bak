<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\userCategory;
use Auth;

class Categories extends Model
{
    use HasFactory;
    protected $table = 'tbl_service_category';



    public function userCat(){
        return $this->belongsTo(userCategory::class, 'id', 'category_id')->where('user_id', Auth::id());
    }
}
