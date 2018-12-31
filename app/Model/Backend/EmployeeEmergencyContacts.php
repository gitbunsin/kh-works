<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeEmergencyContacts extends Model
{
    protected $table = 'tbl_hr_emp_emergency_contacts';
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
    //
}
