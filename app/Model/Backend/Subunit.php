<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subunit extends Model
{
    //

    protected $connection = 'mysql';
    protected $table = 'tbl_subunit';
    protected $fillable =
        ['id',
            'employee_id',
            'name',
            'unit_id',
            'description',
            'lft',
            'rgt',
            'level',
        ];
    public $timestamps = false;
}
