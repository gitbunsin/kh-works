<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeaveAdjustment extends Model
{
    //

    protected $connection = 'mysql';
    protected $table = 'tbl_leave_adjustment';
    protected $fillable =
        ['id',
            'employee_id',
            'leave_type_id',
            'adjustment_type',
            'no_of_day',
            'to_date',
            'from_date',
            'note',
            'deleted_at',
        ];
    public $timestamps = false;
}
