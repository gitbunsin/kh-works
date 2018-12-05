<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
   }
    public function index()
    {
        return view('Backend.HRIS.layouts.cms-layouts');
    }
}
