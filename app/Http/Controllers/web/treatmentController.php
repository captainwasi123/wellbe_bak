<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\services\services;
use App\Models\services\category;
use App\Models\services\addons;
use App\Models\User;
use App\Models\MarketplaceSetting;
use DB;
use Session;

class treatmentController extends Controller
{ 
    //
    function treatments(){
        
        return redirect('/');
    }
    public function treatments_search(Request $request)
    {   
        //dd(Session::get('cart.services'));
        //session()->flush('cart');
        /*$cart = session()->get('cart');
        dd($cart);*/
        $users_ids =  $this->get_users($request->lat,$request->long);  
        $category = isset($request->cat) ? $request->cat : '0';
        $cat = Categories::where('category', $category)->first();
        $cat_id = empty($cat->id) ? '1' : $cat->id;
        $cat_name = empty($cat->category) ? '' : $cat->category;

        $categories = Categories::where('status', '1')->get();
        $mtp = MarketplaceSetting::latest()->first();
        $data = array(
            'categories' => $categories,
            'mtp' => $mtp,
            'services' => services::where('category_id', $cat_id)->where('status', '2')->get(),
            'cat_name' => $cat_name,
            'lat' => $request->lat,
            'long' => $request->long,
            'place' => $request->value
        );
        return view('web.new.treatments.index')->with($data);
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
        if(empty($cat->id)){
            return redirect('/');
        }else{
            $categories = category::where('status', '1')->get();
            $users = User::where('user_type', '1')
                    ->whereHas('services', function($q) use ($cat){
                        $q->where('category_id', $cat->id);
                    })
                    ->limit(6)->get();
            return view('web.treatments', ['categories' => $categories, 'users' => $users, 'selected' => $cat->id, 'cat_name' => $cat->category]);
        }
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


    function serviceDetails($id){
        $id = base64_decode($id);
        $data = services::find($id);
        $mtp = MarketplaceSetting::latest()->first();

        return view('web.new.treatments.response.service_detail', ['data' => $data, 'mtp' => $mtp]);
    }

    function addToCartService(Request $request){
        $data = $request->all();
        $addons = array();
        $id = base64_decode($data['sid']);
        $product = services::where('id',$id)->where('status', '2')->first();
        if(!$product) {
            return redirect()->back()->with('error', 'Service Not Available');
        }
        if(!empty($data['addon_item'])){
            foreach($data['addon_item'] as $val){
                $ad = addons::find($val);
                $aa = array(
                    'id' => $ad->id,
                    'name' => $ad->name,
                    'price' => number_format($ad->addonsDetail[0]->price, 2),
                    'duration' => $ad->addonsDetail[0]->duration
                );
                array_push($addons, $aa);
            }
        }
        $cart = session()->get('cart');
        
        if(!$cart) {
            $cart['services'] = [
                $id => [
                    [
                        "id"    => base64_encode($product->id),
                        "title" => $product->name,
                        "category_id" => $product->category_id,
                        "category" => $product->cat->category,
                        "quantity" => 1,
                        "price" => empty($product->lowestPrice) ? $product->price : $product->lowestPrice->price,
                        "duration" => $product->duration,
                        "addons" => $addons
                    ]
                ]
            ];
        
            session()->put('cart', $cart);
            
            return redirect()->back()->with('success', 'Service Added.');
        }
        
        /*if(isset($cart['services'][$id])) {
            
            $cart['services'][$id]['quantity']++;
            $cart['services'][$id]['addons'] = $addons;
            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Service Added.');
        }else{*/
            $cart['services'][$id][] = [
                        "id"    => base64_encode($product->id),
                        "title" => $product->name,
                        "category_id" => $product->category_id,
                        "category" => $product->cat->category,
                        "quantity" => 1,
                        "price" => empty($product->lowestPrice) ? $product->price : $product->lowestPrice->price,
                        "duration" => $product->duration,
                        "addons" => $addons
            ];
            session()->put('cart', $cart);
        
            return redirect()->back()->with('success', 'Service Added.');
        /*}*/
    }

    function removeItemCart($id){
        $id = base64_decode($id);
        session()->forget('cart.services.' . $id);

        return redirect()->back()->with('success', 'Service Removed.');
    }


    //Addons

    function serviceAddons($id){
        $id = base64_decode($id);
        $data['service'] = services::find($id);
        $data['addons'] = addons::where('service_id', $id)->where('status', '2')->orderBy('name')->get();
        $data['mtp'] = MarketplaceSetting::latest()->first();

        return view('web.new.treatments.response.addonItems')->with($data);
    }
}
