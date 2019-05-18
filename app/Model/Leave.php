<?php

namespace App\Model;

use App\OrganizationGenInfo;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    //
    protected $table = 'leaves';
    protected $fillable = [
        'id',
        'date',
        'emp_number',
        'company_id',
        'length_hours',
        'length_days',
        'comments',
        'leave_request_id',
        'leave_type_id',
        'emp_number',
        'start_time',
        'end_time',
        'leave_status',
        'duration_type',
    ];

    public function leaveStatus()
    {
        return $this->belongsTo(LeaveStatus::class,'leave_status','id');
    }

    public function company()
    {

        return $this->belongsTo(OrganizationGenInfo::class,'company_id','id');
    }
    public function employee()
    {

        return $this->belongsTo(Employee::class,'emp_number','emp_number');
    }
    public function leaveType()
    {

        return $this->belongsTo(LeaveType::class,'leave_type_id','id');
    }


}
