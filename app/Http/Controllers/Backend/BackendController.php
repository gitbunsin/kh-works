<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helper\AppHelper;
use App\Helper\MenuHelper;


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
       //parent::__construct();
//       $this->middleware('isEmployee');
   }

    public function index()
    {
       //dd(Auth::guard('admins'));
//        dd(Auth::guard('employee')->user()->email);
       // $authObj = AppHelper::getInstance()->getAuth();
       // $menus = MenuHelper::getInstance()->getsidebarMenu($authObj->user()->id, $authObj->user()->role_id);
       //  return view('Backend.HRIS.layouts.cms-layouts',compact('menus'));
        return view('Backend.HRIS.layouts.cms-layouts');
    }
}
