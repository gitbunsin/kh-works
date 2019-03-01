<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ReportingMethod extends Model
{
    //
    protected $connection = 'mysql';
    protected $table = 'reporting_methods';
    protected $fillable =
        ['reporting_method_id',
            'reporting_method_name'
        ];
    public $timestamps = false;
}
