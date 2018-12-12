<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $table = 'tbl_job_candidate';
    protected $fillable = [
        'id',
        'first_name',
        'middle_name',
        'last_name',
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
    public $timestamps = false;
}
