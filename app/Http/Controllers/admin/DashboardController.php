<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Auth;
use App\Models\User;
use App\Models\orders\order;
use App\Models\MarketplaceSetting;

class DashboardController extends Controller
{
    function index(){
        $curr = date('Y-m-d H:i:s');
        $upcomming = order::where('start_at', '>=', $curr)
                        ->where('status', '1')
                        ->orderBy('start_at')
                        ->limit(12)
                        ->get();
        $data_count = array(
                        'practitioners' => User::where('user_type', '1')->count(),
                        'upcomming' => order::where('status', '1')->count(),
                        'completed' => order::where('status', '3')->count(),
                        'cancelled' => order::where('status', '4')->count(), 
                    );
        return view('admin.index', ['upcomming' => $upcomming, 'data_count' => $data_count]);
    }

    function upcomming(){
        $curr = date('Y-m-d H:i:s');
        $data = order::where('start_at', '>=', $curr)
                        ->where('status', '1')
                        ->orderBy('start_at')
                        ->get();

        return view('admin.bookings.upcomming', ['data' => $data]);
    }

    function inprogress(){
        $data = order::where('status', '2')
                        ->orderBy('start_at')
                        ->get();

        return view('admin.bookings.inprogress', ['data' => $data]);
    }

    function completed(){
        $data = order::where('status', '3')
                        ->orderBy('start_at')
                        ->get();
                        
        return view('admin.bookings.completed', ['data' => $data]);
    }

    function cancelled(){
        $data = order::where('status', '4')
                        ->orderBy('start_at')
                        ->get();
                        
        return view('admin.bookings.cancelled', ['data' => $data]);
    }

    function customers(){
        $data = User::where('user_type', '2')->get();

        return view("admin.customers.customers", ['data' => $data]);
    }

    function practitioners(){
        $data = User::where('user_type', '1')->get();

        return view("admin.practitioners.practitioners", ['data' => $data]);
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



    //Response

    function bookingView1($id){
        $id = base64_decode($id);
        $data = order::find($id);

        $gst = MarketplaceSetting::latest()->first();

        return view('admin.bookings.response.view', ['data' => $data, 'gst' => $gst->gst]);
    }
}
