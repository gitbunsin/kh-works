<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class EmployeeWorkShift extends Model
{
    //
    protected $table = 'employee_work_shifts';
    protected $fillable = [
        'work_shift_id',
        'employee_id',
        'company_id',
    ];

}
