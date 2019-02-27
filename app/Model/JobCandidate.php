<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class JobCandidate extends Model
{
    protected $table= "";
    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'middle_name',
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
    //
}
