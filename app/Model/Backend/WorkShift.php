<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkShift extends Model
{
    protected $table = 'tbl_work_shift';
    protected $fillable = [
        'id',
        'company_id',
        'name',
        'hours_per_day',
        'start_time',
        'end_time',
    ];
    public $timestamps = false;
    //
}
