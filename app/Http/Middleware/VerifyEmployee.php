<?php

namespace App\Http\Middleware;

use App\Model\Employee;
use App\UserEmployee;
use Illuminate\Support\Facades\Auth;

use Closure;

class VerifyEmployee
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $token = $request->route('token');
        $employee = UserEmployee::where('email_token',$token)->first();
//        if(Auth::guard('employee')->user() != null) {
//
//            return redirect()->route('admin');
//        }
        if($employee){

           return  $next($request);

        }else{
            return abort(404);
        }

    }
}
