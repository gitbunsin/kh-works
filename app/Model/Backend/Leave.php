<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    //
    protected $table = 'tbl_hr_leave';
    protected $fillable = [
        'id',
        'employee_id',
        'date',
        'length_hours',
        'length_days',
        'comments',
        'leave_request_id',
        'eave_type_id',
        'emp_number',
        'start_time',
        'end_time',
        'duration_type',
    ];
}
