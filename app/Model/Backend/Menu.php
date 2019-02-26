<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //
    protected  $table ="menus";
    protected $fillable = [
      "name",
      "link",
      "description",
      "parent_id"
    ];

    public $timestamps = false;

    public function parent() {

        return $this->hasOne('menus', 'id', 'parent_id');

    }

    public function children() {

        return $this->hasMany('menus', 'parent_id', 'id');
    }

    public static function tree() {

        return static::with(implode('.', array_fill(0, 4, 'children')))->where('parent_id', '=', 0)->get();

    }
}
