<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class JobInterview extends Model
{

    protected $table = 'job_interviews';
    protected $fillable = [
        'candidate_vacancy_id',
        'candidate_id',
        'interview_name',
        'interview_date',
        'interview_time',
        'note',
        'status',
    ];
}
