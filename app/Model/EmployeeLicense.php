<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class EmployeeLicense extends Model
{
    //
    protected $table = 'employee_licenses';
    protected $fillable = [
        'emp_number',
        'license_id',
        'license_no',
        'license_issued_date',
        'license_expiry_date',
        'country',
    ];
}
