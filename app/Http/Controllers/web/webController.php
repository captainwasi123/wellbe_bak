<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class webController extends Controller
{
    //
    function index(){

        return view('web.new.index');
    }



    function workWithUs(){

        return view('web.new.work_with_us');
    }

}
