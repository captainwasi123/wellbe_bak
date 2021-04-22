<?php

namespace App\Http\Controllers\booker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class shareController extends Controller
{
    function index(){
    	return view('booker.share');
    }
}
