<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class JobCandidate extends Model
{

    protected $table = 'job_candidates';
    protected $fillable = [
        'id',
        'name',
        'company_id',
        'email',
        'contact_number',
        'status',
        'comment',
        'mode_of_application',
        'date_of_application',
        'cv_file_id',
        'cv_text_version',
        'keywords',
        'added_person',
    ];
}
