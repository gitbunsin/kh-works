<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class candidate_history extends Model
{

    protected $table ="candidate_history";
    protected $fillable = array('candidate_id','vacancy_id','candidate_vacancy_name','interview_id','performance_by','performed_date','note','interviewers');

    //

    public function candidate()
    {
        return $this->belongsTo(Candidate::class,'candidate_id','id');
    }
    public function vacancy(){

        return $this->belongsTo(Vacancy::class,'vacancy_id','id');
    }
    public function interview(){

        return $this->belongsTo(interview::class,'interview_id','id');
    }
}


