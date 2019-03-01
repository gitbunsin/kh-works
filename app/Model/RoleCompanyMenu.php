<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RoleCompanyMenu extends Model
{
    //

    protected $table = 'role_company_menus';
    protected $fillable = ['id', 'company_id','role_id','menu_id','is_active'];
    public $timestamps = false;
}
