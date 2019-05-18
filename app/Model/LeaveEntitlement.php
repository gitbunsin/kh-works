<?php

namespace App\Model;

use App\OrganizationGenInfo;
use Illuminate\Database\Eloquent\Model;

class LeaveEntitlement extends Model
{

    protected $table = 'leave_entitlements';
    protected $fillable = [
        'id',
        'emp_number',
        'company_id',
        'leave_type_id',
        'entitlement_type',
        'no_of_day',
        'to_date',
        'from_date',
        'note',
        'deleted',
        'created_by_name'
    ];

    public function company(){

        return $this->belongsTo(OrganizationGenInfo::class,'company_id','id');
    }

    public function entitlementType(){
        return $this->belongsTo(LeaveEntitlemenType::class,'entitlement_type','id');
    }
    public function leavetype(){

        return $this->belongsTo(LeaveType::class,'leave_type_id','id');
    }
    public function employee(){

        return $this->belongsTo(Employee::class,'emp_number','emp_number');
    }


}
