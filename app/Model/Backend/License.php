<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class License extends Model
{
    //
    protected $table = 'tbl_hr_license';
//    protected $primaryKey = 'emp_id';
    protected $fillable = [
        'id',
        'emp_number',
        'licenseType_id',
        'license_number',
        'issued_date',
        'expiry_date',
    ];
    public $timestamps = false;
}