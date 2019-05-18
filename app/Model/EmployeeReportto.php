<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class EmployeeReportto extends Model
{
    //
    protected $connection = 'mysql';
    protected $table = 'employee_reporting_method';
    protected $fillable =
        [
            'employee_emp_number',
            'reporting_method_id',
        ];
    public $timestamps = false;
//
//    public function ReportingMethod(){
//
//
//    }
//        public function employees()
//        {
//            return $this->belongsToMany(Employee::class,'employee_emp_number','emp_number');
//        }
//        public function ReportingMethod()
//        {
//            return $this->belongsToMany(ReportingMethod::class,'reporting_method_id','id');
//        }
}
