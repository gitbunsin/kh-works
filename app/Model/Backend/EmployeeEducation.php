<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class EmployeeEducation extends Model
{
    //
    protected $table = 'employee_educations';
//    protected $primaryKey = 'emp_id';
    protected $fillable = [
        'id',
        'emp_number',
        'education_id',
        'institute',
        'major',
        'year',
        'score',
        'start_date',
        'end_date',
    ];
}
