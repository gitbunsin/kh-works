<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class LeaveType extends Model
{

    protected $table = 'leave_types';
    protected $fillable = [
        'id',
        'name',
        'description',
        'company_id',
        'exclude_in_reports_if_no_entitlement',
        'operational_country_id',
        'create_at',
        'update_at',
    ];
    public $timestamps = false;
}
