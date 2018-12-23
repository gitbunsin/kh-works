<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BackendController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
//    protected  $redirectTo ="/login";

   public function __construct()
   {
       $this->middleware('isAdmin');
//       $this->middleware('isEmployee');
   }

    public function index()
    {
//        dd(Auth::guard('employee')->user()->email);
        return view('Backend.HRIS.layouts.cms-layouts');
    }
}
