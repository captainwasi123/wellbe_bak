<?php

namespace App\Http\Controllers\practitioner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\plan\Plan;
use App\Models\plan\PackageUserSubscription;

class PlanController extends Controller
{
    function index(){ 
        $data = array(
            'title' => "My Plan",
            'plan_data' => Plan::with(['billig_type','plan_detail'])->latest()->get(), 
        ); 
    	return view('practitioner.plan.view_plan')->with($data);
    }

   public function plan_buy($id)
   {
   	 $id = base64_decode($id);
   	 $plan_data = Plan::with(['billig_type'])->where('id',$id)->first();
   	  
   	  $subcrption = new PackageUserSubscription();
   	  $subcrption->user_id = auth()->user()->id;
   	  $subcrption->plan_id = $id;
   	  $subcrption->start_date = date('Y-m-d');
   	  $subcrption->end_date = date('Y-m-d', strtotime("+".$plan_data->billig_type->no_months. " months"));
   	  $subcrption->auto_renew = 1;
   	  $subcrption->is_active = 1;
   	  $subcrption->save();
   	  return redirect()->route('practitioner.plan')->with('success',"Package subscribe Successfully");
   }
}
