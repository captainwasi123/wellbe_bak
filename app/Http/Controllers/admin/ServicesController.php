<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\services\services;

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
    		);
       return view("admin.custom_services.manage_services")->with($data);
	}
}