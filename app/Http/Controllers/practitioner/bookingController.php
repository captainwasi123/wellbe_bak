<?php

namespace App\Http\Controllers\practitioner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class bookingController extends Controller
{


    function upcomming_booking(){

    	return view('practitioner.bookings.upcomming');
    }

    function inprogress_booking(){

    	return view('practitioner.bookings.inprogress');
    }

    function completed_booking(){

    	return view('practitioner.bookings.completed');
    }

    function cancelled_booking(){

    	return view('practitioner.bookings.cancelled');
    }
}
