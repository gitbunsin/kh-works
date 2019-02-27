<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CandiateHistory extends Model
{

    protected $table = 'tbl_job_candidate_history';

    protected $fillable = [
        'id',
        'candidate_id',
        'vacancy_id',
        'candidate_vacancy_name',
        'interview_id',
        'action',
        'performed_by',
        'performed_date',
        'note',
        'interviewers'
    ];
    public $timestamps = false;
}
