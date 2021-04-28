<?php

namespace App\Http\Controllers\practitioner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\orders\order;


class practitionerController extends Controller
{
    
    function index(){

        $curr = date('Y-m-d H:i:s');
        $upcomming = order::where('pract_id', Auth::id())
                        ->where('start_at', '>=', $curr)
                        ->where('status', '1')
                        ->orderBy('start_at')
                        ->limit(12)
                        ->get();

    	return view('practitioner.index', ['upcomming' => $upcomming]);
    }
}
