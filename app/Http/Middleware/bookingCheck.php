<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class bookingCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        
        if(Auth::check() && Auth::user()->user_type == '2'){
            return $next($request);
        }else{
            return redirect('/login')->with('error', 'Please login to a booker account to proceed with this booking. Bookings cannot be made by practitioner accounts.');
        }
    }
}
