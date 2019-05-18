<?php

namespace App\Model;

use App\OrganizationGenInfo;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    //
    protected $table = 'candidates';
    protected $fillable = [
        'id',
        'company_id',
        'user_id',
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'contact_number',
        'status',
        'comment',
        'mode_of_application',
        'date_of_application',
        'keywords',
        'added_person',
    ];

    public function company()
    {
        return $this->belongsTo(OrganizationGenInfo::class,'company_id','id');
    }
    public function interviews(){

        return $this->belongsToMany(interview::class);
    }

    public function vacancies()
    {
        return $this->belongsToMany(Vacancy::class)->withPivot('status','applied_date');
    }
    public function candidate_history()
    {
        return $this->belongsToMany(candidate_history::class);
    }
}
