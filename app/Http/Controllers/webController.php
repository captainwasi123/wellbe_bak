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
		$holiday = array();
        $holiarr = array();
		$availability = array('sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday');
		$id = base64_decode($id);
		$user_availability = availability::where('user_id',$id)->get();
		$user_holidays = holidays::where('user_id',$id)->get('closed_date'); 
		foreach ($user_holidays as $key => $value) {
			$day = array();
			array_push($day, date('n', strtotime($value->closed_date)));
			array_push($day, date('j', strtotime($value->closed_date)));
			array_push($day, date('Y', strtotime($value->closed_date)));
			
			array_push($holiday, $day);
			
			array_push($holiarr, $value->holiday);
			
		}
		foreach($user_availability as $key => $v){
			$availability = array_merge(array_diff($availability, array($v->week_day)));

		} 
		//dd($availability);
		$categories = category::where('status', '1')->get();
	    $cat = collect($categories); $cat = $cat->first();
		
		$data = array(
			'data' => User::find($id),
			'categories' => $categories,
			'services' => services::where('category_id',$cat->id)->where('user_id',$id)->get(),
			'availability' => $availability,
			'holiday' => $holiday
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
	public function get_slots(Request $request)
	{
		$day = date('l',strtotime($request->date));
		$slots = availability::with(['slots'])->where('user_id',$request->user_id)->where('week_day',strtolower($day))->first();
		$html = '';
		$html.="<option value=''>select</option>";
		foreach($slots->slots as $val){
			$html.="<option value='".$val->id."'>".$val->start_booking." TO ".$val->end_booking."</option>";
		}
		echo $html;  
	}
}