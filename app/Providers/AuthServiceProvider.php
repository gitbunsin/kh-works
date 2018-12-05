<?php

namespace App\Providers;

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
        'App\Model' => 'App\Policies\ModelPolicy',
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

        //
    }

    // public function register()
    // {
    //     Auth::resolveUsersUsing(function($guard = null) {
    //         return Auth::user() ? Auth::user() : Auth::guard('admins')->tbl_organization_gen_info();
    // });
    // }
}
