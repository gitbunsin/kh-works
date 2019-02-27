<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeLanguage extends Model
{
    //
    protected $table = 'tbl_hr_emp_language';
    protected $fillable = [
        'id',
        'employee_id',
        'company_id',
        'lang_id',
        'fluency',
        'competency',
        'comments',
    ];
    public $timestamps = false;
}
