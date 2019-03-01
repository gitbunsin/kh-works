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
}
