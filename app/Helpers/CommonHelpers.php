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

}
