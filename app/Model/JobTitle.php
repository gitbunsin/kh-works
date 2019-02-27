<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class JobTitle extends Model
{
    //
    protected $table = 'tbl_job_title';
    protected $fillable = [
        'job_title',
        'company_id',
        'description',
        'note',
        'is_deleted',
    ];
}
