<?php

namespace App\Http\Controllers\practitioner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\orders\order;
use Carbon\Carbon;


class practitionerController extends Controller
{ 
    
    function index(){
        $from = date('Y-m-d 00:00:01');
        $to = date('Y-m-d 23:59:59');
        $curr = date('Y-m-d H:i:s');
        $upcomming = order::where('pract_id', Auth::id())
                        ->whereDate('start_at', '>=', Carbon::now())
                        ->where('status', '1')
                        ->orderBy('start_at')
                        ->limit(12)
                        ->get();
       
        $job_stats = array(
                        'pending' => order::where('pract_id', Auth::id())->whereDate('start_at', '>=', Carbon::now())->where('status','1')->count(),
                        'completed' => order::where('pract_id', Auth::id())->where('status','3')->count(),
                        'cancelled' => order::where('pract_id', Auth::id())->where('status','4')->count()
                    );

        $revenue = array(
                    'today' => order::where('pract_id', Auth::id())->where('status', '3')
                                        ->whereBetween('created_at', array($from, $to))
                                        ->sum('pract_earning'),
                                    
                    'total' => order::where('pract_id', Auth::id())->where('status', '3')
                                        ->sum('pract_earning')
                );
               
                
    	return view('practitioner.index', ['upcomming' => $upcomming, 'job_stats' => $job_stats, 'revenue' => $revenue]);
    }
}
