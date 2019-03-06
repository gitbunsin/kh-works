<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class WorkWeek extends Model
{
    //
    protected $table = 'work_weeks';
    protected $fillable = [
        'id',
        'company_id',
        'operational_country_id',
        'mon',
        'tue',
        'thu',
        'fri',
        'sat',
        'sun',
    ];
    public $timestamps = false;
}
