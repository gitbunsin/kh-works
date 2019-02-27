<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class JobVacancy extends Model
{
    protected $table = 'job_vacancies';
    protected $fillable = [
        'job_title',
        'company_id',
        'description',
        'requirement',
        'no_of_position',
        'defined_time',
        'update_time',
        'closing_date',

    ];
    
}
