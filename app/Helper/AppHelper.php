<?php
namespace App\Helper;

use Illuminate\Support\Facades\Auth;
class AppHelper {

    private static $shareInstance;
    private function __construct()
    {
    }
    public static function getInstance()
    {
        if (self::$shareInstance == null) {
            return new AppHelper();
        }
        return self::$shareInstance;
    }

    public function getAuth() {
        if (Auth::guard('admins')->user()) {
            return Auth::guard('admins');
        }
        return Auth::guard('employee');
    }
}