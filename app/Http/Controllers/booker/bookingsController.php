<?php

namespace App\Http\Controllers\booker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class bookingsController extends Controller
{
    function index(){
        return view('booker.index');
    }

    function upcomming_booking(){

    	return view('booker.booking.upcomming');
    }

    function inprogress_booking(){

    	return view('booker.booking.inprogress');
    }

    function completed_booking(){

    	return view('booker.booking.completed');
    }

    function cancelled_booking(){

    	return view('booker.booking.cancelled');
    }
}
