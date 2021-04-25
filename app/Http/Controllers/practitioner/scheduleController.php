<?php

namespace App\Http\Controllers\practitioner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class scheduleController extends Controller
{
    function index(){

    	return view('practitioner.schedule.availability');
    }

    public function save(Request $request)
    {
    	$data = $request->all();
        dd($data);
    }
}
