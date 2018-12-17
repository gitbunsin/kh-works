<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeWorkShift extends Model
{
    //
    protected $table = 'tbl_employee_work_shift';
    protected $fillable = [
        'id',
        'work_shift_id',
        'emp_id',
    ];
    public $timestamps = false;
}
