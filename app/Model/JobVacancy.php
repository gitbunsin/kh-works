<?php

namespace App\Model;

use App\OrganizationGenInfo;
use Illuminate\Database\Eloquent\Model;

class JobVacancy extends Model
{

    protected $table = 'job_vacancies';
    protected $fillable = [
        'id',
        'company_id',
        'hiring_manager_id',
        'job_title_code',
        'name',
        'job_description',
        'job_requirements',
        'no_of_position',
        'closingDate',
        'status',
        'public_in_feed',
    ];
    public $timestamps = true;

    public function company()
    {
        return $this->belongsTo(OrganizationGenInfo::class,'company_id','id');
    }
    public function employee()
    {
        return $this->belongsTo(Employee::class,'hiring_manager_id','emp_number');
    }
    public function jobtitle()
    {
        return $this->belongsTo(JobTitle::class,'job_title_code','id');
    }

}
