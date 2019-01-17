<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeEducation extends Model
{
    //
    protected $table = 'tbl_hr_education';
//    protected $primaryKey = 'emp_id';
    protected $fillable = [
        'id',
        'emp_number',
        'institute',
        'major',
        'year',
        'score',
        'start_date',
        'end_date',
    ];
    public $timestamps = false;
}
