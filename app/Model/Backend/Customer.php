<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $connection = 'mysql';
    protected $table = 'tbl_hr_customer';
    protected $fillable =
        ['id',
            'employee_id',
            'name',
            'description',
            'is_deleted',
        ];
    public $timestamps = false;


}
