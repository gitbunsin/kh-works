<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportingMethods extends Model
{
    //
    protected $connection = 'mysql';
    protected $table = 'tbl_hr_reporting_method';
    protected $fillable =
        ['id',
            'employee_id',
            'name',
            'description',
        ];
    public $timestamps = false;
}
