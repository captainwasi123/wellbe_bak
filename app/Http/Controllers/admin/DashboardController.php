<?php

namespace App\Http\Controllers\admin;

use Auth;
use App\Models\User;
use App\Models\Admin;
use App\Models\orders\order;
use App\Models\orders\cancel;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use App\Models\MarketplaceSetting;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    function index(){
        Auth::guard('web')->logout();
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
        /*$accounts = array(
                    ''
                );*/
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

    
    //Practitioner
    function practitioners(){
        $data = User::where('user_type', '1')->get();

        return view("admin.practitioners.practitioners", ['data' => $data]);
    }
    function disablePractitioners(Request $request){
        $id = base64_decode($request->get('pid'));
        $data = User::find($id);
        $data->status = '2';
        $data->save();

        return redirect()->back()->with('success', 'Practitioner Disabled.');    
    }

    function assumePractitioners(Request $request){
        $id = base64_decode($request->get('pid'));
        $data = User::find($id);
        $data->status = '1';
        $data->save();

        return redirect()->back()->with('success', 'Practitioner Assumed.');    
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

    public function change_password(Request $request){
        //dd($request) . die;
        $request->validate([
            'current_password' => ['required','string'],
            'new_password' => ['required','string', 'min:8'],
        ]);
        $admin = Admin::find($request->id);
        $hashedPassword = Hash::check($request->current_password, $admin->password);

        if(!Hash::check($request->new_password, $admin->password)){
            if ($hashedPassword) {
                $admin->password = Hash::make($request->new_password);
                $admin->save();
                return redirect()->back()->with('success','Password Update Successfully');
            }else{
                $data = array(
                    'old_password' => $request->current_password,
                    'new_password' => $request->new_password,
                    'confirm_password' => $request->confirm_password,
                    'error' => 'old password doesnt matched'
                );
                return redirect()->back()->with($data);
            }
        }else{
            $data = array(
                'old_password' => $request->current_password,
                'error' => 'new password can not be the old password!'
            );
            return redirect()->back()->with($data);
        }
    }

    //Response

    function bookingView1($id){
        $id = base64_decode($id);
        $data = order::find($id);

        $gst = MarketplaceSetting::latest()->first();

        return view('admin.bookings.response.view', ['data' => $data, 'gst' => $gst->gst]);
    }


    //Cancel

    function bookingCancel(Request $request){ 
        $data = $request->all();
        $id = base64_decode(base64_decode($data['oid']));
        $des = $data['description'];

        cancel::cancellation($id, $des, '0');
        
        $order = Order::with(['details','practitioner','booker'])->where('id',$id)->first();
        $data['order'] = $order; 
        $data['mtp'] = MarketplaceSetting::latest()->first();
        \App\Helpers\CommonHelpers::send_email('BookingCancellationCustomer_other', $data, $order->booker->email, 'Booking Cancellation', $from_email = 'info@divsnpixel.com', $from_name = 'Wallbe');
        \App\Helpers\CommonHelpers::send_email('BookingCancellationPractitioner', $data, $order->practitioner->email, 'Booking Cancellation', $from_email = 'info@divsnpixel.com', $from_name = 'Wallbe');         
        
        return redirect()->back()->with('success', 'Order Cancelled.');
    }

    //Mark as Paid
    function bookingMarkasPaid($id){
        $id = base64_decode(base64_decode($id));
        $o = order::find($id);
        $o->payment_status = '1';
        $o->save();

        return redirect()->back()->with('success', 'Order marked as paid.');
    }
    function bookingUnmarkasPaid($id){
        $id = base64_decode(base64_decode($id));
        $o = order::find($id);
        $o->payment_status = '0';
        $o->save();

        return redirect()->back()->with('success', 'Order unmarked as paid.');
    }



    //Mark as Paid ----- Customer
    function cancelMarkCust($id){
        $id = base64_decode($id);
        $o = cancel::find($id);
        $o->cust_due = '1';
        $o->save();

        return redirect()->back()->with('success', 'Marked as paid.');
    }
    function cancelunMarkCust($id){
        $id = base64_decode($id);
        $o = cancel::find($id);
        $o->cust_due = null;
        $o->save();

        return redirect()->back()->with('success', 'Unmarked as paid.');
    }



    //Mark as Paid ----- Practitioner
    function cancelMarkPract($id){
        $id = base64_decode($id);
        $o = cancel::find($id);
        $o->pract_due = '1';
        $o->save();

        return redirect()->back()->with('success', 'Marked as paid.');
    }
    function cancelunMarkPract($id){
        $id = base64_decode($id);
        $o = cancel::find($id);
        $o->pract_due = null;
        $o->save();

        return redirect()->back()->with('success', 'Unmarked as paid.');
    }
    public function practitioners_portal(Request $request)
    {
       $id = base64_decode($request->id);
       $user = User::find($id); 
       Auth::login($user); 
       Session::put('user_type', 'admin');
       return redirect(route('practitioner.dashboard'));
    }  
}
