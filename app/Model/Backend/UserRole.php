<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{

    protected $table = 'tbl_user_role';
    protected $fillable = ['id', 'name','display_name','is_assignable','is_predefined','created_by','fd','td'];
    public $timestamps = false;
    //
}
