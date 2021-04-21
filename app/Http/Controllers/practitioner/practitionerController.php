<?php

namespace App\Http\Controllers\practitioner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class practitionerController extends Controller
{
    
    function index(){

    	return view('practitioner.index');
    }
}
