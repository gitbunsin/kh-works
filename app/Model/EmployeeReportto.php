<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class EmployeeReportto extends Model
{
    //
    protected $connection = 'mysql';
    protected $table = 'employee_reporttos';
    protected $fillable =
        [
            'erep_sup_emp_number',
            'erep_reporting_method',
        ];
    public $timestamps = false;
}
