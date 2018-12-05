<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CandidateVacancy extends Model
{

//    protected $table = 'tbl_job_candidate_vacancy';
    protected  $connection  = 'mysql2';
    protected $table = 'tbl_job_candidate_vacancy';
    protected $fillable = [
        'candidate_id',
        'vacancy_id',
        'status',
        'applied_date'
    ];
    public $timestamps = false;
}
