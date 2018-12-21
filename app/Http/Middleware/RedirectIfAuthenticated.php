<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */

    public function handle($request, Closure $next, $guard = null)
    {
        // dd(Auth::guard($guard));
        switch ($guard) {
            case 'admins' :
        //    dd(Auth::guard($guard));
                if (Auth::guard($guard)->check()) {
                    // dd(Auth::guard($guard));
                    return redirect()->route('admin');
                }
                break;
            default:
                if (Auth::guard($guard)->check())
                {
                    return redirect()->route('home');
                }

                break;
        }
        // dd($request);
        return $next($request);
    }
}
