<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkWeek extends Model
{
    //
    protected $table = 'tbl_hr_work_week';
    protected $fillable = [
        'id',
        'employee_id',
        'operational_country_id',
        'mon',
        'tue',
        'thu',
        'fri',
        'sat',
        'sun',
    ];
    public $timestamps = false;
}
