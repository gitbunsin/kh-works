<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class JobVacancyAttachment extends Model
{

    protected $table = 'job_vacancy_attachments';
    protected $fillable = [
        'id',
        'vacancy_id',
        'file_name',
        'file_type',
        'file_content',
        'attachment_type',
        'comment'
    ];
    public $timestamps = false;
}
