<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportingTo extends Model
{
    //
    protected $connection = 'mysql';
    protected $table = 'tbl_hr_emp_reportto';
    protected $fillable =
        ['id',
            'erep_sup_emp_number',
            'erep_sub_emp_number',
            'erep_reporting_method',
        ];
    public $timestamps = false;
}
