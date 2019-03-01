<?php


namespace App\Helper;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

/**
 * Class MenuHelper
 * @package App\Helper
 */
class MenuHelper
{
    /**
     * MenuHelper constructor.
     */
    private static $shareInstance;
    private function __construct()
    {
    }
    public static function getInstance()
    {
        if (self::$shareInstance == null) {
            return new MenuHelper();
        }
        return self::$shareInstance;
    }
    public function getSidebarMenu($roleID ,$companyID )
    {
        //dd(Auth::guard('admins'));
//             $companyID = Auth::guard('admins')->user()->id;
            //dd(Auth::guard('admins'));
//            $roleID =  Auth::guard('admins')->user()->role_id;
        $menu = DB::table('role_company_menus as rcm')
            ->join('menus as m', 'm.id', '=', 'rcm.menu_id')
            ->join('roles as r', 'r.id', '=', 'rcm.role_id')
            ->join('organization_gen_infos as c', 'c.id', '=', 'rcm.company_id')
            ->select('m.*')
            ->where(['rcm.is_active' => 1, 'r.id' => $roleID, 'c.id' => $companyID])
            ->orderBy('m.id', 'asc')
            ->get();
        //dd($menu);
        /**
         * Step 1: Separate to  be two array
         * 1 - Parent Menu
         * 2 - Child Menu
         *
         * Then loop collect the menu to the correct array
         *
         * */

        $parentMenu  = [];
        $childMenu = [];

        foreach ($menu as $value) {
            if ($value->parent_id == 0) {
                array_push($parentMenu,$value);
            } else {
                array_push($childMenu, $value);
            }
        }
        //dd($parentMenu);
        /**
         * Step 2: organize the child menu to the correct parents menus
         * 1- loop parent menu to compare with child menu
         * */
        $arrExclude = [];

        foreach ($parentMenu as $key => $value) {
            $sub_menu = [];
            foreach ($childMenu as $child) {
                if ($child->parent_id == $value->id) {
                    array_push($sub_menu, $child);
                    array_push($arrExclude, $child);
                }
            }
            $parentMenu[$key]->sub_menu = $sub_menu;
        }
        $secondChildMenu = $this->removeArray($childMenu, $arrExclude);
        //dd($secondChildMenu);
        foreach ($parentMenu as $k1 => $menu) {
            foreach ($menu->sub_menu as $k2 => $sub) {
                $second_sub_menu = [];
                foreach ($secondChildMenu as $second_sub) {
                    if ($sub->id == $second_sub->parent_id) {
                        array_push($second_sub_menu, $second_sub);
                    }
                }
                $parentMenu[$k1]->sub_menu[$k2]->sub_menu = $second_sub_menu;
            }
        }
        return $parentMenu;
    }
    public function removeArray($origin, $arr_remove) {
        $result = [];
        foreach ($origin as $value) {
            $isHave = true;
            foreach ($arr_remove as $item) {
                if ($value->id == $item->id) {
                    $isHave = false;
                }
            }
            if ($isHave) {
                array_push($result, $value);
            }
        }
        return $result;
    }
}
