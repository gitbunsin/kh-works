<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeWorkShift extends Model
{
    //
    protected $table = 'tbl_employment_status';
    protected $fillable = [
        'id',
        'work_shift_id',
        'emp_id',
    ];
    public $timestamps = false;
}
