<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PerformanceTrack extends Model
{
    //
    protected $connection = 'mysql';
    protected $table = 'performance_tracks';
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
//    public $timestamps = false;
}
