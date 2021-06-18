<?php

namespace App\Http\Controllers\practitioner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\services\category;
use App\Models\services\services;
use App\Models\services\addons;
use Auth;

class servicesController extends Controller
{
    function index(){
    	$data = array();
    	$data['category'] = category::where('status', '1')->get();

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
        services::updateService($data);

        return redirect()->back()->with('success', 'Service Updated.');
    }

    function loadService($id){
        if ($id == 'pending_services') {
            $data = services::where(['user_id' => Auth::id(), 'status' => '1'])
                    ->orderBy('name')
                    ->get();
        }else{
            $id = base64_decode($id);

        	$data = services::where(['category_id' => $id, 'user_id' => Auth::id(), 'status' => '2'])
        			->orderBy('name')
        			->get();
        }

    	return view('practitioner.services.response.load_services', ['data' => $data, 'cat_id' => $id]);
    }

    function loadServiceDetail($id){
        $id = base64_decode($id);

        $data = services::find($id);

        return view('practitioner.services.response.detail_services', ['data' => $data]);
    }

    function deleteService($id){
    	$id = base64_decode($id);

    	$data = services::find($id);
    	$data->status = '3';
    	$data->save();

    	return redirect()->back()->with('success', 'Service Deleted.');
    }

    function editService($id){
    	$id = base64_decode($id);

    	$data = services::find($id);

    	return view('practitioner.services.response.edit_service', ['data' => $data, 'cat_id' => $id]);
    }


    //Add Service Addons

    function addAddons(Request $request){
        $data = $request->all();

        addons::addAddon($data);

        return redirect()->back()->with('success', 'Addons Updated.');
    }
}
