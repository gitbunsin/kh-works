<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VacancyAttachment extends Model
{
    protected $table = 'tbl_job_vacancy_attachment';
    protected $fillable = [
        'id',
        'vacancy_id',
        'file_name',
        'file_types',
        'file_size',
        'file_content',
        'attachment_type',
        'comment',
    ];
    public $timestamps = false;
}
