<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'tbl_organization_gen_info';
    protected $fillable = ['name', 'phone','email','country'];
    public $timestamps = false;
    //
}
