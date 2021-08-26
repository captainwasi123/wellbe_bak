<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\services\services;
use App\Models\services\addons;

class ServicesController extends Controller
{
    function custom_services(){
    	$data = array(
    		'title' => 'Custom Services',
    		'all_services' => services::with(['practitioner'])->latest()->get(),
    		'pending_services' => services::with(['practitioner'])->where('status',1)->latest()->get(),
    		'approved_services' => services::with(['practitioner'])->where('status',2)->latest()->get(), 
    		'rejected_services' => services::with(['practitioner'])->where('status',3)->latest()->get(),
    	);
       return view("admin.custom_services.custom_services")->with($data);
    }
	public function custom_services_update(Request $request)
	{
		$id = base64_decode($request->id);
		if($request->status == 'approve'){
			\DB::table('tbl_user_services_info')
                ->where('id', $id)
                ->update(['status' => 2]);
		    $msg = "Services Approved Successfully";	
		}else{
			\DB::table('tbl_user_services_info')
                ->where('id', $id)
                ->update(['status' => 3]);
		    $msg = "Services Rejected Successfully";
		}
		
		return redirect()->route('admin.custom_services')->with('success',$msg);
	}

	public function manage_services(Request $request)
	{
		$data = array(
    		'title' => 'Manage Services',
			'cat_id' => $request->id,
			'services' => services::where('category_id', base64_decode($request->id))->where('status', '!=', '3')->get()
    		);
       return view("admin.custom_services.manage_services")->with($data);
	}



	public function loadServiceDetail(Request $request)
	{
		$data =  services::where('id', base64_decode($request->id))->first();

      return view("admin.custom_services.response.detail_service", ['data' => $data]);
	}


   function addService(Request $request){
    	$data = $request->all();
    	services::addService($data);

    	return redirect()->back()->with('success', 'Service Added.');
   }

   function editService($id){
    	$id = base64_decode($id);

    	$data = services::find($id);

    	return view('admin.custom_services.response.edit_service', ['data' => $data, 'cat_id' => $id]);
   }


   function updateService(Request $request){
      $data = $request->all();
      services::updateService($data);

     	return redirect()->back()->with('success', 'Service Updated.');
   }
    
   function deleteService($id){
    	$id = base64_decode($id);

    	$data = services::find($id);
    	$data->status = '3';
    	$data->save();

    	return redirect()->back()->with('success', 'Service Deleted.');
   }


   function disableService($id){
      $id = base64_decode($id);

      $data = services::find($id);
      $data->status = '1';
      $data->save();

      return redirect()->back()->with('success', 'Service Disabled.');
   }
   function enableService($id){
      $id = base64_decode($id);

      $data = services::find($id);
      $data->status = '2';
      $data->save();

      return redirect()->back()->with('success', 'Service Enabled.');
   }

   //Add Service Addons

   function addAddons(Request $request){
      $data = $request->all();

      addons::addAddon($data);

      return redirect()->back()->with('success', 'Addons Updated.');
   }
}