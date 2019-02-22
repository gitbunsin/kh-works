<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //
    protected  $table ="menus";
    protected $fillable = [
      "name",
      "description",
      "parent_id"
    ];

    public $timestamps = false;

    public function sub_menu(){
        return $this->hasMany('App\Menu', 'parent_id');
    }
}
