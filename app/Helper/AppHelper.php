<?php
namespace App\Helper;

use Illuminate\Support\Facades\Auth;

/**
 * Class AppHelper
 * @package App\Helper
 */
class AppHelper {

    /**
     * Instance of object AppHelper as Singleton
     * @var
     */
    private static $shareInstance;

    /**
     * Private Constructor to present initial many object of AppHelper
     *
     */
    private function __construct()
    {
    }

    /**
     * To get an instance object AppHelper
     *
     * @return AppHelper
     */
    public static function getInstance()
    {
        if (self::$shareInstance == null) {
            return new AppHelper();
        }
        return self::$shareInstance;
    }

    /**
     * To get Authentication [admin, employee]
     *
     * @return mixed
     */
    private function getAuth() {
        if (Auth::guard('admins')->user()) {
            return Auth::guard('admins');
        }
        return Auth::guard('employee');
    }
    /**
     * To get company_id base on Authentication [admin, employee]
     *
     * @return mixed
     */
    public function getCompanyId() {

        //If auth login is not admin
        if($this->getAuth()->user()->id == null) {
            return $this->getAuth()->user()->company_id;
        }

        return $this->getAuth()->user()->id;
    }


    /**
     * To get role id base on Authentication [admin, employee]
     *
     * @return mixed
     */
    public function getRoleID() {

        return $this->getAuth()->user()->role_id;
    }
}