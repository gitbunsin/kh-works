<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeaveStatus extends Model
{
    //
    protected $table = 'tbl_hr_leave_status';
    protected $fillable = [
        'id',
        'name',
        'status',
    ];
}
