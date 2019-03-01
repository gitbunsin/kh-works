<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class LeavePeriodHistory extends Model
{
    //

    protected $table = 'leave_period_histories';
    protected $fillable = [
        'id',
        'name',
        'leave_period_start_month',
        'leave_period_start_day',
    ];
}
