<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeaveRequest extends Model
{
    //

    protected $table = 'tbl_hr_leave_request';
    protected $fillable = [
        'id',
        'employee_id',
        'company_id',
        'leave_type_id',
        'date_applied',
        'comments',
    ];
    public $timestamps = false;
}
