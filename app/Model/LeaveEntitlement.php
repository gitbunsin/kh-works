<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class LeaveEntitlement extends Model
{
    //

    protected $table = 'leave_entitlements';
    protected $fillable = [
        'id',
        'employee_id',
        'company_id',
        'leave_type_id',
        'adjustment_type',
        'no_of_day',
        'to_date',
        'from_date',
        'note',
        'deleted',
        'created_by_name'
    ];


}
