<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index(){
        return view('admin.index');
    }

    function upcomming(){
        return view('admin.bookings.upcomming');
    }

    function inprogress(){
        return view('admin.bookings.inprogress');
    }

    function completed(){
        return view('admin.bookings.completed');
    }

    function cancelled(){
        return view('admin.bookings.cancelled');
    }

    function customers(){
        return view("admin.customers.customers");
    }

    function practitioners(){
        return view("admin.practitioners.practitioners");
    }

    function custom_services(){
        return view("admin.custom_services.custom_services");
    }

    function marketplace_catalogue(){
        return view("admin.marketplace_catalogue.marketplace_catalogue");
    }

    function edit_profile(){
        return view("admin.profile.edit_profile");
    }


}
