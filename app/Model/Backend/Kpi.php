<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kpi extends Model
{
    //
    protected $connection = 'mysql';
    protected $table = 'tbl_kpi';
    protected $fillable =
        ['id',
            'job_title_code',
            'employee_id',
            'kpi_indicators',
            'min_rating',
            'max_rating',
            'default_kpi',
            'deleted_at',
        ];
    public $timestamps = false;
}
