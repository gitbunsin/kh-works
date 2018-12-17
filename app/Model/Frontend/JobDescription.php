<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobDescription extends Model
{
    protected $table = 'kh_job_jd';
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
    //
}
