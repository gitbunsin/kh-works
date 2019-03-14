<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class EmployeeWorkshift extends Model
{
    //
    protected $table = 'employee_workshifts';
    protected $fillable = [
        'work_shift_id',
        'employee_id',
        'company_id',
    ];
}
