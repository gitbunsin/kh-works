<?php

namespace App\Providers;

use App\Helper\MenuHelper;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        // dd(Auth::guard('admins'));
        // if (Auth::guard('admins')->user() != null || Auth::guard('employee')->user() != null) {
            $menus = MenuHelper::getInstance()->getSidebarMenu(1,1);
            View::share('menus', $menus);
        // }


        Schema::defaultStringLength(191);

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
