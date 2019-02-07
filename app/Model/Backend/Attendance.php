<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    //

    protected $table = 'tbl_hr_attendance_record';

    protected $fillable = [
        'id',
        'employee_id',
        'punch_in_utc_time',
        'punch_in_note',
        'punch_in_time_offset',
        'punch_in_user_time',
        'punch_out_utc_time',
        'punch_out_note',
        'punch_out_time_offset',
        'punch_out_user_time',
        'status',
    ];
    public $timestamps = false;
}
