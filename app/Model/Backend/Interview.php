<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
    protected $table = 'tbl_job_interview';
    protected $fillable = [
        'candidate_vacancy_id',
        'candidate_id',
        'interview_name',
        'interview_date',
        'interview_time',
        'note',
        'status',
    ];
    public $timestamps = false;
    //
}
