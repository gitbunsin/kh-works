<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class EmployeeSkill extends Model
{
    //
     protected $table = 'employee_skills';
     protected $fillable = [
         'emp_number',
         'skill_id',
         'years_of_exp',
         'comments',
     ];
}
