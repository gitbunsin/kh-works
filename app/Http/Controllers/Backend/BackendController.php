<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Helper\AppHelper;
use App\Helper\MenuHelper;
use Illuminate\Support\Facades\View;


/**
 * Class BackendController
 * @package App\Http\Controllers\Backend
 */
class BackendController extends Controller
{


    /**
     * BackendController constructor.
     */
    public function __construct()
   {
       $this->middleware('isAdmin');
   }
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $this->shareMenu();
        return view('Backend.HRIS.layouts.cms-layouts');
    }

    public function shareMenu() {
        $menus = MenuHelper::getInstance()->getSidebarMenu(AppHelper::getInstance()->getRoleID(), AppHelper::getInstance()->getCompanyId());
        View::share('menus', $menus);
    }
}
