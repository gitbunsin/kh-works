<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeStatus extends Model
{
    //
    protected $table = 'tbl_employment_status';
    protected $fillable = [
        'id',
        'company_id',
        'name',
    ];
    public $timestamps = false;
}
