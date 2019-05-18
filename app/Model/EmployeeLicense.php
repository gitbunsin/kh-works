<?php

namespace App\Model\Backend;

use App\Model\Employee;
use App\Model\License;
use Illuminate\Database\Eloquent\Model;

class EmployeeLicense extends Model
{
    //
    protected $table = 'employee_licenses';
    protected $fillable = [
        'emp_number',
        'licenses_id',
        'license_no',
        'license_issued_date',
        'license_expiry_date',
        'country',
    ];

    public  function employee(){

        return $this->belongsTo(Employee::class,'emp_number','id');
    }
    public function license(){

        return $this->belongsTo(License::class,'licenses_id','id');
    }
}
