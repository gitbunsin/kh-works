<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;

use Closure;

class VerifyAdmin
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
//        dd(Auth::guard('employee')->user());
        if(Auth::guard('admins')->user() == null && Auth::guard('employee')->user()== null)
        {
            return redirect()->route('login');
        }
        return $next($request);
    }
}
