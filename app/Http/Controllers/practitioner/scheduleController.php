<?php

namespace App\Http\Controllers\practitioner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\schedule\availability;
use App\Models\schedule\availabeSlots;
use App\Models\schedule\holidays;
use Auth;

class scheduleController extends Controller
{
    function index(){
    	$data = array();
    	$data['sunday'] = availability::where(['user_id' => Auth::id(), 'week_day' => 'sunday'])->first();
    	$data['monday'] = availability::where(['user_id' => Auth::id(), 'week_day' => 'monday'])->first();
    	$data['tuesday'] = availability::where(['user_id' => Auth::id(), 'week_day' => 'tuesday'])->first();
    	$data['wednesday'] = availability::where(['user_id' => Auth::id(), 'week_day' => 'wednesday'])->first();
    	$data['thursday'] = availability::where(['user_id' => Auth::id(), 'week_day' => 'thursday'])->first();
    	$data['friday'] = availability::where(['user_id' => Auth::id(), 'week_day' => 'friday'])->first();
    	$data['saturday'] = availability::where(['user_id' => Auth::id(), 'week_day' => 'saturday'])->first();

    	$data['holidays'] = holidays::where(['user_id' => Auth::id()])->get();

    	return view('practitioner.schedule.availability', ['data' => $data]);
    }

    public function save(Request $request)
    {
    	$data = $request->all();

    	availability::where('user_id', Auth::id())->delete();
    	availabeSlots::where('user_id', Auth::id())->delete();
    	holidays::where('user_id', Auth::id())->delete();

    	availability::addAvailability($data);
        holidays::addHoliday($data['closed']);

        return redirect()->back()->with('success', 'Availability Slots Updated.');
    }
}
