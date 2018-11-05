<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'tbl1_hr_employee';
    protected $fillable = ['emp_number','employee_id', 'emp_lastname','emp_middle_name','emp_nick_name'];
    public $timestamps = false;
    //
}
