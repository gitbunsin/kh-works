<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class EmployeeEmergencyContact extends Model
{
    //

    protected $table = 'employee_emergency_contacts';
    protected $fillable = [
        'id',
        'emp_number',
        'eec_seqno',
        'eec_name',
        'eec_relationship',
        'eec_home_no',
        'eec_mobile_no',
        'eec_office_no',
        'eec_office_no',
        'created_at',
        'updated_at',
    ];
    public $timestamps = false;
}
