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
//    public function handle($request, Closure $next, $guard = null)
//    {
//        if (Auth::guard($guard)->check()) {
//            return redirect('/home');
//        }
//
//        return $next($request);
//    }

    public function handle($request, Closure $next, $guard = null)
    {
        //dd($request);
        switch ($guard) {
            case 'admins' :
                if (Auth::guard($guard)->check()) {

                    return redirect()->route('admin');
                }
//                dd($request);
//                dd('hello admin two');
                break;
            default:
                if (Auth::guard($guard)->check()) {
//                    dd('hello');
                    return redirect()->route('home');
                }
//                dd('hello admin one');
                break;
        }
        return $next($request);
    }
}
