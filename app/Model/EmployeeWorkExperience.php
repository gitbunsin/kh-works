<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class EmployeeWorkExperience extends Model
{

    protected $table = 'employee_work_experiences';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'emp_number',
        'eexp_seqno',
        'eexp_employer',
        'eexp_jobtit',
        'eexp_from_date',
        'eexp_to_date',
        'eexp_comments',
        'eexp_internal'
    ];
    public $timestamps = false;

}
