<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class interview extends Model
{
    //
    protected $table ="interviews";
    protected $fillable =array('candidate_vacancy_id','candidate_id','interview_name','interview_date','interview_time','note');


    public function employees()
    {
        return $this->belongsToMany(Employee::class);
    }

    public function CandidateVacancy(){

        return $this->belongsTo(candidate_vacancy::class,'candidate_vacancy_id','id');
    }
    public function candidate(){

        return $this->belongsTo(Candidate::class,'candidate_id','id');
    }


}
