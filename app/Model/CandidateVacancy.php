<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CandidateVacancy extends Model
{
    protected $table = 'tbl_job_candidate_vacancy';
    protected $fillable = [
        'candidate_id',
        'vacancy_id',
        'status',
        'applied_date'
    ];

    public $timestamps = false;

    public  function user_apply($job_id , $user_id)
    {
        $result = DB::table($this->table)
            ->where("candidate_id", $user_id)
            ->where("vacancy_id", $job_id)
            ->get();
        dd($result);
        if($result->isEmpty())
            return false;
            return true;
    }
}
