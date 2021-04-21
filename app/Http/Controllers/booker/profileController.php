<?php

namespace App\Http\Controllers\booker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class profileController extends Controller
{
    function index(){
        $data = array(
            'user_data' => auth()->user(),
        );
    	return view('booker.profile.general')->with($data);
    }
}

