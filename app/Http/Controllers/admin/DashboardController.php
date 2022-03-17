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
use App\Models\Categories;
use App\Models\userCategory;
use App\Models\userService;
use Carbon\Carbon;

class DashboardController extends Controller
{
    function index(){
        Auth::guard('web')->logout();
        $curr = date('Y-m-d H:i:s');
        $upcomming = order::where('status', '1')
                        ->orderBy('created_at', 'desc')
                        ->limit(12)
                        ->get();
        $data_count = array(
                        'practitioners' => User::where('user_type', '1')->count(),
                        'upcomming' => order::where('status', '1')->whereDate('start_at', '>=', Carbon::now())->count(),
                        'completed' => order::where('status', '3')->count(),
                        'cancelled' => order::where('status', '4')->count(),
                    );

                    // dd($data_count);
        /*$accounts = array(
                    ''
                );*/
        return view('admin.index', ['upcomming' => $upcomming, 'data_count' => $data_count]);
    }

    function upcomming(){
        $curr = date('Y-m-d H:i:s');
        $data = order::where('status', '1')
                        ->orderBy('created_at', 'desc')
                        ->get();

        return view('admin.bookings.upcomming', ['data' => $data]);
    }

    function inprogress(){
        $data = order::where('status', '2')
                        ->orderBy('created_at', 'desc')
                        ->get();

        return view('admin.bookings.inprogress', ['data' => $data]);
    }

    function completed(){
        $data = order::where('status', '3')
                        ->orderBy('created_at', 'desc')
                        ->get();

        return view('admin.bookings.completed', ['data' => $data]);
    }
    function completedMark(Request $request){
        $data = $request->all();
        order::whereIn('id', $data['ids'])->update(['payment_status' => $data['status']]);

        return 'done';
    }

    function completedMarked(){
        return redirect()->back()->with('success', 'Payment Status Updated.');
    }
    function completedExport(Request $request){
        $date = date('d-M-Y__h-i-A');
        $fileName = 'Completed_Booking_'.$date.'.csv';
        $data = order::where('status', '3')
                        ->orderBy('created_at', 'desc')
                        ->get();
        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $Heading = array('Wellbe Completed Bookings Data | CSV');
        $columns = array('Date', 'Booking ID', 'Booker Name', 'Subtotal', 'GST Amount', 'Total Charge','Practitioner Earning', 'Marked as Paid', 'Payment Due', 'Practitioner Name', 'Practitioner Bank Acount Name', 'Practitioner Bank Account Number', 'Refund Amount');

        $callback = function() use($data, $columns, $Heading) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $Heading);
            fputcsv($file, array('-'));
            fputcsv($file, $columns);

