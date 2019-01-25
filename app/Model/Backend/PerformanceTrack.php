<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PerformanceTrack extends Model
{

    protected $connection = 'mysql';
    protected $table = 'tbl_hr_performance_track';
    protected $fillable =
        ['id',
            'emp',
            'employee_id',
            'tracker_name',
            'added_date',
            'added_by',
            'status',
            'modified_date',
        ];
    public $timestamps = false;
}
