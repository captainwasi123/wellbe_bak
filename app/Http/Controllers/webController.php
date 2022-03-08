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
use App\Models\MarketplaceSetting;
use DB;

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
		return view('web.treatments', ['categories' => $categories, 'users' => $users, 'selected' => 'all']);
    }
	public function treatments_search(Request $request)
	{   
		$users_ids =  $this->get_users($request->lat,$request->long);  
		$category = isset($request->cat) ? $request->cat : '0';
    	$cat = category::where('category', $category)->first();
    	$cat_id = empty($cat->id) ? 'all' : $cat->id;
    	$cat_name = empty($cat->category) ? '' : $cat->category;
    	$price = explode(',', $request->price); 
    	$rating = explode(',', $request->rating); 

		$users = User::select(DB::raw('tbl_users_info.*'))
					->when($category != '0', function($qq) use ($cat){
						$qq->whereHas('services', function($q) use ($cat){
						    $q->where('category_id', $cat->id);
						});
					})
					//->join('tbl_users_geofences','tbl_users_geofences.user_id','=','tbl_users_info.id')
					->join('tbl_users_store_info','tbl_users_store_info.user_id','=','tbl_users_info.id')
					->leftJoin('tbl_review_info','tbl_review_info.review_to','=','tbl_users_info.id')
					->where('user_type', '1')
					->whereIn('tbl_users_info.id',$users_ids);
					if (isset($request->price)) {
						$users = $users->whereBetween('tbl_users_store_info.minimum_booking_amount',$price);
					}
					if(isset($request->rating) && $rating[0] == 0) {
						$users = $users->orWhere('tbl_review_info.rating',$rating[1]);
					}else if (isset($request->rating)){
						$users = $users->whereBetween('tbl_review_info.rating',$rating);
					}
					if(isset($request->filter) && $request->filter != 'all'){  
						$filter = $request->filter; 
						if(strpos($filter,',')){
							$filter_array = explode(',', $request->filter); $days = [];
							foreach($filter_array as $val){ $days[] = date('l',strtotime($val)); $date[] = $val; }
							$users = $users->whereHas('availability', function($q) use ($days){
								$q->whereIn('tbl_user_availability_info.week_day',$days)->where('availability_status',1);
							})->whereHas('holidays', function($hq) use ($date){
								$hq->whereNotIn('tbl_user_holidays_info.closed_date', $date);
							});
						}else{
							$users = $users->whereHas('availability', function($q) use ($filter){
								$q->where('tbl_user_availability_info.week_day', date('l',strtotime($filter)))->where('availability_status',1);
							})->whereHas('holidays', function($hq) use ($filter){
								$hq->where('tbl_user_holidays_info.closed_date','!=', $filter);
							});
						}
						
					}
					$users = $users->limit(6)
					->groupBy('id')
					->get();
	    $categories = category::where('status', '1')->get();
		$value = $request->value;
		$data = array(
			'categories' => $categories,
			'users' => $users,
			'selected' => 'all',
			'value' => $value,
			'selected' => $cat_id,
			'cat_name' => $cat_name,
			'filter' => $request->filter,
			'price' => $request->price,
			'rating' => $request->rating,
			'lat' => $request->lat,
			'long' => $request->long
		);
    	return view('web.treatments')->with($data);
	}

	public function get_users($lat,$lng)
	{
		// get average  query
		$avg = DB::select('SELECT AVG(tbl_users_geofences.radious) as avg, tbl_users_geofences.*, ( 6371 * acos( cos( radians("'.$lat.'") ) * cos( radians(lat ) ) * cos( radians(lng ) - radians("'.$lng.'") ) + sin( radians("'.$lat.'") ) * sin( radians(lat ) ) ) ) AS distance FROM `tbl_users_geofences` WHERE ( 6371 * acos( cos( radians("'.$lat.'") ) * cos( radians(lat ) ) * cos( radians(lng ) - radians("'.$lng.'") ) + sin( radians("'.$lat.'") ) * sin( radians(lat ) ) ) ) < 50');

		// get user ids
		$users_ids = DB::select('SELECT tbl_users_geofences.*, ( 6371 * acos( cos( radians("'.$lat.'") ) * cos( radians(lat ) ) * cos( radians(lng ) - radians("'.$lng.'") ) + sin( radians("'.$lat.'") ) * sin( radians(lat ) ) ) ) AS distance FROM `tbl_users_geofences` WHERE ( 6371 * acos( cos( radians("'.$lat.'") ) * cos( radians(lat ) ) * cos( radians(lng ) - radians("'.$lng.'") ) + sin( radians("'.$lat.'") ) * sin( radians(lat ) ) ) ) <= "'.$avg[0]->avg.'"');

		return \Arr::pluck($users_ids,'user_id');
	}
    function treatmentsCategory($category){
    	$cat = category::where('category', $category)->first();
    	$categories = category::where('status', '1')->get();
    	$users = User::where('user_type', '1')
    			->whereHas('services', function($q) use ($cat){
				    $q->where('category_id', $cat->id);
				})
    			->limit(6)->get();
		return view('web.treatments', ['categories' => $categories, 'users' => $users, 'selected' => $cat->id, 'cat_name' => $cat->category]);
    }

    function professionalProfile($id){ 
		$cart_data = \Cart::content();
		foreach($cart_data as $cart_data){
			@$user_id = $cart_data->options->user_id;
		}
		if(@$user_id != $id){ \Cart::destroy(); }
    	
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
			'holiday' => $holiday,
			'user_data' => User::with(['ugeofence'])->where('id',$id)->first(),
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
        // $lat1 = $request->user_lat; 
		// $lon1 = $request->user_lng;
		// $lat2 = $request->p_lat; 
		// $lon2 = $request->p_lng;




		// $pi80 = M_PI / 180; 
		// $lat1 *= $pi80; 
		// $lon1 *= $pi80; 
		// $lat2 *= $pi80; 
		// $lon2 *= $pi80; 
		// $r = 6372.797; // mean radius of Earth in km 
		// $dlat = $lat2 - $lat1; 
		// $dlon = $lon2 - $lon1; 
		// $a = sin($dlat / 2) * sin($dlat / 2) + cos($lat1) * cos($lat2) * sin($dlon / 2) * sin($dlon / 2); 
		// $c = 2 * atan2(sqrt($a), sqrt(1 - $a)); 
		// $km = $r * $c; 
		// if ($request->radious >= $km) {
			\Cart::add(['id' => $request->p_id, 'name' => $request->name, 'qty' => $request->qty, 'price' => $request->price, 'weight' => 0, 'options' => ['minutes' => $request->minutes,'user_id'=> $request->user_id]]);
		        $cart_data = \Cart::content();
		        $html = (string)view('web.load_cart_data', ['cart_data' => $cart_data]);
		        $json['html'] = $html;
		        $json['status'] = true;

		        return json_encode($json);
		// }else{
		// 	$json['status'] = false;
		// 	return json_encode($json);
		// }
		exit();

        
    }
	public function cart_update(Request $request)
	{
		\Cart::remove($request->row_id);
		$cart_data = \Cart::content();
		$html = '';
		if(\Cart::count() != 0){
		$html.='<div class="booking-cart-items">';
			foreach($cart_data as $row){
				$html.='<div class="booking-cart-item1">
				<a class="remove_item" data-id="'.$row->rowId.'">X</a>
				<h5> '.$row->name.' </h5>
				<input type="hidden" name="service[]" value="'.$row->id.'">
				<div class="quantity">
				<button type="button" class="qtyCounter" data-type="minus">-</button>
				<input data-value type="number" name="qty[]" value="'.$row->qty.'" readonly />
				<button type="button" class="qtyCounter" data-type="plus" data-id="{{$row->rowId}">+</button>
				<b class="price-cart"> $ '.number_format($row->price,2).' </b>
				</div>
			</div>';
			}
			$html.'</div>';
		}else{
			$html.='<div class="booking-empty text-center">
			<img src="'.\URL::to('/').'/public/assets/web/images/empty-cart.png">
			<p> Your cart is empty <br/> Add an item to begin. </p>
		 </div>';
		}
		return $html;
	}
	
	public function get_slots(Request $request)
	{
		$buffer = User::getBuffer($request->user_id);
		$slot_no = 1;
		$booking_date = date('Y-m-d', strtotime($request->date));
		$day = date('l',strtotime($request->date));
		$slots = availability::with(['slots'])->where('user_id',$request->user_id)->where('week_day',strtolower($day))->first();
		$html = '';
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
			$html.="<option value='".$start_time."'>".date('h:i A', strtotime($start_time))."</option>";
			$slot_no++;
		}
		echo $html;
	}

	//booking reminder function 
	public function booking_reminder()
	{
		$time = strtotime(date('Y-m-d H:i:s'));
        $currnet_time = strtotime('-2 hours', $time);
		$order = order::with(['details','practitioner','booker'])->where('status',1)->where('reminder_email',0)->where('start_at',date('Y-m-d'))->get();
		$mtp = MarketplaceSetting::latest()->first();
		foreach($order as $order_data){ 
			$date =	strtotime(date('Y-m-d').' '.$order_data->details[0]->start_time);
			$t1 = strtotime(date('Y-m-d').' '.$order_data->details[0]->start_time);
			$t2 = strtotime($order_data->created_at);
			$diff = $t1 - $t2;
			if($date >= $currnet_time && $diff > 7200){
				$data = array(
					'order' => $order_data,
					'mtp' => $mtp,
				);
				\App\Helpers\CommonHelpers::send_email('BookingReminderCustomer', $data, $order_data->booker->email, 'Booking Reminder', $from_email = 'info@wellbe.co.nz', $from_name = 'Wellbe');
                \App\Helpers\CommonHelpers::send_email('BookingReminderPractitioner', $data, $order_data->practitioner->email, 'Booking Reminder', $from_email = 'info@wellbe.co.nz', $from_name = 'Wellbe');   
				DB::table('tbl_order_info')
                ->where('id', $order_data->id)
                ->update(['reminder_email' => 1]);
			}
		}
        
	}
}
