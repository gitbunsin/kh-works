<?php

namespace App\Providers;

use App\Policies\UserPolicy;
use App\User;
use App\UserEmployee;
use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Schema; //Import Schema
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy'
//        UserEmployee::class => UserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191); //Solved by increasing StringLength
        Passport::routes();
        $this->registerPolicies();

        Gate::define('admin-only', function ($authAdmin){
//            dd($user);
            $isAdmin = $authAdmin? true: false;
            return $isAdmin;
        });
//        $admin = Auth::guard('admins')->user();
//        $user = Auth::guard('employee')->user();
//        $access = UserEmployee::all();ssss
//        dd($access);
//        $user = Auth::guard('employee')->user();
//        $user = Auth::user();
//        dd($user);
//        dd('hello');


        // Auth gates for: User management
//        $auth = $this->app['auth'];
//        view()->composer('*', function ($view) use($auth) {
//
//            dd($auth->user());
//
//        }); // OK });
//        view()->composer('*', function ($view) use($auth) {
//            dd($auth->user()); // OK });
////        Gate::define('user_management_access', function (UserEmployee $user) {
//////             dd($user);
////
////            return in_array($user->role_id, [1]);
////
////
////        });
//            //
//
//
//            // public function register()
//            // {
//            //     Auth::resolveUsersUsing(function($guard = null) {
//            //         return Auth::user() ? Auth::user() : Auth::guard('admins')->tbl_organization_gen_info();
//            // });
//            // }
//        });
    }
}
