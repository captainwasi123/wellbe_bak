<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Helpers\Exception;

class CommonHelpers
{
    public static function uploadSingleFile($file, $path = 'uploads/images/', $types = "png,gif,csv,jpeg,jpg", $filesize = '20000', $rule_msgs = [])
    {
        $path = $path . date('Y') . '/';
        if (!file_exists($path)) {
            mkdir($path, 0755, true);
        }
        $rules = array('file' => 'required|mimes:' . $types . "|max:" . $filesize);
        $validator = \Validator::make(array('file' => $file), $rules, $rule_msgs);
        if ($validator->passes()) {
            $rand = time() . "_" . \Str::random(15) . "_";
            $f_name = $rand . $file->getClientOriginalName();
            $filename = $path . $f_name;
            //full size image
            $file->move($path, $f_name);
            return $filename;
        } else {
            return ['error' => $validator->errors()->first('file')];
        }
    }

    public static function get_user_availability($user_availability,$user_holidays)
    {
        $day = array(
            'sunday' => 0,
            'monday' => 1,
            'tuesday' => 2,
            'wednesday' => 3,
            'thursday' => 4,
            'friday' => 5,
            'saturday' => 6,
        );
        $availability = ''; $i = 1;
        foreach($day as $key => $val){ 
            foreach($user_availability as $v){ 
                if($key == $v->week_day){
                    $availability .= 'date.getDay() == '.$val;
                    if($i <= count($user_availability)){
                        $availability .= ' || ';    
                    }
                }
            }
            $i++;
        }  


        // holidays code
        $holidays = [];
        foreach($user_holidays as $val){
            $holidays[] = $val->closed_date;
        } 
        $holidays = json_encode($holidays);

        return array('availability' => $availability, 'holidays' => $holidays);
    }
    // email function
    public static function send_email($view, $data, $to, $subject = 'Welcome !', $from_email = null, $from_name = null)
    {
        $from_name = $from_name ?? env('FROM_EMAIL', '');
        $from_email = $from_email ?? env('FROM_NAME', '');

        $data = (array) $data;
        $data['subject'] = $subject;
        $data['to'] = $to;
        $data['from_name'] = $from_name;
        $data['from_email'] = $from_email;

        $data['email_data'] = $data;
        try {
            Mail::send('emails.' . $view, $data, function ($message) use ($data) {
                $message->from($data['from_email'], $data['from_name']);
                $message->subject($data['subject']);
                $message->to($data['to']);
            });
            return true;
        } catch (Exception $ex) {
            return response()->json($ex);
        }
    }
}
