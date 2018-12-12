<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    //
    protected $table = 'kh_job_vacancy';
    protected $fillable = [
        'job_title',
        'company_id',
        'description',
        'requirement',
        'no_of_position',
        'defined_time',
        'update_time',
        'closing_date',
    ];
    public $timestamps = false;
}
