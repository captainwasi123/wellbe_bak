<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\services\category;
use App\Models\User;
use App\Models\services\services;
use App\Models\Models\schedule\availabeSlots;
use App\Models\schedule\availability;
use App\Models\schedule\holidays;
use App\Models\orders\orderDetail;
use App\Models\orders\order;

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
		$buffer = User::getBuffer($request->user_id);
		$slot_no = 1;
		$booking_date = date('Y-m-d', strtotime($request->date));
		$day = date('l',strtotime($request->date));
		$slots = availability::with(['slots'])->where('user_id',$request->user_id)->where('week_day',strtolower($day))->first();
		$html = '';
		$html.="<option value=''>select</option>";
		foreach($slots->slots as $val){
			$start_time = $val->start_booking;
			$pre_book = orderDetail::where('serve_date', $booking_date)
							->where('start_time', '>=', $val->start_booking)
							->where('start_time', '<=', $val->end_booking)
							->whereHas('order', function($q) use ($request){
							    $q->where('pract_id', $request->user_id);
							})->get();
			foreach ($pre_book as $key => $value) {
				$dur = ($value->qty*$value->service->duration);
				$start_time = date('H:i:s',strtotime('+'.$dur.' minutes',strtotime($start_time)));
				$start_time = date('H:i:s',strtotime('+'.$buffer.' minutes',strtotime($start_time)));
			}
			$html.="<option value='".$start_time."'>Slot# ".$slot_no.": ----- ".date('h:i A', strtotime($start_time))."</option>";
			$slot_no++;
		}
		echo $html;
	}
}
