<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class EmployeePassport extends Model
{
    //
    protected $table = 'employee_passports';
    protected $fillable = [
        'id',
        'emp_number',
        'eq_seqno',
        'eq_passport_num',
        'ep_passportissueddate',
        'ep_passportexpiredate',
        'ep_comments',
        'ep_passport_type_flg',
        'ep_i9_status',
        'ep_i9_review_date',
        'cou_code',
    ];
    public $timestamps = false;
}
