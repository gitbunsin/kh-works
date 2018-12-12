<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeStatus extends Model
{
    //
    protected $table = 'tbl_employment_status';
    protected $fillable = [
        'id',
        'name',
    ];
    public $timestamps = false;
}
