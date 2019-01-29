<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeavePeriod extends Model
{
    //
    protected $table = 'tbl_hr_leave_period_history';
    protected $fillable = [
        'id',
        'name',
        'leave_period_start_month',
        'leave_period_start_day',
    ];
}
