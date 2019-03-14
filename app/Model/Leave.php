<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    //
    protected $table = 'leaves';
    protected $fillable = [
        'id',
        'date',
        'emp_number',
        'company_id',
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