            foreach ($data as $val) {
                $row['Date']                                = date('l, d M Y - h:i A', strtotime($val->start_at.' '.$val->details[0]->start_time));
                $row['Booking ID']                          = '#'.$val->id;
                $row['Booker Name']                         = @$val->booker->first_name.' '.@$val->booker->last_name;
                $row['Subtotal']                            = $val->sub_total;
                $row['GST Amount']                          = $val->gst;
                $row['Total Charge']                        = $val->total_amount;
                $row['Practitioner Earning']                = $val->pract_earning;
                $row['Marked as Paid']                      = $val->payment_status == '0' ? 'No' : 'Yes';
                $row['Payment Due']                         = $val->payment_status == '0' ? '$'.number_format($val->pract_earning, 2) : '$0.0';
                $row['Practitioner Name']                   = @$val->practitioner->first_name.' '.@$val->practitioner->last_name;
                $row['Practitioner Bank Acount Name']       = @$val->practitioner->users_payout_details->bank_account_name;
                $row['Practitioner Bank Account Number']    = @$val->practitioner->users_payout_details->bank_account_number;
                $row['Refund Amount']                       = $val->refund_amount;

                fputcsv($file, $row);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    function cancelled(){
        
        $data = order::where('status', '4')
                        ->orderBy('created_at', 'desc')
                        ->get();

        return view('admin.bookings.cancelled', ['data' => $data]);
    }
    function cancelledExport(Request $request){
        $date = date('d-M-Y__h-i-A');
        $fileName = 'Cancelled_Booking_'.$date.'.csv';
        $data = order::where('status', '4')
                        ->orderBy('created_at', 'desc')
                        ->get();
        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $Heading = array('Wellbe Cancelled Bookings Data | CSV');
        $columns = array('Booking Date','Cancellation Date', 'Cancellation Reason',  'Booking ID', 'Booker Name', 'Subtotal', 'GST Amount', 'Total Charge', 'Marked as Paid - Practitioner', 'Marked as Paid - Customer','Payment Percentage', 'Payment Due', 'Practitioner Name', 'Practitioner Bank Acount Name', 'Practitioner Bank Account Number', 'Refund Percentage', 'Refund Amount', 'Total Refund Amount');

        $callback = function() use($data, $columns, $Heading) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $Heading);
            fputcsv($file, array('-'));
            fputcsv($file, $columns);

            foreach ($data as $val) {
                $pract_percentage = $val->cancel->pract_per;
                $cust_percentage = $val->cancel->cust_per;
                $pract_dues = ($val->total_amount/100)*$pract_percentage;
                $cust_dues = ($val->total_amount/100)*$cust_percentage;

                $row['Booking Date']                      = date('l, d M Y - h:i A', strtotime($val->start_at.' '.$val->details[0]->start_time));
                $row['Cancellation Date']                 = date('l, d M Y - h:i A', strtotime(@$val->cancel->created_at));
                $row['Cancellation Reason']               = @$val->cancel->reason;
                $row['Booking ID']                        = '#'.$val->id;
                $row['Booker Name']                       = @$val->booker->first_name.' '.@$val->booker->last_name;
                $row['Subtotal']                          = $val->sub_total;
                $row['GST Amount']                        = $val->gst;
                $row['Total Charge']                      = $val->total_amount;
                $row['Marked as Paid - Practitioner']     = empty($val->cancel->pract_due) ? 'No' : 'Yes';
                $row['Marked as Paid - Customer']         = empty($val->cancel->cust_due) ? 'No' : 'Yes';
                $row['Payment Percentage']                = $pract_percentage.'%';
                $row['Payment Due']                       = $pract_dues;
                $row['Practitioner Name']                 = @$val->practitioner->first_name.' '.@$val->practitioner->last_name;
                $row['Practitioner Bank Acount Name']     = @$val->practitioner->users_payout_details->bank_account_name;
                $row['Practitioner Bank Account Number']  = @$val->practitioner->users_payout_details->bank_account_number;
                $row['Refund Percentage']                 = $cust_percentage.'%';
                $row['Refund Amount']                     = $cust_dues;
                $row['Total Refund Amount']               = $cust_dues+$pract_dues;

                fputcsv($file, $row);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    function incomplete(){
        $data['orders'] = order::where('status', '9')
                       ->orderBy('created_at', 'desc')
                       ->get();
        return view('admin.bookings.incomplete')->with($data);
    }
    function incompleteExport(Request $request){
        $date = date('d-M-Y__h-i-A');
        $fileName = 'Incomplete_Booking_'.$date.'.csv';
        $data = order::where('status', '9')
                        ->orderBy('created_at', 'desc')
                        ->get();
        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $Heading = array('Wellbe Incomplete Bookings Data | CSV');
        $columns = array('Date', 'Booking ID','Practitioner Name', 'Booker Name', 'Address', 'Charge');

        $callback = function() use($data, $columns, $Heading) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $Heading);
            fputcsv($file, array('-'));
            fputcsv($file, $columns);

            foreach ($data as $val) {
                $row['Date']                                = date('l, d M Y - h:i A', strtotime($val->start_at.' '.@$val->details[0]->start_time));
                $row['Booking ID']                          = '#'.$val->id;
                $row['Practitioner Name']                   = @$val->practitioner->first_name.' '.@$val->practitioner->last_name;
                $row['Booker Name']                         = @$val->booker->first_name.' '.@$val->booker->last_name;
                $row['Address']                             = $val->address;
                $row['Charge']                        = $val->total_amount;

                fputcsv($file, $row);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    function customers(){
        $data = User::where('user_type', '2')->get();

        return view("admin.customers.customers", ['data' => $data]);
    }
    function customersExport(Request $request){
        $date = date('d-M-Y__h-i-A');
        $fileName = 'Customers_'.$date.'.csv';
        $data = User::where('user_type', '2')->get();
        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $Heading = array('Wellbe Customers Data | CSV');
        $columns = array('First Name', 'Last Name', 'Email', 'Phone Number', 'Street', 'Suburb', 'City', 'Postcode', 'Newsletter', 'Upcomming Bookings', 'Completed Bookings', 'Cancelled Bookings', 'Revenue Generated');

        $callback = function() use($data, $columns, $Heading) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $Heading);
            fputcsv($file, array('-'));
            fputcsv($file, $columns);

            foreach ($data as $val) {
                $row['First Name']          = $val->first_name;
                $row['Last Name']           = $val->last_name;
                $row['Email']               = $val->email;
                $row['Phone Number']        = $val->phone;
                $row['Street']              = @$val->user_address->street;
                $row['Suburb']              = @$val->user_address->suburb;
                $row['City']                = @$val->user_address->city;
                $row['Postcode']            = @$val->user_address->postcode;
                $row['Newsletter']          = $val->newsletter == '0' ? 'NO' : 'YES';
                $row['Upcomming Bookings']  = count($val->b_upcoming);
                $row['Completed Bookings']  = count($val->b_completed);
                $row['Cancelled Bookings']  = count($val->b_cancelled);
                $row['Revenue Generated']   = empty($val->b_revenue) ? '0' : '$'.number_format($val->b_revenue[0]->totalRevenue, 2);

                fputcsv($file, array($row['First Name'], $row['Last Name'], $row['Email'], $row['Phone Number'], $row['Street'],$row['Suburb'],$row['City'],$row['Postcode'],$row['Newsletter'],$row['Upcomming Bookings'],$row['Completed Bookings'],$row['Cancelled Bookings'],$row['Revenue Generated']));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }


    //Practitioner
    function practitioners(){
        order::whereDate('start_at', '<', Carbon::now())
                        ->where('status', '1')
                        ->update(['status' => '6']);
        $data = User::where('user_type', '1')->get();

        return view("admin.practitioners.practitioners", ['data' => $data]);
    }

    function practitionersExport(Request $request){
        $date = date('d-M-Y__h-i-A');
        $fileName = 'Practitioners_'.$date.'.csv';
        $data = User::where('user_type', '1')->get();
        $mtp = MarketplaceSetting::latest()->first();

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $Heading = array('Wellbe Practitioners Data | CSV');
        $columns = array('First Name', 'Last Name', 'Email', 'Phone Number','Gender', 'Bio', 'Buffer Period', 'Bank Account Name', 'Bank Account Number', 'Marketplace Commission', 'Street', 'Suburb', 'City', 'Postcode', 'Newsletter', 'Upcomming Bookings', 'Completed Bookings', 'Cancelled Bookings', 'Revenue Generated','Store Page', 'Status');

        $callback = function() use($data, $columns, $Heading, $mtp) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $Heading);
            fputcsv($file, array('-'));
            fputcsv($file, $columns);

            foreach ($data as $val) {
                $row['First Name']              = $val->first_name;
                $row['Last Name']               = $val->last_name;
                $row['Email']                   = $val->email;
                $row['Phone Number']            = $val->phone;
                $row['Gender']                  = $val->gender;
                $row['Bio']                     = $val->bio_description;
                $row['Buffer Period']           = @$val->user_store->buffer_between_appointments;
                $row['Bank Account Name']       = @$val->users_payout_details->bank_account_name;
                $row['Bank Account Number']     = @$val->users_payout_details->bank_account_number;
                $row['Marketplace Commission']  = $mtp->comission.' %';
                $row['Street']              = @$val->user_address->street;
                $row['Suburb']              = @$val->user_address->suburb;
                $row['City']                = @$val->user_address->city;
                $row['Postcode']            = @$val->user_address->postcode;
                $row['Newsletter']          = $val->newsletter == '0' ? 'NO' : 'YES';
                $row['Upcomming Bookings']  = count($val->p_upcoming);
                $row['Completed Bookings']  = count($val->p_completed);
                $row['Cancelled Bookings']  = count($val->p_cancelled);
                $row['Revenue Generated']   = empty($val->p_revenue) ? '0' : '$'.number_format($val->p_revenue[0]->totalRevenue, 2);
                $row['Store Page'] = $val->store_status == '1' ? 'Enabled' : 'Disabled';
                $row['Status']              = $val->status == '1' ? 'Active' : 'Disabled';

                fputcsv($file, $row);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
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

        return redirect()->back()->with('success', 'Practitioner Activated');
    }

    function manageCategory($id){
        $id = base64_decode($id);

        $userCat = userCategory::where('user_id', $id)->get();
        $categories = Categories::all();

        return view('admin.practitioners.response.manageCategory', ['userCat' => $userCat, 'categories' => $categories, 'uid' => $id]);
    }
    function manageCategoryUpdate(Request $request){
        $data = $request->all();
        $cat_arr = empty($data['cat_id']) ? array() : $data['cat_id'];
        $dc = array();
        $ac = userCategory::where('user_id', base64_decode($data['uid']))->get();
        foreach($ac as $val){
            if(!in_array(base64_encode($val->category_id),$cat_arr)){
                array_push($dc, $val->category_id);
            }
        }
        userCategory::where('user_id', base64_decode($data['uid']))->delete();
        userService::where('user_id', base64_decode($data['uid']))
            ->whereHas('service', function($q) use ($dc){
                return $q->whereHas('cat', function($qq) use ($dc){
                    return $qq->whereIn('id', $dc);
                });
            })->delete();
        foreach($cat_arr as $val){
            $c = new userCategory;
            $c->user_id = base64_decode($data['uid']);
            $c->category_id = base64_decode($val);
            $c->save();
        }

        return redirect()->back()->with('success', 'Practitioner`s Categories Updated.');
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

        return view('admin.bookings.response.view', ['data' => $data, 'gst' => $gst->gst, 'commission' => $gst->comission]);
    }

    function comissionEdit(Request $request){
        $data = $request->all();
        $o = order::find(base64_decode($data['oid']));
        $o->comission = $data['comission'];
        $o->pract_earning = $o->sub_total - (($o->sub_total/100)*$data['comission']);
        $o->save();

        return redirect()->back()->with('success','Commission Updated | Order#: '.$o->id);
    }

    function refundEdit(Request $request){
        $data = $request->all();
        $o = order::find(base64_decode($data['oid']));
        $o->refund_amount = $data['refundAmount'];
        $o->save();

        return redirect()->back()->with('success','Refund Amount Updated | Order#: '.$o->id);
    }

    function practAmountEdit(Request $request){
        $data = $request->all();
        $o = cancel::where('order_id', base64_decode($data['oid']))->first();
        $o->pract_per = $data['practAmount'];
        $o->cust_per = $data['custAmount'];
        $o->save();

        return json_encode(array('status' => 200,'message'=>'Percentage Updated', 'data' => $data));
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
        \App\Helpers\CommonHelpers::send_email('BookingCancellationCustomer_customer_cancelled', $data, $order->booker->email, 'Booking Cancellation', $from_email = 'info@wellbe.co.nz', $from_name = 'Wellbe');
        \App\Helpers\CommonHelpers::send_email('BookingCancellationPractitioner', $data, $order->practitioner->email, 'Booking Cancellation', $from_email = 'info@wellbe.co.nz', $from_name = 'Wellbe');

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
