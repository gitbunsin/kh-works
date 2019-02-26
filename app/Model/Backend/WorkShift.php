<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkShift extends Model
{
    protected $table = 'work_shifts';
    protected $fillable = [
        'id',
        'name',
        'hours_per_day',
        'start_time',
        'end_time',
    ];
}
