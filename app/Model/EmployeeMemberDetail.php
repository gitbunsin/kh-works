<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class EmployeeMemberDetail extends Model
{
    //
    protected $table = 'employee_member_details';
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
