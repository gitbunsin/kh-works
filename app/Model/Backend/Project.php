<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //

    protected $connection = 'mysql';
    protected $table = 'tbl_hr_project';
    protected $fillable =
        ['id',
            'employee_id',
            'customer_id',
            'name',
            'description',
            'is_deleted',
        ];
    public $timestamps = false;
}
