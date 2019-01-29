<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PerformanceTrackerLog extends Model
{
    //
    protected $connection = 'mysql';
    protected $table = 'tbl_performance_tracker_log';
    protected $fillable =
        ['id',
            'employee_id',
            'performance_track_id',
            'log',
            'comment',
            'status',
            'added_date',
            'modified_date',
            'review_id',
            'achievement',
            'user_id'
        ];
}
