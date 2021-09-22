<?php

namespace App\Http\Controllers\practitioner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\services\services;
use App\Models\services\addons;
use App\Models\userService;
use App\Models\userAddon;
use Auth;

class servicesController extends Controller
{
    function index(){
    	$data = array();
    	$data['category'] = Categories::where('status', '1')->get();

    	return view('practitioner.services.my_services', ['data' => $data]);
    }

    //Add Service

    function addService(Request $request){
    	$data = $request->all();
    	services::addService($data);

    	return redirect()->back()->with('practitioner_service_success', 'Service Added.');
    }

    function updateService(Request $request){
        $data = $request->all();
        //dd($data);
        userService::updateService($data);

        return redirect()->back()->with('success', 'Service Updated.');
    }

    function loadService($id){
        $id = base64_decode($id);

    	$data = services::where(['category_id' => $id, 'status' => '2'])
    			->orderBy('name')
    			->get();

    	return view('practitioner.services.response.load_services', ['data' => $data, 'cat_id' => $id]);
    }

    function loadServiceDetail($id){
        $id = base64_decode($id);

        $data = services::find($id);
        $service = userService::where('user_id', Auth::id())->where('service_id', $id)->first();

        return view('practitioner.services.response.detail_services', ['data' => $data, 'service' => $service]);
    }

    function enableService($id){
    	$id = base64_decode($id);

    	$data = new userService;
    	$data->user_id = Auth::id();
        $data->service_id = $id;
    	$data->save();

    	return redirect()->back()->with('success', 'Service Enabled.');
    }

    function disableService($id){
        $id = base64_decode($id);

        userService::destroy($id);

        return redirect()->back()->with('success', 'Service Disabled.');
    }


    function editService($id){
    	$id = base64_decode($id);

    	$data = services::find($id);
        $service = userService::where('user_id', Auth::id())->where('service_id', $id)->first();
    	return view('practitioner.services.response.edit_service', ['data' => $data, 'cat_id' => $id, 'service' => $service]);
    }


    //Add Service Addons

    function addAddons(Request $request){
        $data = $request->all();

        addons::addAddon($data);

        return redirect()->back()->with('success', 'Addons Updated.');
    }


    function enableServiceAddon($id){
        $id = base64_decode($id);

        $data = new userAddon;
        $data->user_id = Auth::id();
        $data->addon_id = $id;
        $data->save();

        return redirect()->back()->with('success', 'Addon Enabled.');
    }
    function disableServiceAddon($id){
        $id = base64_decode($id);

        userAddon::destroy($id);

        return redirect()->back()->with('success', 'Addon Disabled.');
    }
    function editServiceAddon($id){
        $id = base64_decode($id);

        $data = addons::find($id);
        $addon = userAddon::where('user_id', Auth::id())->where('addon_id', $id)->first();
        return view('practitioner.services.response.edit_service_addon', ['data' => $data, 'cat_id' => $id, 'addon' => $addon]);
    }
    function updateServiceAddon(Request $request){
        $data = $request->all();
        $ad = userAddon::find(base64_decode($data['addon_id']));
        $ad->price = $data['price'];
        $ad->save();

        return redirect()->back()->with('success', 'Addon Updated.');
    }
}
