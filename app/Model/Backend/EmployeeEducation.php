<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeEducation extends Model
{
    //
    protected $table = 'tbl_hr_emp_education';
//    protected $primaryKey = 'emp_id';
    protected $fillable = [
        'id',
        'employee_id',
        'company_id',
        'institute',
        'major',
        'year',
        'score',
        'start_date',
        'end_date',
    ];
    public $timestamps = false;
}
