<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeSkills extends Model
{
//    protected $guard = 'employee';
    protected $table = 'tbl_hr_emp_skill';
//    protected $primaryKey = 'emp_id';
    protected $fillable = [
        'id',
        'emp_number',
        'skill_id',
        'years_of_exp',
        'comment',
    ];
    public $timestamps = false;
}