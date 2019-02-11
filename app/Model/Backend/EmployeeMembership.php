<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeMembership extends Model
{
    //
    protected $table = 'tbl_hr_emp_memeber_detail';
    protected $fillable = [
        'id',
        'employee_id',
        'company_id',
        'membership_code',
        'ememb_subscript_amount',
        'ememb_subs_crrency',
        'ememb_commence_date',
        'ememb_renewal_date',
    ];
    public $timestamps = false;
}
