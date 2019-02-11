<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Immigration extends Model
{
    protected $table = 'tbl_hr_emp_passport';
    protected $fillable = [
        'id',
        'emp_number',
        'ep_seqno',
        'ep_passport_num',
        'ep_passportissueddate',
        'ep_passportexpiredate',
        'ep_comment',
        'ep_passport_type_flg',
        'ep_i9_status',
        'ep_i9_review_date',
        'cou_code',
    ];
    public $timestamps = false;
    //
}
