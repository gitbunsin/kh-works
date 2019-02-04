<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    //
    protected $connection = 'mysql';
    protected $table = 'tbl_menu_list';
    protected $fillable =
        ['id',
            'name',
            'action_url',
            'status',
            'role_id'
        ];


    public $timestamps = false;
}
