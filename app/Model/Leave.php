<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    //
    protected $table = 'leaves';
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
