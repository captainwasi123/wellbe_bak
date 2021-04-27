<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\services\services;

class ServicesController extends Controller
{
    function custom_services(){
    	$data = array(
    		'title' => 'Custom Services',
    		'all_services' => services::with(['practitioner'])->latest()->get(),
    		'pending_services' => services::with(['practitioner'])->where('status',1)->latest()->get(),
    		'approved_services' => services::with(['practitioner'])->where('status',2)->latest()->get(), 
    		'rejected_services' => services::with(['practitioner'])->where('status',3)->latest()->get(),
    	);
       return view("admin.custom_services.custom_services")->with($data);
    }
}