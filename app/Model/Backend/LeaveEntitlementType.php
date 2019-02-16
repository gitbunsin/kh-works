<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeaveEntitlementType extends Model
{
    //

    protected $table = 'hr_leave_entitlement_type';
    protected $fillable = [
        'id',
        'name',
        'is_editable',
    ];
}
