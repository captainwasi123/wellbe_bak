<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\services\category;
use App\Models\User;

class webController extends Controller
{
    
    function index(){

    	return view('web.index');
    }

    function professionals(){

    	return view('web.professionals');
    }

    function treatments(){
    	$categories = category::where('status', '1')->get();
    	$users = User::where('user_type', '1')->limit(6)->get();

    	return view('web.treatments', ['categories' => $categories, 'users' => $users]);
    }
}
