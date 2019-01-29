<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeaveType extends Model
{
    //

    protected $table = 'tbl_hr_leave_type';
    protected $fillable = [
        'id',
        'name',
        'description',
        'deleted',
        'deleted',
        'exclude_in_reports_if_no_entitlement',
        'operational_country_id',
        'create_at',
        'update_at',
    ];
    public $timestamps = false;
}
