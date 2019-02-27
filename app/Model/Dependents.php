<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dependents extends Model
{
    //
    protected $table = 'tbl_hr_emp_dependents';
    protected $fillable = ['id',
        'emp_number',
        'relationship_id',
        'ed_seqno',
        'ed_name',
        'ed_relationship_type',
        'ed_date_of_birth',
    ];
    public $timestamps = false;


}
