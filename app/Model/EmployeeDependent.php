<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class EmployeeDependent extends Model
{
    //
    protected $table = 'employee_dependents';
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
