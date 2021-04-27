<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\MarketplaceSetting;

class DashboardController extends Controller
{
    function index(){
        return view('admin.index');
    }

    function upcomming(){
        return view('admin.bookings.upcomming');
    }

    function inprogress(){
        return view('admin.bookings.inprogress');
    }

    function completed(){
        return view('admin.bookings.completed');
    }

    function cancelled(){
        return view('admin.bookings.cancelled');
    }

    function customers(){
        return view("admin.customers.customers");
    }

    function practitioners(){
        return view("admin.practitioners.practitioners");
    }
    function marketplace_catalogue(){
        return view("admin.marketplace_catalogue.marketplace_catalogue");
    }

    function edit_profile(){
        $data = array(
            'title' => 'Edit Profile',
            'user_data' => \Auth::guard('admin')->user(),
            'marketplace_data' => MarketplaceSetting::latest()->first(),
        );
       return view("admin.profile.edit_profile")->with($data);
    }

    public function update_profile(Request $request)
    {
        $user = Admin::where('id',\Auth::guard('admin')->user()->id)->first();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->save();
        return redirect()->route('admin.edit_profile')->with('success','Profile Updated Successfully');
    }
    public function update_comission(Request $request)
    {
        $MarketplaceSetting = new MarketplaceSetting();
        $MarketplaceSetting->comission = $request->comission;
        $MarketplaceSetting->gst = $request->gst;
        $MarketplaceSetting->save();
        return redirect()->route('admin.edit_profile')->with('success','Marketplace Settings Updated Successfully');
    }
}
