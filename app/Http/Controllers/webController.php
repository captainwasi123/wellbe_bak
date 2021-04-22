<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class webController extends Controller
{
    
    function index(){

    	return view('web.index');
    }

    function professionals(){

    	return view('web.professionals');
    }

    function treatments(){

    	return view('web.treatments');
    }
}
