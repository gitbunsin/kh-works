<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class employee_interview extends Model
{
    //
    protected  $table ="employee_interview";
    protected  $fillable = array('interview_id','employee_emp_number');
}
