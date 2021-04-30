<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\services\category;
use App\Models\User;
use App\Models\services\services;
use App\Models\Models\schedule\availabeSlots;
use App\Models\schedule\availability;
use App\Models\schedule\holidays;

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

    function professionalProfile($id){
		$id = base64_decode($id);
		$user_availability = availability::where('user_id',$id)->get();
		$user_holidays = holidays::where('user_id',$id)->get('closed_date');
		$categories = category::where('status', '1')->get();
	    $cat = collect($categories); $cat = $cat->first();
		$availability =  \App\Helpers\CommonHelpers::get_user_availability($user_availability,$user_holidays);
		
		$data = array(
			'data' => User::find($id),
			'categories' => $categories,
			'services' => services::where('category_id',$cat->id)->where('user_id',$id)->get(),
			'availability' => $availability,
		);
		//dd($data);
		return view('web.practitionerProfile')->with($data);
    }

	function user_services(Request $request){
		$services = services::where('category_id',$request->cat_id)->where('user_id',$request->userid)->get();
		return view('web.load_practitioner_service', ['services' => $services]);
		
	}

    public function add_cart(Request $request)
    { 
        \Cart::add(['id' => $request->p_id, 'name' => $request->name, 'qty' => 1, 'price' => $request->price, 'weight' => 0, 'options' => ['minutes' => $request->minutes]]);
        $cart_data = \Cart::content(); 
        return view('web.load_cart_data', ['cart_data' => $cart_data]);
    }
}