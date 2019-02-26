<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class JobVacancyAttachment extends Model
{
 
    protected $fillable = [
        'vacancy_id',
        'file_name',
        'file_types',
        'file_size',
        'file_content',
        'attachment_type',
        'comment',
    ];
    //
}
