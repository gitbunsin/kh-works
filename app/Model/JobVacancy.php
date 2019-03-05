<?php

namespace App\Model;

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
        'status',
        'public_in_feed',
    ];
    public $timestamps = true;

    //
}
